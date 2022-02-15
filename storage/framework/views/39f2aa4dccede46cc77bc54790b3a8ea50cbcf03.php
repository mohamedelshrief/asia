<?php echo $__env->make('media::admin.image_picker.single', [
    'title' => trans('storefront::storefront.form.newsletter_bg_image'),
    'inputName' => 'storefront_newsletter_bg_image',
    'file' => $newsletterBgImage,
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /var/www/html/Themes/Storefront/views/admin/storefront/tabs/newsletter.blade.php ENDPATH**/ ?>