<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Services\GenericFilterService;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function __construct(public GenericFilterService $filterService) {}

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

        $regions = $this->filterService->filter(Region::class, $filters, [
            'searchColumns' => ['name'],
        ]);
        $regions->appends($request->query());

        return view('regions.index', [
            'regions' => $regions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:regions,name',
            'desc' => 'required|string|max:255',
        ]);

        $region = new Region($validated);
        $region->save();

        return redirect()->route('regions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $region = Region::findOrFail($id);

        return view('regions.show', [
            'region' => $region,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $region = Region::findOrFail($id);

        return view('regions.edit', [
            'region' => $region,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $region = Region::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:regions,name',
            'desc' => 'required|string|max:255',
        ]);

        $this->updateModel($region, $validated);
        $region->save();

        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $region = Region::findOrFail();

        $region->libraries()->delete();
        $region->books()->detach();
        $region->items()->delete();

        $region->delete();

        return response(null);
    }
}
