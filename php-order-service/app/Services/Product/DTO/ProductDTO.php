<?php

namespace App\Services\Product\DTO;


use App\Services\Shared\Product\Responses\ProductDTOInterface;

class ProductDTO implements ProductDTOInterface
{

    public function __construct(
        public int    $id {
            get {
                return $this->id;
            }
        },
        public string $name {
            get {
                return $this->name;
            }
        },
        public int    $price {
            get {
                return $this->price;
            }
        }
    )
    {
    }

}
