<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ...existing code...
    public function showLogin()
    {
        return view('Accueil');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('users.index'));
        }

        return back()->withErrors(['email' => 'Identifiants invalides.'])->withInput();
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register()
    {
        // ...implémenter l'enregistrement ou rediriger vers la route de création utilisateur...
    }
    // ...existing code...

     public function showLogout()
    {
        return view('Accueil');
    }

    public function logout(Request $request)
    {

        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login.form');
   }

        
    }
