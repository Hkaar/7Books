<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Show the register page
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account register request
     * 
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/');
    }
}
