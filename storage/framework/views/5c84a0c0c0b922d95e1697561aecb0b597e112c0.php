<?php $__env->startSection('content'); ?>
    <div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Edit Data Kategori Lembur</h1></strong></div>
        <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('kategori.update', $kategori_lembur->id)); ?>" method="POST">
                <input name="_method" type="hidden" value="PATCH">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('kode_lembur') ? ' has-error' : ''); ?>">
                            <label for="kode_lembur" class="col-md-4 control-label">Kode lembur :</label>
                                <div class="col-md-6">
                                    <input type="text" name="kode_lembur" value="<?php echo e($kategori_lembur->kode_lembur); ?>" class="form-control">
                                    <?php if($errors->has('kode_lembur')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_lembur')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('id_jabatan') ? ' has-error' : ''); ?>">
                            <label for="id_jabatan" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select name="id_jabatan" class="form-control">
                                <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jabatans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($jabatans->id); ?>" <?php if ($data->id_jabatan==$jabatans->id) {echo "selected";} ?>><?php echo e($jabatans->nama_jabatan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                                    <?php if($errors->has('id_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('id_golongan') ? ' has-error' : ''); ?>">
                            <label for="id_golongan" class="col-md-4 control-label">Nama Golongan :</label>
                                <div class="col-md-6">
                            <select name="id_golongan" class="form-control">
                                <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $golongans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($golongans->id); ?>" <?php if ($data->id_golongan==$golongans->id) {echo "selected";} ?>><?php echo e($golongans->nama_golongan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('besaran_uang') ? ' has-error' : ''); ?>">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label>
                                <div class="col-md-6">
                                    <input type="text" name="besaran_uang" value="<?php echo e($kategori_lembur->besaran_uang); ?>" class="form-control">
                                    <?php if($errors->has('besaran_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4" >
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
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
                       <?php if(Auth::guest()): ?>
                           <li><a class="" href="<?php echo e(url('/login')); ?>">Login</a></li>
                       <?php else: ?>
                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                               </a>

                               <ul class="dropdown-menu" role="menu">
                                   <li>
                                       <a href="<?php echo e(url('/logout')); ?>"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                           Logout
                                       </a>

                                       <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                           <?php echo e(csrf_field()); ?>

                                       </form>
                                   </li>
                               </ul>
                           </li>
                       <?php endif; ?>
                   </ul>
               </div>


               <div class="panel-body" align="center">
                   
                   <a href="<?php echo e(url('jabatan')); ?>">Jabatan</a><hr>
                   <a href="<?php echo e(url('golongan')); ?>">Golongan</a><hr>
                   <a href="<?php echo e(url('pegawai')); ?>">Pegawai</a><hr>
                   <a href="<?php echo e(url('kategori')); ?>">Kategori Lembur</a><hr>
                   <a href="<?php echo e(url('lemburpegawai')); ?>">Lembur Pegawai</a><hr>
                   <a href="<?php echo e(url('tunjangan')); ?>">Tunjangan</a><hr>
                   <a href="<?php echo e(url('tunjanganpegawai')); ?>">Tunjangan Karyawan</a><hr>
                   <a href="<?php echo e(url('penggajian')); ?>">Penggajian Karyawan</a><hr>  
 

               </div>
           </center>
       </div>
   </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>