<?php $__env->startSection('title', trans('storefront::account.pages.my_downloads')); ?>

<?php $__env->startSection('account_breadcrumb'); ?>
    <li class="active"><?php echo e(trans('storefront::account.pages.my_downloads')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('panel'); ?>
    <div class="panel">
        <div class="panel-header">
            <h4><?php echo e(trans('storefront::account.pages.my_downloads')); ?></h4>
        </div>

        <div class="panel-body">
            <?php if($downloads->isEmpty()): ?>
                <div class="empty-message">
                    <h3><?php echo e(trans('storefront::account.downloads.no_downloadable_files')); ?></h3>
                </div>
            <?php else: ?>
                <?php echo $__env->make('public.account.downloads.partials.downloads_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.account.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Themes/Storefront/views/public/account/downloads/index.blade.php ENDPATH**/ ?>