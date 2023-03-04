<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CatalogManagementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', DashboardController::class)->name('admin.dashboard');

    // Menu
    Route::get('menu/search', [MenuController::class, 'search'])->name('admin.menu.search');
    Route::get('menu/category/{id}', [MenuController::class, 'category'])->name('admin.menu.category');
    Route::resource('menu', MenuController::class, ['as' => 'admin']);

    // Invoice
    Route::get('invoice/search', [InvoiceController::class, 'search'])->name('admin.invoice.search');
    Route::get('invoice/period', [InvoiceController::class, 'period'])->name('admin.invoice.period');
    Route::resource('invoice', InvoiceController::class, ['as' => 'admin']);

    // Setting
    Route::resource('setting', SettingController::class, ['as' => 'admin']);

    // Catalog Management
    Route::resource('catalog-management', CatalogManagementController::class, ['as' => 'admin']);

    // Booking
    Route::post('booking/add-cart/{id}', [BookingController::class, 'addCart'])->name('admin.booking.add-cart');
    Route::resource('booking', BookingController::class, ['as' => 'admin']);
});

require __DIR__ . '/auth.php';
