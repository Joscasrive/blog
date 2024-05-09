<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');

Route::group(['middleware' => 'auth'], function () {
    // Grupo de rutas para el controlador CategoryController
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index')->name('admin.categories.index')->middleware('can:admin.categories.index');
        Route::get('categories/create', 'create')->name('admin.categories.create')->middleware('can:admin.categories.create');
        Route::post('categories', 'store')->name('admin.categories.store')->middleware('can:admin.categories.create');  
        Route::get('categories/{category}/edit', 'edit')->name('admin.categories.edit')->middleware('can:admin.categories.edit');
        Route::put('categories/{category}', 'update')->name('admin.categories.update')->middleware('can:admin.categories.edit');
        Route::delete('categories/{category}', 'destroy')->name('admin.categories.destroy')->middleware('can:admin.categories.destroy');
    });

    // Grupo de rutas para el controlador PostController
    Route::controller(PostController::class)->group(function () {
        Route::get('posts', 'index')->name('admin.posts.index')->middleware('can:admin.posts.index');
        Route::get('posts/create', 'create')->name('admin.posts.create')->middleware('can:admin.posts.create');
        Route::post('posts', 'tore')->name('admin.posts.store')->middleware('can:admin.posts.create');
        Route::get('posts/{post}/edit', 'edit')->name('admin.posts.edit')->middleware('can:admin.posts.edit');
        Route::put('posts/{post}', 'update')->name('admin.posts.update')->middleware('can:admin.posts.edit');
        Route::delete('posts/{post}', 'destroy')->name('admin.posts.destroy')->middleware('can:admin.posts.destroy');
    });

    // Grupo de rutas para el controlador TagController
    Route::controller(TagController::class)->group(function () {
        Route::get('tags', 'index')->name('admin.tags.index')->middleware('can:admin.tags.index');
        Route::get('tags/create', 'create')->name('admin.tags.create')->middleware('can:admin.tags.create');
        Route::post('tags', 'store')->name('admin.tags.store')->middleware('can:admin.tags.create');
        Route::get('tags/{tag}/edit', 'edit')->name('admin.tags.edit')->middleware('can:admin.tags.edit');
        Route::put('tags/{tag}', 'update')->name('admin.tags.update')->middleware('can:admin.tags.edit');
        Route::delete('tags/{tag}', 'destroy')->name('admin.tags.destroy')->middleware('can:admin.tags.destroy');
    });

    // Grupo de rutas para el controlador UserController
    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index')->name('admin.users.index')->middleware('can:admin.users.index');
        Route::get('users/{user}/edit', 'edit')->name('admin.users.edit')->middleware('can:admin.users.edit');
        Route::put('users/{user}', 'update')->name('admin.users.update')->middleware('can:admin.users.edit');
      
    });

    // Grupo de rutas para el controlador RoleController
    Route::controller(RoleController::class)->middleware('can:admin.users.index','can:admin.users.edit')->group(function () {
        Route::get('roles', 'index')->name('admin.roles.index');
        Route::get('roles/create', 'create')->name('admin.roles.create');
        Route::post('roles', 'store')->name('admin.roles.store');
        Route::get('roles/{role}/edit', 'edit')->name('admin.roles.edit');
        Route::put('roles/{role}', 'update')->name('admin.roles.update');
        Route::delete('roles/{role}', 'destroy')->name('admin.roles.destroy');
    });
});