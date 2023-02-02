<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('order::orders.orders')); ?>

    <li class="active"><?php echo e(trans('order::orders.orders')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-body index-table" id="orders-table">
            <div style="border: 1px solid silver; border-radius:5px; padding:20px 10px;margin-bottom:10px">
                    <label for="">Status Filter</label>
                    <select class="form-control" name="" id="status_dropdown" style="width:20%">
                        <option value="" selected>Select Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Dispatch">Dispatch</option>
                        <option value="Completed">Completed</option>
                    </select>
            </div>
            <?php $__env->startComponent('admin::components.table'); ?>
                <?php $__env->slot('thead'); ?>
                    <tr>
                        <th><?php echo e(trans('admin::admin.table.id')); ?></th>
                        <th><?php echo e(trans('order::orders.table.customer_name')); ?></th>
                        <th><?php echo e(trans('order::orders.table.customer_email')); ?></th>
                        <th><?php echo e(trans('admin::admin.table.status')); ?></th>
                        <th><?php echo e(trans('order::orders.table.platform')); ?></th>
                        <th><?php echo e(trans('order::orders.table.total')); ?></th>
                        <th data-sort><?php echo e(trans('admin::admin.table.created')); ?></th>
                    </tr>
                <?php $__env->endSlot(); ?>
            <?php echo $__env->renderComponent(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        DataTable.setRoutes('#orders-table .table', {
            index: '<?php echo e("admin.orders.index"); ?>',
            show: '<?php echo e("admin.orders.show"); ?>',
        });

        new DataTable('#orders-table .table', {
            columns: [
                { data: 'id', width: '5%' },
                { data: 'customer_name', orderable: false, searchable: false },
                { data: 'customer_email' },
                { data: 'status' },
                { data: 'platform' },
                { data: 'total' },
                { data: 'created', name: 'created_at' },
            ],
        });

        $("#status_dropdown").on("change",function(){
            var status = $(this).val();
            $("input[type='search']").val(status);
            $("input[type='search']").trigger('keyup');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/asiamp/Modules/Order/Resources/views/admin/orders/index.blade.php ENDPATH**/ ?>