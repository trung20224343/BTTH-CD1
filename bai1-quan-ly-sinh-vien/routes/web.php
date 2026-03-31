<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/create', [StudentController::class, 'create']);

Route::post('/students/store', [StudentController::class, 'store']);