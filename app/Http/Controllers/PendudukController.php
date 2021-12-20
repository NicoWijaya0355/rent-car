<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\PendudukMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penduduk;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
        $penduduks = Penduduk::orderBy('updated_at', 'ASC')->get();

        return view('pendudukCRUD.index', compact('penduduks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan halaman create;
        return view('PendudukCRUD.create');
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
            'nama_depan'=> 'required|max:15',
            'nama_belakang'=> 'required|max:15',
            'RT'=>'required|numeric|max:20',
            'RT'=>'required|numeric|max:20',
            'no_telp'=> 'required|numeric|min:10',
            'tanggal_lahir'=> 'required',
            'tempat_lahir'=> 'required',
        ]);

      
        Penduduk::create($request->all());

        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('penduduks.index')
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
        
        $penduduks = Penduduk::find($id);
        
        return view('PendudukCRUD.show',compact('penduduks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $penduduks = Penduduk::find($id);
      
        return view('PendudukCRUD.edit',compact('penduduks'));
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
            'nama_depan'=> 'required|max:15',
            'nama_belakang'=> 'required|max:15',
            'RT'=>'required|numeric|max:20',
            'RT'=>'required|numeric|max:20',
            'no_telp'=> 'required|numeric|min:10',
            'tanggal_lahir'=> 'required',
            'tempat_lahir'=> 'required',
        ]);

       
        Penduduk::find($id)->update($request->all());

     
        return redirect()->route('penduduks.index')
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
        Penduduk::find($id)->delete();

        
        return redirect()->route('penduduks.index')
                        ->with('success','Item deleted successfully');
    }

   
}