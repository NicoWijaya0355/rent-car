@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil Mobil</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('mobils.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $mobils->id }}</h5>
                
                
            <label for="name">Nama Mobil:</label>
                <h5>{{ $mobils->nama_mobil }}</h5>

            <div class="mb-3">
                <label for="name">Tipe Mobil:</label>
                <h5>{{ $mobils->tipe_mobil }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Jenis Transmisi:</label>
                <h5>{{ $mobils->jenis_transmisi }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Warna Mobil:</label>
                <h5>{{ $mobils->warna_mobil }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Volume Bagasi:</label>
                <h5>{{ $mobils->volume_bagasi }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Fasilitas:</label>
                <h5>{{ $mobils->fasilitas }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Harga Sewa:</label>
                <h5>Rp. {{ $mobils->harga_sewa }}</h5>
            </div>
                
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection