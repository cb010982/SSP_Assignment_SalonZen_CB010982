<!--This view also contains a form but it’s pre-filled with the attributes of an existing user. The admin can update these attributes and submit the form.-->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('admin.users.update', $user) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Add form fields for user attributes here -->

        <button type="submit">Update</button>
    </form>
</div>
@endsection
