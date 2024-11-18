<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/users'); // Redirects to /users
});

// Route to display the form (GET request)
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// Route to handle form submission (POST request)
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Route to display the users table (GET request)
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Route to handle soft delete (DELETE request)
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.delete');

