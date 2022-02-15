<aside class="main-sidebar">
    <header class="main-header clearfix">
        <a class="logo" href="<?php echo e(route('admin.dashboard.index')); ?>">
            <img src="<?php echo e(url('/images/logo-light.png')); ?>" width="80%" />
        </a>

        <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <i aria-hidden="true" class="fa fa-bars"></i>
        </a>
    </header>

    <section class="sidebar">
        <?php echo $sidebar; ?>

    </section>
</aside>
<?php /**PATH /var/www/html/Modules/Admin/Resources/views/partials/sidebar.blade.php ENDPATH**/ ?>