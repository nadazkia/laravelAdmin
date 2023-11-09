<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            if (Auth::user()->role == 'operator') {
                return redirect('admin/operator');
            } elseif (Auth::user()->role == 'keuangan') {
                return redirect('admin/keuangan');
            } elseif (Auth::user()->role == 'merketing') {
                return redirect('admin/marketing');
            }
            // DIPAKE KALAU ADA AKUN HOME
            // else {
            //     return redirect('');
            // }
        } else {
            return redirect('')->withErrors('Email dan Password tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
