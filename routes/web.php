<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TrackOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(TrackOrderController::class)->group(function () {
    Route::get('/track-order', 'show')->name('track-order');

    Route::post('/track-order', 'showOrderStatus');
});

Route::controller(RouteController::class)->middleware('auth')->group(function () {
    Route::get('/route', 'show')->name('route');

    Route::post('/route', 'uploadFile');
});

Route::redirect('/', 'track-order');

Route::redirect('/dashboard', 'users')->name('dashboard');

Route::resource('users', UserController::class)->middleware('auth')->except('show');

Route::resource('orders', OrderController::class)->middleware('auth')->except('show');

Route::resource('roles', RoleController::class)->middleware('auth')->except('show');

require __DIR__.'/auth.php';
