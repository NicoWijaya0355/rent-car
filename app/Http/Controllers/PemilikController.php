<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\CustomerMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pemilik;
use App\Models\Transaksi;
use App\Models\Mobil;
use PDF;

class PemilikController extends Controller
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
            
            $pemiliks = Pemilik::where('nama_pemilik','LIKE',"%$search%")->get();
         }else{
            $pemiliks = Pemilik::orderBy('updated_at', 'ASC')->get();
         }
            return view('pemilikCRUD.index', compact('pemiliks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemilikCRUD.create');
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
            'nama_pemilik'=> 'required|max:15',
            'alamat_pemilik'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'no_telp'=> 'required|numeric|digits_between:10,12',
            
        ]);

      Pemilik::create($request->all());
        
        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('pemiliks.index')
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
        $pemiliks = pemilik::find($id);
       
        return view('pemilikCRUD.show',compact('pemiliks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemiliks = pemilik::find($id);
    
        return view('pemilikCRUD.edit',compact('pemiliks')); 
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
            'nama_pemilik'=> 'required|max:15',
            'alamat_pemilik'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'no_telp'=> 'required|numeric|digits_between:10,12',
            
        ]);

        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        pemilik::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('pemiliks.index')
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
        pemilik::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('pemiliks.index')
                        ->with('success','Item deleted successfully');
    }
}
