@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Products</h1>
    <a href="{{ route('admin.products.create') }}">Create Product</a>
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
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}">Edit</a>
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

    const fields = ['name', 'description', 'price', 'image'];
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
        const fields = ['name', 'description', 'price', 'image'];
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
        const productId = row.querySelector('.id') ? row.querySelector('.id').innerText : null;  // get the product's ID from the hidden field if it exists

        const data = { id: productId };
        const fields = ['name', 'description', 'price', 'image'];
        fields.forEach(field => {
            data[field] = row.querySelector('.' + field + ' input').value;
        });

        // Here you would typically make an AJAX request to your server to create/update the product
    }
});
</script>
@endsection
