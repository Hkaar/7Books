<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Services\GenreFilterService;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function __construct(public GenreFilterService $filterService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search']);

        if ($request->has('o')) {
            $orderQuery = $request->get('o');

            match ($orderQuery) {
                'latest' => array_push($filters, 'latest'),
                'oldest' => array_push($filters, 'oldest'),
            };
        }

        $genres = $this->filterService->filter($filters);
        $genres->appends($request->query());

        return view('genres.index', [
            'genres' => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:genres,name',
            'items' => 'nullable|string',
        ]);

        $genre = new Genre;
        $genre->fill($validated)->save();

        if ($validated['items']) {
            $items = json_decode($validated['items'], true);

            foreach ($items as $key => $value) {
                $genre->books()->attach($key);
            }
        }

        return redirect()->route('genres.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $genre = Genre::findOrFail($id);
        $books = $genre->books()->paginate(3);

        return view('genres.show', [
            'genre' => $genre,
            'books' => $books,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $genre = Genre::findOrFail($id);

        $books = $genre->books()->get(['book_id']);
        $items = [];

        foreach ($books as $key => $value) {
            $items[$value->book_id] = 1;
        }

        $items = json_encode($items);

        return view('genres.edit', [
            'genre' => $genre,
            'items' => $items,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $genre = Genre::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:100|unique:genres,name',
            'items' => 'nullable|string',
        ]);

        $genre->name = $validated['name'] ?? $genre->name;
        $genre->save();

        if ($validated['items']) {
            $items = json_decode($validated['items'], true);
            $genre->books()->sync(array_keys($items) ?? []);
        }

        return redirect()->route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->books()->detach();

        $genre->delete();

        return response(null);
    }
}
