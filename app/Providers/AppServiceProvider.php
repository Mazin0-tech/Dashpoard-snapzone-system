<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // مشاركة الإعدادات مع جميع الـ views
        View::composer('*', function ($view) {
            $settings = Setting::first();
            $view->with('settings', $settings);
        });

    }
}