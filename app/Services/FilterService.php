<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class FilterService
{
    /**
     * Applies a set of filters for fetching items of a model
     */
    public function filter(Model $model, array $scopes, array $filters)
    {
        $result = $model->query();

        foreach ($scopes as $scope => $params) 
        {
            if (method_exists($model, $scope)) {
                $result->{$scope}(...$params);
            }
        }

        foreach ($filters as $filter) 
        {
            if ($filter === "latest") {
                $result->latest();
            } elseif ($filter === "oldest") {
                $result->oldest();
            }
        }

        return $result->paginate(20);
    }
}