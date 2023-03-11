<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Interfaces\SettingInterface::class, \App\Repositories\SettingRepository::class);
        $this->app->bind(\App\Interfaces\CatalogManagementInterface::class, \App\Repositories\CatalogManagementRepository::class);
        $this->app->bind(\App\Interfaces\InvoiceInterface::class, \App\Repositories\InvoiceRepository::class);
        $this->app->bind(\App\Interfaces\BookingInterface::class, \App\Repositories\BookingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
