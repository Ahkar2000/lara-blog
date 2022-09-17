<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
        Paginator::useBootstrapFive();

        // Blade::directive('myname', function ($x) {
        //     return "ahkar min htut".$x;
        // });

        // Blade::if('abc',function () {
        //     return false;
        // });
        Blade::if('admin',function () {
            return Auth::user()->role === 'admin';
        });

        Blade::if('notAuthor',function () {
            return Auth::user()->role != 'author';
        });
    }
}
