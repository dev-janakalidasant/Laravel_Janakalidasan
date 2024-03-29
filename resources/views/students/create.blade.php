@extends('students.layout')
@section('content')

<div class="card">
  <div class="card-header">Details_Entry Page</div>
  <div class="card-body">

    <form action="{{ url('student') }}" method="post" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <label>Name</label></br>
      <input type="text" name="name" id="name" class="form-control"></br>
      <label>Email</label></br>
      <input type="email" name="email" id="email" class="form-control"></br>
      <label>Password</label></br>
      <input type="password" name="password" id="password" class="form-control"></br>
      <label>Mobile</label></br>
      <input type="text" name="mobile" id="mobile" class="form-control"></br>
      <label for="profile">Upload Profile</label></br>
      <input type="file" name="image" id="profile" class="form-control"></br>
      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>

@stop