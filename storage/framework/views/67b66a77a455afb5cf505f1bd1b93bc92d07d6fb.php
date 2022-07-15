<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('name', trans('brand::attributes.name'), $errors, $brand, ['required' => true])); ?>

        <?php echo e(Form::checkbox('is_active', trans('brand::attributes.is_active'), trans('brand::brands.form.enable_the_brand'), $errors, $brand)); ?>

    </div>
</div>
<?php /**PATH /var/www/html/Modules/Brand/Resources/views/admin/brands/tabs/general.blade.php ENDPATH**/ ?>