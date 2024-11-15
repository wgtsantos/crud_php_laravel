<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->acesso === 'admin') {
                return redirect()->route('dashboard.index'); // Redireciona para a área protegida
            } else {
                return redirect()->route('dashboard.user');;
            }
        }

        return back()->with('error', 'E-mail ou Senha inválidos.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
