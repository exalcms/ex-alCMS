<?php

namespace App\Providers;

use App\Repositories\CityRepository;
use App\Repositories\CityRepositoryEloquent;
use App\Repositories\CountryRepository;
use App\Repositories\CountryRepositoryEloquent;
use App\Repositories\StateRepository;
use App\Repositories\StateRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryRepository::class, CountryRepositoryEloquent::class);
        $this->app->bind(StateRepository::class, StateRepositoryEloquent::class);
        $this->app->bind(CityRepository::class, CityRepositoryEloquent::class);
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        //:end-bindings:
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
