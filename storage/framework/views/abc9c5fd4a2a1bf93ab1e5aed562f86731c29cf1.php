<?php $__env->startSection('title', trans('storefront::account.view_order.track_order')); ?>


<?php $__env->startSection('content'); ?>
    <section class="order-details-wrap">
        <div class="container">

            <h3 class="section-title"><?php echo e(trans('storefront::account.view_order.track_order')); ?></h3>
            <h5><?php echo e(trans('storefront::account.orders.order_id')); ?>: <?php echo e($order->id); ?></h5>
            <br/>
            <div class="history-tl-container">
                <ul class="tl">
                  <li class="tl-item" ng-repeat="item in retailer_history">
                    <div class="timestamp">
                      3rd March 2015 <br/>7:00 PM
                    </div>
                    <div class="item-title">Start from Shire</div>
                    <div class="item-detail">Don't forget the ring</div>
                  </li>

                </ul>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function(){
            $.ajax({
                url: "<?php echo e(route('account.orders.gettracking',1000003699324)); ?>",
                type: "GET",
                async: false,
                success: function (reponse) {
                }
            });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Themes/Storefront/views/public/account/orders/Tracking.blade.php ENDPATH**/ ?>