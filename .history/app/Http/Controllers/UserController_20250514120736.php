<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash; // Import Hash for password hashing

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
            'name'      => 'required|string|min:3|max:30',
            'email'     => 'required|string|email|max:30|unique:users',
            'password'  => 'required|string|min:8|max:50|confirmed',
        ]);

        // Check if the email already exists
        if(User::where('email', $validatedData['email'])->exists()) {
            return redirect()->back()->withErrors(['email' => 'Email already exists.']);
        }
        
        // Check if the password is strong enough
        if(!preg_match('/[A-Z]/', $validatedData['password']) || !preg_match('/[0-9]/', $validatedData['password'])) {
            return redirect()->back()->withErrors(['password' => 'Password must contain at least one uppercase letter and one number.']);
        }

        // Check if the name is valid

        // Create a new user
        User::create([
            'name'      => $validatedData['name'],
            'email'     => $validatedData['email'],
            'password'  => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('register')->with('success', 'Registration successful!');
    }
}
