<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\CustomerMail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Transaksi;
use App\Models\Mobil;
use PDF;

class CustomerController extends Controller
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
            
            $customers = Customer::where('nama_customer','LIKE',"%$search%")->get();
         }else{
            $customers = Customer::orderBy('updated_at', 'ASC')->get();
         }
            return view('customerCRUD.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customerCRUD.create');
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
            'nama_customer'=> 'required|max:15',
            'alamat_customer'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'email'=> 'required',
            'no_telp'=> 'required|numeric|digits_between:10,12',
            'password'=> 'required',
        ]);

      Customer::create($request->all());
      
        // //Redirect jika sukses menyimpan data
        // return redirect()->route('students.index')
        // ->with('success','Item created successfully.');
        return redirect()->route('customers.index')
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
        $customers = Customer::find($id);
       
        return view('customerCRUD.show',compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
       $customers = Customer::find($id);
    
       return view('customerCRUD.edit',compact('customers'));
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
            'nama_customer'=> 'required|max:15',
            'alamat_customer'=> 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'email'=> 'required',
            'no_telp'=> 'required|numeric|digits_between:10,12',
            'password'=> 'required',
        ]);

        //Mengubah data berdasarkan request dan parameter yang dikirimkan
        Customer::find($id)->update($request->all());

        //Setelah berhasil mengubah data melempar ke students.index
        return redirect()->route('customers.index')
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
        Customer::find($id)->delete();

        //Melakukan hapus data berdasarkan parameter yang dikirimkan
        //$students-delete();
        return redirect()->route('customers.index')
                        ->with('success','Item deleted successfully');
    }

    public function verifikasi($id){

        Customer::find($id)->update(['status_data' => 'data sudah diverifikasi']);
        return redirect()->route('customers.index')
                ->with('success','Verification successfully');
    }


   
    public function riwayat ($nama)
    {   
            
            if ($nama != null ){
               
                $transaksis = Transaksi::where('nama_customer','LIKE',"%$nama%")->get();
             
            }else{
                $transaksis = Transaksi::orderBy('updated_at', 'ASC')->get();
            }   
            // $tes = Transaksi::select('mobil_sewa')->get();
            // $mobils = Mobil::find($tes);
              return view('customerCRUD.riwayat', compact('transaksis'));
            // $transaksis = Transaksi::where('nama_customer','LIKE',"%$nama%")->first();
            // $customers = Customer::find($id);
            // return view('customerCRUD.riwayat', compact('transaksis','customers'));
    }

    public function export($id){
     
        $data = Customer::find($id);
        view()->share('data',$data);
        $pdf = PDF::loadview('customerCRUD.datacustomer');
        return $pdf->download('data.pdf');

       
    
        // return view('customerCRUD.datacustomer',compact('customers'));
    }
}
