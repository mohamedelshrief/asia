<div class="col-lg-6 col-sm-9">
    <div class="order-shipping-details">
        <h4><?php echo e(trans('storefront::account.view_order.shipping_address')); ?></h4>

        <address>
            <span><?php echo e($order->shipping_full_name); ?></span>
            <span><?php echo e($order->shipping_address_1); ?></span>

            <?php if($order->shipping_address_2): ?>
                <span><?php echo e($order->shipping_address_2); ?></span>
            <?php endif; ?>

            <span><?php echo e($order->shipping_city); ?>, <?php echo e($order->shipping_state_name); ?> <?php echo e($order->shipping_zip); ?></span>
            <span><?php echo e($order->shipping_country_name); ?></span>
        </address>
    </div>
</div>
<?php /**PATH /var/www/html/Amp/Themes/Storefront/views/public/account/orders/show/shipping_address.blade.php ENDPATH**/ ?>