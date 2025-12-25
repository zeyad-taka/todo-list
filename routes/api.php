<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\taskcontroller;

// [17] مسارات الحسابات
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// [16 & 18] مسارات المهام
Route::get('/tasks', [taskcontroller::class, 'index']);
Route::get('/tasks/{id}', [taskcontroller::class, 'show']);
Route::post('/tasks', [taskcontroller::class, 'store']);
Route::put('/tasks/{id}', [taskcontroller::class, 'update']);
Route::delete('/tasks/{id}', [taskcontroller::class, 'destroy']);
use App\Http\Controllers\CategoryController;

// مسارات الكاتجوري الجديدة
Route::apiResource('categories', CategoryController::class);