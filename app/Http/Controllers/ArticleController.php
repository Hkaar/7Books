<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display an index of the resource
     */
    public function index()
    {
        return view("articles.index");
    }

    /**
     * Display the resource
     */
    public function show(string $slug)
    {
        return view("articles.show");
    }
}
