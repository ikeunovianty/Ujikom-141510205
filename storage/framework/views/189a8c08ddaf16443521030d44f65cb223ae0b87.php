<?php $__env->startSection('content'); ?>
	
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading" class="fa fa-paw" aria-hidden="true"><h1><center><strong>Tambah Data Penggajian</h1></strong></div>
        <div class="panel-body">

        <form class="form-horizontal" action="<?php echo e(route('penggajian.store')); ?>" method="POST">
                    <div class="form-group<?php echo e($errors->has('id_pegawai') ? ' has-error' : ''); ?>">
                            <label for="id_pegawai" class="col-md-4 control-label"> Pegawai :</label>
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
                                <?php if(isset($_GET['errors_match'])): ?>
                            <span class="help-block">
                                    <strong>Pegawai sudah melakukan penggajian bulan ini</strong>
                            </span>
                            <?php endif; ?>
                            <?php if(isset($missing_count)): ?>
                            <div style="width: 100%;color: red;text-align: center;">
                                Tunjangan Pegawai InI Tidak Ada <a href="<?php echo e(url('tunjanganpegawai/create')); ?>">disini</a>
                            </div>
                            <?php endif; ?>
                                </div>
                    </div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-4" >
              <button type="submit" class="btn btn-success">
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