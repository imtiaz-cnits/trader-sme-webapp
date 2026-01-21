<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// User Registration API Route Strat
Route::post('/user-registration', [RegisterController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login'])->name('login');


