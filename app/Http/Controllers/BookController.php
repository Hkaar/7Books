<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display the book view page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function display(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        return view('dashboard.books.display', [
            'book' => $book,
        ]);
    }
}
