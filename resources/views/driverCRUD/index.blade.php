@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Riwayat Driver</h2>
    </div>
   @if(auth()->user()->level=="Admin")
    <div>
        <a class="btn btn-outline-success" href="{{ route('drivers.create') }}"> Tambah Driver</a>
      
    </div>
    @endif
    
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
        <th>Alamat</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>No_telp</th>
        <th>Tarif</th>
        <th>Bahasa</th>
        <th>Status</th>
       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($drivers))
    @foreach ($drivers as $driver)
    <tr>
        <td class="center-text">{{$driver->id}}</td>
        <td>{{$driver->nama_driver}} </td>
        <td>{{$driver->alamat_driver}}</td>
        <td>{{$driver->tanggal_lahir}}</td>
        <td>{{$driver->jenis_kelamin}}</td>
        <td>{{$driver->email}}</td>
        <td>{{$driver->no_telp}}</td>
        <td>Rp.{{$driver->tarif}}</td>
        <td>{{$driver->bahasa}}</td>
        <td>{{$driver->status}}</td>
        

        <td class="center-text">
            <form action="{{ route('drivers.destroy',$driver->id) }}" method="POST">
            @if(auth()->user()->level=="Admin")
            <a class="btn btn-outline-success" href="{{ route('drivers.show',$driver->id) }}">Show</a>

            <a class="btn btn-outline-primary" href="{{ route('drivers.edit',$driver->id) }}">Edit</a>
           
            @csrf
            @method('DELETE')

                <button type="submit" class="btn btn-outline-danger" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete<button>
            @endif

            @if(auth()->user()->level=="Driver")
            <a class="btn btn-outline-primary" href="{{ route('driver.riwayat',$driver->id) }}">Riwayat</a>   
            @endif
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