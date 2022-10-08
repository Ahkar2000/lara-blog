<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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

        // View::share('categories',Category::latest("id")->get());
        View::composer([
            'index',
            'detail',
            'post.create',
            'post.edit'
        ],function($view){
            $view->with('categories',Category::latest('id')->get());
        });
    }
}
