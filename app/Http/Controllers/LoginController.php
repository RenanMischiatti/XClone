<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
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
    
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('index')->with('success', 'Login realizado com sucesso!');
        }
    
        return redirect()->route('index')
            ->withErrors(['username' => 'As credenciais fornecidas estão incorretas.'])
            ->withInput('username');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
