<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait GenericFilter
{
    /**
     * Applies pre-determined generic filters to the given query
     */
    public function genericFilter(Builder $query, array $filters)
    {
        foreach ($filters as $filter) {
            match ($filter) {
                'latest' => $query->latest(),
                'oldest' => $query->oldest(),
                default => null
            };
        }
    }
}