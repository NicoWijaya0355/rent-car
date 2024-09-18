@extends('dashboard.dashboard')

@section('content')
<?php
 $sisa = (int)(round(strtotime($mobils->tanggal_akhir_kontrak) - strtotime($mobils->tanggal_mulai_kontrak))/86400);
                     
?>
@if($sisa >= 1)
<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Kontrak</h2>
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
                <label for="name">Tanggal Mulai Kontrak:</label>
                <h5>{{ $mobils->tanggal_mulai_kontrak }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal Akhir Kontrak:</label>
                <h5>{{ $mobils->tanggal_akhir_kontrak }}</h5>
            </div>

            <div class="mb-3">
                <?php
                $sisa=0;
                 $sisa = (int)(round(strtotime($mobils->tanggal_akhir_kontrak) - strtotime($mobils->tanggal_mulai_kontrak))/86400);
                     
                ?>
                <label for="name">Sisa Hari:</label>
                <h5><?php echo $sisa ?> Hari</h5>
            </div>


                
            </div>

            

          
        </form>   

    </div>
    
</div>
@else
<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Kontrak</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('mobils.index') }}">Back</a>
    </div>
</div>



<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2> Kontrak Sudah Habis</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('mobil.kontrakAwal',$mobils->id) }}">Perbaharui Kontrak</a>
    </div>
</div>

@endif
@endsection