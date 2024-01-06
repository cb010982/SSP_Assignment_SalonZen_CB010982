@extends('layouts.admin')

@section('content')
<div class="main-panel">
    <div class="row ">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-12 grid-margin">
         <div class="card">
          <div class="card-body">
           <h4 class="card-title">Manage Services</h4>
    <button class="nav-link btn btn-success create-new-button" id="create-service-button">Create Service</button>
    
    
    <div id="create-service-form" style="display: none;">
                <form method="POST" action="/admin/ajax-create-service">
                    @csrf
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="description" placeholder="Description">
                    <button type="submit">Save</button>
                </form>
            </div>
    
    
    <div class="table-responsive">
            <table class="table">
            <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($services as $service)
        <tr>
            <td class="id" style="display: none;">{{ $service->id }}</td>
            <td class="name">{{ $service->name }}</td>
            <td class="description">{{ $service->description }}</td>
            <td>
                <button id="badge-outline-warning" class="edit-button">Edit</button>
                <button id="badge-outline-success"  class="save-button" style="display: none;">Save</button>
            </td>
            <td>
                <form method="POST" action="{{ route('admin.services.destroy', $service) }}">
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

document.getElementById('create-service-button').addEventListener('click', () => {
    document.getElementById('create-service-form').style.display = 'block';
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

document.getElementById('create-service-form').addEventListener('submit', (event) => {
    event.preventDefault();  
    const form = event.target;
    const data = Object.fromEntries(new FormData(form).entries());  

    fetch('/admin/ajax-create-service', {
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
            if (json.success) {
                document.getElementById('create-service-form').style.display = 'none';
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

