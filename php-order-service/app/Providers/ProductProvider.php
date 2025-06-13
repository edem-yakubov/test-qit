<?php

namespace App\Providers;

use App\Services\Product\Client\ProductClient;
use App\Services\Product\DTO\ProductDTO;
use App\Services\Product\ProductService;
use App\Services\Shared\Product\Responses\ProductDTOInterface;
use App\Services\Shared\Product\Services\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;

class ProductProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->bind(ProductClient::class, fn()=> new ProductClient(
            baseUri: config('services.product-service.base_uri'),
    ));

        $this->app->bind(ProductServiceInterface::class,  ProductService::class);
        $this->app->bind(ProductDTOInterface::class, ProductDTO::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
