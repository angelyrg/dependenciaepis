<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credencials = $request->only('username', 'password');

        if (Auth::attempt($credencials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }else{
            return redirect()->back()->with('danger','Credenciales incorrectas!');
        }
    }

    public function logout(Request $request){ //Request $request, Redirector $redirector
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
