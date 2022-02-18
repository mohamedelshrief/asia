<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('coupon::coupons.coupon')])); ?>
    <?php $__env->slot('subtitle', $coupon->name); ?>

    <li><a href="<?php echo e(route('admin.coupons.index')); ?>"><?php echo e(trans('coupon::coupons.coupons')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('coupon::coupons.coupon')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.coupons.update', $coupon)); ?>" class="form-horizontal" id="coupon-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('coupon')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('coupon::admin.coupons.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/Coupon/Resources/views/admin/coupons/edit.blade.php ENDPATH**/ ?>