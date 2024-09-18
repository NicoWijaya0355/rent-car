@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Tambah jadwal </h3>
    <div>
        <a href="{{ route('jadwals.index') }}" class="btn btn-outline-secondary">Back</a>
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

<form action="{{ route('jadwals.store') }}" method="POST" >
    @csrf
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
            <div class="col">
                    <label for="jenisKelamin">Hari :</label>
                        <select name="hari" id="hari" class="form-control" style="margin-bottom :10px;">
                        <option value="" selected disabled hidden>Pilih Hari</option>
                        <option value="Senin" >Senin</option>
                        <option value="Selasa" >Selasa</option>
                        <option value="Rabu" >Rabu</option>
                        <option value="Kamis" >Kamis</option>
                        <option value="Jumat" >Jumat</option>
                        <option value="Sabtu" >Sabtu</option>
                        <option value="Minggu" >Minggu</option>
                       
                        </select>
                </div>

              

                
            </div>
       
            <div class="row g-3" style="margin-bottom :10px;">
            <div class="col">
                    <label for="alamatjadwal">Jam Mulai:</label>
                    <input type="time" name="jam_awal" class="form-control" >
                </div>
                <div class="col">
                    <label for="alamatjadwal">Jam Selesai:</label>
                    <input type="time" name="jam_akhir" class="form-control" >
                </div>
            </div>
                   
                   

                    
               
            
            
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection