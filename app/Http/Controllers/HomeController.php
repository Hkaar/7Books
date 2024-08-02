<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Display the welcome page
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Display the current logged in user account page
     */
    public function me()
    {
        return view('auth.show');
    }

    /**
     * Display the browse page
     */
    public function browse()
    {
        return view('browse');
    }

    /**
     * Display the supported regions page
     */
    public function regions()
    {
        return view('regions');
    }

    /**
     * Show the access denied page
     */
    public function denied()
    {
        return view('auth.denied');
    }
}
