@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>Tambah RT</div>
    <div>
        <a href="{{ route('rukuns.index') }}" class="btn btn-outline-secondary">Back</a>
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

<form action="{{ route('rukuns.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="kepalaRukun">Nama Ketua RT :</label>
                    <input type="text" name="kepala_rukun" class="form-control" placeholder="Nama Ketua RT">
                </div>
            </div>
            <label for="RT">RT :</label>
            <input type="number" name="RT" class="form-control" placeholder="RT" style="margin-bottom :10px;">
            
            <label for="jumlahKartu">Jumlah Kartu Keluarga:</label>
            <input type="number" name="jumlah_kartu" class="form-control" placeholder="Jumlah Kartu Keluarga" style="margin-bottom :10px;">

            <label for="jumlahPenduduk">Jumlah Penduduk :</label>
            <input type="number" name="jumlah_penduduk" class="form-control" placeholder="Jumlah Penduduk" style="margin-bottom :10px;">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection