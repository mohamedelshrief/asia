<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.data['option.values'] = <?php echo old_json('values', $option->values); ?>;
        FleetCart.errors['option.values'] = <?php echo json_encode($errors->get('values.*'), JSON_FORCE_OBJECT, 512) ?>;
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd><?php echo e(trans('admin::admin.shortcuts.back_to_index', ['name' => trans('option::options.option')])); ?></dd>
    </dl>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        keypressAction([
            { key: 'b', route: "<?php echo e(route('admin.options.index')); ?>" },
        ]);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/Modules/Option/Resources/views/admin/options/partials/scripts.blade.php ENDPATH**/ ?>