@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
        <li><a href="{{ route('admin.products.index') }}">Manage Products</a></li>
        <li><a href="{{ route('admin.services.index') }}">Manage Services</a></li>
    </ul>
</div>
@endsection
