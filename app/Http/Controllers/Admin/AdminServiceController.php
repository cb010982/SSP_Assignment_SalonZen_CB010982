<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class AdminServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); 
        return view('admin.services.index', compact('services'));
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index');
    }
   
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }
    
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:services,email,' . $service->id,
           
        ]);

        $service->update($validatedData);

        return redirect()->route('admin.services.index');
    }
    public function ajaxUpdate(Request $request, Service $service)
    {
        $service->name = $request->name;
        $service->email = $request->email;
        $service->save();
    
        return response()->json(['success' => true]);
    }
    public function createService(Request $request)
{
    $service = new Service;
    $service->name = $request->input('name');
    $service->email = $request->input('description');

    if ($service->save()) {
        return response()->json(['status' => 'success', 'message' => 'service created successfully.']);
    } else {
        return response()->json(['status' => 'error', 'message' => 'There was a problem creating the service.']);
    }
}
}

