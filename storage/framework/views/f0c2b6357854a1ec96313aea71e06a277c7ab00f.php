<?php
use \Modules\Setting\Entities\Country;
?>
<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('emirates_post_enabled', trans('setting::attributes.emirates_post_enabled'), trans('setting::settings.form.enable_emirates_post'), $errors, $settings)); ?>

        <?php echo e(Form::text('emirates_post_label', trans('setting::attributes.translatable.emirates_post_label'), $errors, $settings, ['required' => true])); ?>


    </div>
</div>


<?php $__env->startPush('scripts'); ?>
<script>
    $("#emirates_country").change(function() {
        country=$("#emirates_country").val();
        $.ajax({
            url: "<?php echo e(url('en/api/cities/')); ?>"+country,
            type: "GET",
            async: false,
            success: function (reponse) {
                console.log(reponse);
                alert(reponse)
            },
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/amp/Modules/Setting/Resources/views/admin/settings/tabs/emiratespost.blade.php ENDPATH**/ ?>