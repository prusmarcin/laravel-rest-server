<?php

namespace Restserver;

//use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class RestserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		//Schema::defaultStringLength(191);
		$this->loadRoutesFrom(__DIR__.'/routes/api.php');
		$this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
