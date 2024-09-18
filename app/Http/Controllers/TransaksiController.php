<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\TransaksiMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use App\Models\Mobil;
use App\Models\Driver;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $transaksis  = DB::table('transaksis')->join('mobils','mobils.id','=','transaksis.mobil_sewa')  ->select('transaksis.*', 'mobils.nama_mobil')->get();
        $search = $request['search'] ?? "";
         if ($search != ""){
            
            $transaksis = Transaksi::where('nama_customer','LIKE',"%$search%")->get();
            
         }else{
          
            $transaksis = Transaksi::with('driver')->orderBy('id', 'ASC')->get();
         }
        //  $tes = Transaksi::select('mobil_sewa')->get();
        //  $mobils = Mobil::find($tes);
            return view('transaksiCRUD.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = mobil::where('status_mobil','tersedia')->get();
        $drivers = driver::where('status','tersedia')->get();
        return view('transaksiCRUD.create',compact('datas','drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'nama_customer'=> 'required',
            'no_ktp'=> 'required',
            'no_sim'=> 'nullable',
            'tanggal_transaksi' =>'required',
            'tanggal_waktu_mulai_sewa' => 'required',
            'tanggal_waktu_selesai_sewa' => 'required',
            'mobil_id' => 'required',
            'no_plat_mobil' => 'required',
            'harga_sewa_perhari' => 'required' ,
            'driver_id' => 'nullable',
            'no_telp_driver' => 'nullable',
            'tarif_driver' => 'nullable',
            'metode_pembayaran' => 'required',
            'jumlah_pembayaran' => 'nullable',
            'verifikasi_dokumen' => 'nullable' ,
            'status_transaksi' => 'nullable',
            'jenis_transaksi' => 'nullable',
            'rating_driver' => 'nullable',
        ]);
        

    
      Transaksi::create($request->all());
     
        // //Redirect jika sukses menyimpan data
        //  return redirect()->route('transaksis.index')
        
        // ->with('success','Item created successfully.');
        
        // return view('transaksiCRUD.bayar');
        // $datas = Mobil::all();
        // return redirect()->route('transaksis.index')
        //     ->with('datas',$datas);
        return redirect()->route('transaksis.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksis = Transaksi::find($id);
       
       
        return view('transaksiCRUD.show',compact('transaksis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       $transaksis = Transaksi::find($id);
    
       return view('transaksiCRUD.edit',compact('transaksis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_customer'=> 'required',
            'no_ktp'=> 'required',
            'no_sim'=> 'nullable',
            'tanggal_transaksi' =>'required',
            'tanggal_waktu_mulai_sewa' => 'required',
            'tanggal_waktu_selesai_sewa' => 'required',
            'mobil_id' => 'required',
            'no_plat_mobil' => 'required',
            'harga_sewa_perhari' => 'required' ,
            'driver_id' => 'nullable',
            'no_telp_driver' => 'nullable',
            'tarif_driver' => 'nullable',
            'metode_pembayaran' => 'required',
            'jumlah_pembayaran' => 'nullable',
            'verifikasi_dokumen' => 'nullable' ,
            'status_transaksi' => 'nullable',
            'jenis_transaksi' => 'nullable',
            'rating_driver' => 'nullable',
        ]);
      
        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        Transaksi::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('transaksis.index')
                        ->with('success','Item updates successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transaksi::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('transaksis.index')
                        ->with('success','Item deleted successfully');
    }

    public function bayar($id){

        $transaksis = Transaksi::find($id);
       
        return view('transaksiCRUD.bayar',compact('transaksis'));
    }

    public function bayarUpdate(Request $request, $id){
        // $status=$request->status_transaksi;
        // $request = str_replace($status,"sudah bayar belum verifikasi",'status_transaksi');
        // $transaksis = Transaksi::find($id);
      
        // DB::table('transaksis')->where('id',$id)->update(['status_transaksi'=> 'sudah bayar belum verifikasi']);
        Transaksi::find($id)->update(['status_transaksi' => 'sudah bayar belum verifikasi' ]);
        return redirect()->route('transaksis.index')
                ->with('success','Pay successfully');
    }

   
    public function findDriverTelp(Request $request){
	
		//it will get price if its id match with product id
		$p = Driver::select('no_telp')->where('id',$request->id)->first();
		
    	return response()->json($p);
	}

    
    public function findDriverTarif(Request $request){
	
		//it will get price if its id match with product id
		$p = Driver::select('tarif')->where('id',$request->id)->first();
		
    	return response()->json($p);
	}

    
    public function findMobil(Request $request){
	
		//it will get price if its id match with product id
		$p = Mobil::select('nama_mobil')->where('id',$request->id)->first();
		
    	return response()->json($p);
	}

    public function findMobilPlat(Request $request){
	
		//it will get price if its id match with product id
		$p = Mobil::select('plat_nomor')->where('id',$request->id)->first();
		
    	return response()->json($p);
	}
    
    public function findMobilHarga(Request $request){
	
		//it will get price if its id match with product id
		$p = Mobil::select('harga_sewa')->where('id',$request->id)->first();
		
    	return response()->json($p);
	}

    public function verifikasi($id){
      
        Transaksi::find($id)->update(['status_transaksi' => 'sudah bayar sudah verifikasi']);  
        Transaksi::find($id)->update(['verifikasi_dokumen' => 'sudah verifikasi']);
        return redirect()->route('transaksis.index')
                ->with('success','Verification successfully');
    }

    public function cek1($id){
        $transaksis = Transaksi::find($id);
    
        return view('transaksiCRUD.pengembalian',compact('transaksis'));
    }
    public function cek(Request $request,$id){
        Transaksi::find($id)->update($request->all());
        $transaksis = Transaksi::find($id);
        return view('transaksiCRUD.denda',compact('transaksis'));
     
    }

    public function denda(Request $request,$id){
        transaksi::find($id)->update($request->all());
        return redirect()->route('transaksis.index')
                ->with('success','Bayar Denda Berhasil');
    }
}
