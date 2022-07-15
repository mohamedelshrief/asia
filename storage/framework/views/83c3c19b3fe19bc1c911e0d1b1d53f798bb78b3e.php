<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::select('rating', trans('review::attributes.rating'), $errors, array_combine(range(1, 5), range(1, 5)), $review, ['required' => true])); ?>

        <?php echo e(Form::text('reviewer_name', trans('review::attributes.reviewer_name'), $errors, $review, ['required' => true])); ?>

        <?php echo e(Form::textarea('comment', trans('review::attributes.comment'), $errors, $review, ['required' => true])); ?>

        <?php echo e(Form::checkbox('is_approved', trans('review::attributes.is_approved'), trans('review::reviews.form.approve_this_review'), $errors, $review)); ?>

    </div>
</div>
<?php /**PATH /var/www/html/Modules/Review/Resources/views/admin/reviews/tabs/general.blade.php ENDPATH**/ ?>