<?php

namespace App\Services\Shared\Product\Services;


use App\Services\Shared\Product\Responses\ProductDTOInterface;

interface ProductServiceInterface
{
    public function getProduct(int $productId): ProductDTOInterface;
}
