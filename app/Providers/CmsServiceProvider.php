<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
	    $this->app->bind('\App\Repositories\Cms\Contracts\CmsInterface', function()
	    {
		    return new \App\Repositories\Cms\CmsRepository;
	    });
    }
}
