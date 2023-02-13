<?php

namespace App\Providers;

use App\Http\ViewComposers\SidebarComposer;
use Illuminate\Support\ServiceProvider;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layouts.partials.sidebar', SidebarComposer::class);
    }
}
