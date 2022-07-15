<?php $__env->startPush('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd><?php echo e(trans('admin::admin.shortcuts.back_to_index', ['name' => trans('flashsale::flash_sales.flash_sale')])); ?></dd>
    </dl>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        keypressAction([
            { key: 'b', route: "<?php echo e(route('admin.flash_sales.index')); ?>" }
        ]);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/Modules/FlashSale/Resources/views/admin/flash_sales/partials/shortcuts.blade.php ENDPATH**/ ?>