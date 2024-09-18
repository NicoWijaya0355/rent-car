@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Pengembalian mobil</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{  route('transaksi.cek1',$transaksis->id) }}">Back</a>
    </div>
</div>


<div class="card-body">
    
    <form action="{{ route('transaksi.denda',$transaksis->id)  }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $transaksis->id }}</h5>

                <label for="name">Waktu Pengembalian Mobil:</label>
                <h5>{{ $transaksis->pengembalian_mobil }}</h5>
                
                
                <label for="name">Denda: </label>
                    <?php
                  
                     $jam = (int)(round(strtotime($transaksis->tanggal_waktu_selesai_sewa) - strtotime($transaksis->pengembalian_mobil))/3600);
                     $jam=$jam * -1;
                     if($jam >= 3 && $jam < 25){
                         $transaksis->jumlah_pembayaran=$transaksis->harga_sewa_perhari;
                     }else if($jam >27 && $jam<51) {
                        $hari=2;

                     }else{
                         $jam=$jam-3;
                         $hari= $jam/24;
                         $hari=$hari+1;

                     }
                    
                    //  $transaksis->jumlah_pembayaran=$total;
                    $denda=$transaksis->harga_sewa_perhari  * 2;
                    ?>
                   
                       
                    @if($jam >= 3)
                    <h5> Denda : Rp.<?php echo $denda;?></h5>

                    @else
                    <h5> Denda : Rp.0</h5>
                    
                    @endif


                   
                    
               
        
        
            </div>

                
            </div>

            
         
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="Bayar" class="btn btn-outline-primary">Ok</button>
           
        </div>
        </form> 

    </div>
    
</div>


@endsection