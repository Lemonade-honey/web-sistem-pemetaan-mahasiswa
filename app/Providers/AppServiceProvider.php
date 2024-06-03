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
        $this->app->bind(\App\Services\Interfaces\ClassificationService::class, \App\Services\ClassificationServiceImpl::class);
        $this->app->bind(\App\Services\Interfaces\ScoreService::class, \App\Services\ScoreServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
