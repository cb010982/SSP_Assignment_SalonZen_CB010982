<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()
{
    return view('admin.dashboard');
}

public function products()
{
    // Add logic for displaying products
}

public function services()
{
    // Add logic for displaying services
}

}
