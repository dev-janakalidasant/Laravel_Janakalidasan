@extends('students.layout')
@section('content')


<div class="row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><b>Register Page</b></div>
            <div class="card-body">
                <form action="{{ url('admin') }}" method="post">
                    {!! csrf_field() !!}
                    <label>Name</label><br>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <p class="" style="color:red">{{ $message }}</p>
                    @enderror
             
                    <label>Email</label><br>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                    <p class="" style="color:red">{{ $message }}</p>
                    @enderror
                  
                    <label>Password</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                    <p class="" style="color:red">{{ $message }}</p>
                    @enderror
            <br>
                    <input type="submit" value="Save" class="btn btn-success"><br>
                </form>


            </div>
        </div>
    </div>
    <div class="col-lg-4">
    </div>
</div>


@stop