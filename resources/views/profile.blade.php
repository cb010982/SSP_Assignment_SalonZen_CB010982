@extends('layouts.app')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">

            <h3 class="mb-0">User Profile</h3>
            <div class="row">

                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                            <h5 class="my-3">{{ $user->address }}</h5>
                            <button type="button" class="btn btn-secondary btn-lg" id="edit">Edit</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="card mb-4">

                        <div class="card-body">
                            <form id="editForm" style="display:none"  action="{{ route('user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="fullName"><strong>Full Name</strong></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fullName" name="name"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="dateOfBirth"><strong>Date of Birth</strong></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="dateOfBirth" name="date_of_birth"
                                            value="{{ $user->date_of_birth }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="address"><strong>Address</strong></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $user->address }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="mobile"><strong>Mobile</strong></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="mobile" name="telephone"
                                            value="{{ $user->telephone }}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label for="skinType"><strong>Skin Type</strong></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="skinType" name="skin_type"
                                            value="{{ $user->skin_type }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                            </form>

                            <div id="displayData">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><strong>Full Name</strong></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><strong>{{ $user->name }}</strong></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><strong>Date of Birth</strong></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"> <strong>{{ $user->date_of_birth }}</strong></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><strong>Address</strong></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><strong>{{ $user->address }}</strong></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><strong>Mobile</strong></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><strong>{{ $user->telephone }}</strong></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><strong>Skin Type</strong></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><strong>{{ $user->skin_type }}</strong></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0"><strong>Allergies</strong></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><strong>{{ $user->allergies}}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('edit').addEventListener('click', function () {
            document.getElementById('displayData').style.display = 'none';
            document.getElementById('editForm').style.display = 'block';
        });
    </script>
@endsection
