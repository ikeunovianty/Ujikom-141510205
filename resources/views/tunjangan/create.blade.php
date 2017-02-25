@extends('layouts.app')

@section('content')
	
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Tambah Data Tunjangan</h1></strong></div>
        <div class="panel-body">


                         
        <form class="form-horizontal" action="{{route('tunjangan.store')}}" method="POST">  
          <div class="form-group{{ $errors->has('kode_tunjangan') ? ' has-error' : '' }}">
              <label for="kode_tunjangan" class="col-md-4 control-label">Kode Tunjangan :</label>
                <div class="col-md-6">
                  <input type="text" name="kode_tunjangan" placeholder="Kode Tunjangan" class="form-control" autofocus>
                  @if ($errors->has('kode_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                                @endif
                </div>
          </div>
          <div class="form-group{{ $errors->has('id_jabatan') ? ' has-error' : '' }}">
                            <label for="id_jabatan" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select type="text" name="id_jabatan" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($jabatan as $data)
                                    <option value="{!! $data->id !!}">{!! $data->nama_jabatan!!}</option>
                                    @endforeach
                                    </select>
                                    @if ($errors->has('id_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_jabatan') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('id_golongan') ? ' has-error' : '' }}">
                            <label for="id_golongan" class="col-md-4 control-label">Nama Golongan :</label>
                                <div class="col-md-6">
                                    <select type="text" name="id_golongan" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach($golongan as $data)
                                        <option value="{!! $data->id !!}">{!! $data->nama_golongan !!}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_golongan') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>

          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
              <label for="status" class="col-md-4 control-label">Status :</label>
                <div class="col-md-6">
                  <input type="text" name="status" placeholder="Status" class="form-control">
                  @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                </div>
          </div>
          <div class="form-group{{ $errors->has('jumlah_anak') ? ' has-error' : '' }}">
              <label for="jumlah_anak" class="col-md-4 control-label">Jumlah Anak :</label>
                <div class="col-md-6">
                  <input type="numeric" name="jumlah_anak" placeholder="Jumlah Anak" class="form-control">
                  @if ($errors->has('jumlah_anak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                                @endif
                </div>
          </div>

          <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
              <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label>
                <div class="col-md-6">
                  <input type="text" name="besaran_uang" placeholder="Besaran Uang" class="form-control">
                  @if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                                @endif
                </div>
          </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4" >
              <button type="submit" class="btn btn-primary">
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