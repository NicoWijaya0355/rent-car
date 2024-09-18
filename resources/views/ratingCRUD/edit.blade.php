@extends('dashboard.dashboard')
@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Edit promo </h3>
    <div>
        <a href="{{ route('promos.index') }}" class="btn btn-outline-secondary">Back</a>
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

<form action="{{ route('promos.update',$promos->id) }}" method="POST" >
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namapromo">Kode Promo:</label>
                    <input type="text" name="kode" class="form-control" value="{{$promos->kode}}">
                </div>

                <div class="col">
                    <label for="alamatpromo">Jenis Promo:</label>
                    <input type="text" name="jenis_promo" class="form-control" value="{{$promos->jenis_promo}}">
                </div>

                
            </div>
       
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="tanggalLahir">Keterangan :</label>
                    <input type="text" name="keterangan" class="form-control" value="{{$promos->keterangan}}" style="margin-bottom :10px;">
                
                </div>

                <div class="col">
                    <label for="noTelp">Potongan dalam % :</label>
                    <input  type="number" name="potongan" class="form-control" value="{{$promos->potongan}}" style="margin-bottom :10px;">

                </div>                              
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection