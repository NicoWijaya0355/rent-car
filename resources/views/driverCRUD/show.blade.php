@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil driver</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('drivers.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $drivers->id }}</h5>
                
                
            <label for="name">Nama driver:</label>
                <h5>{{ $drivers->nama_driver }}</h5>

            <div class="mb-3">
                <label for="name">Alamat:</label>
                <h5>{{ $drivers->alamat_driver }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal Lahir:</label>
                <h5>{{ $drivers->tanggal_lahir }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Jenis Kelamin:</label>
                <h5>{{ $drivers->jenis_kelamin }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Telepon:</label>
                <h5>{{ $drivers->no_telp }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Email:</label>
                <h5>{{ $drivers->email }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tarif:</label>
                <h5>Rp.{{ $drivers->tarif }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Bahasa:</label>
                <h5>{{ $drivers->bahasa }}</h5>
            </div>
            
                
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection