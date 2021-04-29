<?php

namespace App\Providers;

use App\Repositories\AssociationRepository;
use App\Repositories\AssociationRepositoryEloquent;
use App\Repositories\CityRepository;
use App\Repositories\CityRepositoryEloquent;
use App\Repositories\CountryRepository;
use App\Repositories\CountryRepositoryEloquent;
use App\Repositories\ElementSiteRepository;
use App\Repositories\ElementSiteRepositoryEloquent;
use App\Repositories\ImageRepository;
use App\Repositories\ImageRepositoryEloquent;
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
        $this->app->bind(AssociationRepository::class, AssociationRepositoryEloquent::class);
        $this->app->bind(ElementSiteRepository::class, ElementSiteRepositoryEloquent::class);
        $this->app->bind(ImageRepository::class, ImageRepositoryEloquent::class);
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
