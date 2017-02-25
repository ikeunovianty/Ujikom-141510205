@extends('layouts.app')

@section('content')


<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading" class="fa fa-paw" aria-hidden="true"><h1><center><strong>Data Penggajian</h1></strong></div>
        <div class="panel-body">
            
                <form class="form-search" >
                    <p class="text-right">
                    <input type="text" class="input-medium search-query">
                    <button type="submit" class="btn btn-success">Pencarian</button>
                </p></form>
          <a class="btn btn-success" href="{{url('penggajian/create')}}">Tambah Data</a><br><br>
            <table class="table table-striped">
                <thead>
                <tr class="success">
                
                          <td>Id</td>
                          <td>Pegawai</td>
                          <td>Jumlah Jam Lembur</td>
                          <td>Jumlah Uang Lembur</td>
                          <td>Gaji Pokok</td>
                          <td>Total Gaji</td>
                          <td>Tanggal Pengambilan</td>
                          <td>Status Pengambilan</td>
                          <td>Petugas Penerima</td>
                          
                        
                  <th colspan="3"><center>Opsi</center></th>
                </tr>
              </thead>
              <tbody>

                <?php $id=1; ?>
              @foreach($gajian as $data)
                <tbody>
                                <tr>
                                    <td>{{$id++}}</td>
                                    <td>{{$data->tunjanganpegawai->pegawai->User->name}}</td>
                                    <td>{{$data->jumlah_jam_lembur}} </td>
                                    <td>{{$data->jumlah_uang_lembur}} </td>
                                    <td>{{$data->gaji_pokok}} </td>
                                    <td>{{$data->total_gaji}} </td>
                                    <td>{{$data->updated_at}} </td>
                                    
                                    @if($data->status_pengambilan == 0)
                                    
                                        <td>Belum Diambil </td>
                                    
                                    @endif
                                    @if($data->status_pengambilan == 1)
                                    
                                        <td>Sudah Diambil</td>
                                    
                                    @endif
                                  <td>{{$data->petugas_penerima}} </td>
                                 
                  <td align="right" class="action-web">
                  <a href="{{url('penggajian',$data->id)}}" class="btn btn-default" title="Details"><i class="fa fa-eye"></i></a></td>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  @include('modals.delete', [
                                    'url' => route('penggajian.destroy', $data->id),
                                    'model' => $data
                                  ])
                                </td>
                </tr>
              @endforeach
              </tbody>
            </table>
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
                   <a href="{{url('pegawai')}}">pegawai</a><hr>
                   <a href="{{url('kategori')}}">Kategori Lembur</a><hr>
                   <a href="{{url('lemburpegawai')}}">Lembur pegawai</a><hr>
                   <a href="{{url('tunjangan')}}">Tunjangan</a><hr>
                   <a href="{{url('tunjanganpegawai')}}">Tunjangan Karyawan</a><hr>
                   <a href="{{url('penggajian')}}">Penggajian Karyawan</a><hr>  
 

               </div>
           </center>
       </div>
   </div>
</div>
@endsection