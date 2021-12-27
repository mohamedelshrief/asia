<?php $__env->startSection('title', trans('storefront::cart.cart')); ?>

<?php $__env->startSection('content'); ?>
    <cart-index inline-template v-cloak>
        <div>
            <section class="shopping-cart-wrap">
                <div class="container">
                    <?php echo $__env->make('public.cart.index.steps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="shopping-cart">
                        <div class="shopping-cart-inner" v-if="cartIsNotEmpty">
                            <?php echo $__env->make('public.cart.index.cart_items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('public.cart.index.coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                        <?php echo $__env->make('public.cart.index.order_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <?php echo $__env->make('public.cart.index.empty_cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </section>

            <landscape-products
                title="<?php echo e(trans('storefront::product.you_might_also_like')); ?>"
                v-if="hasAnyCrossSellProduct"
                :products="crossSellProducts"
            >
            </landscape-products>
        </div>
    </cart-index>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Themes/Storefront/views/public/cart/index.blade.php ENDPATH**/ ?>