<div class="panel-wrap flash-sale" id="products-wrapper">
    
</div>

<div class="form-group">
    <button type="button" class="add-product btn btn-default m-l-15">
        <?php echo e(trans('flashsale::flash_sales.form.add_product')); ?>

    </button>
</div>

<?php echo $__env->make('admin::partials.selectize_remote', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('flashsale::admin.flash_sales.templates.product', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.data['flash_sale.products'] = <?php echo old_json('products', $flashSale->products); ?>;
        FleetCart.errors['flash_sale.products'] = <?php echo json_encode($errors->get('products.*'), JSON_FORCE_OBJECT, 512) ?>;
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/Modules/FlashSale/Resources/views/admin/flash_sales/tabs/products.blade.php ENDPATH**/ ?>