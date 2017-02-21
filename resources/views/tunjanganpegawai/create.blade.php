@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Data Kategori Lembur</div>
		<div class="panel-body">
			<form method="POST" action="{{url('tunjanganpegawai')}}">
			 	{{csrf_field()}}
      
                    <div class="control-group">
                        <label class="control-label">Tunjangan</label>
                        <div class="controls">
                            <select class="form-control" name="kode_tunjangan">
                                @foreach ($tunjangan as $data)
                                <option value="{{ $data->id }}">{{ $data->kode_tunjangan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Id Pegawai</label>
                        <div class="controls">
                            <select class="span11" name="id_pegawai">
                                @foreach ($pegawai as $data)
                                <option value="{{ $data->id }}">{{ $data->User->name }}</option>
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