<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\JadwalMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
         $search = $request['search'] ?? "";
         if ($search != ""){
            
            $jadwals = jadwal::where('hari','LIKE',"%$search%")->get();
         }else{
            $jadwals = jadwal::orderBy('id', 'ASC')->get();
         }
            return view('jadwalCRUD.index', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jadwalCRUD.create');
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
            'jam_awal'=> 'required',
            'jam_akhir'=> 'required',
            'hari'=> 'required',
            
        ]);
        
        // $file_name=$request->foto->getClientOriginalName();
        // $request->foto->storeAs('thumbnail',$file_name);
        
        
        jadwal::create($request->all());

        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('jadwals.index')
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
        $jadwals = jadwal::find($id);
       
        return view('jadwalCRUD.show',compact('jadwals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       $jadwals = jadwal::find($id);
    
       return view('jadwalCRUD.edit',compact('jadwals'));
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
            'jam_awal'=> 'required',
            'jam_akhir'=> 'required',
            'hari'=> 'required',
        
        ]);
        
        // $file_name=$request->foto->getClientOriginalName();
        // $request->foto->storeAs('thumbnail',$file_name);
       

        jadwal::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('jadwals.index')
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
        jadwal::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('jadwals.index')
                        ->with('success','Item deleted successfully');
    }
}
