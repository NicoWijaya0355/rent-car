@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>Tambah Penduduk Baru</div>
    <div>
        <a href="{{ route('penduduks.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong>There were some problems with your input.<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('penduduks.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namaDepan">Nama Depan :</label>
                    <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan">
                </div>
                <div class="col">
                    <label for="namaDepan">Nama Belakang :</label>
                    <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang">
                </div>
            </div>
            <label for="RT">RT :</label>
            <input type="number" name="RT" class="form-control" placeholder="RT" style="margin-bottom :10px;">
           
            <label for="RW">RW :</label>
            <input type="number" name="RW" class="form-control" placeholder="RW" style="margin-bottom :10px;">
            <div class="row g3">

                <div class="col">
                    <label for="no_telp">No Telp :</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="Phone Number">
                </div>
                <div class="col">
                    <label for="tempat_lahir">Tempat Lahir :</label>
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Birth Place">
                </div>
                <div class="col">
                    <label for="tanggal_lahir">Tanggal Lahir :</label>
                    <input type="date" name="tanggal_lahir" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection