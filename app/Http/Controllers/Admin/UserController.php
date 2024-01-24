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
        $user->save();
    
        return response()->json(['success' => true]);
    }
//     public function ajaxCreate(Request $request)
// {
    
//     $user = new User;
//     $user->name = $request->input('name');
//     $user->email = $request->input('email');
//     $user->telephone = $request->input('telephone');
//     $user->address = $request->input('address');
//     $user->date_of_birth = $request->input('date_of_birth');
//     $user->skin_type = $request->input('skin_type');
//     $user->allergies = $request->input('allergies');
//     $user->password = Hash::make($request->input('password'));  

//     if ($user->save()) {
//         return response()->json(['status' => 'success', 'message' => 'User created successfully.']);
//     } else {
//         return response()->json(['status' => 'error', 'message' => 'There was a problem creating the user.']);
//     }
// }

public function ajaxCreate(Request $request)
{
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->date_of_birth = $request->date_of_birth;
    $user->skin_type = $request->skin_type;
    $user->allergies = $request->allergies;
    $user->telephone = $request->telephone;
    $user->password = Hash::make($request->password);
    $user->save();

    return response()->json(['success' => true]);
}

    public function showGenerateTokenForm()
    {
        return view('admin.token');
    }

    public function showUserForm()
{
 
    $users = User::all();

    return view('admin.user-management')->with(['users' => $users]);
}

public function generateApiToken(Request $request, $userId)
{
   
    $user = User::find($userId);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }


    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json(['message' => 'API token generated successfully', 'token' => $token]);
}

    }
        
