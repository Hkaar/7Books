<?php

namespace App\Services;

use App\Models\User;
use App\Traits\GenericFilter;

class UserFilterService
{
    use GenericFilter;

    /**
     * Applies filter to a query the user model
     * 
     * @param array<string, string> $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator<User>
     */
    public function filter(array $filters)
    {
        $users = User::with('role');
        $filterKeys = array_keys($filters);

        $this->genericFilter($users, $filters);

        if (in_array('search', $filterKeys) && ! empty($filters['search'])) {
            $users->where('name', 'like', '%' . $filters['search'] . '%');
        }

        if (in_array('role', $filterKeys) && ! empty($filters['role'])) {
            $users->byPermission($filters['role']);
        }

        return $users->paginate(20);
    }
}
