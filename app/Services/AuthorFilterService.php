<?php

namespace App\Services;

use App\Models\Author;
use App\Traits\GenericFilter;

class AuthorFilterService
{
    use GenericFilter;

    /**
     * Applies filters to query the book model
     *
     * @param  array<string, string>  $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator<Author>
     */
    public function filter(array $filters)
    {
        $authors = Author::query();
        $filterKeys = array_keys($filters);

        $this->genericFilter($authors, $filters);

        if (in_array('search', $filterKeys) && ! empty($filters['search'])) {
            $authors->where('name', 'like', '%' . $filters['search'] . '%');
        }

        return $authors->paginate(20);
    }
}
