<div class="coupon-wrap">
    <form @submit.prevent="applyCoupon">
        <div class="form-group">
            <div class="form-input">
                <input
                    type="text"
                    v-model="couponCode"
                    placeholder="<?php echo e(trans('storefront::cart.enter_coupon_code')); ?>"
                    class="form-control"
                    @input="couponError = null"
                >

                <span
                    class="error-message"
                    v-if="couponError"
                    v-text="couponError"
                >
                </span>
            </div>

            <button
                type="submit"
                class="btn btn-primary btn-apply-coupon"
                :class="{ 'btn-loading': applyingCoupon }"
            >
                <?php echo e(trans('storefront::cart.apply_coupon')); ?>

            </button>
        </div>
    </form>

    <span
        class="error-message"
        v-if="couponError"
        v-text="couponError"
    >
    </span>
</div>
<?php /**PATH /var/www/html/Amp/Themes/Storefront/views/public/cart/index/coupon.blade.php ENDPATH**/ ?>