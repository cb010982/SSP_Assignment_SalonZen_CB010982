<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    //Index Method: This method retrieves all the users from the database and passes them to the index view.

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    
    //Create Method: This method simply returns the create view.

    public function create()
    {
        return view('admin.users.create');
    }
    
    //Store Method: This method handles the form submission from the create view. It creates a new user in the database and then redirects the admin back to the index view.

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('admin.users.index');
    }

    //Show Method: This method retrieves a specific user from the database based on their ID and passes it to the show view.

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    //Edit Method: This method retrieves a specific user from the database based on their ID and passes it to the edit view.

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    //Update Method: This method handles the form submission from the edit view. It updates a specific user in the database and then redirects the admin back to the index view.

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    //Destroy Method: This method deletes a specific user from the database and then redirects the admin back to the index view.

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }


    

}
