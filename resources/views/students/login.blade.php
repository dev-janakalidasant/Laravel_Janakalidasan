@extends('students.layout')
@section('content')

<div class="row">
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header"><b>Login Page</b></div>
            <div class="card-body">
                <form action="{{ url('login') }}" method="post" >
                {!! csrf_field() !!}
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" class="form-control" value="{{session('email')}}"><br>
                    <h6 style="color:red;">{{ session('error_email') }}</h6>


                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" class="form-control"><br>

                    <h6 style="color:red;">{{ session('error') }}</h6>

                    <input type="submit" value="Login" class="btn btn-success"><br>

                    <div style="display:flex;justify-content:space-between">
                        <p>Don't have an account?</p>
                        <a href="{{ url('register') }}">Register</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-lg-4">
    </div>
</div>


@stop