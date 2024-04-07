<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(20);

        return view("orders.index")->with([
            "orders" => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        $data = $request->validate([
            "user_id" => "required|numeric|exists:user,id",
            "return_date" => "required|date",
            "total" => "required|numeric",
            "status" => "nullable|string",
        ]);

        $token = Str::uuid()->toString();
        $token = substr($token, 0, 8);

        $order = new Order();

        if ($data["status"]) {
            $order->status = $data["status"];
        }

        $order->user_id = $data["user_id"];
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
        $order = Order::find($id);

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
    public function edit(int $id)
    {
        $order = Order::find($id);

        if (!$order) {
            abort(404, "Resource does not exist!");
        }

        return view("orders.edit")->with([
            "order" => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response 
     */
    public function update(Request $request, int $id)
    {
        $order = Order::find($id);

        if (!$order) {
            abort(404, "Resource does not exist!");
        }

        $data = $request->validate([
            "user_id" => "nullable|numeric|exists:user,id",
            "token" => "nullable|string",
            "return_date" => "nullable|date",
            "total" => "nullable|numeric",
            "status" => "nullable|string",
        ]);

        $order->user_id = $data["user_id"];
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
        Order::findOrFail($id)->delete();
        return response(null);
    }
}
