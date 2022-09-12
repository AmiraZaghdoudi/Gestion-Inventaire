<?php

namespace App\Providers;

use App\Interfaces\CenterRepositoryInterface;
use App\Interfaces\ExchangedSendRepositoryInterface;
use App\Interfaces\InventoryRepositoryInterface;
use App\Interfaces\SentProductRepositoryInterface;
use App\Repositories\CenterRepository;
use App\Repositories\ExchangedSendRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\sentProductRepository;
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
        $this->app->bind(CenterRepositoryInterface::class, CenterRepository::class);
        $this->app->bind(InventoryRepositoryInterface::class, InventoryRepository::class);
        $this->app->bind(ExchangedSendRepositoryInterface::class, ExchangedSendRepository::class);
        $this->app->bind(SentProductRepositoryInterface::class, sentProductRepository::class);
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
