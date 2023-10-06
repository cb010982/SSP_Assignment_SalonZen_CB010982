<!-- This is the landing page when you navigate to the users, products, or services section in the admin dashboard.-->
@extends('layouts.app')

@section('content')
<div class="container">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h1>Users</h1>
    <button id="create-user-button">Create User</button>
    <table>
        <!-- Table headers -->
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Address</th>
            <th>Date Of Birth</th>
            <th>Skin Type</th>
            <th>Allergies</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
    
        <!-- Table data -->
        @foreach ($users as $user)
        <tr>
            <td class="id" style="display: none;">{{ $user->id }}</td>
            <td class="name">{{ $user->name }}</td>
            <td class="email">{{ $user->email }}</td>
            <td class="telephone">{{ $user->telephone }}</td>
            <td class="address">{{ $user->address }}</td>
            <td class="date_of_birth">{{ $user->date_of_birth }}</td>
            <td class="skin_type">{{ $user->skin_type }}</td>
            <td class="allergies">{{ $user->allergies }}</td>
            <td class="password">{{ $user->password }}</td>
            <td>
                <button class="edit-button">Edit</button>
                <button class="save-button" style="display: none;">Save</button>
            </td>
            <td>
                <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
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
document.querySelector('#create-user-button').addEventListener('click', () => {
    const table = document.querySelector('table');
    const newRow = document.createElement('tr');

    const fields = ['name', 'email', 'telephone', 'address', 'date_of_birth', 'skin_type', 'allergies', 'password'];
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
        const fields = ['name', 'email', 'telephone', 'address', 'date_of_birth', 'skin_type', 'allergies', 'password'];
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
        const userId = row.querySelector('.id') ? row.querySelector('.id').innerText : null;  // get the user's ID from the hidden field if it exists

        const data = { id: userId };
        const fields = ['name', 'email', 'telephone', 'address', 'date_of_birth','skin_type','allergies','password'];
        fields.forEach(field => {
            data[field] = row.querySelector('.' + field + ' input').value;
        });

        let url, method;
        if (userId) {  
            url = '/admin/ajax-update-user/' + userId;
            method = 'POST';
        } else {  
            url = '/admin/ajax-create-user';
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

