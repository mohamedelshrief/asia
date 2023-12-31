<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('facebook_login_enabled', trans('setting::attributes.facebook_login_enabled'), trans('setting::settings.form.enable_facebook_login'), $errors, $settings)); ?>


        <div class="<?php echo e(old('facebook_login_enabled', array_get($settings, 'facebook_login_enabled')) ? '' : 'hide'); ?>" id="facebook-login-fields">
            <?php echo e(Form::text('facebook_login_app_id', trans('setting::attributes.facebook_login_app_id'), $errors, $settings, ['required' => true])); ?>

            <?php echo e(Form::password('facebook_login_app_secret', trans('setting::attributes.facebook_login_app_secret'), $errors, $settings, ['required' => true])); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Modules/Setting/Resources/views/admin/settings/tabs/facebook.blade.php ENDPATH**/ ?>