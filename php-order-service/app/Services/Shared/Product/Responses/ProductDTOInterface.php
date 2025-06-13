<?php
namespace App\Services\Shared\Product\Responses;

interface ProductDTOInterface
{
    public int $id {
        get;
    }

    public string $name {
        get;
    }

    public int $price {
        get;
    }
}
