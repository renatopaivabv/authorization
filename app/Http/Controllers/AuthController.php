<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::find($request->user_id);
        $credentials = [
            'email' => $user->email,
            'password' => 'password',
        ];
        if (Auth::login($user)) {
        // if (auth()->attempt($credentials)) {
            return redirect()->back()->with('success', 'Login Successful');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->back();
    }
}
