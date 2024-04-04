<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            abort(403, "Unauthorized access was denied!");
        }

        $books = Book::paginate(20);

        return view('books.index')->with([
            "books" => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check()) {
            abort(403, "Unauthorized access was denied!");
        }

        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check()) {
            abort(403, "Unauthorized access was denied!");
        }

        $validated = $request->validate([
            "isbn" => "required|string",
            "name" => "required|string",
            "desc" => "nullable|string",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "rate" => "required|numeric"
        ]);

        $book = new Book();

        $book->isbn = $validated["isbn"];
        $book->name = $validated["name"];
        $book->desc = $validated["desc"];
        $book->price = $validated["price"];
        $book->stock = $validated["stock"];
        $book->rate = $validated["rate"];
        $book->amount_borrowed = 0;
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $book = Book::query()->where("id", "=", $id)->first();

        if (!$book) {
            abort(404, "Resource does not exist!");
        }

        return view("books.show")->with([
            "book" => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        if(!Auth::check()) {
            abort(403, "Unauthorized access was denied!");
        }

        $book = Book::query()->where("id", "=", $id)->first();

        if (!$book) {
            abort(404, "Resource does not exist!");
        }

        return view("books.edit")->with([
            "book" => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        if(!Auth::check()) {
            abort(403, "Unauthorized access was denied!");
        }

        $book = Book::query()->where("id", "=", $id)->first();

        if (!$book) {
            abort(404, "Resource does not exist!");
        }

        $validated = $request->validate([
            "isbn" => "required|string",
            "name" => "required|string",
            "desc" => "nullable|string",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "rate" => "required|numeric"
        ]);

        $book->isbn = $validated["isbn"];
        $book->name = $validated["name"];
        $book->desc = $validated["desc"];
        $book->price = $validated["price"];
        $book->stock = $validated["stock"];
        $book->rate = $validated["rate"];
        $book->amount_borrowed = 0;
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        if(!Auth::check()) {
            abort(403, "Unauthorized access was denied!");
        }

        Book::query()->where("id", "=", $id)->delete();
        return redirect()->route("books.index");
    }
}
