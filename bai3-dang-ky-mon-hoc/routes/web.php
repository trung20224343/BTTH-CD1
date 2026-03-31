<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

Route::get('/enrollments', [EnrollmentController::class, 'index']);
Route::post('/students/store', [EnrollmentController::class, 'storeStudent']);
Route::post('/courses/store', [EnrollmentController::class, 'storeCourse']);
Route::post('/enrollments/store', [EnrollmentController::class, 'storeEnrollment']);