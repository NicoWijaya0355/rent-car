@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil pemilik</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('pemiliks.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $pemiliks->id }}</h5>
                
                
            <label for="name">Nama pemilik:</label>
                <h5>{{ $pemiliks->nama_pemilik }}</h5>

            <div class="mb-3">
                <label for="name">Alamat:</label>
                <h5>{{ $pemiliks->alamat_pemilik }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal Lahir:</label>
                <h5>{{ $pemiliks->tanggal_lahir }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Telepon:</label>
                <h5>{{ $pemiliks->no_telp }}</h5>
            </div>



            
                
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection