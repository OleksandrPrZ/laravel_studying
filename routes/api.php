<?php

use App\Http\Controllers\Api\Product\DestroyController;
use App\Http\Controllers\Api\Product\UpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Product\StoreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products/create', StoreController::class)->name('api.products.store');
    Route::put('/products/edit/{id}', UpdateController::class)->name('api.products.update');
    Route::delete('/products/delete/{id}', DestroyController::class)->name('api.products.destroy');
});
