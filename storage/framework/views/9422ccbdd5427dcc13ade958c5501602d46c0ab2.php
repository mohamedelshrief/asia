<!DOCTYPE html>
<html lang="<?php echo e(locale()); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(trans('order::print.invoice')); ?></title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link href="<?php echo e(v(Module::asset('order:admin/css/print.css'))); ?>" rel="stylesheet">
    </head>

    <body class="<?php echo e(is_rtl() ? 'rtl' : 'ltr'); ?>">
        <!--[if lt IE 8]>
            <p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="container">
            <div class="invoice-wrapper clearfix">
                <div class="row">
                    <div class="invoice-header clearfix">
                        <div class="col-md-3">
                            <div class="store-name">
                                <h1><?php echo e(setting('store_name')); ?></h1>
                            </div>
                        </div>

                        <div class="col-md-9 clearfix">
                            <div class="invoice-header-right pull-right">
                                <span class="title"><?php echo e(trans('order::print.invoice')); ?></span>

                                <div class="invoice-info clearfix">
                                    <div class="invoice-id">
                                        <label for="invoice-id"><?php echo e(trans('order::print.invoice_id')); ?>:</label>
                                        <span>#<?php echo e($order->id); ?></span>
                                    </div>

                                    <div class="invoice-date">
                                        <label for="invoice-date"><?php echo e(trans('order::print.date')); ?>:</label>
                                        <span><?php echo e($order->created_at->format('Y / m / d')); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="invoice-body clearfix">
                    <div class="invoice-details-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="invoice-details">
                                    <h5><?php echo e(trans('order::print.order_details')); ?></h5>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e(trans('order::print.email')); ?>:</td>
                                                    <td><?php echo e($order->customer_email); ?></td>
                                                </tr>

                                                <tr>
                                                    <td><?php echo e(trans('order::print.phone')); ?>:</td>
                                                    <td><?php echo e($order->customer_phone); ?></td>
                                                </tr>

                                                <?php if($order->shipping_method): ?>
                                                    <tr>
                                                        <td><?php echo e(trans('order::print.shipping_method')); ?>:</td>
                                                        <td><?php echo e($order->shipping_method); ?></td>
                                                    </tr>
                                                <?php endif; ?>

                                                <tr>
                                                    <td><?php echo e(trans('order::print.payment_method')); ?>:</td>
                                                    <td><?php echo e($order->payment_method); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="invoice-address">
                                    <h5><?php echo e(trans('order::print.shipping_address')); ?></h5>

                                    <span><?php echo e($order->shipping_full_name); ?></span>
                                    <span><?php echo e($order->shipping_address_1); ?></span>
                                    <span><?php echo e($order->shipping_address_2); ?></span>
                                    <span><?php echo e($order->shipping_city); ?>, <?php echo e($order->shipping_state_name); ?> <?php echo e($order->shipping_zip); ?></span>
                                    <span><?php echo e($order->shipping_country_name); ?></span>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="invoice-address">
                                    <h5><?php echo e(trans('order::print.billing_address')); ?></h5>

                                    <span><?php echo e($order->billing_full_name); ?></span>
                                    <span><?php echo e($order->billing_address_1); ?></span>
                                    <span><?php echo e($order->billing_address_2); ?></span>
                                    <span><?php echo e($order->billing_city); ?>, <?php echo e($order->billing_state_name); ?> <?php echo e($order->billing_zip); ?></span>
                                    <span><?php echo e($order->billing_country_name); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="cart-list">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(trans('order::print.product')); ?></th>
                                            <th><?php echo e(trans('order::orders.sku')); ?></th>
                                            <th><?php echo e(trans('order::print.unit_price')); ?></th>
                                            <th><?php echo e(trans('order::print.quantity')); ?></th>
                                            <th><?php echo e(trans('order::print.line_total')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <span><?php echo e($product->name); ?></span>

                                                    <?php if($product->hasAnyOption()): ?>
                                                        <div class="option">
                                                            <?php $__currentLoopData = $product->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <span>
                                                                    <?php echo e($option->name); ?>:

                                                                    <span>
                                                                        <?php if($option->option->isFieldType()): ?>
                                                                            <?php echo e($option->value); ?>

                                                                        <?php else: ?>
                                                                            <?php echo e($option->values->implode('label', ', ')); ?>

                                                                        <?php endif; ?>
                                                                    </span>
                                                                </span>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <label class="visible-xs"><?php echo e(trans('order::orders.sku')); ?>:</label>
                                                    <span><?php echo e($product->product->sku); ?></span>
                                                </td>
                                                <td>
                                                    <label class="visible-xs"><?php echo e(trans('order::print.unit_price')); ?>:</label>
                                                    <span><?php echo e($product->unit_price->convert($order->currency, $order->currency_rate)->convert($order->currency, $order->currency_rate)->format($order->currency)); ?></span>
                                                </td>

                                                <td>
                                                    <label class="visible-xs"><?php echo e(trans('order::print.quantity')); ?>:</label>
                                                    <span><?php echo e($product->qty); ?></span>
                                                </td>
                                                <td>
                                                    <label class="visible-xs"><?php echo e(trans('order::print.line_total')); ?>:</label>
                                                    <span><?php echo e($product->line_total->convert($order->currency, $order->currency_rate)->format($order->currency)); ?></span>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="total pull-right">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><?php echo e(trans('order::print.subtotal')); ?></td>
                                        <td><?php echo e($order->sub_total->convert($order->currency, $order->currency_rate)->format($order->currency)); ?></td>
                                    </tr>

                                    <?php if($order->hasShippingMethod()): ?>
                                        <tr>
                                            <td><?php echo e($order->shipping_method); ?></td>
                                            <td><?php echo e($order->shipping_cost->convert($order->currency, $order->currency_rate)->format($order->currency)); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if($order->hasCoupon()): ?>
                                        <tr>
                                            <td><?php echo e(trans('order::orders.coupon')); ?> (<span class="coupon-code"><?php echo e($order->coupon->code); ?></span>)</td>
                                            <td>&#8211;<?php echo e($order->discount->convert($order->currency, $order->currency_rate)->format($order->currency)); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php $__currentLoopData = $order->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($tax->name); ?></td>
                                            <td class="text-right"><?php echo e($tax->order_tax->amount->convert($order->currency, $order->currency_rate)->format($order->currency)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e(trans('order::print.total')); ?></td>
                                        <td><?php echo e($order->total->convert($order->currency, $order->currency_rate)->format($order->currency)); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.print();
        </script>
    </body>
</html>
<?php /**PATH /var/www/html/Modules/Order/Resources/views/admin/orders/print/show.blade.php ENDPATH**/ ?>