@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Edit Data Tunjangan Pegawai</center></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('tunjanganpegawai.update',$tunjanganpegawai->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                            
                            <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nip Pegawai</label>
                            <div class="col-md-6">
                            <select class="form-control" name="id_pegawai" required>
                            <option >Pilih</option>
                            @foreach($pegawai as $data)
                            <option value="{!! $data->id !!}">{!! $data->nip !!}</option>
                            @endforeach
                            </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Uang Tunjangan</label>
                            <div class="col-md-6">
                            <select class="form-control" name="id_tunjangan" required>
                            <option >Pilih</option>
                            @foreach($tunjangan as $data)
                            <option value="{!! $data->id !!}">{!! $data->besaran_uang !!}</option>
                            @endforeach
                            </select>
                            </div>
                            </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    SIMPAN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
