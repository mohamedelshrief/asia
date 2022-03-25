<?php $__env->startComponent('admin::components.page.header'); ?>
<style>
    .previous-price{
        color: red;
        text-decoration: line-through
    }
</style>
    <?php $__env->slot('title', trans('product::products.products')); ?>

    <li class="active"><?php echo e(trans('product::products.products')); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('admin::components.page.index_table'); ?>
    <?php $__env->slot('buttons', ['create']); ?>
    <?php $__env->slot('resource', 'products'); ?>
    <?php $__env->slot('name', trans('product::products.product')); ?>

    <form  method="get">
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <label><?php echo e(trans('product::products.search.search_by_model')); ?></label>
                    <input type="text" value="<?php echo e($request->model_no); ?>" class="form-control" name="model_no" id="model_no"/>
                </div>

                <div class="col-md-2 col-lg-2">
                    <label><?php echo e(trans('product::products.search.search_by_price')); ?></label>
                    <input type="number"   value="<?php echo e($request->price); ?>"  class="form-control" name="price" id="price"/>
                </div>

                <div class="col-md-2 col-lg-2">
                    <label><?php echo e(trans('product::products.search.search_by_product_name')); ?></label>
                    <input type="text" value="<?php echo e($request->get('query')); ?>"  class="form-control" name="query" id="query"/>
                </div>


                <div class="col-md-2 col-lg-2">
                    <label><?php echo e(trans('product::products.search.search_by_brand')); ?></label>
                    <select class="form-control select-2" value="<?php echo e($request->brand); ?>" name="brand" value="brand">
                        <option value="any" <?php if($request->brand=='any'): ?> selected <?php endif; ?>>Any</option>
                        <?php $__currentLoopData = $Brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($request->brand==$item->id): ?>
                                <option value="<?php echo e($item->id); ?>" selected ><?php echo e($item->name); ?></option>
                            <?php else: ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="col-md-2 col-lg-2">
                    <label><?php echo e(trans('product::products.search.stock_status')); ?></label>
                    <select class="form-control select-2" name="in_stock">
                        <option value="any" <?php if($request->in_stock=='any'): ?> selected <?php endif; ?>>Any</option>
                        <option value="1" <?php if($request->in_stock==1): ?> selected <?php endif; ?> >In Stock</option>
                        <option value="0" <?php if($request->in_stock=="0"): ?> selected <?php endif; ?> >Out Stock</option>
                    </select>
                </div>

                <div class="col-md-2 col-lg-2">
                    <label><?php echo e(trans('product::products.search.image_status')); ?></label>
                    <select class="form-control select-2" name="imageStatus">
                        <option value="any" <?php if($request->imageStatus=='any'): ?> selected <?php endif; ?>>Any</option>
                        <option value="1" <?php if($request->imageStatus==1): ?> selected <?php endif; ?> >Yes</option>
                        <option value="0" <?php if($request->imageStatus=="0"): ?> selected <?php endif; ?> >No</option>
                    </select>
                </div>

                <div class="col-md-3" style="padding-top:20px">
                    <input type="submit" class="btn btn-success btn-block" value="Search"/>
                </div>
            </div>
        </div>
    </div>
    </form>
    <table class="table dataTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>SKu</th>
                <th>Thumbnail</th>
                <th>Name</th>
                <th>Price</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $Products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($item->ProductId); ?></td>
                <td><?php echo e($item->sku); ?></td>
                <td>
                    <div class="thumbnail-holder">
                        <img src="<?php echo e($item->base_image->path); ?>"  alt="thumbnail">
                    </div>
                </td>
                <td><a href="<?php echo e(url('')); ?>/admin/products/<?php echo e($item->ProductId); ?>/edit"><?php echo e($item->name); ?></a></td>
                <td>
                    <?php
                    print($item->formatted_price);
                    ?>
                </td>
                <td>
                    <?php if($item->is_active==true): ?>
                        <span class="dot green"></span>
                    <?php else: ?>
                        <span class="dot red"></span>
                    <?php endif; ?>
                    <?php echo e($item->status); ?>

                </td>
                <td><?php echo e($item->created_at); ?></td>
                <td><a href="<?php echo e(url('')); ?>/admin/products/<?php echo e($item->ProductId); ?>/delete">Delete</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($Products->links()); ?>

<?php echo $__env->renderComponent(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        /*new DataTable('#products-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%',searchable: true },
                { data: 'sku', width: '5%',searchable: true },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'price', searchable: false },
                { data: 'status', name: 'is_active', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });*/
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Amp/Modules/Product/Resources/views/admin/products/index.blade.php ENDPATH**/ ?>