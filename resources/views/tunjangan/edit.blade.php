@extends('layouts.app')

@section('content')
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Edit Data Tunjangan</h1></strong></div>
        <div class="panel-body">

                
                    {!! Form::model($tunjangan,['method' => 'PATCH','route'=>['tunjangan.update',$tunjangan->id]]) !!}
                <div class="form-group">
                    {!! Form::label('kode_tunjangan', 'Kode Tunjangan : ') !!}
                    {!! Form::text('kode_tunjangan',null,['class'=>'form-control']) !!}
                </div>

                 <div class="control-group">
                        <label class="control-label">Id Jabatan</label>
                        <div class="controls">
                            <select class="span11" name="id_jabatan">
                                @foreach ($jabatan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                <div class="control-group">
                        <label class="control-label">Id Golongan</label>
                        <div class="controls">
                            <select class="span11" name="id_golongan">
                                @foreach ($golongan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_golongan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                 <div class="form-group">
                    {!! Form::label('jumlah_anak', 'Jumlah anak : ') !!}
                    {!! Form::text('jumlah_anak',null,['class'=>'form-control']) !!}
                </div>

                 <div class="form-group">
                    {!! Form::label('status', 'Status : ') !!}
                    {!! Form::text('status',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('besaran_uang', 'Besaran Uang : ') !!}
                    {!! Form::text('besaran_uang',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('SAVE', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
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
