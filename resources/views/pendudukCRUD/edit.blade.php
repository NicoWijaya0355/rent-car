@extends('dashboard.dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" 
crossorigin="anonymous">
<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Edit Penduduk</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('penduduks.index') }}">Back</a>
    </div>
    
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong>There were some problems with your input.<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('penduduks.update',$penduduks->id)  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namaDepan">Nama Depan :</label>
                    <input type="text" name="nama_depan" class="form-control" value={{$penduduks->nama_depan}}>
                </div>
                <div class="col">
                    <label for="namaDepan">Nama Depan :</label>
                    <input type="text" name="nama_belakang" class="form-control" value={{$penduduks->nama_belakang}}>
                </div>
            </div>
            <label for="RT">RT :</label>
            <input type="number" name="RT" class="form-control" value={{$penduduks->RT}}
                style="margin-bottom :10px;">

            <label for="RW">RW :</label>
            <input type="number" name="RW" class="form-control" value={{$penduduks->RW}}
                style="margin-bottom :10px;">
            <div class="row g3">
                <div class="col">
                    <label for="no_telp">No Telp :</label>
                    <input type="text" name="no_telp" class="form-control" value={{$penduduks->no_telp}}>
                </div>
                <div class="col">
                    <label for="tempat_lahir">Tempat Lahir :</label>
                    <input type="text" name="tempat_lahir" class="form-control" value={{$penduduks->tempat_lahir}}>
                </div>
                <div class="col">
                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value={{$penduduks->tanggal_lahir}}>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection