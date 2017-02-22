<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan_pegawai extends Model
{
    protected $table = 'tunjangan_pegawais';
    protected $fillable = array('id','kode_tunjangan_id','pegawai_id');
    protected $visible = array('id','kode_tunjangan_id','pegawai_id');

    public function tunjangan()
    {
    	return $this->belongsTo('App\tunjangan','id_tunjangan');
    }
    public function pegawai()
    {
    	return $this->belongsTo('App\pegawai','kode_tunjangan_id');
    }
    public function penggajian()
    {
        return $this->hasMany('App\penggajian','tunjangan_pegawai_id');
    }
}
