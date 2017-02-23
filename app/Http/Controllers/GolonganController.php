<?php

namespace App\Http\Controllers;

use Request;
use App\golongan;
use App\pegawai;
use App\kategori_lembur;
use Form;
use Validator;
use alert;
use Input;
use redirect;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan = golongan::all();
        return view ('golongan.index', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('golongan.create', compact('golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $golongan=Request::all();
         $rules=['kode_golongan'=>'required|unique:golongans',
                 'nama_golongan'=>'required|unique:golongans',
                 'besaran_uang'=>'required|unique:golongans'];
         $message=[
         'kode_golongan.unique'=>'Masukan Sudah Ada','kode_golongan.required'=>'Kolom Tidak Boleh Kosong',
         'nama_golongan.unique'=>'Masukan Sudah Ada','nama_golongan.required'=>'Kolom Tidak Boleh Kosong',
         'besaran_uang.unique'=>'Masukan Sudah Ada','besaran_uang.required'=>'Kolom Tidak Boleh Kosong'];
         $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/golongan/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
         
         golongan::create($golongan);
         return redirect('golongan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $golongan=golongan::find($id);
        return view('golongan.edit',compact('golongan'));
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
        $data=Request::all();
        $kode=golongan::where('id',$id)->first()->kode_golongan;
        $nama=golongan::where('id',$id)->first()->nama_golongan;
        $uang=golongan::where('id',$id)->first()->besaran_uang;

        if($data['kode_golongan'] !=$kode)
        {
          $rules=['kode_golongan'=>'required|unique:golongans',
                 'nama_golongan'=>'required',
                 'besaran_uang'=>'required|numeric'];   
        }
        elseif ($data['nama_golongan'] !=$nama) 
        {
            $rules=['kode_golongan'=>'required',
                 'nama_golongan'=>'required|unique:golongans',
                 'besaran_uang'=>'required|numeric'];   
        }

        elseif  ($data['besaran_uang'] !=$uang) 
        {
            $rules=['kode_golongan'=>'required',
                 'nama_golongan'=>'required',
                 'besaran_uang'=>'required|numeric|unique:golongans'];   
        }

        else
        {
             $rules=['kode_golongan'=>'required',
                 'nama_golongan'=>'required',
                 'besaran_uang'=>'required|numeric'];            
        }
        
        
         $message=[
         'kode_golongan.unique'=>'Masukan Sudah Ada','kode_golongan.required'=>'Kolom Jangan Kosong',
         'nama_golongan.unique'=>'Masukan Sudah Ada','nama_golongan.required'=>'Kolom Jangan Kosong',
         'besaran_uang.unique'=>'Masukan Sudah Ada','besaran_uang.required'=>'Kolom Jangan Kosong'];
         $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/golongan/'.$id.'/edit')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
         golongan::where('id',$id)->first()->update(
            [
                'kode_golongan'=>$data['kode_golongan'],
                'nama_golongan'=>$data['nama_golongan'],
                'besaran_uang'=>$data['besaran_uang']
           ]);
        }
        return redirect('/golongan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        golongan::find($id)->delete();
        alert()->success('Data Terhapus');
        return redirect('golongan');
    }
}
