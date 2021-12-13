<ul
    class="list-inline fluid-menu-wrap"

    <?php if($menu->hasBackgroundImage()): ?>
        style="background-image: url(<?php echo e($menu->backgroundImage()); ?>);"
    <?php endif; ?>
>
    <li>
        <div class="fluid-menu-content">
            <?php $__currentLoopData = $subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="fluid-menu-list">
                    <h5 class="fluid-menu-title">
                        <a href="<?php echo e($subMenu->url()); ?>" target="<?php echo e($subMenu->target()); ?>">
                            <?php echo e($subMenu->name()); ?>

                        </a>
                    </h5>

                    <ul class="list-inline fluid-sub-menu-list">
                        <?php $__currentLoopData = $subMenu->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e($item->url()); ?>" target="<?php echo e($subMenu->target()); ?>">
                                    <?php echo e($item->name()); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </li>
</ul>
<?php /**PATH /var/www/html/Amp/Themes/Storefront/views/public/layout/navigation/fluid.blade.php ENDPATH**/ ?>