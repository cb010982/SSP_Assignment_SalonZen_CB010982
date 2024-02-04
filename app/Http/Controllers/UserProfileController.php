<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'address' => 'required|string|max:255',
            'telephone' => 'required|digits:10',
            'skin_type' => 'required|string|max:255',
        ]);

       
        $user->update($validatedData);

        
        return back()->with('success', 'Profile created successfully');
    }
}
