<?php $__env->startSection('title'); ?>
    Update Product
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="col-sm-8">
        <div class="row">
            <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="form-container">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('update-product-post')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">

                    <div class="form-group">
                        <label>Category</label>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p>
                                <input type="radio" name="category_id" value="<?php echo e($item->id); ?>" <?php echo e(($item->id == $product->category_id) ? 'checked' : ''); ?> required> <?php echo e($item->name); ?>

                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control <?php echo e($errors->has('name') ? ' has-error' : ''); ?>" name="name" value="<?php echo e($product->name); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control <?php echo e($errors->has('price') ? ' has-error' : ''); ?>" name="price" value="<?php echo e($product->price); ?>" required>
                        <span>(In GBP)</span>
                    </div>

                    <div class="form-group">
                        <label>Purchase Year</label>
                        <input type="text" class="form-control <?php echo e($errors->has('year') ? ' has-error' : ''); ?>" name="year" value="<?php echo e($product->year); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <p>
                            <img src="<?php echo e(URL::to($product->image)); ?>" alt="" width="100">
                        </p>
                        <input type="file" name="file" size="40" accept=".png, .jpg, .jpegf">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required style="resize: vertical"><?php echo e($product->description); ?></textarea>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>