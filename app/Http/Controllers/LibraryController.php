<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libraries = Library::paginate(20);

        return view("library.index", [
            "libraries" => $libraries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("library.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string|max:255",
            "region_id" => "required|numeric|exists:regions,id",
        ]);

        $library = new Library();
        $library->fill($validated)->save();

        return redirect()->route("library.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $library = Library::findOrFail($id);

        return view("library.show", [
            "library" => $library,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $library = Library::findOrFail($id);

        return view("library.edit", [
            "library" => $library,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            "name" => "nullable|string|max:255",
            "desc" => "nullable|string|max:255",
            "region_id" => "nullable|numeric|exists:regions,id",
        ]);

        $library = new Library();
        $library->fill($validated)->save();

        return redirect()->route("library.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $library = Library::findOrFail($id);

        $library->books()->detach();
        $library->delete();
    }
}
