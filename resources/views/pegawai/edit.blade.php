@extends('layouts.app')
@section('content')
<div class="col-md-6">
    <div class="panel panel-info">
        <div class="panel-heading"><h1><strong>Tambah Kategori Lembur</strong></h1></div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('pegawai.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nama</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $data->user->name }}" >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" class="form-control" name="email" value="{{ $data->user->email }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                        <label for="permission" class="col-md-4 control-label">Permisions</label>
                        <div class="col-md-6">
                            <?php 
                                $selection = [$data->user->permission=>$data->user->permission];
                                if (Auth::user()->permission == 'Admin') {
                                    $selection['Admin']='Admin';
                                }
                                    $selection['hrd']='HRD';
                                    $selection['Pegawai']='Pegawai';
                             ?>
                            {!! Form::select('permission',$selection,'',['class'=>'form-control']) !!}
                            @if ($errors->has('permission'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('permission') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    </td></tr><tr><td>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="text" class="form-control" name="password" value="{{$data->user->password }}">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">NIP :</label>
                                <div class="col-md-6">
                                    <input type="text" name="nip" value="{{$data->nip}}" class="form-control">
                                    @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('id_jabatan') ? ' has-error' : '' }}">
                            <label for="id_jabatan" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select name="id_jabatan" class="form-control">
                                @foreach ($jabatan as $jabatans)
                                <option value="{{$jabatans->id}}" <?php if ($data->id_jabatan==$jabatans->id) {echo "selected";} ?>>{{$jabatans->nama_jabatan}}</option>
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
                            <select name="id_golongan" class="form-control">
                                @foreach ($golongan as $golongans)
                                <option value="{{$golongans->id}}" <?php if ($data->id_golongan==$golongans->id) {echo "selected";} ?>>{{$golongans->nama_golongan}}</option>
                                @endforeach
                            </select>
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                            <label for="id_golongan" class="col-md-4 control-label">
                            <img src="/account/foto/{{$data->foto}}" width="100px" height="100px">
                                </label>
                                <div>
                                <input id="foto" type="file" name="foto" style="margin-top: 50px" >
                                    @if ($errors->has('foto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('foto') }}</strong>
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

<div class="col-md-5 ">
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
</form>
@endsection