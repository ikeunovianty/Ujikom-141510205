<?php

namespace App\Http\Controllers;

use App\jabatan;
use App\pegawai;
use App\Form;
use Request;
use Input;
use Validator;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = jabatan::all();
        return view ('jabatan.index', compact('jabatan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = pegawai::all();
        $jabatan = jabatan::all();
        return view ('jabatan.create', compact('pegawai','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jabatan=Request::all();
         $rules=['kode_jabatan'=>'required|unique:jabatans',
                 'nama_jabatan'=>'required|unique:jabatans',
                 'besaran_uang'=>'required|unique:jabatans'];
         $message=[
                  'kode_jabatan.required'=>'Kolom Tidak Boleh Kosong','kode_jabatan.unique'=>'Masukan Sudah Ada',
                  'nama_jabatan.required'=>'Kolom Tidak Boleh Kosong','nama_jabatan.unique'=>'Masukan Sudah Ada',
                  'besaran_uang.required'=>'Kolom Tidak Boleh Kosong','besaran_uang.unique'=>'Masukan Sudah Ada'];
         $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/jabatan/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
         
         jabatan::create($jabatan);
         return redirect('jabatan');
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
        $jabatan=jabatan::find($id);
        return view('jabatan.edit',compact('jabatan'));
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
        $kode=jabatan::where('id',$id)->first()->kode_jabatan;
        $nama=jabatan::where('id',$id)->first()->nama_jabatan;
        $uang=jabatan::where('id',$id)->first()->besaran_uang;

        if($data['kode_jabatan'] !=$kode)
        {
          $rules=['kode_jabatan'=>'required|unique:jabatans',
                 'nama_jabatan'=>'required',
                 'besaran_uang'=>'required|numeric'];   
        }
        elseif ($data['nama_jabatan'] !=$nama) 
        {
            $rules=['kode_jabatan'=>'required',
                 'nama_gokode_jabatanlongan'=>'required|unique:jabatans',
                 'besaran_uang'=>'required|numeric'];   
        }

        elseif  ($data['besaran_uang'] !=$uang) 
        {
            $rules=['kode_jabatan'=>'required',
                 'nama_jabatan'=>'required',
                 'besaran_uang'=>'required|numeric|unique:jabatans'];   
        }

        else
        {
             $rules=['kode_jabatan'=>'required',
                 'nama_jabatan'=>'required',
                 'besaran_uang'=>'required|numeric'];            
        }
        
        
         $message=[
         'kode_jabatan.unique'=>'Masukan Sudah Ada','kode_jabatan.required'=>'Kolom Jangan Kosong',
         'nama_jabatan.unique'=>'Masukan Sudah Ada','nama_jabatan.required'=>'Kolom Jangan Kosong',
         'besaran_uang.unique'=>'Masukan Sudah Ada','besaran_uang.required'=>'Kolom Jangan Kosong'];
         $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/jabatan/'.$id.'/edit')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
         jabatan::where('id',$id)->first()->update(
            [
                'kode_jabatan'=>$data['kode_jabatan'],
                'nama_jabatan'=>$data['nama_jabatan'],
                'besaran_uang'=>$data['besaran_uang']
           ]);
        }
        return redirect('/jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        jabatan::find($id)->delete();
        return redirect('jabatan');
    }
}
