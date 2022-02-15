<?php $__env->startSection('title', trans('user::auth.reset_password')); ?>

<?php $__env->startSection('content'); ?>
    <section class="form-wrap register-wrap">
        <div class="container">
            <div class="form-wrap-inner register-wrap-inner">
                <h2><?php echo e(trans('user::auth.reset_password')); ?></h2>
                <p><?php echo e(trans('user::auth.enter_email')); ?></p>

                <form method="POST" action="<?php echo e(route('reset.post')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="email"><?php echo e(trans('user::attributes.users.email')); ?><span>*</span></label>
                        <input type="text" name="email" value="<?php echo e(old('email')); ?>" id="email" class="form-control" autofocus>

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="btn btn-secondary btn-reset-password" data-loading style="width: 100%;">
                        <?php echo e(trans('user::auth.submit')); ?>

                    </button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Themes/Storefront/views/public/auth/reset/begin.blade.php ENDPATH**/ ?>