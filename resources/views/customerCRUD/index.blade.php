@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Customer CRUD</h2>
    </div>
    @if(auth()->user()->level=="Customer Service")
    <div>
        <a class="btn btn-outline-success" href="{{ route('customers.create') }}"> Tambah Customer</a>
      
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
        <th>Nama Customer</th>
        <th>Alamat</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>No_telp</th>
        <th>Status Data</th>
       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($customers))
    @foreach ($customers as $customer)
    <tr>
        <td class="center-text">{{$customer->id}}</td>
        <td>{{$customer->nama_customer}} </td>
        <td>{{$customer->alamat_customer}}</td>
        <td>{{$customer->tanggal_lahir}}</td>
        <td>{{$customer->jenis_kelamin}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->no_telp}}</td>
        <td>{{$customer->status_data}}</td>
        

        <td class="center-text">
            <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">

            @if(auth()->user()->level=="Customer Service")
            <a class="btn btn-outline-success" href="{{ route('customers.show',$customer->id) }}">Show</a>
           
            <a class="btn btn-outline-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
                               
            <a class="btn btn-outline-info"  href="{{ route('customer.export',$customer->id) }}">Cetak Kartu</a>
              
            @csrf
            @method('DELETE')

                <button type="submit" class="btn btn-outline-danger" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete<button>
            @endif

            @if(auth()->user()->level=="Admin")
            <a class="btn btn-outline-primary" href="{{ route('customer.verifikasi',$customer->id) }}">Verfikasi</a>
            @endif

            @if(auth()->user()->level=="Customer")
            <a class="btn btn-outline-primary" href="{{ route('customer.riwayat',$customer->nama_customer) }}">Riwayat</a>
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