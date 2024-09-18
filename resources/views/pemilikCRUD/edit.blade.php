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

<form action="{{ route('pemiliks.update',$pemiliks->id)  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namaPemilik">Nama Pemilik:</label>
                    <input type="text" name="nama_pemilik" class="form-control" value="{{old('nama_pemilik',$pemiliks->nama_pemilik)}}">
                </div>

                <div class="col">
                    <label for="alamatPemilik">Alamat Pemilik:</label>
                    <input type="text" name="alamat_pemilik" class="form-control" value="{{old('alamat_pemilik',$pemiliks->alamat_pemilik)}}">
                </div>

                
            </div>
       
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">tanggal_lahir :</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{old('tanggal_lahir',$pemiliks->tanggal_lahir)}}" >
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Jenis Kelamin :</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value={{$pemiliks->jenis_kelamin}}>
                            <option value="laki-laki" {{$pemiliks->jenis_kelamin=="laki-laki" ? 'selected' : '' }}>Laki-laki</option>
                            <option value="perempuan" {{$pemiliks->jenis_kelamin=="perempuan" ? 'selected' : '' }}>Perempuan</option>
                        </select>
                </div>

                <div class="col">
                    <label for="noTelp">Telepon :</label>
                    <input type="text" name="no_telp" class="form-control" value={{$pemiliks->no_telp}} >

                </div>
                
            </div>
               
           
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection