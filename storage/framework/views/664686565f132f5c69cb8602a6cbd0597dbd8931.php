<div class="option-values clearfix" id="option-values">
    <div class="alert alert-info" id="option-values-info">
        <?php echo e(trans('option::options.please_select_a_option_type')); ?>

    </div>
</div>

<?php echo $__env->make('option::admin.options.templates.option.text', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('option::admin.options.templates.option.select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('option::admin.options.templates.option.select_values', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/Modules/Option/Resources/views/admin/options/tabs/values.blade.php ENDPATH**/ ?>