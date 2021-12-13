<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('name', trans('menu::attributes.name'), $errors, $menuItem, ['required' => true])); ?>

        <?php echo e(Form::select('type', trans('menu::attributes.type'), $errors, trans('menu::menu_items.form.types'), $menuItem, ['required' => true])); ?>


        <div class="link-field category-field <?php echo e(old('type', $menuItem->type ?? 'category') !== 'category' ? 'hide' :''); ?>">
            <?php echo e(Form::select('category_id', trans('menu::attributes.category_id'), $errors, $categories, $menuItem, ['required' => true])); ?>

        </div>

        <div class="link-field page-field <?php echo e(old('type', $menuItem->type) !== 'page' ? 'hide' :''); ?>">
            <?php echo e(Form::select('page_id', trans('menu::attributes.page_id'), $errors, $pages, $menuItem, ['required' => true])); ?>

        </div>

        <div class="link-field url-field <?php echo e(old('type', $menuItem->type) !== 'url' ? 'hide' :''); ?>">
            <?php echo e(Form::text('url', trans('menu::attributes.url'), $errors, $menuItem, ['required' => true])); ?>

        </div>

        <?php echo e(Form::text('icon', trans('menu::attributes.icon'), $errors, $menuItem)); ?>

        <?php echo e(Form::checkbox('is_fluid', trans('menu::attributes.is_fluid'), trans('menu::menu_items.form.full_width_menu'), $errors, $menuItem)); ?>

        <?php echo e(Form::select('target', trans('menu::attributes.target'), $errors, trans('menu::menu_items.form.targets'), $menuItem)); ?>

        <?php echo e(Form::select('parent_id', trans('menu::attributes.parent_id'), $errors, $parentMenuItems, $menuItem)); ?>

        <?php echo e(Form::checkbox('is_active', trans('menu::attributes.is_active'), trans('menu::menu_items.form.enable_the_menu_item'), $errors, $menuItem)); ?>

    </div>
</div>
<?php /**PATH /var/www/html/Amp/Modules/Menu/Resources/views/admin/menu_items/tabs/general.blade.php ENDPATH**/ ?>