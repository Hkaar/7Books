<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Services\GenericFilterService;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function __construct(public GenericFilterService $filterService) {}

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

        $regions = $this->filterService->filter(Region::class, $filters, [
            'searchColumns' => ['name'],
        ]);
        $regions->appends($request->query());

        return view('dashboard.regions.index', [
            'regions' => $regions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('dashboard.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:regions,name',
            'desc' => 'required|string',
            'timezone' => 'required|timezone',
        ]);

        $region = new Region($validated);
        $region->save();

        return redirect()->route('regions.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(int $id)
    {
        $region = Region::findOrFail($id);

        return view('dashboard.regions.show', [
            'region' => $region,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(int $id)
    {
        $region = Region::findOrFail($id);

        return view('dashboard.regions.edit', [
            'region' => $region,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $region = Region::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255|unique:regions,name',
            'desc' => 'nullable|string',
            'timezone' => 'nullable|timezone',
        ]);

        $this->updateModel($region, $validated);
        $region->save();

        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function destroy(int $id)
    {
        $region = Region::findOrFail($id);

        $region->libraries()->delete();
        $region->books()->detach();
        $region->users()->detach();

        $region->delete();

        return response(null);
    }

    /**
     * Search for regions based on a query
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function search(string $query)
    {
        $regions = Region::ByName($query)->paginate(5);

        return view('partials.search', [
            'items' => $regions,
            'display' => 'name',
        ]);
    }
}
