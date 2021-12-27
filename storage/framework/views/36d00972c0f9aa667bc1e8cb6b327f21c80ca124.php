<div class="items-ordered-wrapper">
    <h3 class="section-title"><?php echo e(trans('order::orders.items_ordered')); ?></h3>

    <div class="row">
        <div class="col-md-12">
            <div class="items-ordered">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(trans('order::orders.product')); ?></th>
                                <th><?php echo e(trans('order::orders.unit_price')); ?></th>
                                <th><?php echo e(trans('order::orders.quantity')); ?></th>
                                <th><?php echo e(trans('order::orders.line_total')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php if($product->trashed()): ?>
                                            <?php echo e($product->name); ?>

                                        <?php else: ?>
                                            <a href="<?php echo e(route('admin.products.edit', $product->product->id)); ?>"><?php echo e($product->name); ?></a>
                                        <?php endif; ?>

                                        <?php if($product->hasAnyOption()): ?>
                                            <br>
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
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php echo e($product->unit_price->format()); ?>

                                    </td>

                                    <td><?php echo e($product->qty); ?></td>

                                    <td>
                                        <?php echo e($product->line_total->format()); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Amp/Modules/Order/Resources/views/admin/orders/partials/items_ordered.blade.php ENDPATH**/ ?>