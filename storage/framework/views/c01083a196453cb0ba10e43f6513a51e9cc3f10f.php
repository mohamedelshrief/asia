<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('brand::brands.brand')])); ?>
    <?php $__env->slot('subtitle', $brand->name); ?>

    <li><a href="<?php echo e(route('admin.brands.index')); ?>"><?php echo e(trans('brand::brands.brands')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('brand::brands.brand')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.brands.update', $brand)); ?>" class="form-horizontal" id="brand-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('brand')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('brand::admin.brands.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/Brand/Resources/views/admin/brands/edit.blade.php ENDPATH**/ ?>