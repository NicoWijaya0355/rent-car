@extends('dashboard.dashboard')

@section('content')
@if($transaksis->status_transaksi == 'belum bayar')
<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Pembayaran</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('transaksis.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form action="{{ route('transaksi.bayarUpdate',$transaksis->id)  }}" method="POST">
            @csrf
            @method('PUT')
      
            <div class="mb-3">
                <label for="name">ID:{{ $transaksis->id }}</label>
           			<h5></h5>
                
                
                <label for="name">Total Harga: </label>
                    <?php
                     $a = (int)$transaksis->harga_sewa_perhari;
                     $hari = (int)(round(strtotime($transaksis->tanggal_waktu_selesai_sewa) - strtotime($transaksis->tanggal_waktu_mulai_sewa))/86400);
                     
                     if($transaksis->driver_sewa == null){
                         $driver = 0;
                     }else{
                         $driver = $transaksis->tarif_driver;
                     }
                     $total =($a *$hari) + $driver ;
                    //  $transaksis->jumlah_pembayaran=$total;
                   
                    ?>
                    @php
                    $transaksis->jumlah_pembayaran=$total;
                    @endphp
                       
                    <h5>Harga sewa Perhari: Rp.{{ $transaksis->harga_sewa_perhari }}</h5>
                    <h5>Lama Hari Sewa : <?php echo $hari; ?> hari</h5>
                        @if(($transaksis->driver_sewa != null ))
                            <h5>Tarif Driver: Rp.{{ $transaksis->tarif_driver }}</h5>
                        
                        @endif
                    <h5>Total: Rp.<?php echo $total;?></h5>
               
        
        
            </div>

                
            </div>

            

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="Bayar" class="btn btn-outline-primary">Bayar</button>
        </div>
        </form>   

    </div>
    
</div>
@else
<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2> Sudah Bayar</h2>
       
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('transaksis.index') }}">Back</a>
    </div>
</div>
@endif
@endsection