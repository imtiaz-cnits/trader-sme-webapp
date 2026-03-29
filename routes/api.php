<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebhookController;

// User Registration API Route Start
Route::post('/user-registration', [RegisterController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login'])->name('login');

// ✅ FIX: Added POST route for handling forgot password form submission
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::post('/webhook/trade', [WebhookController::class, 'handleTrade'])
    ->middleware(\App\Http\Middleware\VerifyWebhookSecurity::class);
