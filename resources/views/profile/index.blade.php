@extends('dashboard.dashboard')

@section('content')

   <div class="card">
    <div class="card-header">
        <h3>My Profile</h3>
    </div>


    <div class="card-body">
    
        <form >
        @include('layouts.partials.messages')
            <div class="mb-3">
                <label for="name">Name:</label>
                <h5>{{ old('name', Auth::user()->name) }}</h5>
                

                
            </div>

            <div class="mb-3">
                <label for="name">Username:</label>
                <h5>{{ old('name', Auth::user()->username) }}</h5>
                
            </div>

            <div class="mb-3">
                <label for="name">Email:</label>
                <h5>{{ old('name', Auth::user()->email) }}</h5>
            </div>

            
            <a class="btn btn-outline-success" href="{{ route('profile.update') }}">Edit Profile</a>
        </form>   
    </div>
</div>
    @endsection