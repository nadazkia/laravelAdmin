<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    function index()
    {
        return view('admin.index', [
            'users' => User::orderBy('id')->get(),
            'title' => 'Admin Page'
        ]);
    }

    function vendor()
    {
        return view('admin.index', [
            'title' => 'Vendor Page',
        ]);
    }

    // *******************
    //      CRUD ADMIN
    // *******************

    function create()
    {
        return view('admin.create', [
            'title' => 'Create Page',
        ]);
    }

    function store(StoreRequest $request)
    {
        User::create($request->all());
        return redirect()->route('admin.index')->with('success', 'User berhasil ditambahkan.');
    }

    function show($id)
    {
        return view('admin.show', [
            'users' => User::findOrFail($id),
            'title' => 'Show Page',
        ]);
    }

    function edit($id)
    {
        return view('admin.edit', [
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

        return redirect()->route('admin.index')->with('success', 'User berhasil diupdate.');
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

        return redirect()->route('admin.index')->with('success', 'User deleted successfully');
    }
}
