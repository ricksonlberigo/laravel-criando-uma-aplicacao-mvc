<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];

    // Ou dessa maneira
    // /**
    //  * Register services.
    //  */
    // public function register(): void
    // {
    //     $this->app->bind(SeriesRepository::class, EloquentSeriesRepository::class);
    // }
}
