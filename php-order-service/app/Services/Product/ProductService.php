<?php

namespace App\Services\Product;

use App\Services\Product\Client\ProductClient;
use App\Services\Product\DTO\ProductDTO;
use App\Services\Shared\Product\Responses\ProductDTOInterface;
use App\Services\Shared\Product\Services\ProductServiceInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Log;
use Throwable;

readonly class ProductService implements ProductServiceInterface
{

    public function __construct(private ProductClient $client)
    {
    }

    public function getProduct(int $productId): ProductDTOInterface
    {
        try {
            $product = $this->client->getProduct($productId);
            return new ProductDTO(
                id: $product['id'],
                name: $product['title'],
                price: $product['price']
            );
        } catch (Throwable $e) {
            Log::error('Error retrieving product: ' . $e->getMessage());
            throw new HttpException(400, 'Product cat not be retrieved', $e);
        }

    }
}
