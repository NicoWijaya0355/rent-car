<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\PromoMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use App\Models\Promo;


class PromoController extends Controller
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
            
            $promos = promo::where('kode','LIKE',"%$search%")->get();
         }else{
            $promos = promo::orderBy('id', 'ASC')->get();
         }
            return view('promoCRUD.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promoCRUD.create');
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
            'kode'=> 'required|max:15',
            'jenis_promo'=> 'required',
            'keterangan'=> 'required',
            'potongan'=> 'required|numeric',

        ]);

      promo::create($request->all());

        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('promos.index')
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
        $promos = promo::find($id);
       
        return view('promoCRUD.show',compact('promos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       $promos = promo::find($id);
    
       return view('promoCRUD.edit',compact('promos'));
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
            'kode'=> 'required|max:15',
            'jenis_promo'=> 'required',
            'keterangan'=> 'required',
            'potongan'=> 'required|numeric',
        ]);

        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        promo::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('promos.index')
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
        promo::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('promos.index')
                        ->with('success','Item deleted successfully');
    }

  


   
 
}
