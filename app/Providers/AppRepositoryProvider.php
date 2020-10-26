<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    private $namespaceRepository = 'App\Repositories\\';
    private $namespaceContract = 'App\Repositories\Contracts\\';

    private $repositories = [
        'GrupoRepository',
        'ProdutoRepository',
        'UserRepository'
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $repository) {
            $interface = $this->namespaceContract . $repository . 'Interface';
            $implementation = $this->namespaceRepository . $repository;

            $this->app->bind($interface, $implementation);
        }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
