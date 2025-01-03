<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/login', function() {return view('login'); })->name('login');

// autenticación
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/register', function() {return view('register'); })->name('register');
Route::get('/posts', [PostController::class, 'posts'])->name('posts');
Route::get('/post/show', function(){return view('posts.show');})->name('posts.show');

Route::get('/login/dashboard/{id}', [DashboardController::class, 'index'])->name('dashboard');

// CRUD POSTS
Route::get('/post/create/{id}', [PostController::class, 'createForm'])->name('create-form');
Route::post('/post/create/{id}', [PostController::class, 'create'])->name('create');
Route::get('/post/edit/{id}', [PostController::class, 'editForm'])->name('edit');
Route::get('/post/delete/{id}', [PostController::class, 'delete'])->name('delete');