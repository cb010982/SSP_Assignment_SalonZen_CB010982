<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
   
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
           
        ]);

        $user->update($validatedData);

        return redirect()->route('admin.users.index');
    }
    public function ajaxUpdate(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone; 
        $user->address = $request->address;
        $user->date_of_birth = $request->date_of_birth; 
        $user->skin_type = $request->skin_type; 
        $user->allergies = $request->allergies;
        $user->password = Hash::make($request->password);
        $user->save();
    
        return response()->json(['success' => true]);
    }
    public function createUser(Request $request)
{
    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->telephone = $request->input('telephone');
    $user->address = $request->input('address');
    $user->date_of_birth = $request->input('date_of_birth');
    $user->skin_type = $request->input('skin_type');
    $user->allergies = $request->input('allergies');
    $user->password = Hash::make($request->input('password'));  // hash the password before storing it

    if ($user->save()) {
        return response()->json(['status' => 'success', 'message' => 'User created successfully.']);
    } else {
        return response()->json(['status' => 'error', 'message' => 'There was a problem creating the user.']);
    }
}
    }
        
