@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>transaksi CRUD</h2>
    </div>
   
    <div>
        <a class="btn btn-outline-success" href="{{ route('transaksis.create') }}"> Tambah transaksi</a>
        
    </div>
</div>
@if(auth()->user()->level=="Customer")
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
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th witdh="20px" class="text-center">No</th>
        <th>Nama Customer</th>
        <th>Tanggal Transaksi</th>
        <th>Mobil Sewa ID</th>
        <th>Tanggal Waktu Mulai Sewa</th>
        <th>Tanggal Waktu Selesai Sewa</th>
        <th> Status Transaksi</th>
        
       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($transaksis))
    @foreach ($transaksis as $transaksi)
   
    <tr>
        <td class="center-text">{{$transaksi->id}}</td>
        <td>{{$transaksi->nama_customer}} </td>
        <td>{{$transaksi->tanggal_transaksi}}</td>
        <td>{{$transaksi->mobil_sewa}}</td>
        <td>{{$transaksi->tanggal_waktu_mulai_sewa}}</td>
        <td>{{$transaksi->tanggal_waktu_selesai_sewa}}</td>
        <td>{{$transaksi->status_transaksi}}</td>
      
      
        
        
        
        
        

        <td class="center-text">
            
                @if(auth()->user()->level=="Customer")
                <a class="btn btn-outline-success" href="{{ route('transaksis.show',$transaksi->id) }}">Show</a>
                @endif         

                @if(auth()->user()->level=="Customer Service")
                <a class="btn btn-outline-primary" href="{{ route('transaksis.edit',$transaksi->id) }}">Edit</a>

                <a class="btn btn-outline-primary" href="{{ route('transaksi.denda',$transaksi->id) }}">Pengembalian</a>

                <a class="btn btn-outline-primary" href="{{ route('transaksi.verifikasi',$transaksi->id) }}">Verifikasi</a>

                <a class="btn btn-outline-primary" href="{{ route('transaksi.bayar',$transaksi->id) }}">Bayar</a>
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-outline-danger" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete<button>
                @endif
        </td>
    </tr>   
  
    @endforeach
    @else
    <tr>
        <td align="center" colspan="7">Empty Data!! Have a nice day :)</td> 
    </tr>   
    @endif
</table>
@endsection