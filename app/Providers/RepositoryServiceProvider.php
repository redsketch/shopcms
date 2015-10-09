<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		// Store
        $this->app->bind(
          'App\Models\Repositories\Store\StoreInterface',
          'App\Models\Eloquents\Store\StoreEloquent'
        );
    }
}
