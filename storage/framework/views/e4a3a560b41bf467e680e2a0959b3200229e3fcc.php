<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('tax::taxes.tax')])); ?>
    <?php $__env->slot('subtitle', $taxClass->title); ?>

    <li><a href="<?php echo e(route('admin.taxes.index')); ?>"><?php echo e(trans('tax::taxes.taxes')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('tax::taxes.tax')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.taxes.update', $taxClass)); ?>" class="form-horizontal" id="tax-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('taxClass')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tax::admin.taxes.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/Tax/Resources/views/admin/taxes/edit.blade.php ENDPATH**/ ?>