<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TradeLogController;
use App\Http\Controllers\ChronologyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FolderController;

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

    // 📊 Dashboard (Dynamic View from Controller)
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // ⚡ Dashboard API Data (JSON for Charts/Cards)
    Route::get('/dashboard/trade-stats', [DashboardController::class, 'getTradeStats']);
    Route::get('/dashboard/best-trades', [DashboardController::class, 'getBestTrades']);
    Route::get('/daily-trends-data', [DashboardController::class, 'getDailyTrends']);

    // 🔴 New Route for Dynamic News
    Route::get('/api/dashboard/latest-news', [DashboardController::class, 'getLatestNews']);

    // 📈 Daily Trading (Main Page containing Tabs)
    Route::view('/daily-trading', 'components.back-end.daily-trading')->name('admin.daily-trading');

    // ⚡ Daily Trading Actions (API)
    Route::controller(TradeLogController::class)->group(function () {
        Route::post('/daily-trading/store', 'store')->name('daily-trading.store');
        Route::get('/daily-trading/data', 'index')->name('daily-trading.data');

        Route::get('/dashboard/stats', 'getDashboardStats')->name('dashboard.stats');
        Route::get('/dashboard/assets', 'getMostProfitableAssets')->name('dashboard.assets');

        // 🔴 New Route for Analytics Charts
        Route::get('/analytics/charts', 'getAnalyticsCharts')->name('analytics.charts');
    });

    // 📅 Chronology
    Route::controller(ChronologyController::class)->group(function () {
        Route::get('/chronology', 'index')->name('admin.chronology');

        // folder routes
        Route::post('/folders/store', 'storeFolder')->name('folders.store');
        Route::post('/folders/{id}/update', 'updateFolder')->name('folders.update'); // Rename
        Route::delete('/folders/{id}', 'destroyFolder')->name('folders.destroy'); // Delete

        // page routes
        Route::post('/pages/store', 'storePage')->name('pages.store');
        Route::post('/pages/store-from-template', 'storeFromTemplate')->name('pages.storeFromTemplate'); // New route for template
        Route::get('/pages/{id}/edit', 'editPage')->name('pages.edit');
        Route::post('/pages/{id}/update', 'updatePage')->name('pages.update');
        Route::post('/pages/{id}/favorite', 'toggleFavorite')->name('pages.favorite');  // New route for favorite toggle
        Route::delete('/pages/{id}', 'deletePage')->name('pages.destroy'); // Delete
        Route::post('/pages/{id}/move', 'movePage')->name('pages.move'); // New route for moving page to another folder
        Route::post('/pages/{id}/save-as-template', 'saveAsTemplate')->name('pages.saveAsTemplate'); // New route for saving page as template
    });

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
