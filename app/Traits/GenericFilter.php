<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\warning;

trait GenericFilter
{
    /**
     * Apply a generic set of filters for a query
     *
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @param  array<int|string, string>  $filters
     */
    public function genericFilter(Builder $query, array $filters): void
    {
        foreach ($filters as $filter) {
            match ($filter) {
                'latest' => $query->latest(),
                'oldest' => $query->oldest(),
                default => null
            };
        }
    }

    /**
     * Apply a search filter for a query
     *
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     * @param  string|array<string>  $columns
     * @return \Illuminate\Database\Eloquent\Builder<TModel>
     */
    public function search(Builder $query, string $searchQuery, string|array $columns)
    {
        if (is_string($columns)) {
            return $query->where($columns, 'like', "%{$searchQuery}%");
        }

        return $query->where(function (Builder $query) use ($columns, $searchQuery) {
            foreach ($columns as $column) {
                if (strpos($column, '.') !== false) {
                    $this->nestedSearch($query, $searchQuery, $column);

                    continue;
                }

                $query->orWhere($column, 'like', "%{$searchQuery}%");
            }
        });
    }

    /**
     * Search though a nested column
     *
     * @template TModel of Model
     *
     * @param  Builder<TModel>  $query
     */
    private function nestedSearch(Builder $query, string $searchQuery, string $column): void
    {
        $columns = explode('.', $column);
        $nested = $columns[1];

        if (count($columns) > 2) {
            warning("Search query to {$column} is over the maximum depth of 2!");

            return;
        }

        $query->orWhereHas($columns[0], function (Builder $query) use ($nested, $searchQuery) {
            $query->where($nested, 'like', "%{$searchQuery}%");
        });
    }
}
