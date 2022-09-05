<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::textarea('custom_header_assets', trans('setting::attributes.custom_header_assets'), $errors, $settings)); ?>

        <?php echo e(Form::textarea('custom_footer_assets', trans('setting::attributes.custom_footer_assets'), $errors, $settings)); ?>

    </div>
</div>
<?php /**PATH /var/www/html/Modules/Setting/Resources/views/admin/settings/tabs/custom_css_js.blade.php ENDPATH**/ ?>