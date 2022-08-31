<?php

use Modules\Cart\Facades\Cart;
?>
<aside class="order-summary-wrap">
    <div class="order-summary">
        <div class="order-summary-top">
            <h3 class="section-title"><?php echo e(trans('storefront::cart.order_summary')); ?></h3>

            <ul class="list-inline cart-item">
                <li v-for="cartItem in cart.items">
                    <label>
                        <a :href="productUrl(cartItem.product)" class="product-name" v-text="cartItem.product.name"></a>
                        <span class="product-quantity" v-text="'x' + cartItem.qty"></span>
                    </label>

                    <span class="price-amount" v-html="cartItem.unitPrice.inCurrentCurrency.formatted"></span>
                </li>
            </ul>
        </div>

        <div class="order-summary-middle" :class="{ loading: loadingOrderSummary }">
            <ul class="list-inline order-summary-list">
                <li>
                    <label><?php echo e(trans('storefront::cart.subtotal')); ?></label>

                    <span
                        class="price-amount"
                        v-html="cart.subTotal.inCurrentCurrency.formatted"
                    >
                    </span>
                </li>

                <li v-for="tax in cart.taxes">
                    <label v-text="tax.name"></label>

                    <span
                        class="price-amount"
                        v-html="tax.amount.inCurrentCurrency.formatted"
                    >
                    </span>
                </li>

                <li v-if="hasCoupon" v-cloak>
                    <label>
                        <?php echo e(trans('storefront::cart.coupon')); ?>


                        <span class="coupon-code">
                            [{{ cart.coupon.code }}]
                            <span class="btn-remove-coupon" @click="removeCoupon">
                                <i class="las la-times"></i>
                            </span>
                        </span>
                    </label>

                    <span
                        class="price-amount"
                        v-html="'-' + cart.coupon.value.inCurrentCurrency.formatted"
                    >
                    </span>
                </li>
            </ul>
            <?php
               // var_dump(json_decode(Cart::availableShippingMethods())->flat_rate->cost->amount);
            ?>
            <div class="shipping-methods" v-if="hasShippingMethod" v-cloak>
                <h6><?php echo e(trans('storefront::cart.shipping_method')); ?></h6>
                <!--<input type="hidden" id="shipping_cost_amount" name="shipping_cost" value="<?php echo e(json_decode(Cart::availableShippingMethods())->flat_rate->cost->amount); ?>" />
                <input type="hidden" id="subTotalPricing"  value="<?php echo e(Cart::total()->amount()); ?>" />-->
                <div class="form-group">
                    <div class="form-radio" v-for="shippingMethod in cart.availableShippingMethods">
                        <input
                            type="radio"
                            name="shipping_method"
                            v-model="form.shipping_method"
                            :value="shippingMethod.name"
                            :id="shippingMethod.name"
                            @change="updateShippingMethod(shippingMethod.name)"
                        >

                        <label :for="shippingMethod.name" v-text="shippingMethod.label"></label>

                        <span
                            class="price-amount"
                            v-html="shippingMethod.cost.inCurrentCurrency.formatted"
                        >
                        </span>
                    </div>
                </div>
            </div>

            <div class="order-summary-total">
                <label><?php echo e(trans('storefront::cart.total')); ?></label>
                <span class="total-price" v-html="cart.total.inCurrentCurrency.formatted"></span>
            </div>
        </div>

        <div class="order-summary-bottom">
            <div class="form-group checkout-terms-and-conditions">
                <div class="form-check">
                    <input type="checkbox" v-model="form.terms_and_conditions" id="terms-and-conditions">

                    <label for="terms-and-conditions" class="form-check-label">
                        <?php echo e(trans('storefront::checkout.i_agree_to_the')); ?>

                        <a href="<?php echo e($termsPageURL); ?>">
                            <?php echo e(trans('storefront::checkout.terms_&_conditions')); ?>

                        </a>
                    </label>

                    <span class="error-message" v-if="errors.has('terms_and_conditions')" v-text="errors.get('terms_and_conditions')"></span>
                </div>
            </div>

            <div id="paypal-button-container" v-if="form.payment_method === 'paypal'"></div>

            <button
                type="submit"
                class="btn btn-primary btn-place-order"
                :class="{ 'btn-loading': placingOrder }"
                :disabled="! form.terms_and_conditions"
                v-else
                v-cloak
            >
                <?php echo e(trans('storefront::checkout.place_order')); ?>

            </button>
        </div>
    </div>
</aside>
<?php /**PATH /var/www/html/amp/Themes/Storefront/views/public/checkout/create/order_summary.blade.php ENDPATH**/ ?>