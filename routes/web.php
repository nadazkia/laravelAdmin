<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
    Route::get('/register', [SesiController::class, 'register'])->name('register');
    Route::post('/register', [SesiController::class, 'create'])->name('create');
});

// Route::get('/home', function () {
//     return redirect('');
// });


Route::middleware(['auth'])->group(function () {
    // Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::resource('user', UserController::class)->middleware('userAccess:user');
    Route::resource('admin/data-user', AdminController::class)->middleware('userAccess:admin');
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});
