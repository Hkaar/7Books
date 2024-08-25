<?php

namespace App\Services;

use App\Traits\GenericFilter;
use Illuminate\Database\Eloquent\Model;

class GenericFilterService
{
    use GenericFilter;

    /**
     * Applies the generic filter that fits most use cases
     * 
     * @param class-string<Model> $modelClass
     * @param array<string, string> $filters
     * @param array<string, mixed> $options
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator<Model>
     */
    public function filter(string $modelClass, array $filters, array $options)
    {
        $model = new $modelClass;
        $query = $model::query();

        $keys = array_keys($filters);

        $searchQuery = $filters['search'] ?? null;
        $searchColumns = $options['searchColumns'] ?? null;

        $amount = $filters['amount'] ? (int)$filters['amount'] : 20;

        $this->genericFilter($query, $filters);

        if ($searchQuery && $searchColumns) {
            $this->search($query, $searchQuery, $searchColumns);
        }

        return $query->paginate($amount);
    }
}
