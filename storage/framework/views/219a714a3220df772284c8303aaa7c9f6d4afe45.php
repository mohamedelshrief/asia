<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('storefront_featured_categories_section_enabled', trans('storefront::attributes.section_status'), trans('storefront::storefront.form.enable_featured_categories_section'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[storefront_featured_categories_section_title]', trans('storefront::attributes.section_title'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[storefront_featured_categories_section_subtitle]', trans('storefront::attributes.section_subtitle'), $errors, $settings)); ?>


        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.category_1')); ?></h4>

            <?php echo e(Form::select('storefront_featured_categories_section_category_1_category_id', trans('storefront::attributes.category'), $errors, $categories, $settings)); ?>


            <?php echo $__env->make('admin.storefront.tabs.partials.products', [
                'fieldNamePrefix' => 'storefront_featured_categories_section_category_1',
                'products' => $categoryOneProducts,
                'featuredCategories' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.category_2')); ?></h4>

            <?php echo e(Form::select('storefront_featured_categories_section_category_2_category_id', trans('storefront::attributes.category'), $errors, $categories, $settings)); ?>


            <?php echo $__env->make('admin.storefront.tabs.partials.products', [
                'fieldNamePrefix' => 'storefront_featured_categories_section_category_2',
                'products' => $categoryTwoProducts,
                'featuredCategories' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.category_3')); ?></h4>

            <?php echo e(Form::select('storefront_featured_categories_section_category_3_category_id', trans('storefront::attributes.category'), $errors, $categories, $settings)); ?>


            <?php echo $__env->make('admin.storefront.tabs.partials.products', [
                'fieldNamePrefix' => 'storefront_featured_categories_section_category_3',
                'products' => $categoryThreeProducts,
                'featuredCategories' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.category_4')); ?></h4>

            <?php echo e(Form::select('storefront_featured_categories_section_category_4_category_id', trans('storefront::attributes.category'), $errors, $categories, $settings)); ?>


            <?php echo $__env->make('admin.storefront.tabs.partials.products', [
                'fieldNamePrefix' => 'storefront_featured_categories_section_category_4',
                'products' => $categoryFourProducts,
                'featuredCategories' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.category_5')); ?></h4>

            <?php echo e(Form::select('storefront_featured_categories_section_category_5_category_id', trans('storefront::attributes.category'), $errors, $categories, $settings)); ?>


            <?php echo $__env->make('admin.storefront.tabs.partials.products', [
                'fieldNamePrefix' => 'storefront_featured_categories_section_category_5',
                'products' => $categoryFiveProducts,
                'featuredCategories' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <div class="box-content clearfix">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.category_6')); ?></h4>

            <?php echo e(Form::select('storefront_featured_categories_section_category_6_category_id', trans('storefront::attributes.category'), $errors, $categories, $settings)); ?>


            <?php echo $__env->make('admin.storefront.tabs.partials.products', [
                'fieldNamePrefix' => 'storefront_featured_categories_section_category_6',
                'products' => $categorySixProducts,
                'featuredCategories' => true,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Themes/Storefront/views/admin/storefront/tabs/featured_categories.blade.php ENDPATH**/ ?>