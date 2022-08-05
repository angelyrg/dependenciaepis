<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function profile(){
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }

    public function changePassword(PasswordRequest $request){

        $user = User::findOrFail(Auth::user()->id);

        if (!Hash::check($request->currentpassword, $user->password)) {
            return back()->with('danger', '¡Contraseña incorrecta!');
        }

        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->route('profile')->with('success', '¡Contraseña actualizada!');
    }

    public function restorePassword(User $user){

        $user->password = Hash::make($user->username);
        $user->save();

        return back()->with('success', '¡Contraseña restablecida!');

    }

    
}
