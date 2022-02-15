<?php $__env->startSection('title', $page->name); ?>

<?php $__env->startPush('meta'); ?>
    <meta name="title" content="<?php echo e($page->meta->meta_title ?: $page->name); ?>">
    <meta name="description" content="<?php echo e($page->meta->meta_description); ?>">
    <meta name="twitter:card" content="summary">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta property="og:title" content="<?php echo e($page->meta->meta_title ?: $page->name); ?>">
    <meta property="og:description" content="<?php echo e($page->meta->meta_description); ?>">
    <meta property="og:image" content="<?php echo e($logo); ?>">
    <meta property="og:locale" content="<?php echo e(locale()); ?>">

    <?php $__currentLoopData = supported_locale_keys(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <meta property="og:locale:alternate" content="<?php echo e($code); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="custom-page-wrap clearfix">
        <div class="container">
            <div class="custom-page-content clearfix">
                <?php echo $page->body; ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Themes/Storefront/views/public/pages/show.blade.php ENDPATH**/ ?>