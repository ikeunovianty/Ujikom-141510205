<?php $__env->startSection('content'); ?>


<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading" class="fa fa-paw" aria-hidden="true"><h1><center><strong>Data Penggajian</h1></strong></div>
        <div class="panel-body">
            
                <form class="form-search" >
                    <p class="text-right">
                    <input type="text" class="input-medium search-query">
                    <button type="submit" class="btn btn-success">Pencarian</button>
                </p></form>
          <a class="btn btn-success" href="<?php echo e(url('penggajian/create')); ?>">Tambah Data</a><br><br>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr class="success">
                  <th>Nama Pegawai</th>
                  <th>Tunjangan Pegawai</th>
                  <th>NIP Pegawai</th>
                  <th colspan="3"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                  <td><?php echo e($users->name); ?></td>
                  <td><?php echo e($tunjangan->besaran_uang); ?></td>
                  <td><?php echo e($pegawai->nip); ?></td>
                  <td align="right" class="action-web">
                  <a href="<?php echo e(url('penggajian',$data->id)); ?>" class="btn btn-default" title="Details"><i class="fa fa-eye"></i></a></td>
                                </td>

                                <td >
                                  <a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip"><i class="glyphicon glyphicon-trash"></i></a>
                                  <?php echo $__env->make('modals.delete', [
                                    'url' => route('penggajian.destroy', $data->id),
                                    'model' => $data
                                  ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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