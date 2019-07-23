<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema; //QLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long


class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // на випадок помилки QLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long
    }

}
