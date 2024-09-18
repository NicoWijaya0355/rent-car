@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Edit driver </h3>
    <div>
        <a href="{{ route('drivers.index') }}" class="btn btn-outline-secondary">Back</a>
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

<form action="{{ route('drivers.update',$drivers->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namaDriver">Nama Driver:</label>
                    <input type="text" name="nama_driver" class="form-control" value="{{ $drivers->nama_driver }}">
                </div>

                <div class="col">
                    <label for="alamatDriver">Alamat Driver:</label>
                    <input type="text" name="alamat_driver" class="form-control" value="{{ $drivers->alamat_driver }}">
                </div>

                
            </div>
       
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">tanggal_lahir :</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $drivers->tanggal_lahir }}" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" style="margin-bottom :10px;">
                            <option value="laki-laki" {{$drivers->jenis_kelamin=="laki-laki" ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{$drivers->jenis_kelamin=="perempuan" ? 'selected' : '' }}>Perempuan</option>
                        </select>
                </div>

                <div class="col">
                    <label for="noTelp">Telepon :</label>
                    <input type="text" name="no_telp" class="form-control"  value="{{ $drivers->no_telp }}" style="margin-bottom :10px;">

                </div>
                
            </div>
                   
                   

                    
               
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" value="{{ $drivers->email }}" style="margin-bottom :10px;">

            <label for="email">Tarif:</label>
            <input type="number" name="tarif" class="form-control" value="{{ $drivers->tarif }}" style="margin-bottom :10px;">

            <div class="col">
                    <label for="jenisKelamin">Bahasa :</label>
                        <select name="bahasa" id="jenis_kelamin" class="form-control" style="margin-bottom :10px;">
                            <option value="Indonesia" {{$drivers->bahasa=="Indonesia" ? 'selected' : '' }}>Indonesia</option>
                            <option value="Inggris" {{$drivers->bahasa=="Inggris" ? 'selected' : '' }}>Inggris</option>
                            <option value="Indonesia dan Inggris" {{$drivers->bahasa=="Indonesia dan Inggris" ? 'selected' : '' }}>Indonesia dan Inggris</option>
                        </select>
                </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection