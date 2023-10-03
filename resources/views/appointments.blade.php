

@extends('layouts.app')



@section('content')
<!-- Include FullCalendar CSS -->
<link href="{{ asset('css/fullcalendar/core/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/fullcalendar/daygrid/main.css') }}" rel="stylesheet">

<!-- Include FullCalendar JavaScript -->
<script src="{{ asset('js/fullcalendar/core/main.js') }}"></script>
<script src="{{ asset('js/fullcalendar/daygrid/main.js') }}"></script>
<section class="ftco-section contact-section">
    <div class="container mt-5">
  
    <title>Appointment Selection</title>

    <h1>Appointment Selection</h1>
    <div id="calendar"></div>

    <div id="time-slots">
        <!-- Time slots go here -->
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
              plugins: ['dayGrid'],
              events: [
                  // Define your calendar events here
                  {
                      title: 'Event 1',
                      start: '2023-09-15T10:00:00',
                      end: '2023-09-15T12:00:00',
                  },
                  {
                      title: 'Event 2',
                      start: '2023-09-16T14:00:00',
                      end: '2023-09-16T16:00:00',
                  },
                  // Add more events as needed
              ],
          });
          calendar.render();
      });
  </script>
  



     
  </section>
  @endsection