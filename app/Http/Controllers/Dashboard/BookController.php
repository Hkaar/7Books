<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
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
     * Regex to check valid ISBN-10 numbers
     */
    private string $isbn10Regex = "^(?:\d{1,5}-\d{1,7}-\d{1,7}-[\dX]|\d{9}[\dX])$";

    /**
     * Regex to check valid ISBN-13 numbers
     */
    private string $isbn13Regex = "^(?:\d{13}|\d{3}-\d{1,5}-\d{1,7}-\d{1,7}-\d{1})$";

    public function __construct(public BookFilterService $filterService) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'genre', 'author']);

        if ($request->has('o')) {
            $orderQuery = $request->get('o');

            match ($orderQuery) {
                'latest' => array_push($filters, 'latest'),
                'oldest' => array_push($filters, 'oldest'),
                default => array_push($filters, 'oldest'),
            };
        }

        $books = $this->filterService->filter($filters);
        $books->appends($request->query());

        $genres = Genre::all(['id', 'name']);
        $authors = Author::all(['id', 'name']);

        return view('dashboard.books.index', [
            'books' => $books,
            'authors' => $authors,
            'genres' => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('dashboard.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'isbn10' => ['nullable', 'string', "regex:/{$this->isbn10Regex}/"],
            'isbn13' => ['nullable', 'string', "regex:/{$this->isbn13Regex}/"],
            'desc' => 'nullable|string|max:1000',
            'price' => 'required|numeric',
            'rate' => 'required|numeric|max:10',
        ]);

        $book = new Book;
        $book->fill($validated);

        $book->save();

        if ($request->has('genres')) {
            $items = json_decode($request->get('genres'), true);

            foreach ($items as $key => $value) {
                $book->genres()->attach($key);
            }
        }

        if ($request->has('authors')) {
            $items = json_decode($request->get('authors'), true);

            foreach ($items as $key => $value) {
                $book->authors()->attach($key);
            }
        }

        if ($request->has('libraries')) {
            $libraries = json_decode($request->get('libraries'), true);

            foreach ($libraries as $library => $stock) {
                $book->libraries()->create([
                    'library_id' => $library,
                    'book_id' => $book->id,
                    'stock' => $stock,
                ]);
            }
        }

        if ($request->has('regions')) {
            $regions = json_decode($request->get('regions'), true);

            foreach ($regions as $region => $stock) {
                $book->regions()->create([
                    'region_id' => $region,
                    'book_id' => $book->id,
                    'stock' => $stock,
                ]);
            }
        }

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(int $id)
    {
        $book = Book::findOrFail($id);

        $genres = $book->genres()->get();
        $authors = $book->authors()->get();

        return view('dashboard.books.show', [
            'book' => $book,
            'genres' => $genres,
            'authors' => $authors,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(int $id)
    {
        $book = Book::findOrFail($id);

        // Reserved for future use
        // $genres = $book->genres()->get()->toJSON();
        // $authors = $book->authors()->get()->toJSON();
        // $libraries = $book->libraries()->get()->toJSON();
        // $regions = $book->regions()->get()->toJSON();

        return view('dashboard.books.edit', [
            'book' => $book,
            // 'genres' => $genres,
            // 'authors' => $authors,
            // 'libraries' => $libraries,
            // 'regions' => $regions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $book = Book::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'isbn10' => ['nullable', 'string', "regex:/{$this->isbn10Regex}/"],
            'isbn13' => ['nullable', 'string', "regex:/{$this->isbn13Regex}"],
            'desc' => 'nullable|string|max:1000',
            'price' => 'nullable|numeric',
            'rate' => 'nullable|numeric|max:10',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $this->updateModel($book, $validated, ['img']);

        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
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
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function select()
    {
        $books = Book::paginate(3);

        return view('dashboard.books.select', [
            'books' => $books,
        ]);
    }

    /**
     * Display all the resources for multi selection
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function multiSelect()
    {
        $books = Book::paginate(3);

        return view('dashboard.books.multi-select', [
            'books' => $books,
        ]);
    }

    /**
     * Give a rating towards a book
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function rate(Request $request, int $id)
    {
        $userId = Auth::id();
        $rating = $request->input('rating');

        if ($rating > 5 || $rating < 0) {
            abort(400, 'Invalid rating value...');
        }

        $book = Book::findOrFail($id);

        $book->ratings()->create([
            'user_id' => $userId,
            'rating' => $rating,
        ]);

        return response('Successfully placed rating on book!');
    }

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
