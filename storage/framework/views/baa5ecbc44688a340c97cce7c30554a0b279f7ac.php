<div class="accordion-box-content">
    <div class="row">
        <div class="col-md-8">
            <?php echo e(Form::checkbox('storefront_three_column_banners_enabled', trans('storefront::attributes.section_status'), trans('storefront::storefront.form.enable_three_column_banners_section'), $errors, $settings)); ?>

        </div>
    </div>

    <div class="tab-content clearfix">
        <div class="panel-wrap">
            <?php echo $__env->make('admin.storefront.tabs.partials.single_banner', [
                'label' => trans('storefront::storefront.form.banner_1'),
                'name' => 'storefront_three_column_banners_1',
                'banner' => $banners['banner_1'],
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('admin.storefront.tabs.partials.single_banner', [
                'label' => trans('storefront::storefront.form.banner_2'),
                'name' => 'storefront_three_column_banners_2',
                'banner' => $banners['banner_2'],
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('admin.storefront.tabs.partials.single_banner', [
                'label' => trans('storefront::storefront.form.banner_3'),
                'name' => 'storefront_three_column_banners_3',
                'banner' => $banners['banner_3'],
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Themes/Storefront/views/admin/storefront/tabs/three_column_banners.blade.php ENDPATH**/ ?>