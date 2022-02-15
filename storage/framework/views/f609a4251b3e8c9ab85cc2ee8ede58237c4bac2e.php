<?php if($subCategory->items->isNotEmpty()): ?>
    <ul class="list-inline sub-category-list">
        <?php $__currentLoopData = $subCategory->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategoryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e($subCategoryItem->url()); ?>" title="<?php echo e($subCategoryItem->name); ?>">
                    <?php echo e($subCategoryItem->name); ?>

                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>
<?php /**PATH /var/www/html/Themes/Storefront/views/public/categories/index/sub_category_items.blade.php ENDPATH**/ ?>