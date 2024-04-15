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

    public function items(int $id)
    {
        $order = Order::findOrFail($id);

        $items = $order->items()->with('book')->paginate(3);

        return view("orders.items")->with([
            "items" => $items,
            "order" => $order
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "user_id" => "required|numeric|exists:users,id",
            "return_date" => "required|date",
            "status" => "nullable|string",
            "placed" => "nullable|date",
            "items" => "nullable|string"
        ]);

        $token = Str::uuid()->toString();
        $token = substr($token, 0, 8);

        $validated["token"] = $token;

        $order = new Order();
        $order->fill($validated)->save();

        if ($validated["items"]) {
            $items = json_decode($validated["items"], true);
        
            foreach ($items as $key => $value) {
                $order->items()->create([
                    "book_id" => $key,
                    "amount" => $value
                ]);
            }
        }

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
        $order = Order::findOrFail($id);

        return view("orders.show")->with([
            "order" => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $order = Order::findOrFail($id);

        $books = $order->items()->get(["book_id", "amount"]);
        $items = [];

        foreach ($books as $key => $value) {
            $items[$value->book_id] = $value->amount;
        }

        $items = json_encode($items);

        return view("orders.edit")->with([
            "order" => $order,
            "items" => $items
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
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            "user_id" => "nullable|numeric|exists:users,id",
            "token" => "nullable|string|max:8|unique:orders,token",
            "return_date" => "nullable|date",
            "placed" => "nullable|date",
            "status" => "nullable|string",
            "items" => "nullable|string"
        ]);

        $order->user_id = $validated["user_id"] ?? $order->user_id;
        $order->token = $validated['token'] ?? $order->token;
        $order->return_date = $validated['return_date'] ?? $order->return_date;
        $order->placed = $validated["placed"] ?? $order->placed;
        $order->status = $validated['status'] ?? $order->status;
        $order->save();

        if ($validated["items"]) {
            $items = json_decode($validated["items"], true);
            $order->books()->sync(array_keys($items) ?? []);
        }

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
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();

        return response(null);
    }
}
