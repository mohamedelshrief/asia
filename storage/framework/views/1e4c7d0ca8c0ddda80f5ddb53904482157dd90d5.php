<?php
use \Modules\Setting\Entities\Country;
?>
<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('emirates_post_enabled', trans('setting::attributes.emirates_post_enabled'), trans('setting::settings.form.enable_emirates_post'), $errors, $settings)); ?>

        <?php echo e(Form::text('emirates_post_label', trans('setting::attributes.translatable.emirates_post_label'), $errors, $settings, ['required' => true])); ?>




        <div class="form-group">
            <label class="col-md-3 control-label text-left"><?php echo e(trans('setting::attributes.translatable.emirates_post_country')); ?><span class="m-l-5 text-red">*</span></label>
            <div class="col-md-9">
                <select class="form-contol" name="emirates_country" id="emirates_country" required="true" >
                    <option ><?php echo e(trans('setting::attributes.translatable.emirates_post_country')); ?></option>
                    <?php $__currentLoopData = Country::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($settings["emirates_country"]==$item->country_id): ?>
                        <option value="<?php echo e($item->country_id); ?>" selected ><?php echo e($item->country_name); ?></option>
                    <?php else: ?>
                        <option value="<?php echo e($item->country_id); ?>"><?php echo e($item->country_name); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
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
<?php /**PATH /var/www/html/Amp/Modules/Setting/Resources/views/admin/settings/tabs/emiratespost.blade.php ENDPATH**/ ?>