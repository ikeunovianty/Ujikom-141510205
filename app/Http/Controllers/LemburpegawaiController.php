<?php

namespace App\Http\Controllers;

use Request;
use App\pegawai;
use App\kategori_lembur;
use App\lembur_pegawai;

class LemburpegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = pegawai::all();
        $lemburpegawai = lembur_pegawai::all();
        $kategori = kategori_lembur::all();
        return view('lemburpegawai.index', compact('lemburpegawai','pegawai','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
   
        $kategori = kategori_lembur::all();
        $pegawai = pegawai::all();
        $lemburpegawai = lembur_pegawai::all();
        return view ('lemburpegawai.create', compact('lemburpegawai','kategori','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lemburpegawai=Request::all();
        lembur_pegawai::create($lemburpegawai);
        return redirect('lemburpegawai');
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
        $kategori = kategori_lembur::all();
        $pegawai = pegawai::all();
        $lemburpegawai=lembur_pegawai::find($id);
        return view('lemburpegawai.edit',compact('lemburpegawai','pegawai','kategori'));
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
        $lemburpegawai=lembur_pegawai::find($id);
        $lemburpegawai->update($dataUpdate);
        return redirect('lemburpegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lembur_pegawai::find($id)->delete();
        return redirect('lemburpegawai');
    }
}
