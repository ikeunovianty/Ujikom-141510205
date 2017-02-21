@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Data Lembur Pegawai</div>
		<div class="panel-body">
			<form method="POST" action="{{url('lemburpegawai')}}">
			 	{{csrf_field()}}

			 	<div class="form-group">
					<label for="id_pegawai" class="col-md-4 control-label">Id Kode Lembur</label>	
					<div class="col-md-6">
				  <select class="form-control" name="kode_lembur_id">
                                @foreach ($kategori as $data)
                                <option value="{{ $data->id }}">{{ $data->kode_lembur_id }}</option>
                                @endforeach
                            </select>
				</div><br><br>
      
                    <div class="form-group{{ $errors->has('id_pegawai') ? ' has-error' : '' }}">
                            <label for="id_pegawai" class="col-md-4 control-label">Pegawai</label>
                                <div class="col-md-6">
                                    <select type="text" name="id_pegawai" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach($pegawai as $data)
                                    <option value="{!! $data->id !!}">{!! $data->nip !!}_{!! $data->User->name !!}</option>
                                    @endforeach
                                    </select>
                                    @if ($errors->has('id_pegawai'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_pegawai') }}</strong>
                                        </span>
                                    @endif
                                </div>
                    </div><br><br>

                    <div class="form-group">
                    <label for="id_pegawai" class="col-md-4 control-label">Jumlah Jam</label>   
                    <div class="col-md-6">
                        <input class="form-control" type="text" name="jumlah_jam" placeholder="Masukkan Jumlah Jam">
                           
                    </div></div><br><br>
                 
                    <div cclass="control">
                    <input class="btn btn-success" type="submit" name="submit" value="Tambah">
                    </div>

				
			</form>
		</div>
	</div>
</div>

@stop