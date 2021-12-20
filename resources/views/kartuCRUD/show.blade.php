@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil Kartu Keluarga</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('kartus.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $kartus->id }}</h5>
                

                
            </div>

            <div class="mb-3">
                <label for="name">Kepala Keluarga:</label>
                <h5>{{ $kartus->kepala_keluarga }}</h5>
                
            </div>

            <div class="mb-3">
                <label for="name">RT:</label>
                <h5>{{ $kartus->RT }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">RW:</label>
                <h5>{{ $kartus->RW }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Jumlah Anggota Keluarga:</label>
                <h5>{{ $kartus->jumlah }} Orang</h5>
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection