<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function home()
    {
        return view("welcome");
    }
    
    /**
     * Display the current logged in user account page
     */
    public function userShow()
    {
        return view("auth.show");
    }

    /**
     * Display the browse page
     */
    public function browse()
    {
        return view("browse");
    }

    /**
     * Show the access denied page
     */
    public function denied()
    {
        return view("auth.denied");
    }
}
