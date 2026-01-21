<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradeLogController;
use App\Http\Controllers\FolderController;


Route::get('/', function () {
    return view('components.front-end.home-page');
});


// Route::view('/', 'components.front-end.home-page');



// Route::view('/login-page', 'components.front-end.auth.registration-form');

Route::view('/login-page', 'components.front-end.auth.registration-form')->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::view('/admin-dashboard', 'components.back-end.dashboardsummery');

Route::get('/admin-dashboard', function () {
    return view('components.back-end.dashboardsummery');
})->middleware('auth')->name('admin.dashboard');

Route::get('/setting-page', function () {
    return view('components.back-end.setting-page');
})->middleware('auth')->name('admin.setting-page');

Route::get('/chronology-page', function () {
    return view('components.back-end.chronology-page');
})->middleware('auth')->name('admin.chronology-page');

Route::get('/daily-trading-page', function () {
    return view('components.back-end.daily-trading-page');
})->middleware('auth')->name('admin.daily-trading-page');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update']);
});
Route::middleware('auth')->group(function () {
    Route::post('/trade-log/store', [TradeLogController::class, 'store']);
    Route::get('/trade-log/list', [TradeLogController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/stats', [TradeLogController::class, 'getDashboardStats']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/best-trades', [TradeLogController::class, 'getBestTrades']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/trade-stats', [TradeLogController::class, 'getTradeStats']);
});

Route::get('/trading-analytics', function () {
    return view('components.back-end.trading-analytics');
})->name('trading.analytics');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/most-profitable-assets', [TradeLogController::class, 'getMostProfitableAssets']);
});


Route::middleware('auth')->get('/daily-trends-data', [TradeLogController::class, 'dailyTrendsData'])
     ->name('daily.trends.data');


// Ensure this route is protected by middleware like 'auth' if only logged-in users can create folders
Route::post('/folders', [FolderController::class, 'store'])
    ->middleware('auth') // Optional but highly recommended
    ->name('folders.store');

Route::get('/folders/list', [FolderController::class, 'index'])
    ->middleware('auth') 
    ->name('folders.index');



// Route::get('auth/{provider}', [SocialAuthController::class, 'redirect']);
// Route::get('auth/{provider}/callback', [SocialAuthController::class, 'callback']);
