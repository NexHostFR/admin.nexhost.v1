<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthPageController extends Controller
{
    public function viewLogin() {
        return view('auth.login');
    }

    public function postLogin(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Vérifier si l'utilisateur existe
        $user = User::where('username', $request->username)->first();
    
        if (!$user) {
            return redirect()->route('login')->withErrors([
                'username' => 'Cet utilisateur n\'existe pas.',
            ]);
        }
    
        // Vérifier si le mot de passe est correct
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login')->withErrors([
                'password' => 'Mot de passe incorrect.',
            ]);
        }
    
        // Authentifier l'utilisateur
        Auth::login($user);
    
        return redirect()->route('dashboard');
    }    
}
