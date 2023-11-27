<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()

    {
        // if (env(key: 'APP_ENV') !=='local') {
        //     URL::forceScheme(scheme:'https');
        //   }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

    }
}
