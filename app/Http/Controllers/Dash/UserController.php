<?php

namespace App\Http\Controllers\Dash;

use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth_user = Auth::user();
        $users = User::with(['image'])->get();
        return view('dashboard.users', compact('auth_user', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create_user', [
            'auth_user' => Auth::user(),
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'phone' => 'required|string|unique:users|regex:/^\d{11}$/',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'min:8', 'confirmed', Rules\Password::defaults()],
            'image' => 'nullable|image|max:2048',
            'role' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($image = $request->file('image')) {
            $image = $image->store('img/users');

            Image::create([
                'imageable_id' => $user->id,
                'imageable_type' => User::class,
                'name' => $image,
            ]);
        } else {
            Image::create([
                'imageable_id' => $user->id,
                'imageable_type' => User::class,
                'name' => 'default.png',
            ]);
        }

        $user->syncRoles([$request->role]);

        Alert::success('Success', 'User added successfully');

        $users = User::with(['image'])->get();
        return to_route('dash.users.index', [
            'auth_user' => Auth::user(),
            'users' => $users,
            'roles' => Role::all()
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit_user', [
            'user' => $user->load('image'),
            'roles' =>  Role::all(),
            'auth_user' => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'phone' => 'required|string|unique:users,phone,' . $user->id . '|regex:/^\d{11}$/',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => ['nullable', 'min:8', 'confirmed', Rules\Password::defaults()],
            'image' => 'nullable|image|max:2048',
            'role' => 'required|exists:roles,id',
        ]);

        $updateUser = $request->except(['role', 'image', 'password']);

        $user->update($updateUser);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        if ($image = $request->file('image')) {

            $old_img = $user->image;

            if ($old_img) {

                unlink(public_path('storage/' . $old_img->name));

                $image = $image->store('img/users');
                $old_img->update([
                    'name' => $image,
                ]);
            } else {

                $image = $image->store('img/users');
                Image::create([
                    'imageable_id' => $user->id,
                    'imageable_type' => User::class,
                    'name' => $image,
                ]);
            }
        }

        $user->syncRoles([$request->role]);

        Alert::success('Success', 'User added successfully');

        $users = User::with(['image'])->get();
        return to_route('dash.users.index', [
            'auth_user' => Auth::user(),
            'users' => $users,
            'roles' => Role::all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {

        $old_img = $user->image;
        if ($old_img) {
            unlink(public_path('storage/' . $old_img->name));
        }
        $user->delete();

        Alert::success('Success', 'User deleted successfully');

        $users = User::with(['image'])->get();
        return to_route('dash.users.index', [
            'auth_user' => Auth::user(),
            'users' => $users,
            'roles' => Role::all()
        ]);
    }
}
