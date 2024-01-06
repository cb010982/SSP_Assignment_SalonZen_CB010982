<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeautyManagerController extends Controller
{
    public function dashboard()
    {
        return view('beautymanager.dashboard');
    }
}
