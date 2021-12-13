<ol class="dd-list">
    <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="dd-item" data-id="<?php echo e($menuItem->id); ?>">
            <?php if(! $menuItem->is_root): ?>
                <div class="menu-item-actions btn-group" role="group">
                    <a href="<?php echo e(route('admin.menus.items.edit', [$menu->id, $menuItem->id])); ?>" class="btn edit-menu-item ">
                        <i class="fa fa-pencil"></i>
                    </a>

                    <button type="button" class="btn delete-menu-item" data-action="<?php echo e(route('admin.menus.items.destroy', [$menu->id, $menuItem->id])); ?>">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            <?php endif; ?>

            <div class="<?php echo e($menuItem->is_root ? 'dd-handle-root' : 'dd-handle'); ?>"><?php echo e($menuItem->name); ?></div>

            <?php if(count($menuItem->items) !== 0): ?>
                <?php echo $__env->make('menu::admin.menus.form.menu_items_list', ['menuItems' => $menuItem->items], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ol>
<?php /**PATH /var/www/html/Amp/Modules/Menu/Resources/views/admin/menus/form/menu_items_list.blade.php ENDPATH**/ ?>