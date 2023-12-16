<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        view::composer('home.*', function($view){
            $pages = Page::where('show', 1)->where('header', 1)->get();
            $settings = Setting::first();
            $view->with(compact('pages', 'settings'));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
