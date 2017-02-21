@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tunjangan Pegawai</div>
        <div class="panel-body">
        <a class="btn btn-success" href="{{url('tunjanganpegawai/create')}}">Tambah Data</a><br><br>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th><center>Id</th>
                        <th><center>Kode Tunjangan</th>
                        <th><center>NIP Pegawai</th>
                        <th><center>Nama Pegawai</th>
                        <th><center>Besar Tunjangan</th>
                        <th colspan="3"><center>Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                @foreach ($tunjanganpegawai as $data)
                <tbody>
                    <tr> 
                        <td> {{$id++}} </td>
                        <td> {{$data->tunjangan->kode_tunjangan}} </td>
                        <td> {{$data->pegawai->nip}} </td>
                        <td> {{$data->pegawai->User->name}} </td>
                        <td> {{$data->tunjangan->besaran_uang}} </td>
                        <td><a href="{{route('tunjanganpegawai.edit',$data->id)}}" class="btn btn-warning">Edit</a></td>
                        <td ><a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        @include('modals.delete', ['url' => route('tunjanganpegawai.destroy', $data->id),'model' => $data])
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection