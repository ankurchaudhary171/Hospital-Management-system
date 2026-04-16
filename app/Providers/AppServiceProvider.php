<?php

// namespace App\Providers;
// use Illuminate\Pagination\Paginator;
// use Illuminate\Support\ServiceProvider;

// class AppServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any application services.
//      */
//     public function register(): void
//     {
//         //
//     }

   
//     public function boot(): void
//     {
//         Paginator::useBootstrap();
//     }


    
// }



namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
    }
}
