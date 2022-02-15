<div class="row">
    <div class="col-md-8">
        <div class="box-content clearfix">
            <?php echo e(Form::text('sms_from', trans('setting::attributes.sms_from'), $errors, $settings)); ?>

            <?php echo e(Form::select('sms_service', trans('setting::attributes.sms_service'), $errors, $smsServices, $settings)); ?>


            <?php $__currentLoopData = $smsServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service => $serviceName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="sms-service hide" id="<?php echo e($service); ?>-service">
                    <?php if ($__env->exists("setting::admin.settings.partials.sms_services.{$service}")) echo $__env->make("setting::admin.settings.partials.sms_services.{$service}", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('setting::settings.form.customer_notification_settings')); ?></h4>

            <?php echo e(Form::checkbox('welcome_sms', trans('setting::attributes.welcome_sms'), trans('setting::settings.form.send_welcome_sms_after_registration'), $errors, $settings)); ?>

        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('setting::settings.form.order_notification_settings')); ?></h4>

            <?php echo e(Form::checkbox('new_order_admin_sms', trans('setting::attributes.new_order_admin_sms'), trans('setting::settings.form.send_new_order_notification_to_admin'), $errors, $settings)); ?>

            <?php echo e(Form::checkbox('new_order_sms', trans('setting::attributes.new_order_sms'), trans('setting::settings.form.send_new_order_notification_to_customer'), $errors, $settings)); ?>

            <?php echo e(Form::select('sms_order_statuses', trans('setting::attributes.sms_order_statuses'), $errors, $orderStatuses, $settings, ['class' => 'selectize prevent-creation', 'multiple' => true])); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Modules/Setting/Resources/views/admin/settings/tabs/sms.blade.php ENDPATH**/ ?>