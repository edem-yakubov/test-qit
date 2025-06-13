<?php

namespace App\Services\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderDBStoreService
{
    public function handle(int $productId, int $productPrice, int $quantity): Order
    {
        try {
            $order = new Order();
            $order->uuid = Str::uuid()->toString();
            $order->product_id = $productId;
            $order->quantity = $quantity;
            $order->total_price = $productPrice * $quantity;
            $order->save();
            return $order;
        } catch (\Exception $exception) {
            Log::error('Failed to store order in the database: ' . $exception->getMessage(), [
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
            throw new \RuntimeException('Failed to store order in the database: ' . $exception->getMessage());
        }

    }
}
