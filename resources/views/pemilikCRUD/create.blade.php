@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Tambah pemilik </h3>
    <div>
        <a href="{{ route('pemiliks.index') }}" class="btn btn-outline-secondary">Back</a>
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

<form action="{{ route('pemiliks.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namaPemilik">Nama Pemilik:</label>
                    <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik">
                </div>

                <div class="col">
                    <label for="alamatPemilik">Alamat Pemilik:</label>
                    <input type="text" name="alamat_pemilik" class="form-control" placeholder="Alamat Pemilik">
                </div>

                
            </div>
       
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">tanggal_lahir :</label>
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="tanggal lahir" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" style="margin-bottom :10px;">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                </div>

                <div class="col">
                    <label for="noTelp">Telepon :</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="telepon" style="margin-bottom :10px;">

                </div>
                
            </div>
                   
                   

                    
               
            
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection