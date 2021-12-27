<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('razorpay_enabled', trans('setting::attributes.razorpay_enabled'), trans('setting::settings.form.enable_razorpay'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[razorpay_label]', trans('setting::attributes.razorpay_label'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::textarea('translatable[razorpay_description]', trans('setting::attributes.razorpay_description'), $errors, $settings, ['rows' => 3, 'required' => true])); ?>


        <div class="<?php echo e(old('razorpay_enabled', array_get($settings, 'razorpay_enabled')) ? '' : 'hide'); ?>" id="razorpay-fields">
            <?php echo e(Form::text('razorpay_key_id', trans('setting::attributes.razorpay_key_id'), $errors, $settings, ['required' => true])); ?>

            <?php echo e(Form::password('razorpay_key_secret', trans('setting::attributes.razorpay_key_secret'), $errors, $settings, ['required' => true])); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Amp/Modules/Setting/Resources/views/admin/settings/tabs/razorpay.blade.php ENDPATH**/ ?>