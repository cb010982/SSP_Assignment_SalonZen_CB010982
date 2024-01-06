@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
        <p class="fs-3"><strong>Your Appointment History</strong><p>
        </div>
        @if($userAppointments->isEmpty())
            <p>No appointments found.</p>
        @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">You booked on</th>
                        <th scope="col">Name of Service</th>
                        <th scope="col">Date of appointment</th>
                        <th scope="col">Timeslot assigned</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userAppointments as $index => $appointment)
                        <tr>
                        <td><strong>{{ $appointment->created_at }}</strong></td>
                            <td><strong>{{ $appointment->service }}</strong></td>
                            <td><strong>{{ $appointment->date }}</strong></td>
                            <td><strong>{{ $appointment->timeslot }}</strong></td>
                            <td><strong>{{ $appointment->status }}</strong></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
