<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Services\AuthorFilterService;
use App\Traits\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    use Uploader;

    public function __construct(public AuthorFilterService $filterService) {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search']);

        if ($request->has('o')) {
            $orderQuery = $request->get('o');

            match ($orderQuery) {
                'latest' => array_push($filters, 'latest'),
                'oldest' => array_push($filters, 'oldest'),
                default => array_push($filters, 'oldest'),
            };
        }

        $authors = $this->filterService->filter($filters);
        $authors->appends($request->query());

        return view('dashboard.authors.index', [
            'authors' => $authors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('dashboard.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:authors,name',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:64',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'items' => 'nullable|string',
        ]);

        $author = new Author;
        $author->fill($validated);

        $author->save();

        if ($validated['items']) {
            $items = json_decode($validated['items'], true);

            foreach ($items as $key => $value) {
                $author->books()->attach($key);
            }
        }

        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(int $id)
    {
        $author = Author::findOrFail($id);
        $books = $author->books()->get(['name']);

        return view('dashboard.authors.show', [
            'author' => $author,
            'books' => $books,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(int $id)
    {
        $author = Author::findOrFail($id);

        $books = $author->books()->get();
        $items = [];

        foreach ($books as $key => $value) {
            $items[$value->id] = 1;
        }

        $items = json_encode($items);

        return view('dashboard.authors.edit', [
            'author' => $author,
            'items' => $items,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $author = Author::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255|unique:authors,name',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:64',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'items' => 'nullable|string',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');

            if ($author->img) {
                Storage::disk('public')->delete($author->img);
            }

            $filePath = $this->uploadImage($request->file('img'), [
                'size' => [200, 200],
            ]);

            $author->img = $filePath;
        }

        $this->updateModel($author, $validated, ['img', 'items']);
        $author->save();

        if ($validated['items']) {
            $items = json_decode($validated['items'], true);
            $author->books()->sync(array_keys($items) ? array_keys($items) : []);
        }

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function destroy(int $id)
    {
        $author = Author::findOrFail($id);
        $author->books()->detach();

        if ($author->img) {
            Storage::disk('public')->delete($author->img);
        }

        $author->delete();

        return response(null);
    }

    /**
     * Display all the authored books
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function authored(int $id)
    {
        $author = Author::findOrFail($id);

        $books = $author->books()->paginate(3);

        return view('dashboard.authors.authored', [
            'books' => $books,
            'author' => $author,
        ]);
    }

    /**
     * Search for authors based on a query
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function search(string $query)
    {
        $authors = Author::ByName($query)->paginate(5);

        return view('partials.search', [
            'items' => $authors,
            'display' => 'name',
        ]);
    }
}
