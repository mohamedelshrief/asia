<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('paytm_enabled', trans('setting::attributes.paytm_enabled'), trans('setting::settings.form.enable_paytm'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[paytm_label]', trans('setting::attributes.translatable.paytm_label'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::textarea('translatable[paytm_description]', trans('setting::attributes.translatable.paytm_description'), $errors, $settings, ['rows' => 3, 'required' => true])); ?>

        <?php echo e(Form::checkbox('paytm_test_mode', trans('setting::attributes.paytm_test_mode'), trans('setting::settings.form.use_sandbox_for_test_payments'), $errors, $settings)); ?>


        <div class="<?php echo e(old('paytm_enabled', array_get($settings, 'paytm_enabled')) ? '' : 'hide'); ?>" id="paytm-fields">
            <?php echo e(Form::text('paytm_merchant_id', trans('setting::attributes.paytm_merchant_id'), $errors, $settings, ['required' => true])); ?>

            <?php echo e(Form::password('paytm_merchant_key', trans('setting::attributes.paytm_merchant_key'), $errors, $settings, ['required' => true])); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Amp/Modules/Setting/Resources/views/admin/settings/tabs/paytm.blade.php ENDPATH**/ ?>