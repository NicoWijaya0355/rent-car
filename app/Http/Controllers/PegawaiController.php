<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\PegawaiMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
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
            
            $pegawais = pegawai::where('nama_pegawai','LIKE',"%$search%")->get();
         }else{
            $pegawais = pegawai::orderBy('updated_at', 'ASC')->get();
         }
            return view('pegawaiCRUD.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwals = jadwal::all();
        return view('pegawaiCRUD.create',compact('jadwals'));
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
            'nama_pegawai'=> 'required|max:15',
            'alamat_pegawai'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'email'=> 'required',
            'no_telp'=> 'required|numeric|digits_between:10,12',
            'foto'=>'required|mimes:jpg,jpeg,png',
        ]);
        
        // $file_name=$request->foto->getClientOriginalName();
        // $request->foto->storeAs('thumbnail',$file_name);
        
        
        $data=pegawai::create($request->all());

        if($request->hasfile('foto')){
            $request->file('foto')->move('thumbnail/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        
         }
        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('pegawais.index')
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
        $pegawais = pegawai::find($id);
       
        return view('pegawaiCRUD.show',compact('pegawais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       $pegawais = pegawai::find($id);
       $jadwals = jadwal::all();
       return view('pegawaiCRUD.edit',compact('pegawais','jadwals'));
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
            'nama_pegawai'=> 'required|max:15',
            'alamat_pegawai'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'email'=> 'required',
            'no_telp'=> 'required|numeric|digits_between:10,12',
            'foto'=>'required|mimes:jpg,jpeg,png',
        ]);
        
        // $file_name=$request->foto->getClientOriginalName();
        // $request->foto->storeAs('thumbnail',$file_name);
       

        $data=pegawai::find($id);
        
        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        if($request->hasfile('foto')){
            if($request->foto != ''){        
                $path = public_path().'/thumbnail/';
            
                //code for remove old file
                if($data->foto != ''  && $data->foto != null){
                     $old= $path.$data->foto;
                     unlink($old);
                }
                
                $request->file('foto')->move($path, $request->file('foto')->getClientOriginalName());
                $data->foto = $request->file('foto')->getClientOriginalName();
                
                // //upload new file
                // $file = $request->foto;
                // $filename = $file->getClientOriginalName();
                // $file->move($path, $filename);
      
                // //for update in table
                // $data->update(['foto' => $filename]);
           }
          
         }
         pegawai::find($id)->update($request->all());
         $data->update(['foto' => $data->foto]);
      
        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('pegawais.index')
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
        pegawai::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('pegawais.index')
                        ->with('success','Item deleted successfully');
    }
}
