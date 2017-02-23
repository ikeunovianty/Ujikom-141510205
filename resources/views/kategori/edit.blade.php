@extends('layouts.app')

@section('content')
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Edit Data Kategori Lembur</h1></strong></div>
        <div class="panel-body">

                <div class="panel-body">
                    {!! Form::model($kategori,['method' => 'PATCH','route'=>['kategori.update',$kategori->id]]) !!}
                <div class="form-group">
                    <div class="col-md-4 control-label">
                    {!! Form::label('kode_lembur', 'Kode Lembur') !!}
                    {!! Form::text('kode_lembur',null,['class'=>'form-control']) !!}
                </div></div>

                <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Golongan </label>
                            <div class="col-md-4">
                            <div class="form-group {{$errors->has('nama_golongan') ? 'has-errors':'message'}}" >
                            <select class="form-control" name="id_golongan" >
                            
                            @foreach($golongan as $data)
                            <option value="{!! $data->id !!}">{!! $data->nama_golongan !!}</option>
                            @endforeach
                            </select>
                            </div>
                            </div>
                <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Jabatan </label>
                            <div class="col-md-4">
                            <div class="form-group {{$errors->has('nama_jabatan') ? 'has-errors':'message'}}" >
                            <select class="form-control" name="id_jabatan" >
                            
                            @foreach($jabatan as $data)
                            <option value="{!! $data->id !!}">{!! $data->nama_jabatan !!}</option>
                            @endforeach
                            </select>
                            </div>
                            </div>
                <div class="form-group">
                    <div class="col-md-4 control-label">
                    {!! Form::label('besaran_uang', 'Besaran uang') !!}
                    {!! Form::text('besaran_uang',null,['class'=>'form-control']) !!}
                </div></div>

                <div class="form-group">
                    <div class="col-md-4 control-label">
                    {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary']) !!}
                </div></div>
                {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="col-md-3 ">
   <div class="panel panel-default">
       <div class="panel-heading">
           <center>
               <h3><strong>HALAMAN WEB</strong></h3>
               <h5></h5>
               <div class="collapse navbar-collapse">
                   <!-- Left Side Of Navbar -->
                   <ul class="nav navbar-nav">
                       &nbsp;
                   </ul>

                   <!-- Right Side Of Navbar -->

                   <ul class="nav navbar-nav navbar-center">
                       <!-- Authentication Links -->
                       @if (Auth::guest())
                           <li><a class="" href="{{ url('/login') }}">Login</a></li>
                       @else
                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   {{ Auth::user()->name }} <span class="caret"></span>
                               </a>

                               <ul class="dropdown-menu" role="menu">
                                   <li>
                                       <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                           Logout
                                       </a>

                                       <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                       </form>
                                   </li>
                               </ul>
                           </li>
                       @endif
                   </ul>
               </div>


               <div class="panel-body" align="center">
                   
                   <a href="{{url('jabatan')}}">Jabatan</a><hr>
                   <a href="{{url('golongan')}}">Golongan</a><hr>
                   <a href="{{url('pegawai')}}">Pegawai</a><hr>
                   <a href="{{url('kategori')}}">Kategori Lembur</a><hr>
                   <a href="{{url('lemburpegawai')}}">Lembur Pegawai</a><hr>
                   <a href="{{url('tunjangan')}}">Tunjangan</a><hr>
                   <a href="{{url('tunjanganpegawai')}}">Tunjangan Karyawan</a><hr>
                   <a href="{{url('penggajian')}}">Penggajian Karyawan</a><hr>  
 

               </div>
           </center>
       </div>
   </div>
</div>

@endsection