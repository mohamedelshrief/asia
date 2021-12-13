<?php $__env->startPush('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd><?php echo e(trans('menu::menu_items.back_to_menu_edit_page')); ?></dd>
    </dl>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        keypressAction([
            { key: 'b', route: "<?php echo e(route('admin.menus.edit', $menuId)); ?>" },
        ]);
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/Amp/Modules/Menu/Resources/views/admin/menu_items/partials/shortcuts.blade.php ENDPATH**/ ?>