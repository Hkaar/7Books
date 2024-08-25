<?php

namespace App\Services;

use App\Models\Order;
use App\Traits\GenericFilter;

class OrderFilterService
{
    use GenericFilter;

    /**
     * Applies filters to query the order model
     * 
     * @param array<string, string> $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator<Order>
     */
    public function filter(array $filters)
    {
        $orders = Order::with('status', 'user');
        $filterKeys = array_keys($filters);

        $this->genericFilter($orders, $filters);

        if (in_array('search', $filterKeys) && ! empty($filters['search'])) {
            $orders->byUser($filters['search']);
        }

        if (in_array('status', $filterKeys) && ! empty($filters['status'])) {
            $orders->byStatus($filters['status']);
        }

        if (in_array('date', $filterKeys) && ! empty($filters['date'])) {
            $filterQuery = $filters['date'];

            match ($filterQuery) {
                'overdue' => $orders->byOverdue(),
                'due' => $orders->byDue(),
                default => Null,
            };
        }

        return $orders->paginate(20);
    }
}
