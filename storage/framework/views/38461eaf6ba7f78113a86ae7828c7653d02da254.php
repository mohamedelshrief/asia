<span data-toggle="tooltip" title="<?php echo e(is_null($date) ? '' : $date->toFormattedDateString()); ?>">
    <?php echo is_null($date) ? '&mdash;' : $date->diffForHumans(); ?>

</span>
<?php /**PATH D:\xampp\htdocs\apmpllc\Modules/Admin/Resources/views/partials/table/date.blade.php ENDPATH**/ ?>