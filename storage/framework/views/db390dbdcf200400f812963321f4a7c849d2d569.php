<?php echo $__env->make('media::admin.image_picker.single', [
    'title' => trans('menu::menu_items.form.background_image'),
    'inputName' => 'files[background_image]',
    'file' => $menuItem->backgroundImage,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/Modules/Menu/Resources/views/admin/menu_items/tabs/image.blade.php ENDPATH**/ ?>