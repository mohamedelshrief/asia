<div class="col-lg-6 col-sm-9">
    <div class="order-billing-details">
        <h4><?php echo e(trans('storefront::account.view_order.billing_address')); ?></h4>

        <address>
            <span><?php echo e($order->billing_full_name); ?></span>
            <span><?php echo e($order->billing_address_1); ?></span>

            <?php if($order->billing_address_2): ?>
                <span><?php echo e($order->billing_address_2); ?></span>
            <?php endif; ?>

            <span><?php echo e($order->billing_city); ?>, <?php echo e($order->billing_state_name); ?> <?php echo e($order->billing_zip); ?></span>
            <span><?php echo e($order->billing_country_name); ?></span>
        </address>
    </div>
</div>
<?php /**PATH /var/www/html/Themes/Storefront/views/public/account/orders/show/billing_address.blade.php ENDPATH**/ ?>