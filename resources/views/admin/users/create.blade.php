
<!--This view contains a form to create a new user. The form should have fields for all the attributes of a user/product/service.-->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create User</h1>

    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf

    

        <button type="submit">Create</button>
    </form>
</div>
@endsection
