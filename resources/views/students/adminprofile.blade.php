@extends('students.layout')
@section('content')

<div class="card">
<?php
    // Retrieve user data from session
    $session = session();
    $userData = $session->get('user_data');
    // print_r($userData);
    ?>
  <div class="card-header">Admin Profile</div>
  <div class="card-body">
    <form action="{{ url('createprofile') }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
          <input type="text" name="admin_id" id="admin_id" class="form-control" hidden value="<?php echo $userData['id'] ?>">
      <div class="row">
        <div class="col-lg-6">
          <label>Role</label></br>
          <input type="text" name="role" id="role" class="form-control">
          <br>
          <label>Company</label></br>
          <input type="text" name="company" id="company" class="form-control">
          <br>
          <label for="profile">Country</label></br>
          <input type="text" name="country" id="country" class="form-control">
        </div>
        <div class="col-lg-6">
          <label>Dob</label></br>
          <input type="date" name="dob" id="dob" class="form-control">
          <br>
          <label>Experinece</label></br>
          <input type="text" name="experinece" id="experinece" class="form-control">
          <br>
          <label for="profile">Upload Profile</label></br>
          <input type="file" name="image" id="profile" class="form-control">
        </div>

      </div>
      <br>
      <input type="submit" value="Save Profile" class="btn btn-success">
      <a href="{{url('dashboard')}}" style="text-decoration:none;color:white;"><button class="btn btn-danger">Go back</bitton></a>
    </form>
 

  </div>
</div>

@stop