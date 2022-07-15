<div class="form-group variant-custom-selection">
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <label>
                <?php echo $option->name .
                    ($option->is_required ? '<span>*</span>' : ''); ?>

            </label>
        </div>

        <div class="col-xl-10 col-lg-12">
            <ul class="list-inline form-custom-radio custom-selection">
                <?php $__currentLoopData = $option->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li
                        :class="{ active: customCheckboxTypeOptionValueIsActive(<?php echo e($option->id); ?>, <?php echo e($value->id); ?>) }"
                        @click="syncCustomCheckboxTypeOptionValue(<?php echo e($option->id); ?>, <?php echo e($value->id); ?>)"
                    >
                        <?php echo $value->label .
                            $value->formattedPriceForProduct($product); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <span
                class="error-message"
                v-if="errors.has('<?php echo e("options.{$option->id}"); ?>')"
                v-text="errors.get('<?php echo e("options.{$option->id}"); ?>')"
            >
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Themes/Storefront/views/public/products/show/custom_options/checkbox_custom.blade.php ENDPATH**/ ?>