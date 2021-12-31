<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', __('Notifications')); ?>

    <li class="active"><?php echo e(__('Notifications')); ?></li>
<?php echo $__env->renderComponent(); ?>



<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('resource', 'notification'); ?>
    <?php $__env->slot('name', __('notification')); ?>

    <?php $__env->slot('thead'); ?>
        <tr>
            <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <th><?php echo e(trans('admin::admin.table.id')); ?></th>
            <th><?php echo e(__('Description')); ?></th>
            <th><?php echo e(__('admin::admin.table.status')); ?></th>
            <th data-sort><?php echo e(__('Notified at')); ?></th>
        </tr>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#notification-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id',   },
                { data: 'name', name: 'notification_text', orderable: false, defaultContent: '' },
                { data: 'status', name: 'is_active', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/Notification/Resources/views/admin/notification/index.blade.php ENDPATH**/ ?>