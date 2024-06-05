<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::query();
        
        if ($request->has("search")) {
            $searchQuery = $request->get("search");
            $orders->byUser($searchQuery);
        } 

        if ($request->has("status")) {
            $orders->byStatus($request->get("status"));
        }

        if ($request->has("f")) {
            $filterQuery = $request->get("f");

            if ($filterQuery === "overdue") {
                $orders->byOverdue();
            } else if ($filterQuery === "due") {
                $orders->byDue();
            }

            // Add other additional filters here!
        }

        if ($request->has("o")) {
            $orderQuery = $request->get('o');
            
            if ($orderQuery === 'latest') {
                $orders->latest();
            } elseif ($orderQuery === "oldest") {
                $orders->oldest();
            }
        }

        $orders = $orders->paginate(20);
        $orders->appends($request->query());

        return view("orders.index")->with([
            "orders" => $orders
        ]);
    }

    /**
     * Apply request filters and redirect to index route.
     */
    public function filter(Request $request)
    {
        $queries = $request->except('_token');
        return redirect()->route('orders.index', $queries);
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
            "email" => "required|string|exists:users,email",
            "return_date" => "required|date",
            "status" => "nullable|string",
            "placed" => "nullable|date",
            "items" => "nullable|string"
        ]);

        $token = Str::uuid()->toString();
        $token = substr($token, 0, 8);

        $user = User::query()->where("email", "=", $validated["email"])->get()[0];
        
        $validated["user_id"] = $user->id;
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
        $userEmail = User::findOrFail($order->user_id)->email;

        $items = [];

        foreach ($books as $key => $value) {
            $items[$value->book_id] = $value->amount;
        }

        $items = json_encode($items);

        return view("orders.edit")->with([
            "order" => $order,
            "email" => $userEmail,
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
            "email" => "nullable|string|exists:users,email",
            "token" => "nullable|string|max:8|unique:orders,token",
            "return_date" => "nullable|date",
            "placed" => "nullable|date",
            "status" => "nullable|string",
            "items" => "nullable|string"
        ]);

        $user = User::query()->where("email", "=", $validated["email"])->get()[0];
        $validated["user_id"] = $user->id;

        $this->updateModel($order, $validated, ["items"]);
        $order->save();

        if ($validated["items"]) {
            $items = json_decode($validated["items"], true);
            $books = array_keys($items);

            $order->items()->whereNotIn('book_id', $books)->delete();
            
            foreach ($items as $bookId => $amount) {
                $orderItem = $order->items()->where('book_id', $bookId)->first();
    
                if ($orderItem && $orderItem->amount != $amount) {
                    $orderItem->update(['amount' => $amount]);
                } 
                else if (!$orderItem) {
                    $order->items()->create(['book_id' => $bookId, 'amount' => $amount]);
                }
            }
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