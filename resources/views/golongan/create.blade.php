@extends('layouts.app')

@section('content')
	
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">Tambah Data Golongan</div>
		<div class="panel-body">
			<form method="POST" action="{{url('golongan')}}">
			 	{{csrf_field()}}
				<div class="form-group{{ $errors->has('kode_golongan') ? ' has-error' : '' }}">
					<label>Kode Golongan</label>
					<input class="form-control" type="text" name="kode_golongan" placeholder="Masukkan Kode Golongan">
				</div>

				<div class="form-group{{ $errors->has('nama_golongan') ? ' has-error' : '' }}">
					<label>Nama Golongan</label>
					<input class="form-control" type="text" name="nama_golongan" placeholder="Masukkan Nama Golongan">
				</div>

				<div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
					<label>Besaran Uang</label>
					<input class="form-control" type="text" name="besaran_uang" placeholder="Masukkan Besaran Uang">
				</div>

				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>

@stop