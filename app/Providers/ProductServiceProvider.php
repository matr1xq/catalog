<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\Repository;
use App\ProductClass;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Repository::class, ProductClass::class);
    }
}
