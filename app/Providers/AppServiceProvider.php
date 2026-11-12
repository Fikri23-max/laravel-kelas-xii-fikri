<?php

namespace App\Providers;

use App\Models\Genre;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        view()->composer('templates.component.navbar', function ($view) {
            $view->with('genres', Genre::all());
        });
    }
}
