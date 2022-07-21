<script type="text/html" id="state-select-template">
    <select name="rates[<%- rateId %>][state]" class="form-control custom-select-black" id="rates.<%- rateId %>.state">
        <option value=""><?php echo e(trans('admin::admin.form.please_select')); ?></option>

        <% _.forEach(states, function (state, code) { %>
            <option value="<%- code %>"><%- state %></option>
        <% }); %>
    </select>
</script>
<?php /**PATH /var/www/html/Amp/Modules/Tax/Resources/views/admin/taxes/tabs/templates/state_select.blade.php ENDPATH**/ ?>