<?php

namespace App\Http\Requests;

use App\Services\Order\DTO\CreateOrderDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer'],
            'quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function asDTO(): CreateOrderDTO
    {
        return new CreateOrderDTO(
            productId: $this->input('product_id'),
            quantity: $this->input('quantity')
        );
    }
}
