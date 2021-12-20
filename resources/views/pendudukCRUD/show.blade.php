@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil Penduduk</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('penduduks.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $penduduks->id }}</h5>
                

                
            </div>

            <div class="mb-3">
                <label for="name">Nama Penduduk:</label>
                <h5>{{ $penduduks->nama_depan }} {{ $penduduks->nama_belakang }}</h5>
                
            </div>

            <div class="mb-3">
                <label for="name">RT:</label>
                <h5>{{ $penduduks->RT }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">RW:</label>
                <h5>{{ $penduduks->RW }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">No Telpon:</label>
                <h5>{{ $penduduks->no_telp }} </h5>
            </div>

            <div class="mb-3">
                <label for="name">Tempat Lahir:</label>
                <h5>{{ $penduduks->tempat_lahir }} </h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal Lahir:</label>
                <h5>{{ $penduduks->tanggal_lahir }} </h5>
            </div>
          
        </form>   
    </div>
</div>
@endsection