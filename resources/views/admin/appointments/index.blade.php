@extends('layouts.admin')

@section('content')
<div class="main-panel">
    <div class="row ">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-12 grid-margin">
         <div class="card">
          <div class="card-body">
           <h4 class="card-title">Manage Appointments</h4>
            <button class="nav-link btn btn-success create-new-button" id="create-appointment-button" >Create Appointment</button>

            <div id="create-appointment-form" style="display: none;">
                <form method="POST" action="/admin/ajax-create-appointment">
                    @csrf
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="service" placeholder="Service">
                    <input type="text" name="timeslot" placeholder="Timeslot">
                    <input type="text" name="date" placeholder="Date">
                    <input type="number" name="phone" placeholder="Phone">
                    <button type="submit">Save</button>
                </form>
            </div>


            <div class="table-responsive">
            <table class="table">
        <tr>
            <th>Name</th>
            <th>Service</th>
            <th>Timeslot</th>
            <th>Date</th>
            <th>Phone</th>
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

            <td>
                <button id="badge-outline-warning" class="edit-button">Edit</button>
                <button id="badge-outline-success" class="save-button" style="display: none;">Save</button>
            </td>
            <td>
                <form method="POST" action="{{ route('admin.appointments.destroy', $appointment) }}">
                    @csrf
                    @method('DELETE')
                    <button id="badge-outline-danger" class="delete-button"  type="submit" >Delete</button>
                </form>
            </td>
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
// document.querySelector('#create-user-button').addEventListener('click', () => {
//     const table = document.querySelector('table');
//     const newRow = document.createElement('tr');

//     const fields = ['name', 'email', 'telephone', 'address', 'date_of_birth', 'skin_type', 'allergies', 'password'];
//     fields.forEach(field => {
//         const newCell = document.createElement('td');
//         newCell.classList.add(field);
//         newCell.innerHTML = `<input type="text" value="">`;
//         newRow.appendChild(newCell);
//     });

//     const actionCell = document.createElement('td');
//     actionCell.innerHTML = `
//         <button class="save-button">Save</button>
//     `;
//     newRow.appendChild(actionCell);

//     table.appendChild(newRow);
// }); //add a new page for creating a user

document.getElementById('create-appointment-button').addEventListener('click', () => {
    document.getElementById('create-appointment-form').style.display = 'block';
});

document.querySelectorAll('.edit-button').forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.parentNode.parentNode;
        const fields = ['name', 'service', 'timeslot', 'date', 'phone'];
        fields.forEach(field => {
            const value = row.querySelector('.' + field).innerText;
            row.querySelector('.' + field).innerHTML = `<input type="text" value="${value}">`;
        });

        event.target.style.display = 'none';
        row.querySelector('.save-button').style.display = 'block';
    });
});

document.getElementById('create-appointment-form').addEventListener('submit', (event) => {
    event.preventDefault();  
    const form = event.target;
    const data = Object.fromEntries(new FormData(form).entries());  

    fetch('/admin/ajax-create-appointment', {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), 
        },
        body: JSON.stringify(data)
    }).then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    }).then(json => {
        if (json.success) {
            form.style.display = 'none'; 
          
        }
    }).catch(e => {
        console.log('There was a problem with the AJAX request.', e);
    });
});

document.querySelector('table').addEventListener('click', (event) => {
    if (event.target.classList.contains('save-button')) {
        const button = event.target;
        const row = button.parentNode.parentNode;
        const appointmentId = row.querySelector('.id') ? row.querySelector('.id').innerText : null; 

        const data = { id: appointmentId };
        const fields = ['name', 'service', 'timeslot', 'date', 'phone'];
        fields.forEach(field => {
            data[field] = row.querySelector('.' + field + ' input').value;
        });

        let url, method;
        if (appointmentId) {  
            url = '/admin/ajax-update-appointment/' + appointmentId;
            method = 'POST';
        } else {  
            url = '/admin/ajax-create-appointment';
            method = 'PUT';
        }

        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),  // get CSRF token from meta tag
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        }).then(json => {
            console.log(json);  
            if (json.success) {
                document.getElementById('create-appointment-form').style.display = 'none';
            }
            fields.forEach(field => {
                row.querySelector('.' + field).innerHTML = data[field];
            });

            button.style.display = 'none';
            row.querySelector('.edit-button').style.display = 'block';
        }).catch(e => {
            console.log('There was a problem with the AJAX request.', e);
        });
    }
});

</script>


@endsection

