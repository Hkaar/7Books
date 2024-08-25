<?php

namespace App\Http\Controllers;

class ArticleController extends Controller
{
    /**
     * Display an index of the resource
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        return view('articles.index');
    }

    /**
     * Display the resource
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(string $slug)
    {
        return view('articles.show');
    }
}
