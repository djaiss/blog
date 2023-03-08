<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->name('home.index');
Route::get('posts', [PostController::class, 'index'])->name('post.index');
Route::get('posts/{slug}', [PostController::class, 'show'])->name('post.show');
