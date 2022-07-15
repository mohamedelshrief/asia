<div class="form-group variant-select">
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <label for="option-<?php echo e($option->id); ?>">
                <?php echo $option->name .
                    ($option->is_required ? '<span>*</span>' : ''); ?>

            </label>
        </div>

        <div class="col-xl-10 col-lg-12">
            <div class="form-select">
                <?php if($option->type === 'multiple_select'): ?>
                    <select
                        name="options[<?php echo e($option->id); ?>][]"
                        class="form-control"
                        id="option-<?php echo e($option->id); ?>"
                        @change="updateSelectTypeOptionValue(<?php echo e($option->id); ?>, $event)"
                        multiple
                    >
                <?php else: ?>
                    <select
                        name="options[<?php echo e($option->id); ?>]"
                        class="form-control custom-select-option arrow-black"
                        id="option-<?php echo e($option->id); ?>"
                        @nice-select-updated="updateSelectTypeOptionValue(<?php echo e($option->id); ?>, $event)"
                    >
                <?php endif; ?>
                    <?php if($option->type === 'dropdown'): ?>
                        <option value="" selected><?php echo e(trans('storefront::product.options.choose_an_option')); ?></option>
                    <?php endif; ?>

                    <?php $__currentLoopData = $option->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>">
                            <?php echo "{$value->label} " .
                                $value->formattedPriceForProduct($product, FOR_SELECT_OPTION); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <span
                    class="error-message"
                    v-if="errors.has('<?php echo e("options.{$option->id}"); ?>')"
                    v-text="errors.get('<?php echo e("options.{$option->id}"); ?>')"
                >
                </span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/Themes/Storefront/views/public/products/show/custom_options/select.blade.php ENDPATH**/ ?>