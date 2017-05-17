<?php $__env->startSection('title'); ?>
    Admin
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="col-sm-12">
        <div class="row">

            <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 20">Id</th>
                    <th>Category Name</th>
                    <th>Date Added</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('update-category', ['id'=>$item->id])); ?>" class="btn btn-info btn-sm">Edit</a>

                            <form action="<?php echo e(route('delete-category-post')); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');"
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

        <div class="row text-right">
            <?php echo e($categories->links()); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>