<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeautyManagerLoginController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.beautymanager-login');
    }


    public function login(Request $request)
    {
  
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::guard('beauty_manager')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('beautymanager.dashboard'));
        }


        return redirect()->route('beauty_manager.login')->with('error', 'Invalid credentials');
    }
}
