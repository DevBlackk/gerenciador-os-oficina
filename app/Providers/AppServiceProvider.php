<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
            $this->app->bind(
                \App\Domain\Customer\Gateways\Create\CreateCustomerGateway::class,
                \App\Infrastructure\Persistence\Adapters\Customer\Create\CreateCustomerAdapter::class
            );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
