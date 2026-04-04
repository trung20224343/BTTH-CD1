<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');
Route::resource('employees', EmployeeController::class);