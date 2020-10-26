<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private $namespaceService = 'App\Services\\';
    private $namespaceContract = 'App\Services\Contracts\\';

    private $services = [
        'GrupoService',
        'ProdutoService',
        'UserService'
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->services as $service) {
            $interface = $this->namespaceContract . $service . 'Interface';
            $implementation = $this->namespaceService . $service;

            $this->app->bind($interface, $implementation);
        }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
