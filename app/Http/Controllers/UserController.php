<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display all the users.
     *
     * @return  \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboards.administrator.users.index', [
            'users' => User::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @param  User  $user
     * @return  \Illuminate\View\View
     */
    public function create(User $user)
    {
        $roles = Role::all();

        return view('dashboards.administrator.users.create', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => [
                'required',
                'min:8'
            ],
            'role' => 'required'
        ]);

        $request->user()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  User $user
     * @return  \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('dashboards.administrator.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($user->id)
            ],
            'role' => 'required'
        ]);

        // if (!Hash::check($request->old_password, $user->password)) {
        //     return back()->with('error', 'Old password doesn\'t match');
        // }

        User::whereId($user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return  \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('sucess', 'User deleted successfully');
    }
}
