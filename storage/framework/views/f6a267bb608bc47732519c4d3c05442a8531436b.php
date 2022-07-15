<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('option::options.option')])); ?>
    <?php $__env->slot('subtitle', $option->name); ?>

    <li><a href="<?php echo e(route('admin.options.index')); ?>"><?php echo e(trans('option::options.options')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('option::options.option')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.options.update', $option)); ?>" class="form-horizontal" id="option-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('option')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('option::admin.options.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Modules/Option/Resources/views/admin/options/edit.blade.php ENDPATH**/ ?>