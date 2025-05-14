<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name'      => 'required|string|min:3|max:50',
            'email'     => 'required|string|email|max:50|unique:users,email',
            'password'  => [
                'required',
                'confirmed',
                Password::min(8)
                    ->max(50)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        // Create a new user
        User::create([
            'name'      => $validatedData['name'],
            'email'     => $validatedData['email'],
            'password'  => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('register')->with('success', 'Registration successful!');
    }

    
}
