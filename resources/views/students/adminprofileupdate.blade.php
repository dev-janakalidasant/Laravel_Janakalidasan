@extends('students.layout')
@section('content')

<div class="card">
    @php
    // Retrieve user data from session
    $session = session();
    $userData = $session->get('user_data');
    @endphp

    <div class="card-header">Update Profile</div>

    @foreach ($admin as $data)
        @if($data['admin_id'] == $userData['id'])
            <div class="card-body">
                <form action="{{ url('updateprofile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="admin_id" id="admin_id" class="form-control" value="{{ $userData['id'] }}">
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Role</label><br>
                            <input type="text" name="role" id="role" class="form-control" value="{{ $data['role'] }}">
                            <br>
                            <label>Company</label><br>
                            <input type="text" name="company" id="company" class="form-control" value="{{ $data['company'] }}">
                            <br>
                            <label for="country">Country</label><br>
                            <input type="text" name="country" id="country" class="form-control" value="{{ $data['country'] }}">
                        </div>

                        <div class="col-lg-6">
                            <label>Dob</label><br>
                            <input type="date" name="dob" id="dob" class="form-control" value="{{ $data['dob'] }}">
                            <br>
                            <label>Experience</label><br>
                            <input type="text" name="experinece" id="experinece" class="form-control" value="{{ $data['experinece'] }}">
                            <br>
                            <label for="image">Upload Profile</label><br>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div>
                    </div>
                    
                    <br>
                    <input type="submit" value="Update Profile" class="btn btn-success">
                </form>
            </div>
        @endif
    @endforeach

</div>

@stop
