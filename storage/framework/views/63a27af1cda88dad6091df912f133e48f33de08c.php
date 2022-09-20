<li class="<?php echo e(mega_menu_classes($menu, $type)); ?> side-menu">
    <a href="<?php echo e($menu->url()); ?>" class="nav-link menu-item" target="<?php echo e($menu->target()); ?>" data-text="<?php echo e($menu->name()); ?>">
        <?php if($menu->hasIcon()): ?>
            <span class="menu-item-icon">
                <i class="<?php echo e($menu->icon()); ?>"></i>
            </span>
        <?php endif; ?>

        <?php echo e($menu->name()); ?>

    </a>

    <?php if($menu->isFluid()): ?>
        <?php echo $__env->make('public.layout.navigation.fluid', ['subMenus' => $menu->subMenus()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('public.layout.navigation.dropdown', ['subMenus' => $menu->subMenus()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</li>
<?php /**PATH /var/www/html/asiamp/Themes/Storefront/views/public/layout/navigation/menu.blade.php ENDPATH**/ ?>