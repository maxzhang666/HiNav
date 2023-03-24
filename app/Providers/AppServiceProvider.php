<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //站点信息

        //分类
//        view()->composer(['layouts.nav'], function ($view) {
//
//            $view->with('all_menus', HnMenu::all());
//        });
    }
}
