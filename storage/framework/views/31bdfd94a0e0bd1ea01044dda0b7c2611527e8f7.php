<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('storefront_features_section_enabled', trans('storefront::attributes.section_status'), trans('storefront::storefront.form.enable_features_section'), $errors, $settings)); ?>


        <div class="clearfix"></div>

        <div class="box-content">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.feature_1')); ?></h4>

            <?php echo e(Form::text('translatable[storefront_feature_1_title]', trans('storefront::attributes.title'), $errors, $settings)); ?>

            <?php echo e(Form::text('translatable[storefront_feature_1_subtitle]', trans('storefront::attributes.subtitle'), $errors, $settings)); ?>

            <?php echo e(Form::text('storefront_feature_1_icon', trans('storefront::attributes.icon'), $errors, $settings)); ?>

        </div>

        <div class="box-content">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.feature_2')); ?></h4>

            <?php echo e(Form::text('translatable[storefront_feature_2_title]', trans('storefront::attributes.title'), $errors, $settings)); ?>

            <?php echo e(Form::text('translatable[storefront_feature_2_subtitle]', trans('storefront::attributes.subtitle'), $errors, $settings)); ?>

            <?php echo e(Form::text('storefront_feature_2_icon', trans('storefront::attributes.icon'), $errors, $settings)); ?>

        </div>

        <div class="box-content">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.feature_3')); ?></h4>

            <?php echo e(Form::text('translatable[storefront_feature_3_title]', trans('storefront::attributes.title'), $errors, $settings)); ?>

            <?php echo e(Form::text('translatable[storefront_feature_3_subtitle]', trans('storefront::attributes.subtitle'), $errors, $settings)); ?>

            <?php echo e(Form::text('storefront_feature_3_icon', trans('storefront::attributes.icon'), $errors, $settings)); ?>

        </div>

        <div class="box-content">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.feature_4')); ?></h4>

            <?php echo e(Form::text('translatable[storefront_feature_4_title]', trans('storefront::attributes.title'), $errors, $settings)); ?>

            <?php echo e(Form::text('translatable[storefront_feature_4_subtitle]', trans('storefront::attributes.subtitle'), $errors, $settings)); ?>

            <?php echo e(Form::text('storefront_feature_4_icon', trans('storefront::attributes.icon'), $errors, $settings)); ?>

        </div>

        <div class="box-content">
            <h4 class="section-title"><?php echo e(trans('storefront::storefront.form.feature_5')); ?></h4>

            <?php echo e(Form::text('translatable[storefront_feature_5_title]', trans('storefront::attributes.title'), $errors, $settings)); ?>

            <?php echo e(Form::text('translatable[storefront_feature_5_subtitle]', trans('storefront::attributes.subtitle'), $errors, $settings)); ?>

            <?php echo e(Form::text('storefront_feature_5_icon', trans('storefront::attributes.icon'), $errors, $settings)); ?>

        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Themes/Storefront/views/admin/storefront/tabs/features.blade.php ENDPATH**/ ?>