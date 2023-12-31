<?php $__env->startSection('title', trans('storefront::checkout.checkout')); ?>

<?php $__env->startSection('content'); ?>
    <checkout-create
        customer-email="<?php echo e(auth()->user()->email ?? null); ?>"
        customer-phone="<?php echo e(auth()->user()->phone ?? null); ?>"
        :addresses="<?php echo e($addresses); ?>"
        :default-address="<?php echo e($defaultAddress); ?>"
        :gateways="<?php echo e($gateways); ?>"
        :countries="<?php echo e(json_encode($countries)); ?>"
        inline-template
    >
        <section class="checkout-wrap">
            <div class="container">
                <?php echo $__env->make('public.cart.index.steps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form @submit.prevent="placeOrder" @input="errors.clear($event.target.name)">
                    <div class="checkout">
                        <div class="checkout-inner">
                            <div class="checkout-left">
                                <div class="checkout-form">
                                    <?php echo $__env->make('public.checkout.create.form.account_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('public.checkout.create.form.billing_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('public.checkout.create.form.shipping_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('public.checkout.create.form.order_note', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>

                            <div class="checkout-right">
                                <?php echo $__env->make('public.checkout.create.payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo $__env->make('public.checkout.create.coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>

                        <?php echo $__env->make('public.checkout.create.order_summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </form>
            </div>
        </section>
    </checkout-create>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('pre-scripts'); ?>
    <?php if(setting('paypal_enabled')): ?>
        <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e(setting('paypal_client_id')); ?>&currency=<?php echo e(setting('default_currency')); ?>&disable-funding=credit,card,venmo,sepa,bancontact,eps,giropay,ideal,mybank,p24,p24"></script>
    <?php endif; ?>

    <?php if(setting('stripe_enabled')): ?>
        <script src="https://js.stripe.com/v3/"></script>
    <?php endif; ?>

    <?php if(setting('paytm_enabled')): ?>
        <?php if(setting('paytm_test_mode')): ?>
            <script src="https://securegw-stage.paytm.in/merchantpgpui/checkoutjs/merchants/<?php echo e(setting('paytm_merchant_id')); ?>.js"></script>
        <?php else: ?>
            <script src="https://securegw.paytm.in/merchantpgpui/checkoutjs/merchants/<?php echo e(setting('paytm_merchant_id')); ?>.js"></script>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(setting('razorpay_enabled')): ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>

<script>
   /*$(document).ready(function(){
        shippingPricing();
        $(".select-address input[type=radio]").change(function(){
            shippingPricing();
        })
    })
    function shippingPricing(){
        address_id=$(".select-address input[type=radio]:checked").val();
        sub_total=$("#subTotalPricing").val();
        $.ajax({
            url: "<?php echo e(url('en/api/shipping-price')); ?>?address_id="+address_id,
            type: "GET",
            async: false,
            success: function (reponse) {
                shipping_amount=reponse.RateCalculation.RateList[0].TotalPriceAED;
                $(".shipping-methods .form-group .form-radio:nth-child(2) .price-amount").html("AED "+shipping_amount);
                $("#shipping_cost_amount").val(shipping_amount);
                total_amount=parseFloat(shipping_amount)//+parseFloat(sub_total);
               // alert(total_amount)
                $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
            },
        });
    }*/
</script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

var CSRF_TOKEN =window.FleetCart.csrfToken;
$(document).ready(function(){
  $( "#shipping-city" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      country=$("#shipping-country").val();
      $.ajax({
        url:"<?php echo e(url('/en/api/search-city')); ?>/"+country+"/"+request.term,
        type: 'GET',
        dataType: "json",
        success: function( data ) {
            response( data );
        }
      });
    },
    select: function (event, ui) {
       $('#shipping-city').val(ui.item.label ? ui.item.label : "");
       $('#shipping-city-id').val(ui.item.value ? ui.item.value : "");
       if($('#shipping-city-id').val()!=""){
            shippingPricingByCity($('#shipping-city-id').val());
       }
       return false;
    }
  });

  //bILLing
  $( "#billing-city" ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      country=$("#billing-country").val();
      $.ajax({
        url:"<?php echo e(url('/en/api/search-city')); ?>/"+country+"/"+request.term,
        type: 'GET',
        dataType: "json",
        success: function( data ) {
            response( data );
        }
      });
    },
    select: function (event, ui) {
       $('#billing-city').val(ui.item.label ? ui.item.label : "");
       $('#billing-city-id').val(ui.item.value ? ui.item.value : "");
       if($('#billing-city-id').val()!=""){
            shippingPricingByCity($('#billing-city-id').val());
       }
       return false;
    }
  });

});

/*function shippingPricingByCity(id){
        sub_total=$("#subTotalPricing").val();
        $.ajax({
            url: "<?php echo e(url('en/api/shipping-price')); ?>?city_id="+id,
            type: "GET",
            async: false,
            success: function (reponse) {
                shipping_amount=reponse[0].TotalPriceAED;
                $(".shipping-methods .price-amount").html("AED "+shipping_amount);
                $("#shipping_cost_amount").val(shipping_amount);
                total_amount=parseFloat(shipping_amount)+parseFloat(sub_total);
                $(".order-summary-total .total-price").html("AED "+total_amount.toFixed(2));
            },
        });
    }*/
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Themes/Storefront/views/public/checkout/create.blade.php ENDPATH**/ ?>