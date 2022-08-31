<?php echo e(Form::text('vonage_key', trans('setting::attributes.vonage_key'), $errors, $settings, ['required' => true])); ?>

<?php echo e(Form::password('vonage_secret', trans('setting::attributes.vonage_secret'), $errors, $settings, ['required' => true])); ?>

<?php /**PATH /var/www/html/amp/Modules/Setting/Resources/views/admin/settings/partials/sms_services/vonage.blade.php ENDPATH**/ ?>