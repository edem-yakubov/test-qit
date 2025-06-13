<?php

namespace App\Services\Order\DTO;

class CreateOrderDTO
{
    public function __construct(
        public int $productId,
        public int $quantity,
    )
    {
    }
}
