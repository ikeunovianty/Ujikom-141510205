<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\lembur_pegawai;
use App\tunjangan_pegawai;
use App\pegawai;
use App\tunjangan;
use App\penggajian;
use App\jabatan;
use App\kategori_lembur;
use App\golongan;
use App\User;
use Carbon\Carbon;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggajian = penggajian::with('tunjanganpegawai')->get();
        $tunjanganpegawai = tunjangan_pegawai::with('tunjangan')->first();

        $tunjanganpegawai = tunjangan_pegawai::where('id',$tunjanganpegawai->kode_tunjangan_id)->first();
        $pegawai = pegawai::with('User')->first();
        $users = User::where('id',$pegawai['id_user'])->first();
        $penggajian = penggajian::all();
        
        return view('penggajian.index',compact('penggajian','users','pegawai','tunjanganpegawai','tunjangan'));
        //
        //$user = request()->user()->id;
        //$jabatan = DB::select("SELECT jabatans.besaran_uang FROM jabatans");
        //$golongan = DB::select("SELECT golongans.besaran_uang FROM golongans");
        //$pegawai = DB::select("SELECT pegawais.id_user FROM pegawais where pegawais.id_user=$user");
        //$tunjanganpegawai = DB::select("SELECT tunjanganpegawais.id_pegawai,
        //                                tunjanganpegawais.kode_tunjangan_id FROM tunjanganpegawais ");
        //$pegawai = pegawai::with('User')->get();
        //$lemburpegawai = DB::select("SELECT lembur_pegawais.id,lembur_pegawais.jumlah_jam,pegawais.id_user FROM lembur_pegawais JOIN pegawais ON pegawais.id=lembur_pegawais.id_pegawai where lembur_pegawais  .id_pegawai=$user");
        //dd($lemburpegawai);
        // DB::insert("INSERT INTO penggajians (tunjangan_pegawai_id,jumlah_jam_lembur,jumlah_uang_lembur,gaji_pokok,total_gaji,tanggal_pengambilan,status_pengambilan,petugas_penerima) VALUES ( '1', '2', '10000', '1000000', '1020000', '1999-04-25', '1', 'Andri')");
        ////return view('penggajian.index',compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pegawai = pegawai::with('User')->get();
     return view('penggajian.create',compact('pegawai','tunjanganpegawai'));
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penggajian = Request::all();

        $now = Carbon::now();
            $kode_tunjangan_id = tunjangan_pegawai::where('id_pegawai', $penggajian['id_pegawai'])->first();
            $tunjanganpegawai = tunjangan_pegawai::where('id_pegawai',$penggajian['id_pegawai'])->first();
    if($tunjanganpegawai==null)
        {
            $missing_count=true;

            $pegawai = pegawai::with('User')->get();
            return view('penggajian.create',compact('missing_count','pegawai'));
        }
        else
        {
            $penggajian1 = penggajian::where('tunjangan_pegawai_id', $kode_tunjangan_id->id)->first();
            if(isset($penggajian1->id))
            {
            if($penggajian1->created_at->month==$now->month)
            {
                return redirect('penggajian/create'.'?errors_match');
            }
            }
        $user = $penggajian['id_pegawai'];
        $jumlah_jam_lembur = DB::table('lembur_pegawais')
        ->where('lembur_pegawais.id_pegawai', '=', $user)
        ->sum('lembur_pegawais.jumlah_jam');
        
        
        
        $pegawai = pegawai::where('id',$penggajian['id_pegawai'])->first();
        $kategori = kategori_lembur::where('id_jabatan',$pegawai->id_jabatan)->where('id_golongan',$pegawai->id_golongan)->first();
        $jabatan = jabatan::where('id',$pegawai->id_jabatan)->first();
        $golongan = golongan::where('id',$pegawai->id_golongan)->first();
        $lemburpegawai = lembur_pegawai::where('id_pegawai',$penggajian['id_pegawai'])->first();
        $gaji_pokok = jabatan::where('besaran_uang')->first();
        $tunjangan = tunjangan::where('id',$tunjanganpegawai->kode_tunjangan_id)->first();
        $penggajian['tunjangan_pegawai_id']= $tunjanganpegawai->id;
        $penggajian['jumlah_jam_lembur']= (int)$jumlah_jam_lembur;
        $penggajian['jumlah_uang_lembur']= $kategori['besaran_uang']*(int)$jumlah_jam_lembur;
        $penggajian['gaji_pokok']= $jabatan->besaran_uang+$golongan->besaran_uang;
        $penggajian['total_gaji']= $penggajian['gaji_pokok']+$penggajian['jumlah_uang_lembur']+$tunjangan['besaran_uang'];
        $penggajian['status_pengambilan']=0;
        penggajian::create($penggajian);
        }
        return redirect('penggajian');
       
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
       $data = penggajian::where('id',$id)->first();
        return view('penggajian.edit',compact('data'));
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
                $now = Carbon::now();
        $data = Request::all();
        // $old_tunjanganpegawai = tunjanganpegawai::where('id', $old_penggajian->tunjangan_pegawai_id)->first();
        // $old_pegawai = pegawai::where('id',$old_tunjanganpegawai->id_pegawai)->first();
        // $old_jabatan = jabatan::where('id',$old_pegawai->id_jabatan)->first();
        // $old_golongan = golongan::where('id',$old_pegawai->id_golongan)->first();
        // $old_lembur_pegawai = lembur_pegawai::where('id_pegawai',$old_pegawai->id)->first();
        // dd($data['petugas_penerima']);
        penggajian::where('id', $id)->first()->update([
            'tanggal_pengambilan' => $now,
            'status_pengambilan' => $data['status_pengambilan'],
            'petugas_penerima' => $data['petugas_penerima'],
            ]);
        return redirect('penggajian/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penggajian::find($id)->delete();
        alert()->success('Data Terhapus');
        return redirect('penggajian');
    }
}
