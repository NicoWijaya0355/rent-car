@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
      
        <h1 class="h1 mb-5 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            
            
            <!-- <label for="floatingConfirmPassword">Confirm Password</label> -->
            <select  name="level" id="jenis_kelamin" class="form-control" style="margin-bottom :10px;">
                            <option value="" selected disabled hidden>Role</option>
                            <option value="Customer">Customer</option>
                            <option value="Admin">Admin</option>
                            <option value="Customer Service">Customer Service</option>
                            <option value="Manager">Manager</option>
                            <option value="Driver">Driver</option>
                            
            </select>
           
        

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
        
    </form>
    <small class="d-block text-center mt-3">Already registered? <a href="{{url('/login')}}">Login</a></small>
    <small class="d-block text-center mt-3"> <a href="{{url('/')}}">Homepage</a></small>
@endsection
