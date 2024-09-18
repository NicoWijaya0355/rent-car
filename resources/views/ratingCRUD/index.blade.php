@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Rating CRUD</h2>
    </div>
   
    <div>
        <a class="btn btn-outline-success" href="{{ route('ratings.create') }}"> Tambah Rating</a>
      
    </div>

    
</div>

<div class="row ">
        <div class="col-mb-6">
            <form action="">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Search" name="search" >
                    <button class="btn btn-outline-primary" type="submit" >Search</button>
                </div>
            </form>
        </div>
    </div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th witdh="20px" class="text-center">No</th>
        <th>Nama Driver</th>
        <th>Rating</th>
        
        
        
        
       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($ratings))
    @foreach ($ratings as $rating)
    <tr>
        <td class="center-text">{{$rating->id}}</td>
        <td>{{$rating->driver->nama_driver}} </td>
        <td>{{$rating->rating}}</td>
        
        
       
        

        <td class="center-text">
            <!-- <form action="{{ route('ratings.destroy',$rating->id) }}" method="POST"> -->

            <a class="btn btn-outline-success" href="{{ route('ratings.rata',$rating->id) }}">Show</a>

            <!-- <a class="btn btn-outline-primary" href="{{ route('ratings.edit',$rating->id) }}">Edit</a>

        
            @csrf
            @method('DELETE')

                <button type="submit" class="btn btn-outline-danger" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete<button> -->
                    
            <!-- </form> -->
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td align="center" colspan="9">Empty Data!! Have a nice day :)</td> 
    </tr>   
    @endif
</table>
@endsection