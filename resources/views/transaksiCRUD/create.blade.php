@extends('dashboard.dashboard')
@section('content')
<script type="text/javascript">
    
    function EnableDisableTextBox(ddlModels) {
        
            var selectedValue = ddlModels.options[ddlModels.selectedIndex].value;
            var driver_sewa = document.getElementById("driver_sewa");
            var no_telp = document.getElementById("no_telp");
            var tarif_driver = document.getElementById("tarif_driver");
            var sim = document.getElementById("sim");
        
            // txtOther.disabled = selectedValue == 2 ? false : true;
            // sim.disabled = selectedValue == 1  ? false : true;
            

            if( selectedValue == 1){
            
                    sim.disabled = false;
                    driver_sewa.disabled = true;
                    no_telp.disabled=true;
                    tarif_driver.disabled = true;
                  

            }else if(selectedValue == 2 ){
             
                driver_sewa.disabled = false;
                no_telp.disabled = false;
                tarif_driver.disabled = false;
                sim.disabled = true;
           
            }
        }
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script type="text/javascript">    
                $(document).ready(function(){


                $(document).on('change','#driver_sewa',function () {
                    var driver_id=$(this).val();

                    var a=$(this).parent();
                    console.log(driver_id);
                    var op="";
                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findDriverTelp')!!}',
                        data:{'id':driver_id},
                        dataType:'json',//return data will be json
                        success:function(data){
                            console.log("no_telp");
                            
                            console.log(data.no_telp);
                            // var price = $(this).find("option:selected").data("no_telp");
                            // $('#no_Telp').val(price);
                            
                            // here price is coloumn name in products table data.coln name

                            a.find('#no_telp').val(data.no_telp);
                            
                        },
                        error:function(){

                        }
                    });


                });

                $(document).on('change','#driver_sewa',function () {
                    var driver_id=$(this).val();

                    var a=$(this).parent();
                    console.log(driver_id);
                    var op="";
                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findDriverTarif')!!}',
                        data:{'id':driver_id},
                        dataType:'json',//return data will be json
                        success:function(data){
                            console.log("tarif");
                            
                            console.log(data.tarif);
                            // var price = $(this).find("option:selected").data("no_telp");
                            // $('#no_Telp').val(price);
                            
                            // here price is coloumn name in products table data.coln name

                            a.find('#tarif_driver').val(data.tarif);
                            
                        },
                        error:function(){

                        }
                    });


                });

                $(document).on('change','#mobil',function () {
                    var mobil_id=$(this).val();

                    var a=$(this).parent();
                    console.log(mobil_id);
                    var op="";
                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findMobilPlat')!!}',
                        data:{'id':mobil_id},
                        dataType:'json',//return data will be json
                        success:function(data){
                            console.log("no_plat");
                            
                            console.log(data.plat_nomor);
                            // var price = $(this).find("option:selected").data("no_telp");
                            // $('#no_Telp').val(price);
                            
                            // here price is coloumn name in products table data.coln name

                            a.find('#plat_nomor').val(data.plat_nomor);
                           
                        },
                        error:function(){

                        }
                    });


                });

                $(document).on('change','#mobil',function () {
                    var mobil_id=$(this).val();

                    var a=$(this).parent();
                    console.log(mobil_id);
                    var op="";
                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findMobilHarga')!!}',
                        data:{'id':mobil_id},
                        dataType:'json',//return data will be json
                        success:function(data){
                            console.log("harga_sewa");
                            
                            console.log(data.harga_sewa);
                            // var price = $(this).find("option:selected").data("no_telp");
                            // $('#no_Telp').val(price);
                            
                            // here price is coloumn name in products table data.coln name

                            a.find('#harga_sewa').val(data.harga_sewa);
                            
                        },
                        error:function(){

                        }
                    });


                });
                });
            
    </script>
<script type="text/javascript">

</script>
<div class="d-flex justify-content-between mt-5 mb-5">
    <h3>Tambah transaksi </h3>
    <div>
        <a href="{{ route('transaksis.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>
</div>

@if($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong>There were some problems with your input.<br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('transaksis.store') }}" method="POST">
    {{ csrf_field() }}


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row g-3" style="margin-bottom :10px;">
                <div class="col">
                    <label for="namatransaksi">Nama Customer:</label>
                    <input type="text" name="nama_customer" class="form-control" placeholder="Nama Customer">
                </div>

                
                
                <div class="col">
                    <label for="alamattransaksi">Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_transaksi" class="form-control" placeholder="Tipe transaksi">
                </div>
                
                
                
            </div>

            <div class="row g-3" style="margin-bottom :10px;">

                <div class="col">
                    <label >Keterangan Driver :</label>
                        <select  id= "ddlModels" class="form-control"  style="margin-bottom :10px;" onchange = "EnableDisableTextBox(this)">
                            <option value="" selected disabled hidden>keterangan</option>
                            <option value = "1">Tanpa Driver</option>
                            <option value = "2">Driver</option>
                        </select>
                </div>

                <div class="col">
                    <label for="jenisKelamin">No KTP :</label>
                    <input type="text" name="no_ktp" class="form-control" placeholder="NO KTP" style="margin-bottom :10px;">
                </div>

                <div class="col ">
                    <label for="noTelp">No SIM :</label>
                    <input type="text" id="sim" name="no_sim" class="form-control" placeholder="NO SIM" style="margin-bottom :10px;" disabled="disabled">
                </div>

            </div>
                
                
                   
            <div class="row g-3" style="margin-bottom :10px;">
                <div>
                  
                             <label >Nama Driver :</label>
                                 <select  id= "driver_sewa" name="driver_id" class="form-control"  style="margin-bottom :10px;"  disabled="disabled">
                                    <option value="" selected disabled hidden>Nama Driver</option>
                                      @foreach($drivers as $driver)
                                      
                                      <option value="{{ $driver->id }}">{{ $driver->nama_driver }}</option>
                                      @endforeach
                                    
                                </select>
                        
                            
                                <div class="col">
                                    <label for="no_telp">Telepon Driver:</label>
                                    <input type="text" id="no_telp" name="no_telp_driver" class="form-control" placeholder="Telepon Driver" style="margin-bottom :10px;" disabled="disabled">
                                </div>

                            
                            <div class="col">
                                <label for="noTelp">Tarif Driver :</label>
                                <input type="number" id="tarif_driver" name="tarif_driver" class="form-control" placeholder="Tarif Driver" style="margin-bottom :10px;" disabled="disabled">
                            </div>
                          
                            
                 </div>
            </div>
                   
            

                  
                   
            

            <div class="row g-3" style="margin-bottom :10px;">
                    <div class="col">
                        <label for="tanggalLahir">Tangggal Waktu Mulai Sewa :</label>
                        <input type="datetime-local" id="tanggal_waktu_mulai_sewa" name="tanggal_waktu_mulai_sewa" class="form-control" placeholder="Nama Driver" style="margin-bottom :10px;" >
                    
                    </div>

                    <div class="col">
                        <label for="jenisKelamin">Tanggal Waktu Selesai Sewa:</label>
                        <input type="datetime-local" id="tanggal_waktu_selesai_sewar" name="tanggal_waktu_selesai_sewa" class="form-control" placeholder="Telepon Driver" style="margin-bottom :10px;" >
                    </div>

                    <!-- <div class="col">
                        <label for="noTelp">Nama Mobil :</label>
                        <input type="text" id="mobil_sewa" name="mobil_sewa" class="form-control" placeholder="Mobil Sewa" style="margin-bottom :10px;" >

                    </div> -->

                       

                       
                        
                   
            </div>
                   

            <div class="row g-3" style="margin-bottom :10px;">
                <div >
                            <label >Nama Mobil :</label>
                                <select  id= "mobil" name="mobil_id" class="form-control"  style="margin-bottom :10px;">
                                      
                                        @foreach($datas as $mobil)
                                        <option value="" selected disabled hidden>Nama Mobil</option>
                                        <option value="{{ $mobil->id }}">{{ $mobil->nama_mobil }}</option>
                                        @endforeach
                                      
                                </select>
                        

                        <div class="col">
                            <label for="namatransaksi">Harga Sewa Perhari:</label>
                            <input type="number" id="harga_sewa" name="harga_sewa_perhari" class="form-control" placeholder="Harga Sewa Perhari">
                        <div class="col">
                             <label for="alamattransaksi">No Plat Mobil:</label>
                             <input type="text" id="plat_nomor" name="no_plat_mobil" class="form-control" placeholder="Tipe transaksi">
                        </div>
                        </div>

                            
                </div>
            </div>

            <div class="row g-3" style="margin-bottom :10px;">
                
                <div class="col">
                    <label for="alamattransaksi">Tipe transaksi:</label>
                    <input type="text" name="tipe_transaksi" class="form-control" placeholder="Tipe transaksi">
                </div>

                <div class="col">
                    <label for="metodePembayaran">Metode Pembayaran:</label>
                    <input type="text" name="metode_pembayaran" class="form-control" placeholder="Metode Pemabayaran">
                </div>

               
                
            </div>

                    
               
           
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
    </div>
</form>


@endsection