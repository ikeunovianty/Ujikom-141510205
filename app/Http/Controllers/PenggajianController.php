<?php

namespace App\Http\Controllers;

use Request;
use App\tunjangan_pegawai;
use App\penggajian;
use App\jabatan;
use App\golongan;
use App\tunjangan;
use App\pegawai;
use App\lembur_pegawai;
use Input;
use App\kategori_lembur;
use Auth;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gajian = penggajian::paginate(3);
        return view('penggajian.index',compact('gajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tunjanganpegawai = tunjangan_pegawai::paginate(10);

        return view('penggajian.create',compact('tunjanganpegawai')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $i_gaji=Input::all();
        $tunjangan_pegawai=tunjangan_pegawai::where('id',$i_gaji['tunjangan_pegawai_id'])->first();
        $Wpenggajian=penggajian::where('tunjangan_pegawai_id',$tunjangan_pegawai->id)->first();
        $tunjangan=tunjangan::where('id',$tunjangan_pegawai->kode_tunjangan_id)->first();
        $pegawai=pegawai::where('id',$tunjangan_pegawai->id_pegawai)->first();
        $kategori_lembur=kategori_lembur::where('id_jabatan',$pegawai->id_jabatan)->where('id_golongan',$pegawai->id_golongan)->first();
        $lembur_pegawai=lembur_pegawai::where('id_pegawai',$pegawai->id)->first();
        $jabatan=jabatan::where('id',$pegawai->id_jabatan)->first();
        $golongan=golongan::where('id',$pegawai->id_golongan)->first();
       

       $gaji = new penggajian ;

       if (isset($Wpenggajian)) {
           $error=true ;
           $tunjangan=tunjangan_pegawai::paginate(10);
           return view('penggajian.create',compact('tunjangan','error'));
       }
       elseif (!isset($lembur_pegawai)) {
            $nol = 0;
            $gaji->jumlah_jam_lembur= $nol;
            $gaji->jumlah_uang_lembur = $nol;
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji=($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tgl_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        elseif(!isset($lembur_pegawai) || !isset($kategori_lembur))
        {
            $nol = 0;
            $gaji->jumlah_jam_lembur= $nol;
            $gaji->jumlah_uang_lembur = $nol;
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji = ($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tgl_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        else
        {
            $gaji->jumlah_jam_lembur=$lembur_pegawai->jmlh_jam;
            $gaji->jumlah_uang_lembur =($lembur_pegawai->jmlh_jam)*($kategori_lembur->besaran_uang);
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji = ($lembur_pegawai->jmlh_jam*$kategori_lembur->besaran_uang)+($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tgl_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerima = Auth::user()->name;
            $gaji->save();
        }
        return redirect('penggaji');
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
        //
        $gajian=penggajian::all();
        $tupe=tunjangan_pegawai::all();
        return view('penggajian.index', compact('gajian', 'tupe'));
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
        //
        $gajiupdate = Request::all();
        $gajian= penggajian::find($id);
        $gajian->update($gajiupdate);
        return redirect('penggaji');
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
         penggajian::find($id)->delete();
        return redirect('penggaji');
    }
}
