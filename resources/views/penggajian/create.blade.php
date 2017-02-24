@extends('layouts.app')

@section('content')
	
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading" class="fa fa-paw" aria-hidden="true"><h1><center><strong>Tambah Data Penggajian</h1></strong></div>
        <div class="panel-body">

        <form class="form-horizontal" action="{{route('penggajian.store')}}" method="POST">
                    <div class="form-group{{ $errors->has('id_pegawai') ? ' has-error' : '' }}">
                            <label for="id_pegawai" class="col-md-4 control-label"> Pegawai :</label>
                                <div class="col-md-6">
                                    <select type="text" name="id_pegawai" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach($pegawai as $data)
                                        <option value="{!! $data->id !!}">{!! $data->nip !!}_{!! $data->User->name !!}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_pegawai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_pegawai') }}</strong>
                                    </span>
                                @endif
                                @if (isset($_GET['errors_match']))
                            <span class="help-block">
                                    <strong>Pegawai sudah melakukan penggajian bulan ini</strong>
                            </span>
                            @endif
                            @if (isset($missing_count))
                            <div style="width: 100%;color: red;text-align: center;">
                                Tunjangan Pegawai InI Tidak Ada <a href="{{url('tunjanganpegawai/create')}}">disini</a>
                            </div>
                            @endif
                                </div>
                    </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4" >
              <button type="submit" class="btn btn-success">
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
@endsection