<?php

namespace App\Services;

use App\Traits\GenericFilter;

class GenericFilterService
{
    use GenericFilter;

    /**
     * Applies the generic filter that fits most use cases
     */
    public function filter(string $modelClass, array $filters, array $options)
    {
        $model = new $modelClass;
        $query = $model::query();

        $keys = array_keys($filters);

        $searchQuery = $filters["search"] ?? null;
        $searchColumns = $options["searchColumns"] ?? null;

        $amount = $filters["amount"] ?? 20;

        $this->genericFilter($query, $filters);

        if ($searchQuery && $searchColumns) {
            $this->search($query, $searchQuery, $searchColumns);
        }

        return $query->paginate($amount);
    }
}