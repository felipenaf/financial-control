<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    private $namespaceRepository = 'App\Repositories';
    private $namespaceContract = 'App\Repositories\Contracts';

    private $repositories = [
        '\ContaRepository',
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $repository) {
            $this->app->bind($this->namespaceContract . $repository . 'Interface', $this->namespaceRepository . $repository);
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
