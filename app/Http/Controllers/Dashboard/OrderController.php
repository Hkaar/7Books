<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use App\Services\OrderFilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct(public OrderFilterService $filterService) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'status', 'date']);

        if ($request->has('o')) {
            $orderQuery = $request->get('o');

            match ($orderQuery) {
                'latest' => array_push($filters, 'latest'),
                'oldest' => array_push($filters, 'oldest'),
                default => array_push($filters, 'oldest'),
            };
        }

        $orders = $this->filterService->filter($filters);
        $orders->appends($request->query());

        $statuses = Status::all(['id', 'name']);

        return view('dashboard.orders.index', [
            'orders' => $orders,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $statuses = Status::all(['id', 'name']);

        return view('dashboard.orders.create', [
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderCreateRequest $request)
    {
        $validated = $request->getOrderData();

        $token = Str::uuid()->toString();
        $token = substr($token, 0, 8);

        $validated['token'] = $token;

        $order = new Order;
        $order->fill($validated)->save();

        if ($validated['items']) {
            $items = json_decode($validated['items'], true);

            foreach ($items as $key => $value) {
                $order->items()->create([
                    'book_id' => $key,
                    'amount' => $value,
                ]);
            }
        }

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(int $id)
    {
        $order = Order::findOrFail($id);
        $statuses = Status::all(['id', 'name']);

        return view('dashboard.orders.show', [
            'order' => $order,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(int $id)
    {
        $order = Order::findOrFail($id);

        $books = $order->items()->get(['book_id', 'amount']);
        $user = User::findOrFail($order->user_id);

        $statuses = Status::all(['id', 'name']);
        $items = [];

        foreach ($books as $key => $value) {
            $items[$value->book_id] = $value->amount;
        }

        $items = json_encode($items);

        return view('dashboard.orders.edit', [
            'order' => $order,
            'user' => $user,
            'items' => $items,
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderUpdateRequest $request, int $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->getOrderData();

        $this->updateModel($order, $validated, ['items']);
        $order->save();

        if ($validated['items']) {
            $items = json_decode($validated['items'], true);
            $books = array_keys($items);

            $order->items()->whereNotIn('book_id', $books)->delete();

            foreach ($items as $bookId => $amount) {
                $orderItem = $order->items()->where('book_id', $bookId)->first();

                if ($orderItem && $orderItem->amount != $amount) {
                    $orderItem->update(['amount' => $amount]);
                } elseif (! $orderItem) {
                    $order->items()->create(['book_id' => $bookId, 'amount' => $amount]);
                }
            }
        }

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function destroy(int $id)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();

        return response(null);
    }

    /**
     * Show all the books that a order has
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function items(int $id)
    {
        $order = Order::findOrFail($id);

        $items = $order->items()->with('book')->paginate(3);

        return view('dashboard.orders.items', [
            'items' => $items,
            'order' => $order,
        ]);
    }
}
