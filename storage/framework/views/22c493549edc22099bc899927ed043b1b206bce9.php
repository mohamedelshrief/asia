<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('slider::sliders.slider')])); ?>
    <?php $__env->slot('subtitle', $slider->name); ?>

    <li><a href="<?php echo e(route('admin.sliders.index')); ?>"><?php echo e(trans('slider::sliders.sliders')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('slider::sliders.slider')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.sliders.update', $slider)); ?>" class="form-horizontal" id="slider-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('slider')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('slider::admin.sliders.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/Slider/Resources/views/admin/sliders/edit.blade.php ENDPATH**/ ?>