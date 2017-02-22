<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Jabatan</div>

                <div class="panel-body">
                    <?php echo Form::model($jabatan,['method' => 'PATCH','route'=>['jabatan.update',$jabatan->id]]); ?>

                <div class="form-group">
                    <?php echo Form::label('kode_jabatan', 'Kode Jabatan'); ?>

                    <?php echo Form::text('kode_jabatan',null,['class'=>'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('nama_jabatan', 'Nama Jabatan'); ?>

                    <?php echo Form::text('nama_jabatan',null,['class'=>'form-control']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('besaran_uang', 'Besaran uang'); ?>

                    <?php echo Form::text('besaran_uang',null,['class'=>'form-control']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::submit('SIMPAN', ['class' => 'btn btn-primary']); ?>

                </div>
                <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>