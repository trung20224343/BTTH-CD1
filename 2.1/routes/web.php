<?php

use Illuminate\Support\Facades\Route;
// Bạn PHẢI có dòng này để Laravel hiểu StudentController là gì 
use App\Http\Controllers\StudentController;

// 1. Trang danh sách sinh viên [cite: 131]
Route::get('/students', [StudentController::class, 'index']);

// 2. Trang hiển thị Form thêm sinh viên [cite: 132]
Route::get('/students/create', [StudentController::class, 'create']);

// 3. Xử lý lưu dữ liệu (Dùng POST để bảo mật) [cite: 133, 142]
Route::post('/students/store', [StudentController::class, 'store']);