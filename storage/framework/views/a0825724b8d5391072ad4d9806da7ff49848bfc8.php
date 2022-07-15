<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::select('attribute_set_id', trans('attribute::attributes.attributes.attribute_set_id'), $errors, $attributeSets, $attribute, ['required' => true])); ?>

        <?php echo e(Form::text('name', trans('attribute::attributes.attributes.name'), $errors, $attribute, ['required' => true])); ?>

        <?php echo e(Form::select('categories', trans('attribute::attributes.attributes.categories'), $errors, $categories, $attribute, ['class' => 'selectize prevent-creation', 'multiple' => true])); ?>


        <?php if($attribute->exists): ?>
            <?php echo e(Form::text('slug', trans('attribute::attributes.attributes.slug'), $errors, $attribute, ['required' => true])); ?>

        <?php endif; ?>

        <?php echo e(Form::checkbox('is_filterable', trans('attribute::attributes.attributes.is_filterable'), trans('attribute::admin.form.use_this_attribute_for_filtering_products'), $errors, $attribute)); ?>

    </div>
</div>
<?php /**PATH /var/www/html/Modules/Attribute/Resources/views/admin/attributes/tabs/general.blade.php ENDPATH**/ ?>