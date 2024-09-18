@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Riwayat Transaksi  </h2>
    </div>
   
    <div>
        <a class="btn btn-outline-success" href="{{ route('customers.index') }}"> Back</a>
        
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
        <th>Nama Customer</th>
        <th>Tanggal Transaksi</th>
        <th>Mobil Sewa ID </th>
        <th>Tanggal Waktu Mulai Sewa</th>
        <th>Tanggal Waktu Selesai Sewa</th>
        <th> Status Transaksi</th>
        
       
        
        
    </tr>
    @if(count($transaksis))
    @foreach ($transaksis as $transaksi)
 
    <tr>
        <td class="center-text">{{$transaksi->id}}</td>
        <td>{{$transaksi->nama_customer}} </td>
        <td>{{$transaksi->tanggal_transaksi}}</td>
        <td>{{$transaksi->mobil->nama_mobil}}</td>
        <td>{{$transaksi->tanggal_waktu_mulai_sewa}}</td>
        <td>{{$transaksi->tanggal_waktu_selesai_sewa}}</td>
        <td>{{$transaksi->status_transaksi}}</td>
        
        
        

       
    </tr>   
  
    @endforeach
    @else
    <tr>
        <td align="center" colspan="7">Empty Data!! Have a nice day :)</td> 
    </tr>   
    @endif
</table>
@endsection