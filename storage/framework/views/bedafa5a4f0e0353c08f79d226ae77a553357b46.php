<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.show', ['resource' => trans('order::orders.order')])); ?>

    <li><a href="<?php echo e(route('admin.orders.index')); ?>"><?php echo e(trans('order::orders.orders')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.show', ['resource' => trans('order::orders.order')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="order-wrapper">
        <?php echo $__env->make('order::admin.orders.partials.order_and_account_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('order::admin.orders.partials.address_information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('order::admin.orders.partials.order_placing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('order::admin.orders.partials.items_ordered', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('order::admin.orders.partials.order_totals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/asiamp/Modules/Order/Resources/views/admin/orders/show.blade.php ENDPATH**/ ?>