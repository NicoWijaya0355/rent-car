@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Edit mobil </h3>
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

<form action="{{ route('mobils.update',$mobils->id)  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namamobil">Nama Mobil:</label>
                    <input type="text" name="nama_mobil" class="form-control" value="{{$mobils->nama_mobil}}" >
                </div>

                <div class="col">
                    <label for="alamatmobil">Tipe Mobil:</label>
                    <input type="text" name="tipe_mobil" class="form-control" value="{{$mobils->tipe_mobil}}">
                </div>
                
                
                
            </div>
       
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">Jenis Transmisi :</label>
                    <input type="text" name="jenis_transmisi" class="form-control" value="{{$mobils->jenis_transmisi}}" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Jenis Bahan Bakar :</label>
                    <input type="text" name="jenis_bahan_bakar" class="form-control" value="{{$mobils->jenis_bahan_bakar}}" style="margin-bottom :10px;">
                </div>

                <div class="col">
                    <label for="noTelp">Warna Mobil :</label>
                    <input type="text" name="warna_mobil" class="form-control" value="{{$mobils->warna_mobil}}" style="margin-bottom :10px;">

                </div>
                
            </div>
                   
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">Volume Bagasi :</label>
                    <input type="text" name="volume_bagasi" class="form-control" value="{{$mobils->volume_bagasi}}" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Fasilitas :</label>
                    <input type="text" name="fasilitas" class="form-control" value="{{$mobils->fasilitas}}" style="margin-bottom :10px;">
                </div>

                <div class="col">
                    <label for="noTelp">Kapasitas(dalam jumlah orang) :</label>
                    <input type="number" name="kapasitas" class="form-control" value="{{$mobils->kapasitas}}" style="margin-bottom :10px;">

                </div>

                <div class="col">
                    <label for="noTelp">Harga Sewa/hari :</label>
                    <input type="number" name="harga_sewa" class="form-control" value="{{$mobils->harga_sewa}}" style="margin-bottom :10px;">

                </div>
            </div>
                   
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">Plat Nomor :</label>
                    <input type="text" name="plat_nomor" class="form-control" value="{{$mobils->plat_nomor}}" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="jenisKelamin">Nomor STNK :</label>
                    <input type="text" name="no_stnk" class="form-control" value="{{$mobils->no_stnk}}" style="margin-bottom :10px;">
                </div>

                <div class="col">
                    <label for="noTelp">Kategori Aset :</label>
                    <input type="text" name="kategori_aset" class="form-control" value="{{$mobils->kategori_aset}}" style="margin-bottom :10px;">

                </div>

                <div class="col">
                    <label for="noTelp">Tanggal terakhir servis :</label>
                    <input type="date" name="tanggal_terakhir_servis" class="form-control" value="{{$mobils->tanggal_terakhir_servis}}" style="margin-bottom :10px;">

                </div>
            </div>

                    
               
           
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection