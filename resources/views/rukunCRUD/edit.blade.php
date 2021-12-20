@extends('dashboard.dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" 
crossorigin="anonymous">
<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Edit RT</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('rukuns.index') }}">Back</a>
    </div>
    
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong>There were some problems with your input.<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('rukuns.update',$rukuns->id)  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="kepalaRukun">Nama Ketua RT :</label>
                    <input type="text" name="kepala_rukun" class="form-control" value={{$rukuns->kepala_rukun}}>
                </div>
               
            </div>
            <label for="RT">RT :</label>
            <input type="number" name="RT" class="form-control" value={{$rukuns->RT}}
                style="margin-bottom :10px;">

            <label for="jumlahKartu">Jumlah Kartu Keluarga :</label>
            <input type="number" name="jumlah_kartu" class="form-control" value={{$rukuns->jumlah_kartu}}
                style="margin-bottom :10px;">
            
            <label for="jumlahPenduduk">Jumlah Penduduk :</label>
            <input type="number" name="jumlah_penduduk" class="form-control" value={{$rukuns->jumlah_penduduk}}
                style="margin-bottom :10px;">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>
@endsection