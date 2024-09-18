@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>pegawai CRUD</h2>
    </div>
   
    <div>
        <a class="btn btn-outline-success" href="{{ route('pegawais.create') }}"> Tambah pegawai</a>
      
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
        <th>Nama Pegawai</th>
        <th>Alamat</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>No_telp</th>
        <th>ID Jadwal</th>
        <th>Foto</th>
        
       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($pegawais))
    @foreach ($pegawais as $pegawai)
    <tr>
        <td class="center-text">{{$pegawai->id}}</td>
        <td>{{$pegawai->nama_pegawai}} </td>
        <td>{{$pegawai->alamat_pegawai}}</td>
        <td>{{$pegawai->tanggal_lahir}}</td>
        <td>{{$pegawai->jenis_kelamin}}</td>
        <td>{{$pegawai->email}}</td>
        <td>{{$pegawai->no_telp}}</td>
        <td>{{$pegawai->id_jadwal}}</td>
        <td>
            <img src="{{ asset('/thumbnail/'.$pegawai->foto) }}" width="70px" height="70px" alt="Image">
        </td>
        

        <td class="center-text">
            

            <a class="btn btn-outline-success" href="{{ route('layanans.show',$pegawai->id) }}">Show</a>



        
          
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