@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Data Kategori Lembur</div>
		<div class="panel-body">
			<form method="POST" action="{{url('tunjanganpegawai')}}">
			 	{{csrf_field()}}
      
                    
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nip Pegawai</label>
                            <div class="col-md-6">
                                <select class="form-control" name="id_pegawai" >
                                    <option>pilih</option>
                                    @foreach ($pegawai as $data)
                                    <option value="{!!$data->id!!}">{!!$data->nip!!}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>

                    <div class="form-group" >
                         <label for="name" class="col-md-4 control-label">Uang Tunjangan</label>
                         <div class="col-md-6">
                            <select class="form-control" name="kode_tunjangan_id" >
                            <option >Pilih</option>
                            @foreach($tunjangan as $data)
                            <option value="{!! $data->id !!}">{!! $data->besaran_uang !!}</option>
                            @endforeach
                            </select>
                        </div>
                      </div>

				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>

@stop