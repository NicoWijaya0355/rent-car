@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil pegawai</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('pegawais.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
               
            <img src="{{ asset('/thumbnail/'.$pegawais->foto) }}" width="300px" height="300px" alt="Image"></img>
                <h5></h5>
                <label for="name">ID:</label>
                <h5>{{ $pegawais->id }}</h5>
                
                
            <label for="name">Nama pegawai:</label>
                <h5>{{ $pegawais->nama_pegawai }}</h5>

            <div class="mb-3">
                <label for="name">Alamat:</label>
                <h5>{{ $pegawais->alamat_pegawai }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal Lahir:</label>
                <h5>{{ $pegawais->tanggal_lahir }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Jenis Kelamin:</label>
                <h5>{{ $pegawais->jenis_kelamin }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Telepon:</label>
                <h5>{{ $pegawais->no_telp }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Email:</label>
                <h5>{{ $pegawais->email }}</h5>
            </div>

            
                
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection