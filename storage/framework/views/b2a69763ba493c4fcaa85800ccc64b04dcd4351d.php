<?php $__env->startSection('content'); ?>
	
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">Tambah Data Golongan</div>
		<div class="panel-body">
			<form method="POST" action="<?php echo e(url('golongan')); ?>">
			 	<?php echo e(csrf_field()); ?>

				<div class="form-group<?php echo e($errors->has('kode_golongan') ? ' has-error' : ''); ?>">
					<label>Kode Golongan</label>
					<input class="form-control" type="text" name="kode_golongan" placeholder="Masukkan Kode Golongan">
				</div>

				<div class="form-group<?php echo e($errors->has('nama_golongan') ? ' has-error' : ''); ?>">
					<label>Nama Golongan</label>
					<input class="form-control" type="text" name="nama_golongan" placeholder="Masukkan Nama Golongan">
				</div>

				<div class="form-group<?php echo e($errors->has('besaran_uang') ? ' has-error' : ''); ?>">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>