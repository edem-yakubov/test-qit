<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderController extends Controller
{

    public function __construct(private readonly OrderService $orderService)
    {
    }

    public function index(Request $request): JsonResource
    {
        return OrderResource::collection($this->orderService->getAll());
    }


    public function store(CreateOrderRequest $request): JsonResource
    {
        return OrderResource::make($this->orderService->create($request->asDTO()));
    }
}
