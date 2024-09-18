@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil rating</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('ratings.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
               
           
                <h5></h5>
                <label for="name">ID:</label>
                <h5>{{ $ratings->id }}</h5>
                
                
            <label for="name">Nama Driver:</label>
                <h5>{{ $ratings->driver->nama_driver}}</h5>

            <div class="mb-3">
                <label for="name">Rata-Rata Rating:</label>
                <h5>{{ $ratings->rata}}</h5>
            </div>

           

            

            
                
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection