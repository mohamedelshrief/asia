<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('menu::menu_items.menu_item')])); ?>

    <li><a href="<?php echo e(route('admin.menus.index')); ?>"><?php echo e(trans('menu::menus.menus')); ?></a></li>
    <li><a href="<?php echo e(route('admin.menus.edit', $menuId)); ?>"><?php echo e(trans('admin::resource.edit', ['resource' => trans('menu::menus.menu')])); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('menu::menu_items.menu_item')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.menus.items.store', $menuId)); ?>" class="form-horizontal" id="menu-item-create-form" novalidate>
        <?php echo e(csrf_field()); ?>


        <?php echo $tabs->render(compact('menuId', 'menuItem')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu::admin.menu_items.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/Menu/Resources/views/admin/menu_items/create.blade.php ENDPATH**/ ?>