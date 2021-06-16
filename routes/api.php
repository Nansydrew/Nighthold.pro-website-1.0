<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NavbarController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\ServicesController;
use App\Http\Controllers\API\ShopController;
use App\Http\Controllers\API\VoteController;
use App\Http\Controllers\LauncherApi\ArticleController;
use App\Http\Controllers\LauncherApi\AuthLauncherController;
use App\Http\Controllers\LauncherApi\ClientController;
use App\Http\Controllers\LauncherApi\UpdateController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthLauncherController::class, 'login']);
    Route::post('signup', [AuthLauncherController::class, 'signup']);

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthLauncherController::class, 'logout']);
        Route::get('user', [AuthLauncherController::class, 'user']);
    });
});
Route::get('v5/nav/rating', [NavbarController::class, 'nav'])->name('navRating');

Route::get('online', [NavbarController::class, 'online'])->name('onlineApi');

Route::get('articles', [ArticleController::class, 'show']);

Route::get('/update/check', [UpdateController::class, 'getVersion']);
Route::get('/update/get/{version}', [UpdateController::class, 'update']);
Route::get('/client/mini/list/{id}', [ClientController::class, 'miniList']);
Route::get('/client/full/list/{id}', [ClientController::class, 'fullList']);

Route::get('user', [AuthController::class, 'user']);
Route::post('edit/password', [AuthController::class, 'changePassword']);

Route::post('edit/email', [AuthController::class, 'changeEmail']);
Route::post('edit/name', [AuthController::class, 'changeName']);

Route::get('referrals', [AuthController::class, 'referrals']);

Route::get('user/characters', [AuthController::class, 'characters']);
Route::post('user/select', [AuthController::class, 'select']);

Route::get('shop/category', [ShopController::class, 'index']);
Route::get('shop/category/{category}', [ShopController::class, 'category']);

Route::post('shop/bay', [ShopController::class, 'bay']);

Route::get('navbar/notifications', [AuthController::class, 'notifications']);

Route::post('send_email', [AuthController::class, 'send_email']);

Route::get('web/payment', [AuthController::class, 'payment']);

Route::get('web/payment/history', 'Home\PaymentController@paymentHistory');

Route::get('web/payment/home', [PaymentController::class, 'homePage']);

Route::get('payment', [PaymentController::class, 'paymentInfo']);

Route::get('user/game', [AuthController::class, 'game']);

Route::get('services', [ServicesController::class, 'index']);
Route::post('services', [ServicesController::class, 'store']);

Route::get('vote', [VoteController::class, 'vote']);
Route::post('vote/info', [VoteController::class, 'store']);

Route::get('user/banned', [AuthController::class, 'banned']);

Route::post('payment/add', [PaymentController::class, 'paymentAdd']);
Route::get('account/payment/success', [PaymentController::class, 'store']);

Route::patch('settings/profile', 'Settings\ProfileController@update');
Route::apiResource('settings/password', 'Settings\PasswordController');
