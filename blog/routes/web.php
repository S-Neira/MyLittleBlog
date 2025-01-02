<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/login', function() {return view('login'); })->name('login');
Route::post('/login', [PostController::class, 'login']);
Route::get('/register', function() {return view('register'); })->name('register');
Route::get('/posts', [PostController::class, 'posts'])->name('posts');
Route::get('/post/show', function(){return view('post.show');})->name('posts.show');
