<?php

namespace App\Services;

use App\Models\User;
use App\Traits\GenericFilter;

class UserFilterService
{
    use GenericFilter;

    /**
     * Applies filter to a query the user model
     */
    public function filter(array $filters)
    {
        $users = User::query();
        $filterKeys = array_keys($filters);

        $this->genericFilter($users, $filters);

        if (in_array("search", $filterKeys) && !empty($filters["search"])) {
            $users->where('name', 'like', '%' . $filters["search"] . '%');
        }

        if (in_array("level", $filterKeys) && !empty($filters["level"])) {
            $users->byPermission($filters["level"]);
        }

        return $users->paginate(20);
    }
}