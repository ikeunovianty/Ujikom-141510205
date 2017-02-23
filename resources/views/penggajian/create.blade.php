@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Data Penggajian</div>
		<div class="panel-body">
			<form method="POST" action="{{url('penggajian')}}">
			 	{{csrf_field()}}
      
                    <div class="control-group">
                        <label class="control-label">Id Tunjangan Pegawai</label>
                        <div class="controls">
                            <select class="form-control" name="tunjangan_pegawai_id">
                                @foreach ($tunjanganpegawai as $data)
                                <option value="{{ $data->id }}">{{ $data->tunjangan_pegawai_id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label>Jumlah Jam Lembur </label>
                       <input class="form-control" type="text" name="jumlah_jam_lembur" placeholder="Masukkan Jumlah Jam">
                    
                    </div>
                    
				<div class="form-group">
					<label>Jumlah Uang Lembur</label>
					<input class="form-control" type="text" name="jumlah_uang_lembur" placeholder="Masukkan Uang Lembur">
				</div>

                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input class="form-control" type="text" name="gaji_pokok" placeholder="Masukkan Gaji Pokok">
                </div>

                 <div class="form-group">
                    <label>Total Gaji</label>
                    <input class="form-control" type="text" name="total_gaji">
                </div>

                 <div class="form-group">
                    <label>Tanggal Pengambilan</label>
                    <input class="form-control" type="date" name="tanggal_pengembalian">
                </div>

                 <div class="form-group">
                    <label>Status Pengambilan</label>
                    <input class="form-control" type="text" name="status_pengambilan" placeholder="Masukkan Status Pengambilan">
                </div>

                 <div class="form-group">
                    <label>Petugas Penerima</label>
                    <input class="form-control" type="text" name="petugas_penerima" placeholder="Masukkan Tugas Penerima">
                </div>

				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
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