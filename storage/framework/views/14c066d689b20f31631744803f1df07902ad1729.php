<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('name', trans('option::attributes.name'), $errors, $option, ['required' => true])); ?>


        <div class="form-group required">
            <label for="type" class="col-md-3 control-label text-left">
                <?php echo e(trans('option::attributes.type')); ?><span class="m-l-5 text-red">*</span>
            </label>

            <div class="col-md-9">
                <select name="type" class="form-control custom-select-black" id="type">
                    <option value="" <?php echo e(is_null(old('type', $option->type)) ? 'selected' : ''); ?>>
                        <?php echo e(trans('option::options.form.option_types.please_select')); ?>

                    </option>

                    <optgroup label="<?php echo e(trans('option::options.form.option_types.text')); ?>">
                        <option value="field" <?php echo e(old('type', $option->type) === 'field' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.field')); ?>

                        </option>

                        <option value="textarea" <?php echo e(old('type', $option->type) === 'textarea' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.textarea')); ?>

                        </option>
                    </optgroup>

                    <optgroup label="<?php echo e(trans('option::options.form.option_types.select')); ?>">
                        <option value="dropdown" <?php echo e(old('type', $option->type) === 'dropdown' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.dropdown')); ?>

                        </option>

                        <option value="checkbox" <?php echo e(old('type', $option->type) === 'checkbox' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.checkbox')); ?>

                        </option>

                        <option value="checkbox_custom" <?php echo e(old('type', $option->type) === 'checkbox_custom' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.checkbox_custom')); ?>

                        </option>

                        <option value="radio" <?php echo e(old('type', $option->type) === 'radio' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.radio')); ?>

                        </option>

                        <option value="radio_custom" <?php echo e(old('type', $option->type) === 'radio_custom' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.radio_custom')); ?>

                        </option>

                        <option value="multiple_select" <?php echo e(old('type', $option->type) === 'multiple_select' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.multiple_select')); ?>

                        </option>
                    </optgroup>

                    <optgroup label="<?php echo e(trans('option::options.form.option_types.date')); ?>">
                        <option value="date" <?php echo e(old('type', $option->type) === 'date' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.date')); ?>

                        </option>

                        <option value="date_time" <?php echo e(old('type', $option->type) === 'date_time' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.date_time')); ?>

                        </option>

                        <option value="time" <?php echo e(old('type', $option->type) === 'time' ? 'selected' : ''); ?>>
                            <?php echo e(trans('option::options.form.option_types.time')); ?>

                        </option>
                    </optgroup>
                </select>

                <?php echo $errors->first('type', '<span class="help-block text-red">:message</span>'); ?>

            </div>
        </div>

        <?php echo e(Form::checkbox('is_required', trans('option::attributes.is_required'), trans('option::options.form.this_option_is_required'), $errors, $option)); ?>

    </div>
</div>
<?php /**PATH /var/www/html/Modules/Option/Resources/views/admin/options/tabs/general.blade.php ENDPATH**/ ?>