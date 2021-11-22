<?php

namespace App\Providers;

use App\Models\Social;
use App\Models\link;
use Illuminate\Support\ServiceProvider;
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
        //
        $socials = Social::all();
        $links = link::all();
        View::share(['socials' => $socials, 'links' => $links]);
    }
}
