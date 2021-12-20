@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Penduduk CRUD</h2>
    </div>
    <div>
        <a class="btn btn-outline-success" href="{{ route('penduduks.create') }}"> Tambah Penduduk</a>
        
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
        <th>Name</th>
        <th>RT</th>
        <th>RW</th>
        <th>No Telpon</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($penduduks))
    @foreach ($penduduks as $penduduk)
    <tr>
        <td class="center-text">{{$penduduk->id}}</td>
        <td>{{$penduduk->nama_depan}} {{$penduduk->nama_belakang}}</td>
        <td>{{$penduduk->RT}}</td>
        <td>{{$penduduk->RW}}</td>
        <td>{{$penduduk->no_telp}}</td>
        <td>{{$penduduk->tempat_lahir}}</td>
        <td>{{$penduduk->tanggal_lahir}}</td>
        

        <td class="center-text">
            <form action="{{ route('penduduks.destroy',$penduduk->id) }}" method="POST">

            <a class="btn btn-outline-success" href="{{ route('penduduks.show',$penduduk->id) }}">Show</a>

            <a class="btn btn-outline-primary" href="{{ route('penduduks.edit',$penduduk->id) }}">Edit</a>

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
        <td align="center" colspan="8">Empty Data!! Have a nice day :)</td> 
    </tr>   
    @endif
</table>
@endsection