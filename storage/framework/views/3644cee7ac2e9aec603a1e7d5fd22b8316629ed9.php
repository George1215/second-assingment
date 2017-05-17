<?php $__env->startSection('title'); ?>
    Products
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
        <div class="row">

            <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 20">Id</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Name of Product</th>
                    <th>Price (GBP)</th>
                    <th>Description</th>
                    <th>Date Added</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td>
                            <img src="<?php echo e(URL::to($item->image)); ?>" alt="" width="100">
                        </td>
                        <td>
                            <?php if(!is_null($item->category)): ?>
                                <?php echo e($item->category->name); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->price); ?></td>
                        <td><?php echo e($item->description); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('update-product', ['id'=>$item->id])); ?>" class="btn btn-info btn-sm">Edit</a>

                            <form action="<?php echo e(route('delete-product-post')); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');"
                                  style="display: inline-block">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>