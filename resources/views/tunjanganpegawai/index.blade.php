@extends('layouts.app')

@section('content')

    <div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Data Tunjangan Pegawai</h1></strong></div>
        <div class="panel-body">
            
                <form class="form-search" >
                    <p class="text-right">
                    <input type="text" class="input-medium search-query">
                    <button type="submit" class="btn btn-info">Pencarian</button>
                </p></form>
        <a class="btn btn-success" href="{{url('tunjanganpegawai/create')}}">Tambah Data</a><br><br>
            <table class="table table-primary">
                <thead>
                  <tr>
                                <td>No</td>
                                <td>Kode Tunjangan</td>
                                <td>Nama Pegawai</td>
                                <td colspan="3">Opsi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $id=1;
                            @endphp
                            @foreach ($tunjanganpegawai as $data)
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{ $data->tunjangan->kode_tunjangan }}</td>
                                    <td>{{$data->pegawai->User->name}}</td>
                                    <td><a href="{{route('tunjanganpegawai.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    
                        <td ><a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        @include('modals.delete', ['url' => route('tunjanganpegawai.destroy', $data->id),'model' => $data])
                        </td>
                    </tr>
                </tbody>
                @endforeach
                        </tbody>


                    
                        
            </table>
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