<?php $__env->startSection('title', trans('user::auth.register')); ?>

<?php $__env->startSection('content'); ?>
    <section class="form-wrap register-wrap">
        <div class="container">
            <div class="form-wrap-inner register-wrap-inner">
                <h2><?php echo e(trans('user::auth.register')); ?></h2>

                <form method="POST" action="<?php echo e(route('register.post')); ?>">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="first-name">
                            <?php echo e(trans('user::auth.first_name')); ?><span>*</span>
                        </label>

                        <input type="text" name="first_name" value="<?php echo e(old('first_name')); ?>" id="first-name" class="form-control">

                        <?php $__errorArgs = ['first_name'];
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
                        <label for="last-name">
                            <?php echo e(trans('user::auth.last_name')); ?><span>*</span>
                        </label>

                        <input type="text" name="last_name" value="<?php echo e(old('last_name')); ?>" id="last-name" class="form-control">

                        <?php $__errorArgs = ['last_name'];
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
                        <label for="email">
                            <?php echo e(trans('user::auth.email')); ?><span>*</span>
                        </label>

                        <input type="text" name="email" value="<?php echo e(old('email')); ?>" id="email" class="form-control">

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

                    <div class="form-group">
                        <label for="phone">
                            <?php echo e(trans('user::auth.phone')); ?><span>*</span>
                        </label>

                        <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" id="phone" class="form-control">

                        <?php $__errorArgs = ['phone'];
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
                        <label for="password">
                            <?php echo e(trans('user::auth.password')); ?><span>*</span>
                        </label>

                        <input type="password" name="password" id="password" class="form-control">

                        <?php $__errorArgs = ['password'];
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
                        <label for="confirm-password">
                            <?php echo e(trans('user::auth.confirm_password')); ?><span>*</span>
                        </label>

                        <input type="password" name="password_confirmation" id="confirm-password" class="form-control">

                        <?php $__errorArgs = ['password_confirmation'];
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

                    <div class="form-group p-t-5">
                        <?php echo Igoshev\Captcha\Facades\Captcha::getView() ?>
                        <input type="text" name="captcha" id="captcha" class="captcha-input" placeholder="<?php echo e(trans('storefront::layout.enter_captcha_code')); ?>">

                        <?php $__errorArgs = ['captcha'];
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

                    <div class="form-check terms-and-conditions">
                        <input type="hidden" name="privacy_policy" value="0">
                        <input type="checkbox" name="privacy_policy" value="1" id="terms" <?php echo e(old('privacy_policy', false) ? 'checked' : ''); ?>>

                        <label for="terms" class="form-check-label">
                            <?php echo e(trans('user::auth.i_agree_to_the')); ?> <a href="<?php echo e($privacyPageUrl); ?>"><?php echo e(trans('user::auth.privacy_policy')); ?></a>
                        </label>

                        <?php $__errorArgs = ['privacy_policy'];
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

                    <button type="submit" class="btn btn-primary btn-create-account" data-loading>
                        <?php echo e(trans('user::auth.create_account')); ?>

                    </button>
                </form>

                <?php echo $__env->make('public.auth.partials.social_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <span class="have-an-account">
                    <?php echo e(trans('user::auth.already_have_an_account')); ?>

                </span>

                <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary btn-sign-in">
                    <?php echo e(trans('user::auth.sign_in')); ?>

                </a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Themes/Storefront/views/public/auth/register.blade.php ENDPATH**/ ?>