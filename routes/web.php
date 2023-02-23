<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', DashboardController::class)->name('admin.dashboard');
});

require __DIR__.'/auth.php';
