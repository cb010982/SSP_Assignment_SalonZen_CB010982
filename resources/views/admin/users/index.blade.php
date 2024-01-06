@extends('layouts.admin')

@section('content')
<div class="main-panel">
    <div class="row ">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-12 grid-margin">
         <div class="card">
          <div class="card-body">
           <h4 class="card-title">Address Book</h4>
            <button class="nav-link btn btn-success create-new-button" id="create-user-button" >Create User</button>

            <div id="create-user-form" style="display: none;">
                <form method="POST" action="/admin/ajax-create-user">
                    @csrf
                    <input type="text" name="name" placeholder="Name">
                    <input type="email" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <input type="address" name="address" placeholder="Address">
                    <input type="date_of_birth" name="date_of_birth" placeholder="Date of Birth">
                    <input type="skin_type" name="skin_type" placeholder="Skin Type">
                    <input type="allergies" name="allergies" placeholder="Allergies">
                    <input type="telephone" name="telephone" placeholder="Telephone">
                    <button type="submit">Save</button>
                </form>
            </div>


            <div class="table-responsive">
            <table class="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Address</th>
            <th>Date Of Birth</th>
            <th>Skin Type</th>
            <th>Allergies</th>
            <th>Password</th>
        </tr>
        </thead>
        <tbody>
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
            <!-- <td class="password">{{ $user->password }}</td> -->
            <td class="password">
            <input type="password" value="{{ $user->password }}" readonly>
            <i class="fa fa-eye" onclick="togglePasswordVisibility(this)"></i>
        </td>

            <td>
                <button id="badge-outline-warning" class="edit-button">Edit</button>
                <button id="badge-outline-success" class="save-button" style="display: none;">Save</button>
            </td>
            <td>
                <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
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

document.getElementById('create-user-button').addEventListener('click', () => {
    document.getElementById('create-user-form').style.display = 'block';
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

document.getElementById('create-user-form').addEventListener('submit', (event) => {
    event.preventDefault();  
    const form = event.target;
    const data = Object.fromEntries(new FormData(form).entries());  

    fetch('/admin/ajax-create-user', {
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
        const userId = row.querySelector('.id') ? row.querySelector('.id').innerText : null; 

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
            if (json.success) {
                document.getElementById('create-user-form').style.display = 'none';
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
function togglePasswordVisibility(icon) {
    var passwordInput = icon.previousElementSibling;
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}



</script>


@endsection

