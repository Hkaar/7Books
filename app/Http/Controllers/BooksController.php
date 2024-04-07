<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(20);

        return view('books.index')->with([
            "books" => $books
        ]);
    }

    public function browse(Request $request) {
        return view("welcome");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "isbn" => "required|string",
            "desc" => "nullable|string",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "rate" => "required|numeric",
            "img" => "nullable|image|max:10240"
        ]);

        $book = new Book();

        if ($validated["desc"])
        {
            $book->desc = $validated["desc"];
        }

        $file = $request->file('img');

        if ($file)
        {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $book->img = $filePath;
        }

        $book->isbn = $validated["isbn"];
        $book->name = $validated["name"];
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
            "rate" => "required|numeric",
            "img" => "nullable|image|max:10240"
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            
            if ($book->img) {
                Storage::disk('public')->delete($book->img);
            }
    
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
    
            $book->img = $filePath;
        }

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
        $book = Book::findOrFail($id);

        Storage::disk('public')->delete($book->img);
        $book->delete();

        return response(null);
    }
}
