@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Tambah mobil </h3>
    <div>
        <a href="{{ route('mobils.index') }}" class="btn btn-outline-secondary">Back</a>
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

<form action="{{ route('mobils.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namamobil">Nama Mobil:</label>
                    <input type="text" name="nama_mobil" class="form-control" placeholder="Nama mobil">
                </div>

                <div class="col">
                    <label for="alamatmobil">Tipe Mobil:</label>
                    <input type="text" name="tipe_mobil" class="form-control" placeholder="Tipe mobil">
                </div>
                
                
                
            </div>
       
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">Jenis Transmisi :</label>
                    <input type="text" name="jenis_transmisi" class="form-control" placeholder="jenis transmisi" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Jenis Bahan Bakar :</label>
                    <input type="text" name="jenis_bahan_bakar" class="form-control" placeholder="jenis bahan bakar" style="margin-bottom :10px;">
                </div>

                <div class="col">
                    <label for="noTelp">Warna Mobil :</label>
                    <input type="text" name="warna_mobil" class="form-control" placeholder="warna mobil" style="margin-bottom :10px;">

                </div>
                
            </div>
                   
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">Volume Bagasi :</label>
                    <input type="text" name="volume_bagasi" class="form-control" placeholder="volume bagasi" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Fasilitas :</label>
                    <input type="text" name="fasilitas" class="form-control" placeholder="fasilitas" style="margin-bottom :10px;">
                </div>

                <div class="col">
                    <label for="noTelp">Kapasitas(dalam jumlah orang) :</label>
                    <input type="number" name="kapasitas" class="form-control" placeholder="3 Orang" style="margin-bottom :10px;">

                </div>

                <div class="col">
                    <label for="noTelp">Harga Sewa/hari :</label>
                    <input type="number" name="harga_sewa" class="form-control" placeholder="200.000" style="margin-bottom :10px;">

                </div>
            </div>
                   
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">Plat Nomor :</label>
                    <input type="text" name="plat_nomor" class="form-control" placeholder="AB 2851 HI" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Nomor STNK :</label>
                    <input type="text" name="no_stnk" class="form-control" placeholder="No STNK" style="margin-bottom :10px;">
                </div>

                <div class="col">
                    <label for="noTelp">Kategori Aset :</label>
                    <input type="text" name="kategori_aset" class="form-control" placeholder="Milik AJR" style="margin-bottom :10px;">

                </div>

                
            </div>
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                        <label for="noTelp">Tanggal terakhir servis :</label>
                        <input type="date" name="tanggal_terakhir_servis" class="form-control" placeholder="12-02-2022" style="margin-bottom :10px;">

                    </div>
                    <div class="col">
                        <label for="noTelp">Tanggal mulai kontrak :</label>
                        <input type="date" name="tanggal_mulai_kontrak" class="form-control" placeholder="12-02-2022" style="margin-bottom :10px;">

                    </div>
                    <div class="col">
                        <label for="noTelp">Tanggal akhir kontrak :</label>
                        <input type="date" name="tanggal_akhir_kontrak" class="form-control" placeholder="12-02-2022" style="margin-bottom :10px;">

                    </div>
            </div>

                    
               
           
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>

@endsection