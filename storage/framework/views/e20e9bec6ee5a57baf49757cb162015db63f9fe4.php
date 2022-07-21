<div class="address-information-wrapper">
    <h3 class="section-title"><?php echo e(trans('order::orders.address_information')); ?></h3>

    <div class="row">
        <div class="col-md-6">
            <div class="billing-address">
                <h4 class="pull-left"><?php echo e(trans('order::orders.billing_address')); ?></h4>

                <span>
                    <?php echo e($order->billing_full_name); ?>

                    <br>
                    <?php echo e($order->billing_address_1); ?>

                    <br>

                    <?php if($order->billing_address_2): ?>
                        <?php echo e($order->billing_address_2); ?>

                        <br>
                    <?php endif; ?>

                    <?php echo e($order->billing_city_name); ?>, <?php echo e($order->billing_state_name); ?> <?php echo e($order->billing_zip); ?>

                    <br>
                    <?php echo e($order->billing_country_name); ?>

                </span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="shipping-address">
                <h4 class="pull-left"><?php echo e(trans('order::orders.shipping_address')); ?></h4>

                <span>
                    <?php echo e($order->shipping_full_name); ?>

                    <br>
                    <?php echo e($order->shipping_address_1); ?>

                    <br>

                    <?php if($order->shipping_address_2): ?>
                        <?php echo e($order->shipping_address_2); ?>

                        <br>
                    <?php endif; ?>

                    <?php echo e($order->shipping_city_name); ?>, <?php echo e($order->shipping_state_name); ?> <?php echo e($order->shipping_zip); ?>

                    <br>
                    <?php echo e($order->shipping_country_name); ?>

                </span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Modules/Order/Resources/views/admin/orders/partials/address_information.blade.php ENDPATH**/ ?>