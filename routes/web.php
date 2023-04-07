<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Accounts;
use App\Http\Controllers\UserController as User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Accounts::class, 'login'])->name('login');
Route::post('/login', [Accounts::class, 'login']);
Route::get('/register', [Accounts::class, 'register'])->name('register');
Route::post('/register/add', [Accounts::class, 'register']);
Route::get('/logout', [Accounts::class, 'logout'])->name('logout');
Route::get('/dashboard', [User::class, 'dashboard'])->name('dashboard');
Route::get('/add-user', [User::class, 'addUser'])->name('add-user');
Route::post('/add-user/add', [User::class, 'addUser']);
Route::get('/edit-user/{id}', [User::class, 'editUser'])->name('edit-user');
Route::post('/edit-user/update/{id}', [User::class, 'editUser']);
Route::get('/delete-user/{id}', [User::class, 'deleteUser'])->name('delete-user');
