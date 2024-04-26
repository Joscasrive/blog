<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::get('posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::get('categories/{category}',[PostController::class,'category'])->name('posts.category');
Route::get('tags/{tag}',[PostController::class,'tag'])->name('posts.tag');


