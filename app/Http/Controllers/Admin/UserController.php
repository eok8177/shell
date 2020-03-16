<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.user.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('admin.user.create', [
            'user' => new User
        ]);
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'login' => 'required|unique:users',
        ]);

        $data = $request->all();

        if (!$data['password']) {
            $data['password'] = bcrypt('123456');
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $user = $user->create($data);

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'User created');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => Rule::unique('users')->ignore($user->id),
            'login' => Rule::unique('users')->ignore($user->id),
        ]);

        $data = $request->all();

        if ($request->has('password') && $data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.user.edit', ['user' => $user->id])->with('success', 'User updated');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
