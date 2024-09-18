@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Edit jadwal </h3>
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

<form action="{{ route('jadwals.update',$jadwals->id) }}" method="POST" >
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
            <div class="col">
                    <label for="jenisKelamin">Hari :</label>
                        <select name="hari" id="hari" class="form-control" style="margin-bottom :10px;">
                        <option value="Senin" {{$jadwals->hari=="Senin" ? 'selected' : '' }}>Senin</option>
                        <option value="Selasa" {{$jadwals->hari=="Delasa" ? 'selected' : '' }}>Selasa</option>
                        <option value="Rabu" {{$jadwals->hari=="Rabu" ? 'selected' : '' }}>Rabu</option>
                        <option value="Kamis" {{$jadwals->hari=="Kamis" ? 'selected' : '' }}>Kamis</option>
                        <option value="Jumat" {{$jadwals->hari=="Jumat" ? 'selected' : '' }}>Jumat</option>
                        <option value="Sabtu" {{$jadwals->hari=="Sabtu" ? 'selected' : '' }}>Sabtu</option>
                        <option value="Minggu" {{$jadwals->hari=="Minggu" ? 'selected' : '' }}>Minggu</option>
                       
                        </select>
                </div>

              

                
            </div>
       
            <div class="row g-3" style="margin-bottom :10px;">
            <div class="col">
                    <label for="alamatjadwal">Jam Mulai:</label>
                    <input type="time" name="jam_awal" class="form-control" value="{{old('jam_awal',$jadwals->jam_awal)}}">
                </div>
                <div class="col">
                    <label for="alamatjadwal">Jam Selesai:</label>
                    <input type="time" name="jam_akhir" class="form-control" value="{{old('jam_akhir',$jadwals->jam_akhir)}}">
                </div>
            </div>
                   
                   

                    
               
            
            
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection