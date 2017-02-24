@extends('layouts.app')

@section('content')
	
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Tambah Data Golongan</h1></strong></div>
        <div class="panel-body">
			<form method="POST" action="{{url('golongan')}}">
			 	{{csrf_field()}}
				<div class="form-group ">
                            <label for="kode_golongan" class="col-md-4 control-label">Kode Golongan</label>
                            <div class="col-md-6">
                            <div class="form-group {{$errors->has('kode_golongan') ? 'has-errors':'message'}}" >
                                <input id="kode_golongan" type="text" class="form-control" name="kode_golongan" value="{{ old('kode_golongan') }}" placeholder="Masukkan Kode Golongan"  autofocus>
                            @if($errors->has('kode_golongan'))
                                <span class="help-block">
                                    <strong>{{$errors->first('kode_golongan')}}</strong>
                                </span>
                            @endif
                            </div>  
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="nama_golongan" class="col-md-4 control-label">Nama Golongan</label>
                            <div class="col-md-6">
                            <div class="form-group {{$errors->has('nama_golongan') ? 'has-errors':'message'}}" >
                                <input id="nama_golongan" type="text" class="form-control" name="nama_golongan" value="{{ old('nama_golongan') }}" placeholder="Masukkan Nama Golongan" autofocus>
                             @if($errors->has('nama_golongan'))
                                <span class="help-block">
                                    <strong>{{$errors->first('nama_golongan')}}</strong>
                                </span>
                            @endif
                            </div>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
                            <div class="col-md-6">
                            <div class="form-group {{$errors->has('besaran_uang') ? 'has-errors':'message'}}" >
                                <input id="besaran_uang" type="text" class="form-control" name="besaran_uang" value="{{ old('besaran_uang') }}" placeholder="Masukkan Besaran Uang" autofocus>
                             @if($errors->has('besaran_uang'))
                                <span class="help-block">
                                    <strong>{{$errors->first('besaran_uang')}}</strong>
                                </span>
                            @endif
                            </div>
                            </div>
                            </div>

				<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success" >
                                    Simpan
                                </button>
                            </div>
                        </div>
			</form>
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
@stop