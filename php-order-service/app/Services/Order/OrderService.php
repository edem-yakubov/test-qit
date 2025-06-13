<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Services\Order\DTO\CreateOrderDTO;
use App\Services\Shared\Product\Services\ProductServiceInterface;
use Illuminate\Support\Collection;

class OrderService
{

    public function __construct(private readonly ProductServiceInterface $productService,
                                private readonly OrderDBStoreService     $orderDBStoreService)
    {
    }


    /**
     * Get all orders.
     *
     * @return Collection<Order>
     */
    public function getAll(): Collection
    {
        // can be moved to separate repository or query service, i just wanted to keep it simple here
        return Order::all();
    }

    /**
     * Create a new order.
     *
     * @param CreateOrderDTO $createOrderDTO
     * @return Order
     */
    public function create(CreateOrderDTO $createOrderDTO): Order
    {
        $product = $this->productService->getProduct($createOrderDTO->productId);

        $order = $this->orderDBStoreService->handle(
            productId: $product->id,
            productPrice: $product->price,
            quantity: $createOrderDTO->quantity
        );

        return $order;
    }


}

