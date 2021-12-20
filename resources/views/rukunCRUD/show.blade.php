@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Show Faculty</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('rukuns.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $rukuns->id }}</h5>
                

                
            </div>

            <div class="mb-3">
                <label for="name">kepala RT:</label>
                <h5>{{ $rukuns->kepala_rukun }}</h5>
                
            </div>

            <div class="mb-3">
                <label for="name">RT:</label>
                <h5>{{ $rukuns->RT }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Jumlah Kartu Keluarga:</label>
                <h5>{{ $rukuns->jumlah_kartu }} Kartu Keluarga</h5>
            </div>

            <div class="mb-3">
                <label for="name">Jumlah Penduduk:</label>
                <h5>{{ $rukuns->jumlah_penduduk }} Orang </h5>
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection