<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{	
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		// Site Properties
        $this->app->view->composer(
            '*',
            'App\Composers\SiteProperties'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
