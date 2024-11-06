<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Library;
use App\Models\Region;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $libraries = Library::paginate(20);

        return view('dashboard.libraries.index', [
            'libraries' => $libraries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $regions = Region::all(['id', 'name']);

        return view('dashboard.libraries.create', [
            'regions' => $regions,
        ]);
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
            'desc' => 'required|string',
            'region_id' => 'required|numeric|exists:regions,id',
        ]);

        $library = new Library;
        $library->fill($validated)->save();

        return redirect()->route('libraries.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(int $id)
    {
        $library = Library::findOrFail($id);

        return view('dashboard.libraries.show', [
            'library' => $library,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(int $id)
    {
        $library = Library::findOrFail($id);
        $regions = Region::all(['id', 'name']);

        return view('dashboard.libraries.edit', [
            'library' => $library,
            'regions' => $regions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $library = Library::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'region_id' => 'nullable|numeric|exists:regions,id',
        ]);

        $this->updateModel($library, $validated);
        $library->save();

        return redirect()->route('libraries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function destroy(int $id)
    {
        $library = Library::findOrFail($id);

        $library->books()->detach();
        $library->delete();

        return response(null);
    }

    /**
     * Search for libraries based on a query
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function search(string $query)
    {
        $libraries = Library::ByName($query)->paginate(5);

        return view('partials.search', [
            'items' => $libraries,
            'display' => 'name',
        ]);
    }
}
