<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;



class Login extends Controller
{
    function autenticate(Request $request): RedirectResponse {

        
        $credit = $request->validate([
            'email' =>['required', 'email'],
            'password' =>['required'],
        ]);
    
        if (Auth::attempt($credit)) {
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return back()->withErrors([
            'chyba' => 'Nesprávné údaje',
            ])->onlyInput('chyba');
    }

    function logout (){
        session()->flush();
        return redirect(route('login'));
        
    }
}
