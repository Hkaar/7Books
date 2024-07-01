<?php

namespace App\Http\Requests;

use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class OrderUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "username" => "nullable|string",
            "token" => "nullable|string|max:8|unique:orders,token",
            "return_date" => "nullable|date",
            "placed_date" => "nullable|date",
            "status" => "nullable|string",
            "items" => "nullable|string"
        ];
    }

    /**
     * Get the needed data for updating an order
     */
    public function getOrderData(): array
    {
        $username = $this->get("username");

        $orderData = [
            "token" => $this->get("token"),
            "return_date" => $this->get("return_date"),
            "status" => $this->get("status"),
            "placed_date" => $this->get("placed_date"),
            "items" => $this->get("items"),
        ];

        if ($this->isEmail($username)) {
            $user = User::where("email", $username)->first();
        } else {
            $user = User::where("username", $username)->first();
        }

        $orderData["user_id"] = $user->id;
        return $orderData;
    }

    /**
     * Validate if provided parameter is valid email.
     *
     * @param $param
     */
    public function isEmail($param): bool
    {
        $factory = $this->container->make(ValidationFactory::class);

        return ! $factory->make(
            ["username" => $param],
            ["username" => "email"],
        )->fails();
    }
}
