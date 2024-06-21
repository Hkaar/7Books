<?php

namespace App\Services;

use App\Models\Order;
use App\Traits\GenericFilter;

class OrderFilterService
{
    use GenericFilter;

    /**
     * Applies filters to query the order model
     */
    public function filter(array $filters)
    {
        $orders = Order::query();
        $filterKeys = array_keys($filters);

        $this->genericFilter($orders, $filters);

        if (in_array("search", $filterKeys) && !empty($filters["search"])) {
            $orders->byUser($filters["search"]);
        }
        
        if (in_array("status", $filterKeys) && !empty($filters["status"])) {
            $orders->byStatus($filters["status"]);
        }
        
        if (in_array("filter", $filterKeys) && !empty($filters["filter"])) {
            $filterQuery = $filters["filter"];

            match ($filterQuery) {
                "overdue" => $orders->byOverdue(),
                "due" => $orders->byDue(),
            };
        }

        return $orders->paginate(20);
    }
}