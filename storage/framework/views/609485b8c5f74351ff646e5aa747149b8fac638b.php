<?php $__env->startSection('content'); ?>
	
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Data Lembur Pegawai</div>
		<div class="panel-body">
			<form method="POST" action="<?php echo e(url('lemburpegawai')); ?>">
			 	<?php echo e(csrf_field()); ?>


			 	<div class="form-group">
					<label for="id_pegawai" class="col-md-4 control-label">Id Kode Lembur</label>	
					<div class="col-md-6">
				  <select class="form-control" name="kode_lembur_id">
                                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->kode_lembur); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
				</div><br><br>
      
                    <div class="form-group<?php echo e($errors->has('id_pegawai') ? ' has-error' : ''); ?>">
                            <label for="id_pegawai" class="col-md-4 control-label">Pegawai</label>
                                <div class="col-md-6">
                                    <select type="text" name="id_pegawai" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo $data->id; ?>"><?php echo $data->nip; ?>_<?php echo $data->User->name; ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                    <?php if($errors->has('id_pegawai')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('id_pegawai')); ?></strong>
                                        </span>
                                    <?php endif; ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>