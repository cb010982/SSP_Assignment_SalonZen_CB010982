<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //         'role' => 'required|string', 
    //     ]);

    
    //     $credentials = $request->only('email', 'password', 'role'); 

    //     if (Auth::attempt($credentials)) {
    //         if (Auth::user()->role === 'admin') {
    //             return redirect()->intended('/admin/dashboard');
    //         } else {
    //             return redirect()->intended('/');
    //         }
    //     }

    //     return back()->withErrors(['email' => 'These credentials do not match our records.']);
    // }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');


    if ($credentials['email'] == 'admin02@gmail.com') {
        $credentials['role'] = 'admin';
    }   elseif ($credentials['email'] == 'beautymanager@gmail.com') {
            $credentials['role'] = 'beauty_manager';
    } else {
        $credentials['role'] = 'customer';
    }

    if (Auth::attempt($credentials)) {
        if (Auth::user()->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif (Auth::user()->role === 'beauty_manager') {
            return redirect()->intended('/beautymanager/dashboard');
        }  else {
            return redirect()->intended('/');
        }
    }

    return back()->withErrors(['email' => 'These credentials do not match our records.']);
}

    
}
