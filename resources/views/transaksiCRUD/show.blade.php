@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil transaksi</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('transaksis.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $transaksis->id }}</h5>
                
                
            <label for="name">Nama Customer:</label>
                <h5>{{ $transaksis->nama_customer }}</h5>

            <div class="mb-3">
                <label for="name">No KTP:</label>
                <h5>{{ $transaksis->no_ktp }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal Transaksi:</label>
                <h5>{{ $transaksis->tanggal_transaksi}}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal & Waktu Mulai Sewa:</label>
                <h5>{{ $transaksis->tanggal_waktu_mulai_sewa }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal & Waktu Selesai Sewa:</label>
                <h5>{{ $transaksis->tanggal_waktu_selesai_sewa }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Mobil Sewa:</label>
                <h5>{{ $transaksis->mobil->nama_mobil }}</h5>
            </div>
            @if($transaksis->driver_id !=null)
            <div class="mb-3">
                <label for="name">Nama Driver:</label>
                <h5>{{ $transaksis->driver->nama_driver }}</h5>
            </div>
            @endif
            <div class="mb-3">
                <label for="name">No Plat Mobil:</label>
                <h5>{{ $transaksis->no_plat_mobil }}</h5>
            </div>
                
            <div class="mb-3">
                <label for="name">Metode Pembayaran:</label>
                <h5>{{ $transaksis->metode_pembayaran }}</h5>
            </div>
          
            <div class="mb-3">
                <label for="name">Verifikasi Dokumen:</label>
                <h5>{{ $transaksis->verifikasi_dokumen }}</h5>
            </div>
            <div class="mb-3">
                <label for="name">Status Transaksi:</label>
                <h5>{{ $transaksis->status_transaksi }}</h5>
            </div>
            <div class="mb-3">
                <label for="name">Jenis Transaksi:</label>
                <h5>{{ $transaksis->jenis_transaksi }}</h5>
            </div>
           
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection