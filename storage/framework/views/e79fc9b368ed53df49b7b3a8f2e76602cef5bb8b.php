<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('import::importer.importer')); ?>

    <li class="active"><?php echo e(trans('import::importer.importer')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
        <div class="btn-group pull-right">
            <a href="#" class="btn btn-primary btn-actions">
                <?php echo e(trans('import::importer.download_csv')); ?>

            </a>
        </div>
    </div>

    <form method="POST" action="<?php echo e(route('admin.importer.store')); ?>" enctype="multipart/form-data" class="form-horizontal">
        <?php echo csrf_field(); ?>

    	<div class="accordion-content">
    		<div class="accordion-box-content clearfix">
    			<div class="col-md-12">
    				<div class="accordion-box-content">
    					<div class="tab-content clearfix">
    						<div class="tab-pane fade in active">
    							<h3 class="tab-content-title">
                                    <?php echo e(trans('import::importer.import')); ?>

                                </h3>

    							<div class="row">
    							    <div class="col-lg-6 col-md-12">
                                        <?php echo e(Form::file('csv_file', trans('import::attributes.csv_file'), $errors, null, ['required' => true])); ?>

                                        <?php echo e(Form::select('import_type', trans('import::attributes.import_type'), $errors, trans('import::importer.import_types'), null, ['required' => true])); ?>


		    							<div class="form-group">
		    							    <div class="col-md-offset-3 col-md-10">
		    							        <button type="submit" class="btn btn-primary" data-loading>
		    							            <?php echo e(trans('import::importer.run')); ?>

		    							        </button>
		    							    </div>
		    							</div>
    							    </div>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Modules/Import/Resources/views/admin/importer/index.blade.php ENDPATH**/ ?>