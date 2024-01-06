<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AdminAppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all(); 
        return view('admin.appointments.index', compact('appointments'));
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index');
    }
   
    public function edit(Appointment $appointment)
    {
        return view('admin.appointments.edit', compact('appointment'));
    }
    
    public function update(Request $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'service' => 'required,' . $appointment->id,
            'timeslot' => 'required' .$appointment->id,
            'date' => 'required' .$appointment->id,
            'phone' => 'required' .$appointment->id,
           
        ]);

        $appointment->update($validatedData);

        return redirect()->route('admin.appointments.index');
    }
        public function store(Request $request) //this should be in the appointmentcontroller, did not work, says store route not found and tries to come to the adminappointmentcontroller.
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'timeslot' => 'required|string|max:255',
            'date' => 'required|date',
            'phone' => 'required|digits:10',
        ]);

        $appointment = new Appointment;
        $appointment->name = $validatedData['name'];
        $appointment->service = $validatedData['service'];
        $appointment->timeslot = $validatedData['timeslot'];
        $appointment->date = $validatedData['date'];
        $appointment->phone = $validatedData['phone'];

        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully');
    }
    public function ajaxUpdate(Request $request, Appointment $appointment)
    {
        $appointment->name = $request->name;
        $appointment->service = $request->service;
        $appointment->timeslot = $request->timeslot;
        $appointment->date = $request->date;
        $appointment->phone = $request->phone;
        $appointment->save();
    
        return response()->json(['success' => true]);
    }

   
public function ajaxCreate(Request $request)
{
    $appointment = new Appointment;
    $appointment->name = $request->name;
    $appointment->service = $request->service;
    $appointment->timeslot = $request->timeslot;
    $appointment->date = $request->date;
    $appointment->phone = $request->phone;
    $appointment->save();
    
    return response()->json(['success' => true]);
}


}
