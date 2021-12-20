@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>RT CRUD</h2>
    </div>
    <div>
        <a class="btn btn-outline-success" href="{{ route('rukuns.create') }}"> Tambah RT</a>
        
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
        <th>Nama Ketua RT</th>
        <th>RT</th>
        <th>Jumlah Kartu Keluarga</th>
        <th>Jumlah Penduduk</th>
        
        <th width="280px" class="text-center">Action</th>
    </tr>
    @if(count($rukuns))
    @foreach ($rukuns as $rukun)
    <tr>
        <td class="center-text">{{$rukun->id}}</td>
        <td>{{$rukun->kepala_rukun}} </td>
        <td>{{$rukun->RT}}</td>
        <td>{{$rukun->jumlah_kartu}}</td>
        <td>{{$rukun->jumlah_penduduk}}</td>
       
        

        <td class="center-text">
            <form action="{{ route('rukuns.destroy',$rukun->id) }}" method="POST">

            <a class="btn btn-outline-success" href="{{ route('rukuns.show',$rukun->id) }}">Show</a>

            <a class="btn btn-outline-primary" href="{{ route('rukuns.edit',$rukun->id) }}">Edit</a>

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