<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email:dns',
            'password' => 'required|string',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email', $request->email)->first();

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return redirect('/register');
        }

        $user->createToken('authToken')->plainTextToken;

        return redirect('/');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return redirect('/login')->withErrors('These credentials do not match our records.');
        }

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password, [])) {
            return redirect('/login')->withErrors('These credentials do not match our records.');
        }

        $user->createToken('authToken')->plainTextToken;
        return redirect('/');
    }

    // logout
    public function logout(Request $request)
    {
        auth()->guard('web')->logout();
        return redirect('/');
    }
}
