<?php if(count($providers) !== 0): ?>
    <span class="sign-in-with">
        <?php if(request()->routeIs('login')): ?>
            <?php echo e(trans('user::auth.or_continue_with')); ?>

        <?php else: ?>
            <?php echo e(trans('user::auth.or_sign_up_with')); ?>

        <?php endif; ?>
    </span>

    <ul class="list-inline social-login">
            <li>
                <a href="<?php echo e(route('login.redirect', ['provider' => 'facebook'])); ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('user::auth.facebook')); ?>">
                   <img src="/images/facebook.png" width="27px"/>
                </a>
            </li>

            <li>
                <a href="<?php echo e(route('login.redirect', ['provider' => 'google'])); ?>" class="google" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('user::auth.google')); ?>">
                    <img src="/images/google.png" width="20px"/>
                </a>
            </li>


        <?php if(setting('apple_login_enabled')): ?>
            <li>
                <a href="<?php echo e(route('login.redirect', ['provider' => 'apple'])); ?>" class="apple" data-toggle="tooltip" data-placement="top" title="Apple">
                    <img src="/images/apple.png" width="20px"/>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
<?php /**PATH /var/www/html/Themes/Storefront/views/public/auth/partials/social_login.blade.php ENDPATH**/ ?>