<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Laravel\Facades\Image;

class BooksController extends Controller
{
    /**
     * ISBN regex to check valid isbn-13 and isbn-10 numbers
     */
    private $isbnRegex = "^(?:(?:978-?)?\d{1,5}-?\d{1,7}-?\d{1,9}-?\d|(?:(?:978)?\d{9}[0-9X]))$";

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

    /**
     * Display all the resources for selection
     */
    public function select()
    {
        $books = Book::paginate(3);

        return view("books.select")->with([
            "books" => $books
        ]);
    }

    /**
     * Display all the resources for multi selection
     */
    public function multiSelect()
    {
        $books = Book::paginate(3);

        return view("books.multi-select")->with([
            "books" => $books
        ]);
    }

    /**
     * !! EXPERIMENTAL !!
     * Give a rating towards a book
     * 
     * @param int $id - the book id
     * @param int $rating - rating given by the user
     */
    public function rate(int $id, int $rating) {
        $user = Auth::id();

        if (!$user) {
            abort(401, "Unauthorized Access Was Denied...");
        }

        if ($rating > 5 || $rating < 0) {
            abort(400, "Invalid rating value...");
        }
        
        $book = Book::findOrFail($id);

        $book->ratings()->create([
            "user_id" => $user,
            "rating" => $rating
        ]);
    }

    /**
     * Display the browsing page
     * 
     * @param Illuminate\Http\Request $request
     * @return view
     */
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
            "name" => "required|string|max:500",
            "isbn" => ["required", "string", "regex:/$this->isbnRegex/"],
            "desc" => "nullable|string|max:1000",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "rate" => "required|numeric|max:10",
            "img" => "nullable|image|mimes:jpeg,png,jpg|max:10240"
        ]);

        $book = new Book();
        $book->fill($validated);

        $file = $request->file('img');

        if ($file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $image = Image::read(public_path('storage/' . $filePath));
            $image->resize(300, 450, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save(public_path('storage/' . $filePath));

            $book->img = $filePath;
        }

        $book->amount_borrowed = 0;
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $book = Book::findOrFail($id);

        $genres = $book->genres()->get();
        $authors = $book->authors()->get();

        return view("books.show")->with([
            "book" => $book,
            "genres" => $genres,
            "authors" => $authors
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $book = Book::findOrFail($id);

        return view("books.edit")->with([
            "book" => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            "isbn" => ["nullable", "string", "regex:/$this->isbnRegex/"],
            "name" => "nullable|string|max:500",
            "desc" => "nullable|string|max:1000",
            "price" => "nullable|numeric",
            "stock" => "nullable|numeric",
            "rate" => "nullable|numeric|max:10",
            "img" => "nullable|image|mimes:jpeg,png,jpg|max:10240"
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            
            if ($book->img) {
                Storage::disk('public')->delete($book->img);
            }
    
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $image = Image::read(public_path('storage/' . $filePath));
            $image->resize(300, 450, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save(public_path('storage/' . $filePath));
    
            $book->img = $filePath;
        }

        $this->updateModel($book, $validated, ["img"]);
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

        $book->ratings()->delete();
        $book->genres()->detach();
        $book->authors()->detach();
        $book->items()->delete();

        if ($book->img) {
            Storage::disk('public')->delete($book->img);
        }
            
        $book->delete();

        return response(null);
    }
}
