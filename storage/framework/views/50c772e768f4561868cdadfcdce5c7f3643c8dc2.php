<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::password('password', trans('user::attributes.users.new_password'), $errors)); ?>

        <?php echo e(Form::password('password_confirmation', trans('user::attributes.users.confirm_new_password'), $errors)); ?>

    </div>
</div>
<?php /**PATH /var/www/html/Modules/User/Resources/views/admin/profile/tabs/new_password.blade.php ENDPATH**/ ?>