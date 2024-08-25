<?php

namespace App\Services;

use App\Models\Book;
use App\Traits\GenericFilter;

class BookFilterService
{
    use GenericFilter;

    /**
     * Applies filters to query the book model
     * 
     * @param array<string, string> $filters
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator<Book>
     */
    public function filter(array $filters)
    {
        $books = Book::query();
        $filterKeys = array_keys($filters);

        $this->genericFilter($books, $filters);

        if (in_array('search', $filterKeys) && ! empty($filters['search'])) {
            $books->where('name', 'like', '%' . $filters['search'] . '%');
        }

        if (in_array('genre', $filterKeys) && ! empty($filters['genre'])) {
            $books->byGenre($filters['genre']);
        }

        if (in_array('author', $filterKeys) && ! empty($filters['author'])) {
            $books->byAuthor($filters['author']);
        }

        return $books->paginate(20);
    }
}
