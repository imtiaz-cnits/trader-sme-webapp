<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebhookController;

// User Registration API Route Strat
Route::post('/user-registration', [RegisterController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/webhook/trade', [WebhookController::class, 'handleSignal']);
