<?php $__env->startSection('title', trans('storefront::categories.all_categories')); ?>

<?php $__env->startSection('content'); ?>
    <section class="all-categories-wrap">
        <div class="container">
            <div class="all-categories">
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="single-category">
                        <h4 class="section-title">
                            <a href="<?php echo e($category->url()); ?>" title="<?php echo e($category->name); ?>">
                                <?php echo e($category->name); ?>

                            </a>
                        </h4>

                        <?php if($category->items->isNotEmpty()): ?>
                            <ul class="list-inline single-category-list">
                                <?php $__currentLoopData = $category->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($subCategory->url()); ?>" title="<?php echo e($subCategory->name); ?>">
                                            <?php echo e($subCategory->name); ?>

                                        </a>

                                        <?php echo $__env->make('public.categories.index.sub_category_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php echo $__env->make('public.categories.index.empty_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Themes/Storefront/views/public/categories/index.blade.php ENDPATH**/ ?>