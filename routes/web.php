<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cadastrar', [UserController::class, 'cadastrar'])->name('dashboard.cadastrar');
Route::post('/registrar', [UserController::class, 'store'])->name('dashboard.registrar');

Route::get('/dashboard/{id}/edit', [UserController::class, 'editAdmin'])->name('dashboard.edit_admin')->middleware('auth');
Route::get('/user/{id}/edit-user', [UserController::class, 'editUser'])->name('dashboard.edit_user')->middleware('auth');

Route::resource('dashboard', UserController::class)->middleware('auth');
Route::get('/user', [UserController::class, 'userComun'])->middleware('auth')->name('dashboard.user');

Route::get('/', [UserController::class, 'home'])->name('home');
