@extends('layouts.beautymanager')

@section('content')
<div class="main-panel">
    <div class="row ">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-12 grid-margin">
         <div class="card">
          <div class="card-body">
           <h4 class="card-title">Manage Appointments</h4>
            <div class="table-responsive">
            <table class="table">
        <tr>
            <th>Name</th>
            <th>Service</th>
            <th>Timeslot</th>
            <th>Date</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($appointments as $appointment)
<tr>
    <td class="id" style="display: none;">{{ $appointment->id }}</td>
    <td class="name">{{ $appointment->name }}</td>
    <td class="service">{{ $appointment->service }}</td>
    <td class="timeslot">{{ $appointment->timeslot }}</td>
    <td class="date">{{ $appointment->date }}</td>
    <td class="phone">{{ $appointment->phone }}</td>
    <td class="status text-warning">{{ $appointment->status }}</td>
    @if(strtolower($appointment->status) == 'pending')
    <td>
        <form action="{{ route('appointments.accept', $appointment->id) }}" method="POST">
            @csrf
            <button class="btn btn-outline-success" type="submit">Accept</button>
        </form>
    </td>
    <td>
        <form action="{{ route('appointments.decline', $appointment->id) }}" method="POST">
            @csrf
            <button class="btn btn-outline-danger" type="submit">Decline</button>
        </form>
    </td>
    @endif
</tr>   
@endforeach

        </tbody>
    </table>
    </div>
  </div>
 </div>
</div>
</div>
</div>
<script>
    window.onload = function() {
        var acceptButtons = document.querySelectorAll('.accept-button');
        var declineButtons = document.querySelectorAll('.decline-button');

        acceptButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                updateStatus(button, 'accepted');
            });
        });

        declineButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                updateStatus(button, 'declined');
            });
        });

        function updateStatus(button, status) {
            var form = button.closest('form');  
            var row = button.parentElement.parentElement;
            var statusCell = row.querySelector('.status');
            
           
            statusCell.classList.remove('text-warning');
            statusCell.classList.add(status === 'accepted' ? 'text-success' : 'text-danger');
            statusCell.textContent = status.toUpperCase();
            
            
            button.style.display = 'none';
            row.querySelector('.decline-button').style.display = 'none';

          
            form.submit();
        }
    };
</script>




@endsection

