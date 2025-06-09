<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthUserController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            return redirect('/admin/dashboard')->with('success', 'Welcome back!');
        }

        return redirect()->route('login.user')
            ->with('error', 'Invalid email or password')
            ->withInput($request->only('email'));
    }

    public function create()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('login.user')
                ->with('success', 'Registration successful. Please log in.');
        }

        return redirect()->route('create.user')
            ->with('error', 'Registration failed. Please try again.');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin/login')->with('success', 'You have been logged out successfully.');
    }
}