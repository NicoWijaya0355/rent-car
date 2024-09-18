@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil jadwal</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('jadwals.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
               
            
                <h5></h5>
                <label for="name">ID:</label>
                <h5>{{ $jadwals->id }}</h5>
                
                
            <label for="name">Hari:</label>
                <h5>{{ $jadwals->hari }}</h5>

            <div class="mb-3">
                <label for="name">Waktu:</label>
                <h5>{{ $jadwals->jam_awal }} - {{ $jadwals->jam_akhir }}</h5>
            </div>

          

            
                
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection