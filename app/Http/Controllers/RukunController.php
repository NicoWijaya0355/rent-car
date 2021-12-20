<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\RukunMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rukun;

class RukunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //Mengambil data Student dan mengurutkannya dari kecil ke besar berdasarkan id
        $rukuns = Rukun::orderBy('updated_at', 'ASC')->get();

        //Mengirimkan variabel $students ke halaman view StudentCRUD/index.blade.php
        return view('rukunCRUD.index', compact('rukuns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan halaman create;
        return view('RukunCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Membuat validasi untuk nama_fakultas wajib diisi
        $request->validate([
            'kepala_rukun'=> 'required|max:15',
            'RT'=> 'required|numeric|max:20|unique:rukuns',
            'jumlah_kartu'=> 'required|numeric|min:2',
            'jumlah_penduduk'=> 'required|numeric|min:20',
            
        ]);

        //Insert setiap request dari form ke dalam database via model
        //Jika menggunakan metode ini, maka nama field dan nama form harus sama
        Rukun::create($request->all());

        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('rukuns.index')
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
        //Cari berdasarkan id
        $rukuns = Rukun::find($id);
        //Menampilkan view show dengan menyertakan data students
        return view('RukunCRUD.show',compact('rukuns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Cari berdasarkan id
        $rukuns = Rukun::find($id);
        //Menampilkan view edit dengan menyertakan data students
        return view('RukunCRUD.edit',compact('rukuns'));
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
        //Membuat validasi untuk nama_fakultas wajib diisi
        $request->validate([
            'kepala_rukun'=> 'required|max:15',
            'RT'=> 'required|numeric|max:20|unique:rukuns',
            'jumlah_kartu'=> 'required|numeric|min:2',
            'jumlah_penduduk'=> 'required|numeric|min:20',
        ]);

        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        Rukun::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('rukuns.index')
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
        Rukun::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('rukuns.index')
                        ->with('success','Item deleted successfully');
    }

    
}