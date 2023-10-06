<!-- This is the landing page when you navigate to the users, products, or services section in the admin dashboard.-->
@extends('layouts.app')

@section('content')
<div class="container">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1>Services</h1>
    <button id="create-service-button">Create Service</button>
    <table>
        <!-- Table headers -->
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
    
        <!-- Table data -->
        @foreach ($services as $service)
        <tr>
            <td class="id" style="display: none;">{{ $service->id }}</td>
            <td class="name">{{ $service->name }}</td>
            <td class="description">{{ $service->description }}</td>
            <td>
                <button class="edit-button">Edit</button>
                <button class="save-button" style="display: none;">Save</button>
            </td>
            <td>
                <form method="POST" action="{{ route('admin.services.destroy', $service) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" >Delete</button>
                </form>
            </td>
        </tr>
        
        @endforeach
    </table>
    
</div>
<script>
document.querySelector('#create-service-button').addEventListener('click', () => {
    const table = document.querySelector('table');
    const newRow = document.createElement('tr');

    const fields = ['name', 'description'];
    fields.forEach(field => {
        const newCell = document.createElement('td');
        newCell.classList.add(field);
        newCell.innerHTML = `<input type="text" value="">`;
        newRow.appendChild(newCell);
    });

    const actionCell = document.createElement('td');
    actionCell.innerHTML = `
        <button class="save-button">Save</button>
    `;
    newRow.appendChild(actionCell);

    table.appendChild(newRow);
});

document.querySelectorAll('.edit-button').forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.parentNode.parentNode;
        const fields = ['name', 'description'];
        fields.forEach(field => {
            const value = row.querySelector('.' + field).innerText;
            row.querySelector('.' + field).innerHTML = `<input type="text" value="${value}">`;
        });

        event.target.style.display = 'none';
        row.querySelector('.save-button').style.display = 'block';
    });
});

document.querySelector('table').addEventListener('click', (event) => {
    if (event.target.classList.contains('save-button')) {
        const button = event.target;
        const row = button.parentNode.parentNode;
        const serviceId = row.querySelector('.id') ? row.querySelector('.id').innerText : null;  

        const data = { id: serviceId };
        const fields = ['name', 'description'];
        fields.forEach(field => {
            data[field] = row.querySelector('.' + field + ' input').value;
        });

        let url, method;
        if (serviceId) {  
            url = '/admin/ajax-update-service/' + serviceId;
            method = 'POST';
        } else {  
            url = '/admin/ajax-create-service';
            method = 'PUT';
        }

        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),  
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

