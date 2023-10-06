@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Products</h1>
    <button id="create-product-button">Create Product</button>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr data-id="{{ $product->id }}">
                <td class="name">{{ $product->name }}</td>
                <td class="description">{{ $product->description }}</td>
                <td class="price">{{ $product->price }}</td>
                <td class="actions">
                    <button class="edit">Edit</button>
                    <button class="save-button" style="display: none;">Save</button>
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
 document.querySelector('#create-product-button').addEventListener('click', () => {
    const table = document.querySelector('table');
    const newRow = document.createElement('tr');

    const fields = ['name', 'description', 'price'];
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

document.querySelectorAll('.edit').forEach((button) => {
    button.addEventListener('click', (event) => {
        const row = event.target.parentNode.parentNode;
        const fields = ['name', 'description', 'price'];
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
        const productId = row.querySelector('.id') ? row.querySelector('.id').innerText : null;  

        const data = { id: productId };
        const fields = ['name', 'description', 'price'];
        fields.forEach(field => {
            data[field] = row.querySelector('.' + field + ' input').value;
        });

        let url, method;
        if (productId) {  
            url = '/admin/ajax-update-product/' + productId;
            method = 'POST';
        } else {  
            url = '/admin/ajax-create-product';
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
            row.querySelector('.edit').style.display = 'block';
        }).catch(e => {
            console.log('There was a problem with the AJAX request.', e);
        });
    }
});
// document.querySelectorAll('.edit').forEach(function(editButton) {
//     editButton.addEventListener('click', function() {
//         var tr = this.closest('tr');
//         var name = tr.querySelector('.name').textContent;
//         var description = tr.querySelector('.description').textContent;
//         var price = tr.querySelector('.price').textContent;

//         tr.querySelector('.name').innerHTML = '<input type="text" value="' + name + '">';
//         tr.querySelector('.description').innerHTML = '<input type="text" value="' + description + '">';
//         tr.querySelector('.price').innerHTML = '<input type="number" step="0.01" value="' + price + '">';

//         this.style.display = 'none';
//         tr.querySelector('.save').style.display = 'inline';
//     });
// });

// document.querySelectorAll('.save').forEach(function(saveButton) {
//     saveButton.addEventListener('click', function() {
//         var tr = this.closest('tr');
//         var id = tr.dataset.id;
//         var name = tr.querySelector('.name input').value;
//         var description = tr.querySelector('.description input').value;
//         var price = tr.querySelector('.price input').value;

//         fetch('/admin/products/' + id, {
//             method: 'PUT',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
//             },
//             body: JSON.stringify({
//                 name: name,
//                 description: description,
//                 price: price
//             })
//         }).then(function(response) {
//             return response.json();
//         }).then(function(product) {
//             tr.querySelector('.name').textContent = product.name;
//             tr.querySelector('.description').textContent = product.description;
//             tr.querySelector('.price').textContent = product.price;

//             saveButton.style.display = 'none';
//             tr.querySelector('.edit').style.display = 'inline';
//         });
//     });
// });
</script>

@endsection
