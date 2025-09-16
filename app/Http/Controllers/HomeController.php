<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
class HomeController extends Controller
{
    /**
     * Display the home page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Display the welcome page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function welcome()
    {
        $data = [
            'trendingBooks' => Book::with(['authors', 'media'])
                ->orderBy('rate', 'desc')
                ->take(10)
                ->get(),

            'newReleases' => Book::with(['authors', 'media'])
                ->orderBy('published_at', 'desc')
                ->take(10)
                ->get(),
            'popularAuthors' => Author::withCount(['books', 'media'])
                ->orderBy('books_count', 'desc')
                ->take(8)
                ->get(),

            'popularGenres' => Genre::withCount('books')
                ->orderBy('books_count', 'desc')
                ->take(10)
                ->get(),

            // Add popular books with cover_image media
            'popularBooks' => Book::with(['authors', 'media'])
                ->orderBy('rate', 'desc')
                ->take(10)
                ->get(),

            'faqs' => Faq::where('active', true)
                ->orderBy('order')
                ->get()
        ];
        return view('welcome', $data);
    }

    /**
     * Display the current logged in user account page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function me()
    {
        return view('auth.show');
    }

    /**
     * Display the browse page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function browse()
    {
        return view('browse');
    }

    /**
     * Display the supported regions page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function regions()
    {
        return view('regions');
    }

    /**
     * Show the access denied page
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function denied()
    {
        return view('auth.denied');
    }
}
