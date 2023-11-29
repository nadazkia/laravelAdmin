<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin');
            } elseif (Auth::user()->role == 'vendor') {
                return redirect('admin');
            } elseif (Auth::user()->role == 'user') {
                return redirect('user');
            }
        } else {
            return redirect('/register')->withErrors('Email dan Password tidak sesuai')->withInput();
        }

        // DIPAKE KALAU ADA AKUN HOME
        // else {
        //     return redirect('');
        // }
    }

    function logout()
    {
        Auth::logout();
        return redirect('')->with('success', 'Berhasil logout');
    }



    function register()
    {
        return view('register');
    }

    function create(Request $request)
    {
        Session::flash('nama', $request->nama);
        Session::flash('email', $request->email);
        $request->validate(
            [
                'nama' => 'required|string',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:4',
            ],
            [
                'nama.required' => 'Nama wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Silakan masukan email dengan benar',
                'email.unique' => 'Email sudah pernah digunakan, silahkan gunakan email lain',
                'role.required' => 'Pilih Role',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Minimum Password adalah 4 karakter',
                // 'password.confirmed' => 'Password belum cocok',
            ]
        );

        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ];
        User::create($data);


        return redirect('')->with('Success', 'Berhasil Registrasi');


        /* ********* KALAU MAU LANGSUNG LOGIN ******** */
        /* ******************************************* */
        // $infologin = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];

        // if (Auth::attempt($infologin)) {
        //     // echo ('Berhasil login');
        //     // if (Auth::user()->role == 'admin') {
        //     //     redirect('admin');
        //     // } else {
        //     //     redirect('users');
        //     // }
        //     return redirect('user')->with('Success', 'Berhasil login');
        // } else {
        //     return redirect('register')->withErrors('Masih salah')->withInput();
        // }
    }
}
