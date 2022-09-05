<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('paypal_enabled', trans('setting::attributes.paypal_enabled'), trans('setting::settings.form.enable_paypal'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[paypal_label]', trans('setting::attributes.translatable.paypal_label'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::textarea('translatable[paypal_description]', trans('setting::attributes.translatable.paypal_description'), $errors, $settings, ['rows' => 3, 'required' => true])); ?>

        <?php echo e(Form::checkbox('paypal_test_mode', trans('setting::attributes.paypal_test_mode'), trans('setting::settings.form.use_sandbox_for_test_payments'), $errors, $settings)); ?>


        <div class="<?php echo e(old('paypal_enabled', array_get($settings, 'paypal_enabled')) ? '' : 'hide'); ?>" id="paypal-fields">
            <?php echo e(Form::text('paypal_client_id', trans('setting::attributes.paypal_client_id'), $errors, $settings, ['required' => true])); ?>

            <?php echo e(Form::password('paypal_secret', trans('setting::attributes.paypal_secret'), $errors, $settings, ['required' => true])); ?>

        </div>
    </div>
</div>


<?php /**PATH /var/www/html/Modules/Setting/Resources/views/admin/settings/tabs/paypal.blade.php ENDPATH**/ ?>