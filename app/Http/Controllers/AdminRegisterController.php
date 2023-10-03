<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    public function showRegistrationForm()
{
    return view('auth.admin-register'); 
}

}
