@extends('dashboard.dashboard')

@section('content')

<div class="d-flex justify-content-between mt-5 mb-5">
    <div>
        <h2>Tampil customer</h2>
    </div>
    <div>
        <a class="btn btn-outline-secondary" href="{{ route('customers.index') }}">Back</a>
    </div>
</div>


<div class="card-body">
    
        <form >
      
            <div class="mb-3">
                <label for="name">ID:</label>
                <h5>{{ $customers->id }}</h5>
                
                
            <label for="name">Nama customer:</label>
                <h5>{{ $customers->nama_customer }}</h5>

            <div class="mb-3">
                <label for="name">Alamat:</label>
                <h5>{{ $customers->alamat_customer }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Tanggal Lahir:</label>
                <h5>{{ $customers->tanggal_lahir }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Telepon:</label>
                <h5>{{ $customers->no_telp }}</h5>
            </div>

            <div class="mb-3">
                <label for="name">Email:</label>
                <h5>{{ $customers->email }}</h5>
            </div>

            
                
               
                
            </div>

                
            </div>

            
          
        </form>   
    </div>
    
</div>
@endsection