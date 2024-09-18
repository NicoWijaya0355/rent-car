<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\MobilMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mobil;


class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $search = $request['search'] ?? "";
         if ($search != ""){
            
            $mobils = Mobil::where('nama_mobil','LIKE',"%$search%")->get();
            
         }else{
            $mobils = Mobil::orderBy('id', 'ASC')->get();
         }
            return view('mobilCRUD.index', compact('mobils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobilCRUD.create');
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
            'nama_mobil'=> 'required',
            'tipe_mobil'=> 'required',
            'jenis_transmisi'=> 'required',
            'jenis_bahan_bakar'=> 'required',
            'warna_mobil'=> 'required',
            'volume_bagasi'=> 'required',
            'fasilitas'=> 'required',
            'harga_sewa'=> 'required|numeric',
            'kapasitas'=> 'required|numeric',
            'plat_nomor'=> 'required',
            'no_stnk'=> 'required',
            'kategori_aset'=> 'required',
            'tanggal_terakhir_servis'=> 'required',
            'tanggal_mulai_kontrak'=> 'required',
            'tanggal_akhir_kontrak'=> 'required',
            'status_mobil'=> '',
        ]);

      mobil::create($request->all());

        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('mobils.index')
            ->with('success','Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobils = Mobil::find($id);
       
        return view('mobilCRUD.show',compact('mobils'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       $mobils = Mobil::find($id);
    
       return view('mobilCRUD.edit',compact('mobils'));
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
            'nama_mobil'=> 'required',
            'tipe_mobil'=> 'required',
            'jenis_transmisi'=> 'required',
            'jenis_bahan_bakar'=> 'required',
            'warna_mobil'=> 'required',
            'volume_bagasi'=> 'required',
            'fasilitas'=> 'required',
            'harga_sewa'=> 'required|numeric',
            'kapasitas'=> 'required|numeric',
            'plat_nomor'=> 'required',
            'no_stnk'=> 'required',
            'kategori_aset'=> 'required',
            'tanggal_terakhir_servis'=> 'required',
            'status_mobil'=> '',
        ]);

        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        mobil::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('mobils.index')
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
        Mobil::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('mobils.index')
                        ->with('success','Item deleted successfully');
    }

    public function kontrak($id){

        $mobils = Mobil::find($id);
       
        return view('mobilCRUD.kontrak',compact('mobils'));
    }

    public function kontrakUpdate(Request $request,$id){
        $request->validate([
            'tanggal_mulai_kontrak'=>'required',
            'tanggal_akhir_kontrak'=>'required',
        ]);

        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        mobil::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('mobils.index')
                        ->with('success','Contract updates successfully');
    }

    public function kontrakAwal($id){
        $mobils = Mobil::find($id);
    
        return view('mobilCRUD.tambahKontrak',compact('mobils'));
    }
}
