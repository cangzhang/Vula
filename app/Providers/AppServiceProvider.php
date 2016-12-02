<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	//custom view prefix name
	    $this->loadViewsFrom(base_path(). '/xzNotes/Note/Views', 'note');
	    $this->loadViewsFrom(base_path(). '/xzNotes/Auth/Views', 'auth');
    }
}
