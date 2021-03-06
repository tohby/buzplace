<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer('posts.index', function($view){
            $view->with('tags', \App\Tag::has('posts')->pluck('name'));
        });
        view()->composer('posts.details', function($view){
            $view->with('tags', \App\Tag::has('posts')->pluck('name'));
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
