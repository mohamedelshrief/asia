<section class="navigation-wrap">
    <div class="container">
        <div class="navigation-inner">
            <?php echo $__env->make('public.layout.navigation.category_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="primary-box">
                <?php echo $__env->make('public.layout.navigation.primary_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <span class="navigation-text">
                    <?php echo e(setting('storefront_navbar_text')); ?>

                </span>
            </div>
        </div>
    </div>
</section><?php /**PATH /var/www/html/Themes/Storefront/views/public/layout/navigation.blade.php ENDPATH**/ ?>