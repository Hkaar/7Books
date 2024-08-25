<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\GenericFilterService;
use App\Traits\Uploader;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use Uploader;

    public function __construct(public GenericFilterService $filterService) {}

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $articles = Article::ByUser(auth()->user()->id)->paginate(20);

        return view('dashboard.articles.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'public' => 'nullable|string',
            'contents' => 'required|string',
        ]);

        $user = auth()->user();
        $validated['user_id'] = $user->id;

        $article = new Article;
        $article->fill($validated)->save();

        $contents = json_decode($validated['contents'], true);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     * 
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @return void
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @return void
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }
}
