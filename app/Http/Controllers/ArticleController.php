<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display an index of the resource
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');

        $query = Article::query();

        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', "%{$searchQuery}%")
                    ->orWhere('slug', 'like', "%{$searchQuery}%");
            })
                ->orWhereHas('articleContents', function ($q) use ($searchQuery) {
                    $q->where('content', 'like', "%{$searchQuery}%");
                });
        }

        $articles = $query->with('articleContents')->latest()->paginate(12);

        return view('articles.index', [
            'articles' => $articles,
            'searchQuery' => $searchQuery,
        ]);
    }

    /**
     * Display the resource
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
