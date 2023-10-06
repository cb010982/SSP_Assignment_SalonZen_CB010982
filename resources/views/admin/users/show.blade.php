<!--This view displays the details of a specific user, product, or service. You’ll need to fetch the user/product/service details based on their ID and display them.-->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>

    <!-- Display user attributes here -->

    <a href="{{ route('admin.users.edit', $user) }}">Edit</a>
</div>
@endsection
