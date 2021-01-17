<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HandlerProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function registerCompnay()
    {
        var_dump('providerr');
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
