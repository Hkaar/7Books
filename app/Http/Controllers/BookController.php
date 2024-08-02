<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Services\BookFilterService;
use App\Traits\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    use Uploader;

    /**
     * ISBN regex to check valid isbn-13 and isbn-10 numbers
     */
    private $isbnRegex = "^(?:(?:978-?)?\d{1,5}-?\d{1,7}-?\d{1,9}-?\d|(?:(?:978)?\d{9}[0-9X]))$";

    public function __construct(public BookFilterService $filterService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'genre', 'author']);

        if ($request->has('o')) {
            $orderQuery = $request->get('o');

            match ($orderQuery) {
                'latest' => array_push($filters, 'latest'),
                'oldest' => array_push($filters, 'oldest'),
            };
        }

        $books = $this->filterService->filter($filters);
        $books->appends($request->query());

        $genres = Genre::all(['id', 'name']);
        $authors = Author::all(['id', 'name']);

        return view('books.index', [
            'books' => $books,
            'authors' => $authors,
            'genres' => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:500',
            'isbn' => ['required', 'string', "regex:/{$this->isbnRegex}/"],
            'desc' => 'nullable|string|max:1000',
            'price' => 'required|numeric',
            'rate' => 'required|numeric|max:10',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $book = new Book;
        $book->fill($validated);

        $file = $request->file('img');

        if ($file) {
            $filePath = $this->uploadImage($request->file('img'), [
                'size' => [1000, 1600],
            ]);
            $book->img = $filePath;
        }

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

        return view('books.show', [
            'book' => $book,
            'genres' => $genres,
            'authors' => $authors,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'isbn' => ['nullable', 'string', "regex:/{$this->isbnRegex}/"],
            'name' => 'nullable|string|max:500',
            'desc' => 'nullable|string|max:1000',
            'price' => 'nullable|numeric',
            'rate' => 'nullable|numeric|max:10',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        if ($request->hasFile('img')) {
            if ($book->img) {
                Storage::disk('public')->delete($book->img);
            }

            $filePath = $this->uploadImage($request->file('img'), [
                'size' => [1000, 1600],
            ]);
            $book->img = $filePath;
        }

        $this->updateModel($book, $validated, ['img']);

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

    /**
     * Display all the resources for selection
     */
    public function select()
    {
        $books = Book::paginate(3);

        return view('books.select', [
            'books' => $books,
        ]);
    }

    /**
     * Display all the resources for multi selection
     */
    public function multiSelect()
    {
        $books = Book::paginate(3);

        return view('books.multi-select', [
            'books' => $books,
        ]);
    }

    /**
     * Give a rating towards a book
     */
    public function rate(Request $request, int $id)
    {
        $userId = Auth::id();
        $rating = $request->input('rating');

        if (! $userId) {
            abort(401, 'Unauthorized Access Was Denied...');
        }

        if ($rating > 5 || $rating < 0) {
            abort(400, 'Invalid rating value...');
        }

        $book = Book::findOrFail($id);

        $book->ratings()->create([
            'user_id' => $userId,
            'rating' => $rating,
        ]);

        return response(200);
    }

    /**
     * Display the book view page
     */
    public function display(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        return view('books.display', [
            'book' => $book,
        ]);
    }
}
