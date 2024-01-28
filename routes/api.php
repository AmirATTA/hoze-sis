<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LinkController;
use App\Http\Controllers\api\NewsController;
use App\Http\Controllers\api\SliderController;
use App\Http\Controllers\api\ArticleController;
use App\Http\Controllers\api\SettingController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\menu\ItemController;
use App\Http\Controllers\api\menu\GroupController;
use App\Http\Controllers\api\AnnouncementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('api')->group(function(){
    Route::group(['prefix' => 'menus'], function(){
        Route::get('groups', [GroupController::class, 'index']);
        Route::get('items', [ItemController::class, 'index']);
    });

    Route::get('news', [NewsController::class, 'index']);
    Route::get('news/{id}', [NewsController::class, 'show']);

    Route::get('announcements', [AnnouncementController::class, 'index']);
    Route::get('announcements/{id}', [AnnouncementController::class, 'show']);
    
    Route::get('articles', [ArticleController::class, 'index']);
    Route::get('articles/{id}', [ArticleController::class, 'show']);

    Route::get('categories', [CategoryController::class, 'index']);

    Route::get('sliders', [SliderController::class, 'index']);

    Route::get('links', [LinkController::class, 'index']);

    Route::get('settings', [SettingController::class, 'index']);
});