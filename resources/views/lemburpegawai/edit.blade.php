@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Lembur Pegawai</div>

                <div class="panel-body">
                    {!! Form::model($lemburpegawai,['method' => 'PATCH','route'=>['lemburpegawai.update',$lemburpegawai->id]]) !!}
                <div class="form-group">
                    {!! Form::label('kode_lembur_id', 'Id Kode lembur') !!}
                    {!! Form::text('kode_lembur_id',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('User->name', 'Nama Pegawai') !!}
                    {!! Form::text('User->name',null,['class'=>'form-control']) !!}
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