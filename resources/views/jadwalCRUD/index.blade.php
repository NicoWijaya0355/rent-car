@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Jadwal CRUD</h2>
    </div>
   
    <div>
        <a class="btn btn-outline-success" href="{{ route('jadwals.create') }}"> Tambah Jadwal</a>
      
    </div>

    
</div>

<div class="row ">
        <div class="col-mb-6">
            <form action="">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" placeholder="Search by day" name="search" >
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
        <th>Hari</th>
        <th>Waktu</th>
        
       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($jadwals))
    @foreach ($jadwals as $jadwal)
    <tr>
        <td class="center-text">{{$jadwal->id}}</td>
        <td>{{$jadwal->hari}} </td>
        <td>{{$jadwal->jam_awal}} - {{$jadwal->jam_akhir}}</td>
       
        

        <td class="center-text">
            <form action="{{ route('jadwals.destroy',$jadwal->id) }}" method="POST">

            <a class="btn btn-outline-success" href="{{ route('jadwals.show',$jadwal->id) }}">Show</a>

            <a class="btn btn-outline-primary" href="{{ route('jadwals.edit',$jadwal->id) }}">Edit</a>

        
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
        <td align="center" colspan="3">Empty Data!! Have a nice day :)</td> 
    </tr>   
    @endif
</table>
@endsection