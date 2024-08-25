<?php

namespace App\Http\Controllers;

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
        return view('welcome');
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
