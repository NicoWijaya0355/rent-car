@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Aset CRUD</h2>
    </div>
   
    <div>
        <a class="btn btn-outline-success" href="{{ route('mobils.create') }}"> Tambah mobil</a>
        
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
        <th>Nama Mobil</th>
        <th>Tipe Mobil</th>
        <th>Jenis Transmisi</th>
        <th>Jenis Bahan Bakar</th>
        <th>Warna Mobil</th>
        <th>Volume Bagasi</th>
        <th>Fasilitas</th>
        <th>Harga Sewa</th>
       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($mobils))
    @foreach ($mobils as $mobil)
    <tr>
        <td class="center-text">{{$mobil->id}}</td>
        <td>{{$mobil->nama_mobil}} </td>
        <td>{{$mobil->tipe_mobil}}</td>
        <td>{{$mobil->jenis_transmisi}}</td>
        <td>{{$mobil->jenis_bahan_bakar}}</td>
        <td>{{$mobil->warna_mobil}}</td>
        <td>{{$mobil->volume_bagasi}}</td>
        <td>{{$mobil->fasilitas}}</td>
        <td>Rp.{{$mobil->harga_sewa}}</td>
        
        

        <td class="center-text">
            <form action="{{ route('mobils.destroy',$mobil->id) }}" method="POST">

            <a class="btn btn-outline-success" href="{{ route('mobils.show',$mobil->id) }}">Show</a>

            <a class="btn btn-outline-primary" href="{{ route('mobils.edit',$mobil->id) }}">Edit</a>

            <a class="btn btn-outline-primary" href="{{ route('mobil.kontrak',$mobil->id) }}">Kontrak</a>
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
        <td align="center" colspan="10">Data Kosong</td> 
    </tr>   
    @endif
</table>
@endsection