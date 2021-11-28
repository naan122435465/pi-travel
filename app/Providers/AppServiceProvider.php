<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\RepositoryInterfaces\LocationInterface::class,
            \App\Repositories\BaseRepository\LocationRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RepositoryInterfaces\PostInterface::class,
            \App\Repositories\BaseRepository\PostRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RepositoryInterfaces\HotelInterface::class,
            \App\Repositories\BaseRepository\HotelRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RepositoryInterfaces\RoomInterface::class,
            \App\Repositories\BaseRepository\RoomRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RepositoryInterfaces\PostInterface::class,
            \App\Repositories\BaseRepository\PostRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RepositoryInterfaces\HotelServiceInterface::class,
            \App\Repositories\BaseRepository\HotelServiceRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RepositoryInterfaces\ImageInterface::class,
            \App\Repositories\BaseRepository\ImageRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RepositoryInterfaces\BookingInterface::class,
            \App\Repositories\BaseRepository\BookingRepository::class
        );
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
