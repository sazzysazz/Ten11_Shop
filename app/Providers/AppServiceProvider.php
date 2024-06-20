<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Logo;
use Illuminate\Pagination\Paginator;

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
        View::composer('frontend.layout', function ($view) {
            $logo = Logo::query()->orderBy('id', 'DESC')->first();
            $view->with('logo', $logo);
        });

        Paginator::useBootstrap();
    }
}
