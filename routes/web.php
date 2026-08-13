<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController; 

// ...existing code...

// Accueil / login
Route::get('/Accueil', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/Accueil', [AuthController::class, 'login'])->name('login.post');

// Logout (unique)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.post');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Users routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// ...existing code...

Route::resource('tasks', TaskController::class);