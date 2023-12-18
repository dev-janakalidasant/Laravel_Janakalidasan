@extends('students.layout')
@section('content')
 
 <div class="row mt-5">
    <div class="col-md-4">
</div>
<div class="col-md-4">
<div class="card">
  <div class="card-header">User Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <p class="card-text "><img src="{{ asset('images/' . $students->image) }}" style="height:100px" alt="Image"></p>
        <h5 class="card-title">Name : {{ $students->name }}</h5>
        <p class="card-text">Email : {{ $students->email }}</p>
        <p class="card-text">Password : {{ $students->password }}</p>
        <p class="card-text">Mobile : {{ $students->mobile }}</p>
       
        
  </div>
       
    </hr>
  
  </div>
</div>
</div>
<div class="col-md-4">
</div>
</div>
