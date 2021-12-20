<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\KartuMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kartu;

class KartuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //Mengambil data Student dan mengurutkannya dari kecil ke besar berdasarkan id
        $kartus = Kartu::orderBy('updated_at', 'ASC')->get();

        //Mengirimkan variabel $students ke halaman view StudentCRUD/index.blade.php
        return view('kartuCRUD.index', compact('kartus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan halaman create;
        return view('KartuCRUD.create');
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
            'kepala_keluarga'=> 'required|max:15',
            'RT'=> 'required|numeric|max:20',
            'RW'=> 'required|numeric|max:20',
            'jumlah'=> 'required|numeric|max:10',
        ]);

        //Insert setiap request dari form ke dalam database via model
        //Jika menggunakan metode ini, maka nama field dan nama form harus sama
        Kartu::create($request->all());

        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('kartus.index')
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
        $kartus = Kartu::find($id);
        //Menampilkan view show dengan menyertakan data students
        return view('KartuCRUD.show',compact('kartus'));
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
        $kartus = Kartu::find($id);
        //Menampilkan view edit dengan menyertakan data students
        return view('KartuCRUD.edit',compact('kartus'));
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
            'kepala_keluarga'=> 'required|max:15',
            'RT'=> 'required|numeric|max:20',
            'RW'=> 'required|numeric|max:20',
            'jumlah'=> 'required|numeric|max:10',
        ]);

        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        Kartu::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('kartus.index')
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
        Kartu::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('kartus.index')
                        ->with('success','Item deleted successfully');
    }

    
}