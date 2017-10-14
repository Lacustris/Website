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
		Schema::defaultStringLength(191);

		\View::composer('layouts.mainMenu', function($view) {
			$view->with('menuItems', \App\Menu::getMain());
		});

		\View::composer('layouts.userMenu', function($view) {
			$view->with('user', \Auth::user());
		});

		\View::composer('layouts.partials.agenda', function($view) {
			$view->with('events', \App\Event::upcoming(3));
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
