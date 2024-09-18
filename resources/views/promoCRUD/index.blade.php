@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Promo CRUD</h2>
    </div>
   @if(auth()->user()->level=="Manager")
    <div>
        <a class="btn btn-outline-success" href="{{ route('promos.create') }}"> Tambah Promo</a>
      
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
        <th>Kode</th>
        <th>Jenis</th>
        <th>Keterangan</th>
        <th>Potongan</th>
        
        
       
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($promos))
    @foreach ($promos as $promo)
    <tr>
        <td class="center-text">{{$promo->id}}</td>
        <td>{{$promo->kode}} </td>
        <td>{{$promo->jenis_promo}}</td>
        <td>{{$promo->keterangan}}</td>
        <td>{{$promo->potongan}}%</td>
        
       
        

        <td class="center-text">
            <form action="{{ route('promos.destroy',$promo->id) }}" method="POST">

            @if(auth()->user()->level=="Manager" || auth()->user()->level=="Customer")
            <a class="btn btn-outline-success" href="{{ route('promos.show',$promo->id) }}">Show</a>
            @endif

            @if(auth()->user()->level=="Manager")
            <a class="btn btn-outline-primary" href="{{ route('promos.edit',$promo->id) }}">Edit</a>

        
            @csrf
            @method('DELETE')

                <button type="submit" class="btn btn-outline-danger" 
                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete<button>
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