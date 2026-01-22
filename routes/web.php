<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TradeLogController;
use App\Http\Controllers\FolderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🌐 Locale / Language Switcher
Route::get('locale/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'es'])) {
        Session::put('locale', $lang);
    }
    return redirect()->back();
})->name('locale.change');

// 🏠 Public Routes (Login & Home)
Route::view('/', 'components.front-end.home-page');
Route::view('/login-page', 'components.front-end.auth.registration-form')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// 🔒 Authenticated Routes Group
Route::middleware('auth')->group(function () {

    // 🚪 Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // 📊 Admin Pages (Static Views)
    Route::view('/admin-dashboard', 'components.back-end.dashboardsummery')->name('admin.dashboard');
    Route::view('/setting-page', 'components.back-end.setting-page')->name('admin.setting-page');
    Route::view('/chronology-page', 'components.back-end.chronology-page')->name('admin.chronology-page');
    Route::view('/daily-trading-page', 'components.back-end.daily-trading-page')->name('admin.daily-trading-page');
    Route::view('/trading-analytics', 'components.back-end.trading-analytics')->name('trading.analytics');
    Route::view('/copy-trader', 'components.back-end.copy-trader')->name('copy-trader');

    // 👤 Profile Management Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'show')->name('profile.show');
        Route::post('/profile/update', 'update');
    });

    // 📈 Trade Logs & Analytics Data (API Endpoints)
    Route::controller(TradeLogController::class)->group(function () {
        // Actions
        Route::post('/trade-log/store', 'store');
        Route::get('/trade-log/list', 'index');

        // Dashboard Data (JSON Returns)
        Route::get('/dashboard/stats', 'getDashboardStats');
        Route::get('/dashboard/best-trades', 'getBestTrades');
        Route::get('/dashboard/trade-stats', 'getTradeStats');
        Route::get('/dashboard/most-profitable-assets', 'getMostProfitableAssets');
        Route::get('/daily-trends-data', 'dailyTrendsData')->name('daily.trends.data');
    });

    // 📂 Folder Management
    Route::controller(FolderController::class)->group(function () {
        Route::post('/folders', 'store')->name('folders.store');
        Route::get('/folders/list', 'index')->name('folders.index');
    });
});

// 🚀 Social Auth (Reserved for Future)
// Route::get('auth/{provider}', [SocialAuthController::class, 'redirect']);
// Route::get('auth/{provider}/callback', [SocialAuthController::class, 'callback']);