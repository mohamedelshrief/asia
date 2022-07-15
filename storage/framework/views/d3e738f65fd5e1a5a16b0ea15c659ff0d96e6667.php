<?php $__env->startComponent("mail::message"); ?>

# Contact Form Submission

Contact form submitted and the following details mentioned below.

<?php $__env->startComponent('mail::table'); ?>
| Key        | Value                        |
|:-----------|:-----------------------------|
<?php $__currentLoopData = request()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
| <?php echo e($key); ?> | <?php echo e($value); ?>                 |
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->renderComponent(); ?>

Thank you, <br>
<?php echo e(config('app.name')); ?>


<?php echo $__env->renderComponent(); ?>
<?php /**PATH /var/www/html/packages/arif/FleetCart-Api/src/Providers/../resources/view/emails/contact_email.blade.php ENDPATH**/ ?>