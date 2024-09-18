@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Pemilik CRUD</h2>
    </div>
   
    <div>
        <a class="btn btn-outline-success" href="{{ route('pemiliks.create') }}"> Tambah Pemilik</a>
      
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
        <th>Nama Pemilik</th>
        <th>Alamat</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>

        <th>No_telp</th>

       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($pemiliks))
    @foreach ($pemiliks as $pemilik)
    <tr>
        <td class="center-text">{{$pemilik->id}}</td>
        <td>{{$pemilik->nama_pemilik}} </td>
        <td>{{$pemilik->alamat_pemilik}}</td>
        <td>{{$pemilik->tanggal_lahir}}</td>
        <td>{{$pemilik->jenis_kelamin}}</td>
        <td>{{$pemilik->no_telp}}</td>
        

        <td class="center-text">
            <form action="{{ route('pemiliks.destroy',$pemilik->id) }}" method="POST">

           
            <a class="btn btn-outline-success" href="{{ route('pemiliks.show',$pemilik->id) }}">Show</a>
           
            <a class="btn btn-outline-primary" href="{{ route('pemiliks.edit',$pemilik->id) }}">Edit</a>
                               
              
            @csrf
            @method('DELETE')

                <button type="submit" class="btn btn-outline-danger" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete<button>
           

           
            </form>
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