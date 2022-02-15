<?php echo e(Form::text('twilio_sid', trans('setting::attributes.twilio_sid'), $errors, $settings, ['required' => true])); ?>

<?php echo e(Form::password('twilio_token', trans('setting::attributes.twilio_token'), $errors, $settings, ['required' => true])); ?>

<?php /**PATH /var/www/html/Modules/Setting/Resources/views/admin/settings/partials/sms_services/twilio.blade.php ENDPATH**/ ?>