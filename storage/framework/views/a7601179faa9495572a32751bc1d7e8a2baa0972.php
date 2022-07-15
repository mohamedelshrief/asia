<?php $__env->startPush('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd><?php echo e(trans('admin::admin.shortcuts.back_to_index', ['name' => trans('attribute::admin.attribute')])); ?></dd>
    </dl>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        keypressAction([
            { key: 'b', route: "<?php echo e(route('admin.attributes.index')); ?>" }
        ]);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/Modules/Attribute/Resources/views/admin/attributes/partials/shortcuts.blade.php ENDPATH**/ ?>