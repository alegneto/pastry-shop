<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\ClientRepositoryInterface', 'App\Repositories\ClientRepositoryEloquente'
        );

        $this->app->bind(
            'App\Repositories\PastryRepositoryInterface', 'App\Repositories\PastryRepositoryEloquente'
        );
    }
}
