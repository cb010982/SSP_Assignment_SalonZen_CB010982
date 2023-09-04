<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'appointment_date' => 'required|date',
        'phone' => 'required|string',
        'message' => 'nullable|string',
    ]);

    // Create a new Appointment model instance
    $appointment = new Appointment([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'appointment_date' => $request->input('appointment_date'),
        'phone' => $request->input('phone'),
        'message' => $request->input('message'),
    ]);

    // Save the appointment to the database
    $appointment->save();
    //success msg
    session()->flash('success', 'Appointment submitted successfully!');
    // Redirect or return a response
    return redirect()->route('appointment-success'); // You can create a success page route and view
}
}
