<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Pegawai</div>
        <div class="panel-body">
        <a class="btn btn-success" href="<?php echo e(url('pegawai/create')); ?>">Tambah</a><br><br>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>No</th>
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Photo</th>
                        <th colspan="3">Opsi</th>
                    </tr>
                </thead>

                <?php $no=1; ?>
                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tbody>
                    <tr> 
                        <td> <?php echo e($no++); ?> </td>
                        <td> <?php echo e($data->nip); ?> </td>
                        <td> <?php echo e($data->User->name); ?></td>
                        <td> <?php echo e($data->User->email); ?></td>
                        <td> <?php echo e($data->id_jabatan); ?> </td>
                        <td> <?php echo e($data->id_golongan); ?> </td>
                        <td> <?php echo e($data->foto); ?> </td>
                        
                    
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>