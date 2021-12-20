@extends('dashboard.dashboard')


@section('content')

<div class="card">
    <div class="card-header"><h3>Edit Profile</h3></div>
  
   
        
    
    <div class="card-body">
    
        <form action="{{ route('profile.update') }}" method="POST">
            @method('PUT')
            @csrf
<!-- 
            @if(session()->has('success'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>

            @endif -->
            @include('layouts.partials.messages')
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" >

                
            </div>

            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ old('name', Auth::user()->username) }}" >

                
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" >
            </div>

            <button type="submit" class="btn btn-outline-success">Profile Update</button>
            
            <a href="{{ route('show.index') }}" class="btn btn-outline-danger">Cancel</a>
      
    
        </form>   
    </div>
</div>

@endsection

