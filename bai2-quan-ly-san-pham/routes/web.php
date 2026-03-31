<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products/store', [ProductController::class, 'store']);
Route::post('/products/update/{id}', [ProductController::class, 'updateQuantity']);
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);