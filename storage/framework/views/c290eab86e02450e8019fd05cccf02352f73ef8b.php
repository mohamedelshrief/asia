<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('flashsale::flash_sales.flash_sale')])); ?>
    <?php $__env->slot('subtitle', $flashSale->campaign_name); ?>

    <li><a href="<?php echo e(route('admin.flash_sales.index')); ?>"><?php echo e(trans('flashsale::flash_sales.flash_sales')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('flashsale::flash_sales.flash_sale')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.flash_sales.update', $flashSale)); ?>" class="form-horizontal" id="flash-sale-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('flashSale')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('flashsale::admin.flash_sales.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Modules/FlashSale/Resources/views/admin/flash_sales/edit.blade.php ENDPATH**/ ?>