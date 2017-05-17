<?php $__env->startSection('title'); ?>
    Admin
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="col-sm-8">
        <div class="row">
            <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="form-container">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('update-category-post')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="id" value="<?php echo e($category->id); ?>">

                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control <?php echo e($errors->has('name') ? ' has-error' : ''); ?>" name="name" value="<?php echo e($category->name); ?>" required>
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