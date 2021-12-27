<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('newsletter_enabled', trans('setting::attributes.newsletter_enabled'), trans('setting::settings.form.allow_customers_to_subscribe'), $errors, $settings)); ?>

        <?php echo e(Form::password('mailchimp_api_key', trans('setting::attributes.mailchimp_api_key'), $errors, $settings)); ?>

        <?php echo e(Form::text('mailchimp_list_id', trans('setting::attributes.mailchimp_list_id'), $errors, $settings)); ?>

    </div>
</div>
<?php /**PATH /var/www/html/Amp/Modules/Setting/Resources/views/admin/settings/tabs/newsletter.blade.php ENDPATH**/ ?>