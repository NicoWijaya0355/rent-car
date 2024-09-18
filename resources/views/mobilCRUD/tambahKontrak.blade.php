@extends('dashboard.dashboard')

@section('content')


<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2> Perbaharui Kontrak</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('mobils.index') }}">Back</a>
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
                <label for="name">ID:</label>
                <h5>{{ $mobils->id }}</h5>
<form action="{{ route('mobil.kontrakUpdate',$mobils->id)  }}" method="POST">
    @csrf
    @method('PUT')
    <div class="col">
                    <label for="noTelp">Tanggal Awal Kontrak :</label>
                    <input type="date" name="tanggal_mulai_kontrak" class="form-control" value={{$mobils->tanggal_mulai_kontrak }} style="margin-bottom :10px;">

                    <label for="noTelp">Tanggal Akhir Kontrak :</label>
                    <input type="date" name="tanggal_akhir_kontrak" class="form-control" value={{$mobils->tanggal_akhir_kontrak }} style="margin-bottom :10px;">
                   
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Update</button>
        </div>
     </div>
</form>

@endsection