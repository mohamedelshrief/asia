<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('menu::menus.menu')])); ?>
    <?php $__env->slot('subtitle', $menu->title); ?>

    <li><a href="<?php echo e(route('admin.menus.index')); ?>"><?php echo e(trans('menu::menus.menus')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('menu::menus.menu')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.menus.update', $menu)); ?>" class="form-horizontal" id="menu-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $__env->make('menu::admin.menus.form.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.langs['menu::messages.menu_item_deleted'] = '<?php echo e(trans('menu::messages.menu_item_deleted')); ?>';
        FleetCart.langs['menu::messages.menu_items_order_updated'] = '<?php echo e(trans('menu::messages.menu_items_order_updated')); ?>';
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('menu::admin.menus.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/Menu/Resources/views/admin/menus/edit.blade.php ENDPATH**/ ?>