<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Color\ColorController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Tag\TagController;
use App\Http\Controllers\User\TokenController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Product\StoreController;
use App\Http\Controllers\Api\Product\UpdateController;
use App\Http\Controllers\Api\Product\DestroyController;

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

Route::get('/', \App\Http\Controllers\Main\IndexController::class.'@index')->name('main.index');
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', CategoryController::class.'@index')->name('category.index');
    Route::get('/create', CategoryController::class.'@create')->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{category}/edit', CategoryController::class.'@edit')->name('category.edit');
    Route::get('/{category}', CategoryController::class.'@show')->name('category.show');
    Route::patch('/{category}', CategoryController::class.'@update')->name('category.update');
    Route::delete('/{category}', CategoryController::class.'@delete')->name('category.delete');
});
Route::group(['prefix' => 'tags'], function () {
    Route::get('/', TagController::class.'@index')->name('tag.index');
    Route::get('/create', TagController::class.'@create')->name('tag.create');
    Route::post('/store', [TagController::class, 'store'])->name('tag.store');
    Route::get('/{tag}/edit', TagController::class.'@edit')->name('tag.edit');
    Route::get('/{tag}', TagController::class.'@show')->name('tag.show');
    Route::patch('/{tag}', TagController::class.'@update')->name('tag.update');
    Route::delete('/{tag}', TagController::class.'@delete')->name('tag.delete');
});
Route::group(['prefix' => 'colors'], function () {
    Route::get('/', ColorController::class.'@index')->name('color.index');
    Route::get('/create', ColorController::class.'@create')->name('color.create');
    Route::post('/store', [ColorController::class, 'store'])->name('color.store');
    Route::get('/{color}/edit', ColorController::class.'@edit')->name('color.edit');
    Route::get('/{color}', ColorController::class.'@show')->name('color.show');
    Route::patch('/{color}', ColorController::class.'@update')->name('color.update');
    Route::delete('/{color}', ColorController::class.'@delete')->name('color.delete');
});
Route::group(['prefix' => 'users'], function () {
    Route::get('/', UserController::class.'@index')->name('user.index');
    Route::get('/create', UserController::class.'@create')->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/{user}/edit', UserController::class.'@edit')->name('user.edit');
    Route::get('/{user}', UserController::class.'@show')->name('user.show');
    Route::patch('/{user}', [UserController::class,'update'])->name('user.update');
    Route::delete('/{user}', [UserController::class,'delete'])->name('user.delete');
    Route::post('/generate-token', [TokenController::class, 'generateFixedToken'])->name('generate.token');
});
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/{product:slug}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/{product:slug}', [ProductController::class, 'show'])->name('product.show');
    Route::patch('/{product:slug}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/{product:slug}', [ProductController::class, 'delete'])->name('product.delete');
});
