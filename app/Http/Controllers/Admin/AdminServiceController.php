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
            'description' => 'required,' . $service->id,
        ]);
        $service->update($validatedData);
        return redirect()->route('admin.services.index');
    }
    
    public function ajaxUpdate(Request $request, Service $service)
    {
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();
    
        return response()->json(['success' => true]);
    }
//     public function ajaxCreate(Request $request)
// {
//     $service = new Service;
//     $service->name = $request->input('name');
//     $service->email = $request->input('description');

//     if ($service->save()) {
//         return response()->json(['status' => 'success', 'message' => 'service created successfully.']);
//     } else {
//         return response()->json(['status' => 'error', 'message' => 'There was a problem creating the service.']);
//     }
// }

public function ajaxCreate(Request $request)
{
    $service = new Service;
    $service->name = $request->name;
    $service->description = $request->description;
    $service->save();

    return response()->json(['success' => true]);
}
}

