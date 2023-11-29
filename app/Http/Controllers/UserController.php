<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    function index($id)
    {
        return view('user.index', [
            'users' => User::orderBy('id')->get(),
            'title' => 'User Page',
            'user' => User::findOrFail($id)
        ]);
    }

    // *******************
    //      CRUD user
    // *******************

    function create()
    {
        return view('user.create', [
            'title' => 'Create Page',
        ]);
    }

    function store(StoreRequest $request)
    {
        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    function show($id)
    {
        return view('user.show', [
            'users' => User::findOrFail($id),
            'title' => 'Show Page',
        ]);
    }

    function edit($id)
    {
        return view('user.edit', [
            'title' => 'Edit Page',
            'users' => User::where('id', $id)->first(),
        ]);
    }
    function update(UpdateRequest $request, $id)
    {
        $users = User::findOrFail($id);

        $users->update([
            'nama'        => $request->nama,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'role'        => $request->role,
        ]);


        // dd($request->all());

        /* ******* KALAU MAU PAKAI VALIDASI PASSWORD ******* */
        // $validated = $request->validateWithBag('updatePassword', [
        //     'current_password' => ['required', 'current_password'],
        //     'password' => ['required', Password::defaults(), 'confirmed'],
        // ]);

        // $request->user()->update([
        //     'password' => Hash::make($validated['password']),
        // ]);
        /* ************************************************** */

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate.');
    }




    function destroy($id)
    {
        // KALAU MAU VALIDASI PASSWORD DULU
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current_password'],
        // ]);

        // KALAU MAU LANGSUNG LANGSUNG LOGOUT
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        $users = User::findOrFail($id);
        $users->delete($users);

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
