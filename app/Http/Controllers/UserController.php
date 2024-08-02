<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Services\UserFilterService;
use App\Traits\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use Uploader;

    public function __construct(public UserFilterService $filterService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'role']);

        if ($request->has('o')) {
            $orderQuery = $request->get('o');

            match ($orderQuery) {
                'latest' => array_push($filters, 'latest'),
                'oldest' => array_push($filters, 'oldest'),
            };
        }

        $users = $this->filterService->filter($filters);
        $users->appends($request->query());

        $roles = Role::all(['id', 'name']);

        return view('users.index')->with([
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(['id', 'name']);

        return view('users.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'role_id' => 'required|numeric|exists:roles,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $user = new User;
        $user->fill($validated);

        if ($request->hasFile('img')) {
            $filePath = $this->uploadImage($request->file('img'), [
                'size' => [200, 200],
            ]);

            $user->img = $filePath;
        }

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::findOrFail($id);

        return view('users.show')->with([
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(['id', 'name']);

        return view('users.edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username',
            'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
            'role_id' => 'required|numeric|exists:roles,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        if ($request->hasFile('img')) {
            if ($user->img) {
                Storage::disk('public')->delete($user->img);
            }

            $filePath = $this->uploadImage($request->file('img'), [
                'size' => [200, 200],
            ]);

            $user->img = $filePath;
        }

        unset($validated['img']);

        $this->updateModel($user, $validated, ['password_confirmation']);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        $user->orders()->delete();
        $user->ratings()->delete();

        if ($user->img) {
            Storage::disk('public')->delete($user->img);
        }

        $user->delete();

        return response(null);
    }
}
