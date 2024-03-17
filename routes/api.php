<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [RegisterController::class, 'logout']);
Route::post('/login', [RegisterController::class, 'login']);
