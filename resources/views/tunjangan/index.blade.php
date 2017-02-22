@extends('layouts.app')

@section('content')

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
                   
                   <a class="btn btn-danger form-control" href="{{url('jabatan')}}">Jabatan</a><hr>
                   <a class="btn btn-danger form-control" href="{{url('golongan')}}">Golongan</a><hr>
                   <a class="btn btn-danger form-control" href="{{url('pegawai')}}">Pegawai</a><hr>
                   <a class="btn btn-danger form-control" href="{{url('kategori')}}">Kategori Lembur</a><hr>
                   <a class="btn btn-danger form-control" href="{{url('lemburpegawai')}}">Lembur Pegawai</a><hr>
                   <a class="btn btn-danger form-control" href="{{url('tunjangan')}}">Tunjangan</a><hr>
                   <a class="btn btn-danger form-control" href="{{url('tunjanganpegawai')}}">Tunjangan Karyawan</a><hr>
                   <a class="btn btn-danger form-control" href="{{url('penggajian')}}">Penggajian Karyawan</a><hr>  
 

               </div>
           </center>
       </div>
   </div>
</div>

    <div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Data Tunjangan</h1></strong></div>
        <div class="panel-body">
            
                <form class="form-search" >
                    <p class="text-right">
                    <input type="text" class="input-medium search-query">
                    <button type="submit" class="btn btn-success">Mencari</button>
                </p></form>
        <a class="btn btn-success" href="{{url('tunjangan/create')}}">Tambah Data</a><br><br>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>Id</th>
                        <th>Kode Tunjangan</th>
                        <th>Nama Jabatan</th>
                        <th>Nama Golongan</th>
                        <th>Status</th>
                        <th>Jumlah Anak</th>
                        <th>Besaran Uang</th>
                        <th colspan="3"><center>Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                @foreach ($tunjangan as $data)
                <tbody>
                    <tr> 
                        <td>{{$id++}}</td>
                        <td>{{$data->kode_tunjangan}}</td>
                        <td>{{$data->jabatan->nama_jabatan}}</td>
                        <td>{{$data->golongan->nama_golongan}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{$data->jumlah_anak}}</td>
                        <td>Rp.{{$data->besaran_uang}}</td>
                        <td><a href="{{route('tunjangan.edit',$data->id)}}" class="btn btn-warning">Edit</a></td>
                        <td ><a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        @include('modals.delete', ['url' => route('tunjangan.destroy', $data->id),'model' => $data])
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection