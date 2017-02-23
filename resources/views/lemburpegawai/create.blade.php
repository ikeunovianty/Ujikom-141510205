@extends('layouts.app')

@section('content')
	
<div class="col-md-8">
    <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Tambah Data Lembur Pegawai</h1></strong></div>
            <div class="panel-body">
			<form method="POST" action="{{url('lemburpegawai')}}">
			 	{{csrf_field()}}

			 	<div class="form-group">
					<label for="kode_lembur_id" class="col-md-4 control-label">Id Kode Lembur</label>	
					<div class="col-md-6">
				  <select class="form-control" name="kode_lembur_id">
                                @foreach ($kategori as $data)
                                <option value="{{ $data->id }}">{{ $data->kode_lembur }}</option>
                                @endforeach
                            </select>
				</div><br><br>
      
                    <div class="form-group{{ $errors->has('id_pegawai') ? ' has-error' : '' }}">
                            <label for="id_pegawai" class="col-md-4 control-label">Pegawai</label>
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
                                </div>
                    </div><br><br>

                    <div class="form-group">
                    <label for="jumlah_jam" class="col-md-4 control-label">Jumlah Jam</label>   
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="jumlah_jam" placeholder="Masukkan Jumlah Jam">
                           
                    </div></div><br><br>
                 
                    <div cclass="control">
                    <input class="btn btn-success" type="submit" name="submit" value="Tambah">
                    </div>
		      </div>	
		</div>
	</div>
</div>
</form>
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