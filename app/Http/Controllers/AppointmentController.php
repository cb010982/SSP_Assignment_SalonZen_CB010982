<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment; 

class AppointmentController extends Controller
{
    public function index()
    {
        return view('appointments');
    }

    public function store(Request $request)
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
    public function showForm()
    {
        return view('appointments');
    }

}
