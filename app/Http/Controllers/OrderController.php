<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

use App\Services\OrderFilterService;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct(public OrderFilterService $filterService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(["search", "status", "filter"]);
        
        if ($request->has("o")) {
            $orderQuery = $request->get('o');
            
            match ($orderQuery) {
                "latest" => array_push($filters, "latest"),
                "oldest" => array_push($filters, "oldest"),
            };
        }

        $orders = $this->filterService->filter($filters);
        $orders->appends($request->query());

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
     * Show all the books that a order has
     */
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
    public function store(OrderCreateRequest $request)
    {
        $validated = $request->getOrderData();

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
        $user = User::findOrFail($order->user_id);

        $items = [];

        foreach ($books as $key => $value) {
            $items[$value->book_id] = $value->amount;
        }

        $items = json_encode($items);

        return view("orders.edit")->with([
            "order" => $order,
            "user" => $user,
            "items" => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response 
     */
    public function update(OrderUpdateRequest $request, int $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->getOrderData();

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
