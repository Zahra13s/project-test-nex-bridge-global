<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthenticationController extends Controller
{
    //
    public function loginPage() {
        return view('login');
    }

    public function registerPage() {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols(),
            ],
            'confirm_password' => 'required|same:password'
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);


        Auth::login($user);
        if(Auth::user()->role == "user"){

            return redirect()->route('userProfilePage');
        }

        if(Auth::user()->role == "admin"){
            return redirect()->route('adminProfilePage');
        }
    }

    public function login(Request $request)
{

    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8'
    ]);

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
    ], $request->filled('remember'))) {
        if(Auth::user()->role == "user"){
            return redirect()->route('userProfilePage');
        }

        if(Auth::user()->role == "admin"){
            return redirect()->route('adminProfilePage');
        }
    }

    return redirect()->back()->withErrors([
        'email' => 'These credentials do not match our records.',
    ]);
}

public function logout(Request $request)
{
    Auth::logout();
    return redirect('/');
}
}
