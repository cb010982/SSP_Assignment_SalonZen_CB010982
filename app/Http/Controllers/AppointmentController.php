<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function success()
    {
        return view('appointment.success'); 
    }
    
    public function store(Request $request)
{
    
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'appointment_date' => 'required|date',
        'phone' => 'required|string',
        'message' => 'nullable|string',
    ]);

    
    $appointment = new Appointment([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'appointment_date' => $request->input('appointment_date'),
        'phone' => $request->input('phone'),
        'message' => $request->input('message'),
    ]);

    $appointment->save();


    session()->flash('success', 'Appointment submitted successfully!');
    return redirect()->route('appointment-success');

}
}
