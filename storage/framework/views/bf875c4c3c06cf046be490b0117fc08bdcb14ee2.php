<?php echo $__env->make('media::admin.image_picker.single', [
    'title' => trans('brand::brands.form.logo'),
    'inputName' => 'files[logo]',
    'file' => $brand->logo,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="media-picker-divider"></div>

<?php echo $__env->make('media::admin.image_picker.single', [
    'title' => trans('brand::brands.form.banner'),
    'inputName' => 'files[banner]',
    'file' => $brand->banner,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/Modules/Brand/Resources/views/admin/brands/tabs/images.blade.php ENDPATH**/ ?>