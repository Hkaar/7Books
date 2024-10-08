<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'return_date' => 'required|date',
            'status_id' => 'required|numeric|exists:statuses,id',
            'placed_date' => 'required|date',
            'items' => 'nullable|string',
        ];
    }

    /**
     * Get the needed data for making an order
     *
     * @return array<string, string>
     */
    public function getOrderData(): array
    {
        $username = $this->get('username');

        $orderData = [
            'return_date' => $this->get('return_date'),
            'status_id' => $this->get('status_id'),
            'placed_date' => $this->get('placed_date'),
            'items' => $this->get('items'),
        ];

        if ($this->isEmail($username)) {
            $user = User::where('email', $username)->first();
        } else {
            $user = User::where('username', $username)->first();
        }

        $orderData['user_id'] = $user->id;

        return $orderData;
    }

    /**
     * Validate if provided parameter is valid email.
     */
    public function isEmail(string $param): bool
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ['username' => $param],
            ['username' => 'email'],
        )->fails();
    }
}
