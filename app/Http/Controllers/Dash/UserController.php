<?php

namespace App\Http\Controllers\Dash;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user = Auth::user();
        $users = User::all();
        return view('dashboard.users', compact('auth_user', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auth_user = Auth::user();
        if ($auth_user->hasRole('super_admin')) {
            return view('dashboard.users.create_user', compact('auth_user'));
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auth_user = Auth::user();

        if (! $auth_user->hasRole('super_admin')) {
            return redirect()->back();
        }
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            // i have make more detaile
            'phone' => 'required|string|min:9|max:50|unique:users|regex:/^\d{11}$/',
            'email' => 'required|string|email|max:50|lowercase|unique:users',
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            'image' => 'nullable|image|max:2048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($request->file()) {
            $image = $request->file()['image'];
            $image = $image->store('img/users');

            Image::create([
                'imageable_id' => $user->id,
                'imageable_type' => User::class,
                'name' => $image,
            ]);
        }

        $user->addRole('user');

        Alert::success('Success', 'User added successfully');
        $auth_user = Auth::user();
        return view('dashboard.users.create_user', compact('auth_user'));

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
