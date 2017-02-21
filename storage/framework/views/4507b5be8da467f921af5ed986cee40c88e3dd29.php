<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('pegawai.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('Permission') ? ' has-error' : ''); ?>">
                            <label for="permission" class="col-md-4 control-label">Permission</label>
                            <div class="col-md-6">
                                <input id="permission" type="text" class="form-control" name="permission" value="<?php echo e(old('permission')); ?>" required autofocus>

                                <?php if($errors->has('permission')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('permission')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pegawai</div>
                <div class="panel-body">
                    

                        <div class="form-group<?php echo e($errors->has('nip') ? ' has-error' : ''); ?>">
                            <label for="nip" class="col-md-4 control-label">Nip</label>

                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control" name="nip" value="<?php echo e(old('nip')); ?>" required autofocus>

                                <?php if($errors->has('nip')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nip')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('id_jabatan') ? ' has-error' : ''); ?>">
                            <label for="id_jabatan" class="col-md-4 control-label">Jabatan</label>

                            <div class="col-md-6">
                                <input id="id_jabatan" type="id_jabatan" class="form-control" name="id_jabatan" value="<?php echo e(old('id_jabatan')); ?>" required>  

                                <?php if($errors->has('id_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('id_golongan') ? ' has-error' : ''); ?>">
                            <label for="id_golongan" class="col-md-4 control-label">Golongan</label>

                            <div class="col-md-6">
                                <input id="id_golongan" type="text" class="form-control" name="id_golongan" value="<?php echo e(old('id_golongan')); ?>" required autofocus>

                                <?php if($errors->has('id_golongan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('id_golongan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div><br><br>

                        <div class="form-group<?php echo e($errors->has('foto') ? ' has-error' : ''); ?>">
                            <label for="foto" class="col-md-4 control-label">Photo</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control" name="foto" value="<?php echo e(old('foto')); ?>" required autofocus>

                                <?php if($errors->has('foto')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('foto')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div><br><br>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                        </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>