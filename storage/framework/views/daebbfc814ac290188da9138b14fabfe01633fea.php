<div class="order-totals-wrapper">
    <div class="row">
        <div class="order-totals pull-right">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><?php echo e(trans('order::orders.subtotal')); ?></td>
                            <td class="text-right"><?php echo e($order->sub_total->format()); ?></td>
                        </tr>

                        <?php if($order->hasShippingMethod()): ?>
                            <!--<tr>
                                <td><?php echo e($order->shipping_method); ?></td>
                                <td class="text-right"><?php echo e($order->shipping_cost->format()); ?></td>
                            </tr>-->
                        <?php endif; ?>

                        <?php $__currentLoopData = $order->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($tax->name); ?></td>
                                <td class="text-right"><?php echo e($tax->order_tax->amount->format()); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($order->hasCoupon()): ?>
                            <tr>
                                <td><?php echo e(trans('order::orders.coupon')); ?> (<span class="coupon-code"><?php echo e($order->coupon->code); ?></span>)</td>
                                <td class="text-right">&#8211;<?php echo e($order->discount->format()); ?></td>
                            </tr>
                        <?php endif; ?>

                        <tr>
                            <td><?php echo e(trans('order::orders.total')); ?></td>
                            <td class="text-right"><?php echo e($order->total->format()); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Amp/Modules/Order/Resources/views/admin/orders/partials/order_totals.blade.php ENDPATH**/ ?>