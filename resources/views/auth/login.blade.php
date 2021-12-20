@extends('layouts.auth-master')

@section('content')



    <form method="post" action="{{ route('login.perform') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
       
        
        <h1 class="h1 mb-5 fw-normal">Login</h1>
        @if(session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('failed') }}
            
                
            </div>
        @endif

        <!-- @if(session()->has('success'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('success') }}
            
                
            </div>
        @endif -->
        @include('layouts.partials.messages')

        <div class="form-group form-floating mb-3 ">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Email or Username</label>
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

        <div class="form-group mb-3">
            <label for="remember">Remember me</label>
            <input type="checkbox" name="remember" value="1">
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        
        <small class="d-block text-center mt-3">Not registered? <a href="{{url('/register')}}">Register Now!</a></small>
        <small class="d-block text-center mt-3"> <a href="{{url('/')}}">Homepage</a></small>
    </form>
@endsection
