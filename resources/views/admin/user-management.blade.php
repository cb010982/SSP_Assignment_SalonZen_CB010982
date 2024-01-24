@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="row">
           
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Management</h4>
                        
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($users as $user)
                              <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                  <form method="POST" action="{{ route('admin.generate.api.token', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Generate API Token</button>
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
@endsection
<style>
.card {
  background-color: #f0f0f0;
  border-radius: 10px;
}
.main-panel {
  padding: 20px;
  margin: 10px;
}

</style>