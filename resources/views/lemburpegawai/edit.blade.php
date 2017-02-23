@extends('layouts.app')

@section('content')
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Edit Data Lembur Pegawai</h1></strong></div>
        <div class="panel-body">
                    {!! Form::model($lemburpegawai,['method' => 'PATCH','route'=>['lemburpegawai.update',$lemburpegawai->id]]) !!}

                    <div class="form-group">
                        <label for="kode_lembur_id" class="col-md-4 control-label">Kode Kategori</label>
                        <div class="col-md-4">
                            <select class="form-control" name="kode_lembur_id" required> 
                                @foreach($kategori as $data)
                                <option value="{!! $data->id !!}">{!! $data->kode_lembur!!}</option>
                                @endforeach
                            </select>
                        </div></div>
                    </div><br>

                    

                <div class="form-group">
                    <label for="id_pegawai" class="col-md-4 control-label">Nama Pegawai</label>
                        <div class="col-md-4">
                            <select class="form-control" name="id_pegawai" required>
                                
                                @foreach($pegawai as $data)
                                <option value="{!! $data->id !!}">{!! $data->User->name!!}</option>
                                @endforeach
                            </select>
                        </div>
                        
                </div>
                <div class="form-group">
                    <label for="jumlah_jam" class="col-md-4 control-label">Jumlah Jam</label>
                        <div class="col-md-4">
                            <input type="text" name="jumlah_jam" class="form-control" value ="{{$lemburpegawai->jumlah_jam}}" >
                        </div>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-">
                        <button type="submit" class="btn btn-primary">
                                    Simpan
                        </button>
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