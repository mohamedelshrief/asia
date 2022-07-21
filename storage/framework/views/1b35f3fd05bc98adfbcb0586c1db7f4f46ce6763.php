<div class="row">
    <div class="col-md-8">
        <div class="box-content clearfix">
        	<?php echo e(Form::select('storefront_footer_tags', trans('storefront::attributes.storefront_footer_tags'), $errors, $tags, $settings, ['class' => 'selectize prevent-creation', 'multiple' => true])); ?>

        	<?php echo e(Form::text('translatable[storefront_copyright_text]', trans('storefront::attributes.storefront_copyright_text'), $errors, $settings)); ?>

        </div>

        <div class="box-content clearfix">
        	<?php echo $__env->make('media::admin.image_picker.single', [
        	    'title' => trans('storefront::storefront.form.accepted_payment_methods_image'),
        	    'inputName' => 'storefront_accepted_payment_methods_image',
        	    'file' => $acceptedPaymentMethodsImage,
        	], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Amp/Themes/Storefront/views/admin/storefront/tabs/footer.blade.php ENDPATH**/ ?>