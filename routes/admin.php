<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');

//Categories Ruta
Route::resource('categories', CategoryController::class)
    ->middleware('can:admin.categories.index')
    ->only(['index'])
    ->names('admin.categories');

Route::resource('categories', CategoryController::class)
    ->middleware('can:admin.categories.create')
    ->only(['create', 'store'])
    ->names('admin.categories');

Route::resource('categories', CategoryController::class)
    ->middleware('can:admin.categories.edit')
    ->only(['edit', 'update'])
    ->names('admin.categories');

Route::resource('categories', CategoryController::class)
    ->middleware('can:admin.categories.destroy')
    ->only(['destroy'])
    ->names('admin.categories');

//Tags Ruta
Route::resource('tags', TagController::class)
    ->middleware('can:admin.tags.index')
    ->only(['index'])
    ->names('admin.tags');

Route::resource('tags', TagController::class)
    ->middleware('can:admin.tags.create')
    ->only(['create', 'store'])
    ->names('admin.tags');

Route::resource('tags', TagController::class)
    ->middleware('can:admin.tags.edit')
    ->only(['edit', 'update'])
    ->names('admin.tags');

Route::resource('tags', TagController::class)
    ->middleware('can:admin.tags.destroy')
    ->only(['destroy'])
    ->names('admin.tags');

//Post Ruta
Route::resource('posts', PostController::class)
    ->middleware('can:admin.posts.index')
    ->only(['index'])
    ->names('admin.posts');

Route::resource('posts', PostController::class)
    ->middleware('can:admin.posts.create')
    ->only(['create', 'store'])
    ->names('admin.posts');

Route::resource('posts', PostController::class)
    ->middleware('can:admin.posts.edit')
    ->only(['edit', 'update'])
    ->names('admin.posts');

Route::resource('posts', PostController::class)
    ->middleware('can:admin.posts.destroy')
    ->only(['destroy'])
    ->names('admin.posts');
//Users Ruta
Route::resource('users', UserController::class)->only(['index','edit','update'])
->middleware(['can:admin.users.index,admin.users.edit'])->only(['index','edit','update'])
->names('admin.users');
//Role Ruta
Route::resource('roles', RoleController::class)->names('admin.roles');