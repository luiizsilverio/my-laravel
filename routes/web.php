<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->middleware(['can:isAdmin']);
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');

    // Clientes
    Route::resources([
        'clientes' => ClienteController::class
    ]);

    Route::get('/clientes/meus/{id}', [ClienteController::class, 'meus'])->name('clientes.meus');

});

require __DIR__.'/auth.php';
