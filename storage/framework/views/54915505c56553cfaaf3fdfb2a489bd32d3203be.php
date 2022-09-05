<?php $__env->startSection('title', trans('user::auth.reset_password')); ?>

<?php $__env->startSection('content'); ?>
    <div class="login-wrapper">
        <div class="bg-blue">
            <div class="reflection"></div>
        </div>

        <div class="form-inner reset-password clearfix">
            <h3 class="text-center"><?php echo e(trans('user::auth.reset_password')); ?></h3>
            <p class="text-center"><?php echo e(trans('user::auth.enter_email')); ?></p>

            <form method="POST" action="<?php echo e(route('admin.reset.post')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="<?php echo e(trans('user::attributes.users.email')); ?>" autofocus>

                    <div class="input-icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>

                    <?php echo $errors->first('email', '<span class="help-block text-red">:message</span>'); ?>

                </div>

                <button type="submit" class="btn btn-primary" data-loading>
                    <?php echo e(trans('user::auth.reset_password')); ?>

                </button>
            </form>

            <a class="text-center" href="<?php echo e(route('admin.login')); ?>"><?php echo e(trans('user::auth.i_remembered_my_password')); ?></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user::admin.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Modules/User/Resources/views/admin/auth/reset/begin.blade.php ENDPATH**/ ?>