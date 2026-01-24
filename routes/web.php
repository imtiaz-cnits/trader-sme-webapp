<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TradeLogController;
use App\Http\Controllers\ChronologyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FolderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🌐 Locale Switcher
Route::get('locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'es'])) {
        Session::put('locale', $lang);
    }
    return redirect()->back();
})->name('locale.change');

// 🏠 Public Routes
Route::view('/', 'components.front-end.home-page');

// 🔐 Authentication
Route::get('/login-page', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login-page', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register-page', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register-page', [RegisterController::class, 'register']);

// 🛡️ Admin Protected Routes
Route::middleware('auth')->group(function () {

    // 📊 Dashboard (Static View)
    Route::view('/admin-dashboard', 'components.back-end.dashboardsummery')->name('admin.dashboard');

    // ⚡ Dashboard API Data (JSON for Charts/Cards)
    Route::controller(TradeLogController::class)->group(function () {
        Route::get('/dashboard/stats', 'getDashboardStats')->name('dashboard.stats');
        Route::get('/dashboard/daily-trend', 'dailyTrendsData')->name('dashboard.trend');
        Route::get('/dashboard/best-trades', 'getBestTrades')->name('dashboard.best-trades');
        Route::get('/dashboard/profitable-assets', 'getMostProfitableAssets')->name('dashboard.assets');
    });

    // 📈 Daily Trading (Main Page containing Tabs)
    Route::view('/daily-trading', 'components.back-end.daily-trading')->name('admin.daily-trading');

    // ⚡ Daily Trading Actions (API)
    Route::controller(TradeLogController::class)->group(function () {
        Route::post('/daily-trading/store', 'store')->name('daily-trading.store');
        Route::get('/daily-trading/data', 'index')->name('daily-trading.data');
    });

    // 📅 Chronology (Uncommented to fix the error)
    Route::get('/chronology-page', [ChronologyController::class, 'index'])->name('admin.chronology');
    Route::post('/folders/store', [ChronologyController::class, 'storeFolder'])->name('folders.store');
    Route::get('/folders', [ChronologyController::class, 'getFolders'])->name('folders.index');
    Route::get('/api/trades/search', [ChronologyController::class, 'searchTrades'])->name('api.trades.search');

    // 👥 Copy Trader & Settings
    Route::view('/copy-trader', 'components.back-end.copy-trader')->name('admin.copy-trader');
    Route::view('/settings', 'components.back-end.settings')->name('admin.settings');

    // 👤 Profile Management
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'show')->name('profile.show');
        Route::post('/profile/update', 'update');
    });

    // 📂 Folder Management
    Route::controller(FolderController::class)->group(function () {
        Route::get('/folders/list', 'index')->name('folders.list');
    });
});
