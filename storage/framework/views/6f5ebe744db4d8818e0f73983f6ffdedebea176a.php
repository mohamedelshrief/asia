<div class="order-information-wrapper">
    <div class="order-information-buttons">

        <?php if($order->shipping_data!=""): ?>
            <a href="<?php echo e(route('admin.orders.action.label', $order->id)); ?>" style="margin-left:10px" class="btn btn-default" target="_blank" data-toggle="tooltip" title="<?php echo e(trans('order::orders.print')); ?>">
                Download Shipping Label <i class="fa fa-print" aria-hidden="true"></i>
            </a>
        <?php endif; ?>

        <a href="<?php echo e(route('admin.orders.action.label', $order)); ?>" class="btn btn-default" target="_blank" data-toggle="tooltip" title="Delivery label Print" style="margin-left: 10px">
            <i class="fa fa-barcode"></i>
        </a>
        <a href="<?php echo e(route('admin.orders.print.show', $order)); ?>" class="btn btn-default" target="_blank" data-toggle="tooltip" title="<?php echo e(trans('order::orders.print')); ?>">
            <i class="fa fa-print" aria-hidden="true"></i>
        </a>
        <form method="POST" action="<?php echo e(route('admin.orders.email.store', $order)); ?>">
            <?php echo e(csrf_field()); ?>


            <button type="submit" class="btn btn-default" data-toggle="tooltip" title="<?php echo e(trans('order::orders.send_email')); ?>" data-loading>
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </button>
        </form>

    </div>

    <h3 class="section-title"><?php echo e(trans('order::orders.order_and_account_information')); ?></h3>

    <div class="row">
        <div class="col-md-6">
            <div class="order clearfix">
                <h4><?php echo e(trans('order::orders.order_information')); ?></h4>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><?php echo e(trans('order::orders.order_id')); ?></td>
                                <td><?php echo e($order->id); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e(trans('order::orders.order_date')); ?></td>
                                <td><?php echo e($order->created_at->toFormattedDateString()); ?></td>
                            </tr>

                            <tr>
                                <td><?php echo e(trans('order::orders.order_status')); ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-9 col-md-10 col-sm-10">
                                            <select id="order-status" class="form-control custom-select-black" data-id="<?php echo e($order->id); ?>">
                                                <?php $__currentLoopData = trans('order::statuses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($name); ?>" <?php echo e($order->status === $name ? 'selected' : ''); ?>>
                                                        <?php echo e($label); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <?php if($order->shipping_method): ?>
                                <tr>
                                    <td><?php echo e(trans('order::orders.shipping_method')); ?></td>
                                    <td><?php echo e($order->shipping_method); ?></td>
                                </tr>
                            <?php endif; ?>

                            <tr>
                                <td><?php echo e(trans('order::orders.payment_method')); ?></td>
                                <td><?php echo e($order->payment_method); ?></td>
                            </tr>

                            <?php if(is_multilingual()): ?>
                                <tr>
                                    <td><?php echo e(trans('order::orders.currency')); ?></td>
                                    <td><?php echo e($order->currency); ?></td>
                                </tr>

                                <tr>
                                    <td><?php echo e(trans('order::orders.currency_rate')); ?></td>
                                    <td><?php echo e($order->currency_rate); ?></td>
                                </tr>
                            <?php endif; ?>

                            <?php if($order->note): ?>
                                <tr>
                                    <td><?php echo e(trans('order::orders.order_note')); ?></td>
                                    <td><?php echo e($order->note); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <br/>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="account-information">
                <h4><?php echo e(trans('order::orders.account_information')); ?></h4>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><?php echo e(trans('order::orders.customer_name')); ?></td>
                                <td><?php echo e($order->customer_full_name); ?></td>
                            </tr>

                            <tr>
                                <td><?php echo e(trans('order::orders.customer_email')); ?></td>
                                <td><?php echo e($order->customer_email); ?></td>
                            </tr>

                            <tr>
                                <td><?php echo e(trans('order::orders.customer_phone')); ?></td>
                                <td><?php echo e($order->customer_phone); ?></td>
                            </tr>

                            <tr>
                                <td><?php echo e(trans('order::orders.customer_group')); ?></td>

                                <td>
                                    <?php echo e(is_null($order->customer_id) ? trans('order::orders.guest') : trans('order::orders.registered')); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Amp/Modules/Order/Resources/views/admin/orders/partials/order_and_account_information.blade.php ENDPATH**/ ?>