<div class="form-group variant-check">
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <label>
                <?php echo $option->name .
                    ($option->is_required ? '<span>*</span>' : ''); ?>

            </label>
        </div>

        <div class="col-xl-10 col-lg-12">
            <?php $__currentLoopData = $option->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check">
                    <input
                        type="checkbox"
                        name="options[<?php echo e($option->id); ?>][]"
                        id="option-<?php echo e($option->id); ?>-value-<?php echo e($value->id); ?>"
                        value="<?php echo e($value->id); ?>"
                        @change="updateCheckboxTypeOptionValue(<?php echo e($option->id); ?>, $event)"
                    >

                    <label for="option-<?php echo e($option->id); ?>-value-<?php echo e($value->id); ?>">
                        <?php echo $value->label .
                            $value->formattedPriceForProduct($product); ?>

                    </label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <span
                class="error-message"
                v-if="errors.has('<?php echo e("options.{$option->id}"); ?>')"
                v-text="errors.get('<?php echo e("options.{$option->id}"); ?>')"
            >
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Themes/Storefront/views/public/products/show/custom_options/checkbox.blade.php ENDPATH**/ ?>