@extends('students.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Update Page</div>
  <div class="card-body">
      
      <form action="{{ url('student/' .$students->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$students->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="address" value="{{$students->email}}" class="form-control"></br>
        <label>Password</label></br>
        <input type="text" name="password" id="address" value="{{$students->password}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$students->mobile}}" class="form-control"></br>
        <label for="profile">Upload Profile</label></br>
      <input type="file" name="image" id="profile" value="{{$students->image}}" class="form-control"></br>
      <h6 style="color:red;"><?php echo session('error_message') ?></h6>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  </div>
</div>
 
@stop