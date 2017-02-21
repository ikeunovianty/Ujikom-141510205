@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Pegawai</div>

                <div class="panel-body">
                    {!! Form::model($pegawai,['method' => 'PATCH','route'=>['pegawai.update',$pegawai->id]]) !!}
                <div class="form-group">
                    {!! Form::label('nip', 'Nip') !!}
                    {!! Form::text('nip',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('id_jabatan', 'Id Jabatan') !!}
                    {!! Form::text('id_jabatan',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('id_pegawai', 'Id Pegawai') !!}
                    {!! Form::text('id_pegawai',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('jumlah_jam', 'Jumlah Jam') !!}
                    {!! Form::text('jumlah_jam',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection