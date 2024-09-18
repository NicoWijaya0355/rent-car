@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Pengembalian Mobil</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('transaksis.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form action="{{ route('transaksi.cek',$transaksis->id)  }}" method="POST">
            @csrf
            @method('PUT')
      
            <div class="mb-3">
                <label for="name">ID:{{ $transaksis->id }}</label>
           			<h5></h5>

                    <div class="col">
                        <label for="tanggalLahir">Tangggal Waktu Pengembalian Mobil:</label>
                        <input type="datetime-local" id="tanggal_waktu_mulai_sewa" name="pengembalian_mobil" class="form-control" placeholder="Nama Driver" style="margin-bottom :10px;" >
                    
                    </div>
                
               

            

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="Bayar" class="btn btn-outline-primary">Submit</button>
        </div>
        </form>   

    </div>
    
</div>

@endsection