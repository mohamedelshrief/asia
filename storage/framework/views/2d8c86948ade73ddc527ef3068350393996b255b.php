<?php $__env->startSection('title', trans('user::auth.reset_password')); ?>

<?php $__env->startSection('content'); ?>
    <section class="form-wrap register-wrap">
        <div class="container">
            <div class="form-wrap-inner register-wrap-inner">
                <h2><?php echo e(trans('user::auth.reset_password')); ?></h2>

                <form method="POST" action="<?php echo e(route('reset.complete.post', [$user->email, $code])); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="new-password">
                            <?php echo e(trans('user::attributes.users.new_password')); ?><span>*</span>
                        </label>

                        <input type="password" name="new_password" class="form-control" id="new-password">

                        <?php $__errorArgs = ['new_password'];
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

                    <div class="form-group">
                        <label for="confirm-new-password">
                            <?php echo e(trans('user::attributes.users.confirm_new_password')); ?><span>*</span>
                        </label>

                        <input type="password" name="new_password_confirmation" class="form-control" id="confirm-new-password">

                        <?php $__errorArgs = ['new_password_confirmation'];
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

                    <button type="submit" class="btn btn-primary btn-reset-password" data-loading>
                        <?php echo e(trans('user::auth.submit')); ?>

                    </button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Themes/Storefront/views/public/auth/reset/complete.blade.php ENDPATH**/ ?>