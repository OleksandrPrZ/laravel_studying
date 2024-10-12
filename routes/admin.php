<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Color\ColorController;
use App\Http\Controllers\Admin\Main\IndexController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Role\RoleController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\TokenController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin|manager']], function () {
    Route::get('/', IndexController::class . '@index')->name('admin.main.index');
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', CategoryController::class . '@index')->name('admin.category.index');
        Route::get('/create', CategoryController::class . '@create')->name('admin.category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}/edit', CategoryController::class . '@edit')->name('admin.category.edit');
        Route::get('/{category}', CategoryController::class . '@show')->name('admin.category.show');
        Route::patch('/{category}', CategoryController::class . '@update')->name('admin.category.update');
        Route::delete('/{category}', CategoryController::class . '@delete')->name('admin.category.delete');
    });
    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', TagController::class . '@index')->name('admin.tag.index');
        Route::get('/create', TagController::class . '@create')->name('admin.tag.create');
        Route::post('/store', [TagController::class, 'store'])->name('admin.tag.store');
        Route::get('/{tag}/edit', TagController::class . '@edit')->name('admin.tag.edit');
        Route::get('/{tag}', TagController::class . '@show')->name('admin.tag.show');
        Route::patch('/{tag}', TagController::class . '@update')->name('admin.tag.update');
        Route::delete('/{tag}', TagController::class . '@delete')->name('admin.tag.delete');
    });
    Route::group(['prefix' => 'colors'], function () {
        Route::get('/', ColorController::class . '@index')->name('admin.color.index');
        Route::get('/create', ColorController::class . '@create')->name('admin.color.create');
        Route::post('/store', [ColorController::class, 'store'])->name('admin.color.store');
        Route::get('/{color}/edit', ColorController::class . '@edit')->name('admin.color.edit');
        Route::get('/{color}', ColorController::class . '@show')->name('admin.color.show');
        Route::patch('/{color}', ColorController::class . '@update')->name('admin.color.update');
        Route::delete('/{color}', ColorController::class . '@delete')->name('admin.color.delete');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', UserController::class . '@index')->name('admin.user.index');
        Route::get('/create', UserController::class . '@create')->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}/edit', UserController::class . '@edit')->name('admin.user.edit');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::post('/generate-token', [TokenController::class, 'generateFixedToken'])->name('admin.generate.token');
        Route::resource('/roles', RoleController::class);//->names('admin.user.role');
    });
    Route::group(['prefix' => 'roles'], function () {
        Route::resource('roles', RoleController::class)->names('admin.roles');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/{product:slug}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::get('/{product:slug}', [ProductController::class, 'show'])->name('admin.product.show');
        Route::patch('/{product:slug}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::delete('/{product:slug}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });
});
