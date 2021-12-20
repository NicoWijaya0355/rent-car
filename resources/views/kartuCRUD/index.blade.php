@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Kartu Keluarga CRUD</h2>
    </div>
    <div>
        <a class="btn btn-outline-success" href="{{ route('kartus.create') }}"> Tambah Kartu Keluarga</a>
        
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
        <th>Nama Kepala Keluarga</th>
        <th>RT</th>
        <th>RW</th>
        <th>Jumlah Anggota Keluarga</th>
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($kartus))
    @foreach ($kartus as $kartu)
    <tr>
        <td class="center-text">{{$kartu->id}}</td>
        <td>{{$kartu->kepala_keluarga}} </td>
        <td>{{$kartu->RT}}</td>
        <td>{{$kartu->RW}}</td>
        <td>{{$kartu->jumlah}}</td>
        
        

        <td class="center-text">
            <form action="{{ route('kartus.destroy',$kartu->id) }}" method="POST">

            <a class="btn btn-outline-success" href="{{ route('kartus.show',$kartu->id) }}">Show</a>

            <a class="btn btn-outline-primary" href="{{ route('kartus.edit',$kartu->id) }}">Edit</a>

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
        <td align="center" colspan="6">Empty Data!! Have a nice day :)</td> 
    </tr>   
    @endif
</table>
@endsection