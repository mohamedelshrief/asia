<!DOCTYPE html>
<html lang="en" style="-ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                    -webkit-print-color-adjust: exact;"
>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

        <style>
            td {
                vertical-align: top;
            }

            @media  screen and (max-width: 767px) {
                .order-details {
                    width: 100% !important;
                }

                .shipping-address {
                    width: 100% !important;
                }

                .billing-address {
                    width: 100% !important;
                }
            }
        </style>
    </head>

    <body dir="rtl" style="font-family: 'Open Sans', sans-serif;
                        font-size: 15px;
                        min-width: 320px;
                        color: #555555;
                        margin: 0;"
                        >
        <table style="border-collapse: collapse;
                    min-width: 320px;
                    max-width: 900px;
                    width: 100%;
                    margin: auto;
                    border-bottom: 2px solid <?php echo e(mail_theme_color()); ?>;"
        >
            <tbody>
                <tr>
                    <td style="padding: 0;">
                        <table style="border-collapse: collapse;
                                    width: 100%;
                                    background: <?php echo e(mail_theme_color()); ?>;"
                        >
                            <tbody>
                                <tr>
                                    <td style="padding: 0 15px; text-align: center;">
                                        <?php if(is_null($logo)): ?>
                                            <h1 style="font-family: 'Open Sans', sans-serif;
                                                    font-weight: 400;
                                                    font-size: 32px;
                                                    line-height: 39px;
                                                    display: inline-block;
                                                    color: #fafafa;
                                                    margin: 17px 0 0;"
                                            >
                                                <?php echo e(setting('store_name')); ?>

                                            </h1>
                                        <?php else: ?>
                                            <div style="display: flex;
                                                        height: 64px;
                                                        width: 200px;
                                                        align-items: center;
                                                        justify-content: center;
                                                        margin: auto;"
                                            >
                                                <img src="<?php echo e($logo); ?>" style="max-height: 100%; max-width: 100%;" alt="logo">
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 0 15px; text-align: center;">
                                        <span style="font-family: 'Open Sans', sans-serif;
                                                    font-weight: 400;
                                                    font-size: 56px;
                                                    line-height: 68px;
                                                    display: inline-block;
                                                    color: #fafafa;
                                                    margin: 3px 0 5px;"
                                        >
                                            <?php echo e(trans('storefront::invoice.invoice')); ?>

                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 0 15px;">
                                        <table style="border-collapse: collapse;
                                                    width: 230px;
                                                    margin: 0 auto 20px;"
                                        >
                                            <tbody>
                                                <tr>
                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                            font-size: 16px;
                                                            font-weight: 400;
                                                            color: #fafafa;
                                                            padding: 0;"
                                                    >
                                                        <span style="float: right;">
                                                            <?php echo e(trans('storefront::invoice.order_id')); ?>:
                                                        </span>

                                                        <span style="float: left;">
                                                            #<?php echo e($order->id); ?>

                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                            font-size: 16px;
                                                            font-weight: 400;
                                                            color: #fafafa;
                                                            padding: 0;"
                                                    >
                                                        <span style="float: right;">
                                                            <?php echo e(trans('storefront::invoice.date')); ?>:
                                                        </span>

                                                        <span style="float: left;">
                                                            <?php echo e($order->created_at->toFormattedDateString()); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 30px 15px;">
                        <table style="border-collapse: collapse;
                                    min-width: 320px;
                                    max-width: 760px;
                                    width: 100%;
                                    margin: auto;"
                        >
                            <tbody>
                                <tr>
                                    <td style="padding: 0; width: 50%;">
                                        <table style="border-collapse: collapse; width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 0;">
                                                        <h5 style="font-family: 'Open Sans', sans-serif;
                                                                font-weight: 600;
                                                                font-size: 18px;
                                                                line-height: 22px;
                                                                margin: 0 0 8px;
                                                                color: #444444;"
                                                        >
                                                            <?php echo e(trans('storefront::invoice.order_details')); ?>

                                                        </h5>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="padding: 0;">
                                                        <table class="order-details" style="border-collapse: collapse; width: 50%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                                            font-weight: 400;
                                                                            font-size: 15px;
                                                                            padding: 4px 0;"
                                                                    >
                                                                        <?php echo e(trans('storefront::invoice.email')); ?>:
                                                                    </td>

                                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                                            font-weight: 400;
                                                                            font-size: 15px;
                                                                            padding: 4px 0;
                                                                            word-break: break-all;"
                                                                    >
                                                                        <?php echo e($order->customer_email); ?>

                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                                            font-weight: 400;
                                                                            font-size: 15px;
                                                                            padding: 4px 0;"
                                                                    >
                                                                        <?php echo e(trans('storefront::invoice.phone')); ?>:
                                                                    </td>

                                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                                            font-weight: 400;
                                                                            font-size: 15px;
                                                                            padding: 4px 0;
                                                                            word-break: break-all;"
                                                                    >
                                                                        <?php echo e($order->customer_phone); ?>

                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                                            font-weight: 400;
                                                                            font-size: 15px;
                                                                            padding: 4px 0;"
                                                                    >
                                                                        <?php echo e(trans('storefront::invoice.payment_method')); ?>:
                                                                    </td>

                                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                                            font-weight: 400;
                                                                            font-size: 15px;
                                                                            padding: 4px 0;
                                                                            word-break: break-all;"
                                                                    >
                                                                        <?php echo e($order->payment_method); ?>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 0;">
                                        <table class="shipping-address" style="border-collapse: collapse;
                                                                            width: 50%;
                                                                            float: left;
                                                                            margin-top: 25px;"
                                        >
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 0;">
                                                        <h5 style="font-family: 'Open Sans', sans-serif;
                                                                font-weight: 600;
                                                                font-size: 18px;
                                                                line-height: 22px;
                                                                margin: 0 0 8px;
                                                                color: #444444;"
                                                        >
                                                            <?php echo e(trans('storefront::invoice.shipping_address')); ?>

                                                        </h5>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                            font-weight: 400;
                                                            font-size: 15px;
                                                            padding: 0;"
                                                    >
                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->shipping_full_name); ?>

                                                        </span>

                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->shipping_address_1); ?>

                                                        </span>

                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->shipping_address_2); ?>

                                                        </span>

                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->shipping_city); ?>, <?php echo e($order->shipping_state_name); ?> <?php echo e($order->shipping_zip); ?>

                                                        </span>

                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->shipping_country_name); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="billing-address" style="border-collapse: collapse;
                                                                            width: 50%;
                                                                            float: left;
                                                                            margin-top: 25px;"
                                        >
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 0;">
                                                        <h5 style="font-family: 'Open Sans', sans-serif;
                                                                font-weight: 600;
                                                                font-size: 18px;
                                                                line-height: 22px;
                                                                margin: 0 0 8px;
                                                                color: #444444;"
                                                        >
                                                            <?php echo e(trans('storefront::invoice.billing_address')); ?>

                                                        </h5>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                            font-weight: 400;
                                                            font-size: 15px;
                                                            padding: 0;"
                                                    >
                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->billing_full_name); ?>

                                                        </span>

                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->billing_address_1); ?>

                                                        </span>

                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->billing_address_2); ?>

                                                        </span>

                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->billing_city); ?>, <?php echo e($order->billing_state_name); ?> <?php echo e($order->billing_zip); ?>

                                                        </span>

                                                        <span style="display: block; padding: 4px 0;">
                                                            <?php echo e($order->billing_country_name); ?>

                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 30px 0 0;">
                                        <table style="border-collapse: collapse;
                                                    width: 100%;
                                                    border-bottom: 1px solid #e9e9e9;"
                                        >
                                            <tbody>
                                                <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr style="border-top: 1px solid #f1f1f1;">
                                                        <td style="padding: 14px 0 14px;">
                                                            <table style="border-collapse: collapse;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="padding: 0 0 8px;">
                                                                            <a href="<?php echo e($product->url()); ?>"
                                                                                style="font-family: 'Open Sans', sans-serif;
                                                                                    font-weight: 400;
                                                                                    font-size: 18px;
                                                                                    line-height: 22px;
                                                                                    color: #444444;
                                                                                    margin: 0;
                                                                                    text-decoration: none;"
                                                                            >
                                                                                <?php echo e($product->name); ?>

                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                                    <?php if($product->hasAnyOption()): ?>
                                                                        <tr>
                                                                            <td style="padding: 0;">
                                                                                <table style="border-collapse: collapse; width: 100%;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="font-family: 'Open Sans', sans-serif;
                                                                                                    font-weight: 400;
                                                                                                    font-size: 14px;
                                                                                                    padding: 0 0 8px;"
                                                                                            >
                                                                                                <?php $__currentLoopData = $product->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <span style="display: block;">
                                                                                                        <?php echo e($option->name); ?>:

                                                                                                        <span style="color: #9a9a9a; margin-right: 5px;">
                                                                                                            <?php if($option->option->isFieldType()): ?>
                                                                                                                <?php echo e($option->value); ?>

                                                                                                            <?php else: ?>
                                                                                                                <?php echo e($option->values->implode('label', ', ')); ?>

                                                                                                            <?php endif; ?>
                                                                                                        </span>
                                                                                                    </span>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endif; ?>

                                                                    <tr>
                                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                padding: 0 0 4px;"
                                                                        >
                                                                            <span>
                                                                                <?php echo e(trans('storefront::invoice.unit_price')); ?>:
                                                                            </span>

                                                                            <span style="margin-right: 5px;">
                                                                                <?php echo e($product->unit_price->convert($order->currency, $order->currency_rate)->format($order->currency)); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                padding: 0 0 4px;"
                                                                        >
                                                                            <span>
                                                                                <?php echo e(trans('storefront::invoice.quantity')); ?>:
                                                                            </span>

                                                                            <span style="margin-right: 5px;">
                                                                                <?php echo e($product->qty); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                padding: 0 0 4px;"
                                                                        >
                                                                            <span>
                                                                                <?php echo e(trans('storefront::invoice.line_total')); ?>:
                                                                            </span>

                                                                            <span style="margin-right: 5px;">
                                                                                <?php echo e($product->line_total->convert($order->currency, $order->currency_rate)->format($order->currency)); ?>

                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 0;">
                                        <table style="border-collapse: collapse;
                                                    width: 300px;
                                                    margin-top: 10px;
                                                    float: left;"
                                        >
                                            <tbody>
                                                <tr>
                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                            font-size: 17px;
                                                            font-weight: 400;
                                                            padding: 5px 0;"
                                                    >
                                                        <?php echo e(trans('storefront::invoice.subtotal')); ?>

                                                    </td>

                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                            font-size: 17px;
                                                            font-weight: 400;
                                                            padding: 5px 0;
                                                            float: left;"
                                                    >
                                                        <?php echo e($order->sub_total->convert($order->currency, $order->currency_rate)->format($order->currency)); ?>

                                                    </td>
                                                </tr>

                                                <?php if($order->hasShippingMethod()): ?>
                                                    <tr>
                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                font-size: 17px;
                                                                font-weight: 400;
                                                                padding: 5px 0;"
                                                        >
                                                            <?php echo e($order->shipping_method); ?>

                                                        </td>

                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                font-size: 17px;
                                                                font-weight: 400;
                                                                padding: 5px 0;
                                                                float: left;"
                                                        >
                                                            <?php echo e($order->shipping_cost->convert($order->currency, $order->currency_rate)->format($order->currency)); ?>

                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php if($order->hasCoupon()): ?>
                                                    <tr>
                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                font-size: 17px;
                                                                font-weight: 400;
                                                                padding: 5px 0;"
                                                        >
                                                            <?php echo e(trans('storefront::invoice.coupon')); ?>

                                                            (<span style="color: #444444;"><?php echo e($order->coupon->code); ?></span>)
                                                        </td>

                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                font-size: 17px;
                                                                font-weight: 400;
                                                                padding: 5px 0;
                                                                float: left;"
                                                        >
                                                            <?php echo e($order->discount->convert($order->currency, $order->currency_rate)->format($order->currency)); ?>

                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php $__currentLoopData = $order->taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                font-size: 17px;
                                                                font-weight: 400;
                                                                padding: 5px 0;"
                                                        >
                                                            <?php echo e($tax->name); ?>

                                                        </td>

                                                        <td style="font-family: 'Open Sans', sans-serif;
                                                                font-size: 17px;
                                                                font-weight: 400;
                                                                padding: 5px 0;
                                                                float: left;"
                                                        >
                                                            <?php echo e($tax->order_tax->amount->convert($order->currency, $order->currency_rate)->format($order->currency)); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <tr style="border-top: 1px solid #e9e9e9;">
                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                            font-size: 17px;
                                                            font-weight: 600;
                                                            padding: 5px 0;"
                                                    >
                                                        <?php echo e(trans('storefront::invoice.total')); ?>

                                                    </td>

                                                    <td style="font-family: 'Open Sans', sans-serif;
                                                            font-size: 17px;
                                                            font-weight: 600;
                                                            padding: 5px 0;
                                                            float: left;"
                                                    >
                                                        <?php echo e($order->total->convert($order->currency, $order->currency_rate)->format($order->currency)); ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
<?php /**PATH /var/www/html/amp/Themes/Storefront/views/emails/invoice_rtl.blade.php ENDPATH**/ ?>