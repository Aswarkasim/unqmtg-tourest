<?php

namespace App\Providers;

use App\Models\Configuration;
use App\Models\Kategori;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
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
        //
        $kategori = Kategori::all();
        $config = Configuration::first();
        View::share('kategori_provider', $kategori);
        View::share('config_provider', $config);
    }
}
