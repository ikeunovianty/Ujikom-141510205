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
        golongan::create($golongan);
        return redirect('golongan');

        $rules=['kode_golongan'=>'required|unique:golongans',
                'nama_golongan'=>'required',
                'besaran_uang'=>'required|numeric'];
        $sms=['kode_golongan.required'=>'Harus Di Isi',
                'kode_golongan.unique'=>'Tidak Boleh Sama',
                'nama_golongan.required'=>'Harus Di Isi',
                'besaran_uang.required'=>'Harus Diisi',
                'besaran_uang.numeric'=>'Harus Angka'];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            alert()->error('Data Salah');  
            return redirect('golongan/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        alert()->success('Data Tersimpan');
        $golongan=Request::all();
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
        $dataUpdate=Request::all();
        $golongan=golongan::find($id);
        $golongan->update($dataUpdate);
        return redirect('golongan');
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
