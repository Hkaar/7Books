<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query();

        if ($request->has("search")) {
            $searchQuery = $request->get("search");
            $users->where('name', 'like', '%' . $searchQuery . '%');
        } 

        if ($request->has("o")) {
            $orderQuery = $request->get('o');
            
            if ($orderQuery === 'latest') {
                $users->latest();
            } elseif ($orderQuery === "oldest") {
                $users->oldest();
            }
        }

        if ($request->has("f")) {
            $users->byPermission($request->get("f"));

            // Additional filters can be added here!
        }

        $users = $users->paginate(20);
        $users->appends($request->query());

        return view('users.index')->with([
            "users" => $users,
        ]);
    }
    
    /**
     * Apply request filters and redirect to index route.
     */
    public function filter(Request $request) {
        $queries = $request->except('_token');
        return redirect()->route('users.index', $queries);
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            "level" => 'nullable|string',
            "img" => "nullable|image|mimes:jpeg,png,jpg|max:10240"
        ]);

        $user = new User();
        $user->fill($validated);

        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $image = Image::read(public_path('storage/' . $filePath));
            $image->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save(public_path('storage/' . $filePath));

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

        return view("users.show")->with([
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $user = User::findOrFail($id);

        return view("users.edit")->with([
            "user" => $user
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
            "level" => 'nullable|string',
            "img" => "nullable|image|mimes:jpeg,png,jpg|max:10240"
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            
            if ($user->img) {
                Storage::disk('public')->delete($user->img);
            }
    
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $image = Image::read(public_path('storage/' . $filePath));
            $image->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save(public_path('storage/' . $filePath));
    
            $user->img = $filePath;
        }

        unset($validated["img"]);

        $this->updateModel($user, $validated, ["password_confirmation"]);
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
            Storage::disk("public")->delete($user->img);
        }

        $user->delete();
        return response(null);
    }
}
