<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\DriverMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Driver;


class DriverController extends Controller
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
            
            $drivers = driver::where('nama_driver','LIKE',"%$search%")->get();
         }else{
            $drivers = driver::orderBy('id', 'ASC')->get();
         }
            return view('driverCRUD.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driverCRUD.create');
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
            'nama_driver'=> 'required|max:15',
            'alamat_driver'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'email'=> 'required',
            'no_telp'=> 'required|numeric|digits_between:10,12',
            'tarif'=> 'numeric',
            'bahasa'=>'required',
            
        ]);

      driver::create($request->all());

        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('drivers.index')
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
        $drivers = driver::find($id);
       
        return view('driverCRUD.show',compact('drivers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drivers = driver::find($id);
    
        return view('driverCRUD.edit',compact('drivers'));
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
            'nama_driver'=> 'required|max:15',
            'alamat_driver'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'email'=> 'required',
            'no_telp'=> 'required|numeric|digits_between:10,12',
            'tarif'=> 'numeric',
            'bahasa'=>'required',
            
        ]);

        driver::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('drivers.index')
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
        driver::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('drivers.index')
                        ->with('success','Item deleted successfully');
    }

    public function riwayat ($id)
    {   
            
            if ($id != null ){
               
                $transaksis = Transaksi::where('driver_id','=',"$id")->get();
             
            }else{
                $transaksis = Transaksi::orderBy('id', 'ASC')->get();
            }   
            $tes = Transaksi::select('driver_id')->get();
            $drivers = driver::find($tes);
              return view('driverCRUD.riwayat', compact('transaksis','drivers'));
            
    }
}
