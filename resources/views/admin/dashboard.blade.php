@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="main-panel">             
        <div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
     
          <div style="height: 300px;">
            <canvas id="salesChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">Carts and Appointments</h4>
          <div class="bg-gray-dark d-flex flex-row py-3 px-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Future appointments</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $futureAppointmentsCount }}</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Total customers</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $totalcustomers }}</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Total appointments</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $totalAppointmentsCount }}</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Total carts ordered</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{$totalCartcount}}</h6>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

<div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">Carts and Appointments</h4>
          <div class="bg-gray-dark d-flex flex-row py-3 px-4 rounded mt-3">
            
    
            
            <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Appointments accepted</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $acceptedAppointmentCount }}</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Appointments accepted</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $declinedAppointmentCount }}</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Appointments pending</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $pendingAppointmentCount }}</h6>
                      </div>
                    </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <div style="height: 300px;">
            <canvas id="appointmentStatusChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <div style="height: 300px;">
            <canvas id="cartStatusChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">Carts and Appointments</h4>
          <div class="bg-gray-dark d-flex flex-row py-3 px-4 rounded mt-3">
            <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Future appointments</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $acceptedCartCount }}</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Total customers</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $declinedCartCount }}</h6>
                      </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                      <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Total appointments</h6>
                      </div>
                      <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{ $pendingCartCount }}</h6>
                      </div>
                    </div>
        </div>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
      </div>
    </div>
       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <script>


    var ctx = document.getElementById('salesChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie', 
        data: {
            labels: ['Future Appointments', 'Total Appointments', 'Total Customers', 'Total Carts ordered'],
            datasets: [{
                data: [{{ $futureAppointmentsCount }}, {{ $totalAppointmentsCount }}, {{ $totalcustomers }}, {{$totalCartcount}}],
                backgroundColor: [
                    'rgb(255, 153, 0)',
                    'rgb(102, 255, 102)',
                    'rgb(102, 102, 255)',
                    'rgb(255, 80, 80)',
                 
                ],
                borderColor: [
                  'rgb(255, 153, 0)',
                    'rgb(102, 255, 102)',
                    'rgb(102, 102, 255)',
                    'rgb(255, 80, 80)',
                    
                ],
                hoverOffset: 4,
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true
        }
    });

    var ctxAppointment = document.getElementById('appointmentStatusChart').getContext('2d');
    var appointmentStatusChart = new Chart(ctxAppointment, {
        type: 'bar',
        data: {
            labels: ['Accepted', 'Declined', 'Pending'],
            datasets: [{
                label: 'Appointment Accepted Status',
                data: [{{ $acceptedAppointmentCount }}, {{ $declinedAppointmentCount }}, {{ $pendingAppointmentCount }}],
                backgroundColor: ['rgb(255, 255, 0)', 'rgb(153, 102, 0)', 'rgb(153, 0, 0)'],
                borderColor: ['rgb(255, 255, 0)', 'rgb(153, 102, 0)', 'rgb(153, 0, 0))'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var ctxCart = document.getElementById('cartStatusChart').getContext('2d');
    var cartStatusChart = new Chart(ctxCart, {
        type: 'bar',
        data: {
            labels: ['Accepted', 'Declined', 'Pending'],
            datasets: [{
                label: 'Cart Accepted Status',
                data: [{{ $acceptedCartCount }}, {{ $declinedCartCount }}, {{ $pendingCartCount }}],
                backgroundColor: ['rgb(0, 204, 0)', 'rgb(51, 51, 255)', 'rgb(255, 0, 102)'],
                borderColor: ['rgb(0, 204, 0)', 'rgb(51, 51, 255)', 'rgb(255, 0, 102))'],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</div>
@endsection 


