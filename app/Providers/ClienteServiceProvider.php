<?php

namespace App\Providers;

use App\Repository\ClienteRepository;
use Illuminate\Support\ServiceProvider;

class ClienteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClienteRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
