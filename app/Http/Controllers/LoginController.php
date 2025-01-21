<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Registers a new user in the system.
     * 
     * Validates the data received from the form, creates a new user in the database
     * with the provided information, and automatically authenticates the user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:30',
            'username' => 'required|string|max:20|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->fullName,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
    
        Auth::login($user);
        
        return redirect()->route('index');
    }
    
    /**
     * Logs in an existing user.
     * 
     * Validates the credentials provided by the user. If the credentials are correct,
     * the user is authenticated and redirected to the index route with a success message.
     * Otherwise, an error message is returned.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('index')->with('success', 'Login successful!');
        }
    
        return redirect()->route('index')
            ->withErrors(['username' => 'The provided credentials are incorrect.'])
            ->withInput('username');
    }
    
    /**
     * Logs out the currently authenticated user.
     * 
     * Invalidates the current session and regenerates the CSRF token
     * before redirecting the user to the index route.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
