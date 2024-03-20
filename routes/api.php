<?php

use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [RegisterController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [RegisterController::class, 'logout']);
    Route::get('/employees', [EmployeesController::class, 'index']);
    Route::get('/departments', [DepartmentsController::class, 'index']);
    Route::get('/stats', [StatsController::class, 'index']);
});
