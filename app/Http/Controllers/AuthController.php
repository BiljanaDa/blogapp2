<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {

        return view('pages.auth.login');
    }

    public function showRegister()
    {

        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('status', 'Succesfully created account');
    }

    public function index(LoginRequest $request)
    {
        if (Auth::check()) {
            return redirect('/login')->withErrors('You are already login');
        }

        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return redirect('/login')->withErrors('Invalid credentials');
        }

        return redirect('/')->with('status', 'Login success!');

    }

    public function destroy()
    {
        Session::flush();
        Auth::logout();

        return redirect('/')->with('status', 'Logged out');
    }
}
