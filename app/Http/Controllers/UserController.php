<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('users.index')->with([
            "users" => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            "level" => 'nullable|string'
        ]);

        // Create a new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->level = $validatedData["level"];
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::query()->where("id", "=", $id)->first();

        if (!$user) {
            abort(404, "Resource does not exist!");
        }

        return view("users.show")->with([
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::query()->where("id", "=", $id)->first();

        if (!$user) {
            abort(404, "Resource does not exist!");
        }

        return view("users.edit")->with([
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = User::query()->where("id", "=", $id)->first();

        if (!$user) {
            abort(404, "Resource does not exist!");
        }

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'password' => 'nullable|string|min:8',
            "level" => 'nullable|string'
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->level = $validatedData["level"];
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        User::query()->where("id", "=", $id)->delete();
        return redirect()->route("users.index");
    }
}
