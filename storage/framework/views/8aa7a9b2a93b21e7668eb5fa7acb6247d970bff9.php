<div class="row">
    <div class="col-md-8">
        <div class="box-content clearfix">
            <?php echo e(Form::text('mail_from_address', trans('setting::attributes.mail_from_address'), $errors, $settings)); ?>

            <?php echo e(Form::text('mail_from_name', trans('setting::attributes.mail_from_name'), $errors, $settings)); ?>

            <?php echo e(Form::text('mail_host', trans('setting::attributes.mail_host'), $errors, $settings)); ?>

            <?php echo e(Form::text('mail_port', trans('setting::attributes.mail_port'), $errors, $settings)); ?>

            <?php echo e(Form::text('mail_username', trans('setting::attributes.mail_username'), $errors, $settings)); ?>

            <?php echo e(Form::password('mail_password', trans('setting::attributes.mail_password'), $errors, $settings)); ?>

            <?php echo e(Form::select('mail_encryption', trans('setting::attributes.mail_encryption'), $errors, $encryptionProtocols, $settings)); ?>

        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('setting::settings.form.customer_notification_settings')); ?></h4>

            <?php echo e(Form::checkbox('welcome_email', trans('setting::attributes.welcome_email'), trans('setting::settings.form.send_welcome_email_after_registration'), $errors, $settings)); ?>

        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('setting::settings.form.order_notification_settings')); ?></h4>

            <?php echo e(Form::checkbox('admin_order_email', trans('setting::attributes.admin_order_email'), trans('setting::settings.form.send_new_order_notification_to_admin'), $errors, $settings)); ?>

            <?php echo e(Form::checkbox('invoice_email', trans('setting::attributes.invoice_email'), trans('setting::settings.form.send_invoice_email'), $errors, $settings)); ?>

            <?php echo e(Form::select('email_order_statuses', trans('setting::attributes.email_order_statuses'), $errors, $orderStatuses, $settings, ['class' => 'selectize prevent-creation', 'multiple' => true])); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/amp/Modules/Setting/Resources/views/admin/settings/tabs/mail.blade.php ENDPATH**/ ?>