<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('ngenius_enabled', trans('setting::attributes.ngenius_enabled'), trans('setting::settings.form.enable_ngenius'), $errors, $settings)); ?>

        <?php echo e(Form::text('ngenius_label', trans('setting::attributes.ngenius_label'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::textarea('ngenius_description', trans('setting::attributes.ngenius_description'), $errors, $settings, ['rows' => 3, 'required' => false])); ?>


        <div class="<?php echo e(old('ngenius_enabled', array_get($settings, 'ngenius_enabled')) ? '' : 'hide'); ?>" id="ngenius-fields">
            <?php echo e(Form::text('ngenius_outlet_key', trans('setting::attributes.ngenius_outlet_key'), $errors, $settings, ['required' => true])); ?>

            <?php echo e(Form::text('ngenius_api_key', trans('setting::attributes.ngenius_api_key'), $errors, $settings, ['required' => true])); ?>

        </div>
    </div>
</div>


<?php /**PATH /var/www/html/amp/Modules/Setting/Resources/views/admin/settings/tabs/ngenius.blade.php ENDPATH**/ ?>