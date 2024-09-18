<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

use App\Models\Driver;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $ratings  = DB::table('ratings')->join('mobils','mobils.id','=','ratings.mobil_sewa')  ->select('ratings.*', 'mobils.nama_mobil')->get();
        $search = $request['search'] ?? "";
        
         if ($search != ""){
            
            $ratings = rating::where('driver_id->nama_driver','LIKE',"%$search%")->get();
            
         }else{
            
            $ratings =  rating::orderBy('driver_id->nama_driver','ASC')->get();
         }
        //  $tes = Rating::select('mobil_sewa')->get();
        //  $mobils = Mobil::find($tes);
            return view('ratingCRUD.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('ratingCRUD.create');
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
            'rating'=> 'required',
            'driver_id'=> 'required',
          
        ]);
        

    
      Rating::create($request->all());
     
       
        // //Redirect jika sukses menyimpan data
        //  return redirect()->route('ratings.index')
        
        // ->with('success','Item created successfully.');
        
        // return view('ratingCRUD.bayar');
        // $datas = Mobil::all();
        // return redirect()->route('ratings.index')
        //     ->with('datas',$datas);
        return redirect()->route('ratings.index')
        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function rata($id){
        
        
        $ratings = Rating::find($id);
        // dd($ratings->driver->nama_driver);
        $rata = rating::select($ratings->driver_id,'=',$ratings->driver_id)->avg('rating');
        rating::find($id)->update(['rata' => $rata ]);
        
        return redirect()->route('ratings.show',$id);
    }
    public function show($id)
    {
        
        $ratings = Rating::find($id);
        // $rata = rating::select('driver_id->nama_driver','LIKE',"%$ratings%")->avg('rating');
        // rating::find($id)->update(['rata' => $rata ]);
        return view('ratingCRUD.show',compact('ratings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       $ratings = Rating::find($id);
    
       return view('ratingCRUD.edit',compact('ratings'));
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
            'rating'=> 'required',
        ]);
      
        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        Rating::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('ratings.index')
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
        rating::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('ratings.index')
                        ->with('success','Item deleted successfully');
    }
}
