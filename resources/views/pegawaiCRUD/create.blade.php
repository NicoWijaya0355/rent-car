@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Tambah pegawai </h3>
    <div>
        <a href="{{ route('pegawais.index') }}" class="btn btn-outline-secondary">Back</a>
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

<form action="{{ route('pegawais.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namapegawai">Nama Pegawai:</label>
                    <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama pegawai">
                </div>

                <div class="col">
                    <label for="alamatpegawai">Alamat Pegawai:</label>
                    <input type="text" name="alamat_pegawai" class="form-control" placeholder="Alamat pegawai">
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
                   
                   

                    
               
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" placeholder="email" style="margin-bottom :10px;">

            <label for="jenisKelamin">Jadwal :</label>
                        <select name="id_jadwal" id="jenis_kelamin" class="form-control" style="margin-bottom :10px;">
                        <option value="" selected disabled hidden>Pilih Jadwal Pegawai</option>
                                      @foreach($jadwals as $jadwal)
                                      <option value="{{ $jadwal->id }}">{{ $jadwal->hari }} : {{ $jadwal->jam_awal }} - {{ $jadwal->jam_akhir }}</option>
                                      @endforeach
                        </select>
            
            <label for="jenisKelamin">Role :</label>
            <select name="role" id="jenis_kelamin" class="form-control" style="margin-bottom :10px;">
                    <option value="" selected disabled hidden>Pilih Role</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Customer Service">Customer Service</option>
            </select>

            <div class="col">
                    <label for="noTelp">Foto :</label>
                    <input type="file" name="foto" class="form-control" placeholder="telepon" style="margin-bottom :10px;">

            </div>
            
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection