<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointment; 
use McKenziearts\Notify\Facades\LaravelNotify;
class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all(); 
        return view('appointments', compact('appointments'));
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

        $userId = Auth::id();

        $appointment = new Appointment;
        $appointment->name = $validatedData['name'];
        $appointment->service = $validatedData['service'];
        $appointment->timeslot = $validatedData['timeslot'];
        $appointment->date = $validatedData['date'];
        $appointment->phone = $validatedData['phone'];
        $appointment->user_id = $userId;
        $appointment->save();

        return back()->with('success', 'Appointment created successfully');
    }
    public function showForm()
    {
        return view('appointments');
    }
    public function showAppointmentHistory()
{
    $userAppointments = Auth::user()->appointments;

    return view('appointmenthistory', compact('userAppointments'));
}

}
