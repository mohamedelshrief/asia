<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('currency::currency_rates.currency_rate')])); ?>
    <?php $__env->slot('subtitle', $currencyRate->currency); ?>

    <li><a href="<?php echo e(route('admin.currency_rates.index')); ?>"><?php echo e(trans('currency::currency_rates.currency_rates')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('currency::currency_rates.currency_rate')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.currency_rates.update', $currencyRate)); ?>" class="form-horizontal" id="currency-rate-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('currencyRate')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('shortcuts'); ?>
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd><?php echo e(trans('admin::admin.shortcuts.back_to_index', ['name' => trans('currency::currency_rates.currency_rate')])); ?></dd>
    </dl>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        keypressAction([
            { key: 'b', route: "<?php echo e(route('admin.currency_rates.index')); ?>" }
        ]);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Modules/Currency/Resources/views/admin/currency_rates/edit.blade.php ENDPATH**/ ?>