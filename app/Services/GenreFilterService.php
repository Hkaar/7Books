<?php

namespace App\Services;

use App\Models\Genre;
use App\Traits\GenericFilter;

class GenreFilterService
{
    use GenericFilter;

    /**
     * Applies filters to query the book model
     * 
     * @param array<string, string> $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator<Genre>
     */
    public function filter(array $filters)
    {
        $genres = Genre::query();
        $filterKeys = array_keys($filters);

        $this->genericFilter($genres, $filters);

        if (in_array('search', $filterKeys) && ! empty($filters['search'])) {
            $genres->where('name', 'like', '%' . $filters['search'] . '%');
        }

        return $genres->paginate(20);
    }
}
