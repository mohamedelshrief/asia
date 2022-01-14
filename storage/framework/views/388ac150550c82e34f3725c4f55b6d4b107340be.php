<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('flashsale::flash_sales.flash_sales')); ?>

    <li class="active"><?php echo e(trans('flashsale::flash_sales.flash_sales')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'flash_sales'); ?>
    <?php $__env->slot('name', trans('flashsale::flash_sales.flash_sale')); ?>

    <?php $__env->startComponent('admin::components.table'); ?>
        <?php $__env->slot('thead'); ?>
            <tr>
                <?php echo $__env->make('admin::partials.table.select_all', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <th><?php echo e(trans('admin::admin.table.id')); ?></th>
                <th><?php echo e(trans('flashsale::flash_sales.table.campaign_name')); ?></th>
                <th data-sort><?php echo e(trans('admin::admin.table.created')); ?></th>
            </tr>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#flash_sales-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'campaign_name', name: 'translations.campaign_name', orderable: false, defaultContent: '' },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/FlashSale/Resources/views/admin/flash_sales/index.blade.php ENDPATH**/ ?>