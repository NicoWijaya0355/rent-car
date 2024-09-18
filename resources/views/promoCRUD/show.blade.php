@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil promo</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('promos.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
               
           
                <h5></h5>
                <label for="name">ID:</label>
                <h5>{{ $promos->id }}</h5>
                
                
            <label for="name">Kode Promo:</label>
                <h5>{{ $promos->kode }}</h5>

            <div class="mb-3">
                <label for="name">Jenis Promo:</label>
                <h5>{{ $promos->jenis_promo }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Keterangan:</label>
                <h5>{{ $promos->keterangan }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Potongan:</label>
                <h5>{{ $promos->potongan }}%</h5>
            </div>

            

            
                
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection