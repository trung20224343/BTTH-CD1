<?php

use App\Http\Controllers\ProductController;

Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
Route::resource('products', ProductController::class);
