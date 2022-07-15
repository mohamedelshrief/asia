<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('menu::menu_items.menu_item')])); ?>
    <?php $__env->slot('subtitle', $menuItem->title); ?>

    <li><a href="<?php echo e(route('admin.menus.edit', $menuId)); ?>"><?php echo e(trans('admin::resource.edit', ['resource' => trans('menu::menus.menu')])); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('menu::menu_items.menu_item')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.menus.items.update', [$menuId, $menuItem])); ?>" class="form-horizontal" id="menu-item-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('menuId', 'menuItem')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu::admin.menu_items.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Modules/Menu/Resources/views/admin/menu_items/edit.blade.php ENDPATH**/ ?>