<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\LinkController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\menu\ItemController;
use App\Http\Controllers\admin\auth\LoginController;
use App\Http\Controllers\admin\menu\GroupController;
use App\Http\Controllers\admin\auth\LogoutController;
use App\Http\Controllers\admin\AnnouncementController;
use App\Http\Controllers\admin\auth\ProfileController;
use App\Http\Controllers\admin\auth\PasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'loginPost'])->name('login.post');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('PerventLogin');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'CheckLoggedIn'], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    Route::get('menus', [GroupController::class, 'index'])->name('groups.index');
    Route::group(['prefix' => 'menus'], function(){
        Route::put('groups/{group}', [GroupController::class, 'update'])->name('groups.update');
        Route::delete('groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
        Route::post('groups', [GroupController::class, 'store'])->name('groups.store');
        Route::get('groups', [GroupController::class, 'index'])->name('groups.index');

        Route::patch('items/{item}', [ItemController::class, 'update'])->name('items.update');
        Route::delete('items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
        Route::post('items/{item}', [ItemController::class, 'store'])->name('items.store');
        Route::put('items/{item}', [ItemController::class, 'changeOrder'])->name('items.put');
        Route::get('items/{group}', [ItemController::class, 'index'])->name('items.index');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::put('/change-password', [PasswordController::class, 'update'])->name('change-password');

    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::resource('categories', CategoryController::class);
    
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::resource('news', NewsController::class);

    Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
    Route::resource('announcements', AnnouncementController::class);

    Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::resource('articles', ArticleController::class);

    Route::delete('sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
    Route::resource('sliders', SliderController::class);

    Route::delete('links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');
    Route::resource('links', LinkController::class);

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('settings/{setting}', [SettingController::class, 'edit'])->name('settings.edit');
    Route::patch('settings', [SettingController::class, 'update'])->name('settings.update');
})->name('admin');