<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            abort(403, "Unauthorized access when accessing this method!");
        };

        $id = Auth::id();
        $orders = Order::query()->where("user_id", "=", $id)->get();

        return view("orders.index")->with([
            "orders" => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            abort(403, "Unauthorized access when accessing this method!");
        };

        return view("orders.create");
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            abort(403, "Unauthorized access when accessing this method!");
        };

        $data = $request->validate([
            "return_date" => "required|date",
            "total" => "required|numeric",
            "status" => "nullable|string",
        ]);

        $id = Auth::id();

        $token = Str::uuid()->toString();
        $token = substr($token, 0, 8);

        $order = new Order();

        $order->user_id = $id;
        $order->token = $token;
        $order->return_date = $data['return_date'];
        $order->total = $data['total'];
        $order->save();

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if (!Auth::check()) {
            abort(403, "Unauthorized access when accessing this method!");
        };

        $order = Order::query()->where("id", "=", $id);

        if (!$order) {
            abort(404, "Resource does not exist!");
        }

        return view("orders.show")->with([
            "order" => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        if (!Auth::check()) {
            abort(403, "Unauthorized access when accessing this method!");
        };

        return view("orders.edit");
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response 
     */
    public function update(Request $request, int $id)
    {
        if (!Auth::check()) {
            abort(403, "Unauthorized access when accessing this method!");
        };

        /**
         * @var Order
         */
        $order = Order::query()->where("id", "=", $id);

        if (!$order) {
            abort(404, "Resource does not exist!");
        }

        $data = $request->validate([
            "token" => "optional|string",
            "return_date" => "optional|date",
            "total" => "optional|numeric",
            "status" => "optional|string",
        ]);

        $order->token = $data['token'];
        $order->return_date = $data['return_date'];
        $order->total = $data['total'];
        $order->status = $data['status'] ?? $order->status;
        $order->save();

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if (!Auth::check()) {
            abort(403, "Unauthorized access when accessing this method!");
        };

        Order::query()->where("id", "=", $id)->delete();
        return redirect()->route('orders.index');
    }
}
