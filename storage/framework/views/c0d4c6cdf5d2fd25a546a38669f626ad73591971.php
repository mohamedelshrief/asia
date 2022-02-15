<div class="thumbnail-holder">
    <?php if($file->isImage()): ?>
        <img src="<?php echo e($file->path); ?>" alt="thumbnail">
    <?php else: ?>
        <i class="file-icon fa <?php echo e($file->icon()); ?>"></i>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/html/Modules/Media/Resources/views/admin/media/partials/table/thumbnail.blade.php ENDPATH**/ ?>