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

    Route::get('/departments', [DepartmentsController::class, 'index']
    );
    Route::get('/departments/{id}', [DepartmentsController::class, 'show']);
    Route::delete('/departments/{id}', [DepartmentsController::class, 'destroy']);
    Route::put('/departments/{id}', [DepartmentsController::class, 'update']);
    Route::post('/departments', [DepartmentsController::class, 'store']);

    Route::get('/stats', [StatsController::class, 'index']);

    Route::get('/employees/{id}', [EmployeesController::class, 'show']);
    Route::get('/employees', [EmployeesController::class, 'index']);
    Route::delete('/employees/{id}', [EmployeesController::class, 'destroy']);
    Route::put('/employees/{id}', [EmployeesController::class, 'update']);
    Route::post('/employees', [EmployeesController::class, 'store']);
});
