@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>Tambah Kartu Keluarga</div>
    <div>
        <a href="{{ route('kartus.index') }}" class="btn btn-outline-secondary">Back</a>
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

<form action="{{ route('kartus.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="kepalaKeluarga">Nama Kepala Keluarga :</label>
                    <input type="text" name="kepala_keluarga" class="form-control" placeholder="Nama Kepala Keluarga">
                </div>
            </div>
            <div class="col">
                    <label for="RT">RT :</label>
                    <input type="number" name="RT" class="form-control" placeholder="RT" style="margin-bottom :10px;">
                
                    <label for="RW">RW :</label>
                    <input type="number" name="RW" class="form-control" placeholder="RW" style="margin-bottom :10px;">

                </div>
            <label for="email">Jumlah Anggota Keluarga :</label>
            <input type="number" name="jumlah" class="form-control" placeholder="jumlah" style="margin-bottom :10px;">
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection