<?php $__env->startSection('title'); ?>
    Users
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
                    <th>Username</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Date Added</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->username); ?></td>
                        <td><?php echo e($item->email); ?></td>
                        <td><?php echo e($item->first_name); ?></td>
                        <td><?php echo e($item->last_name); ?></td>
                        <td><?php echo e($item->phone); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td>
                            <form action="<?php echo e(route('delete-user-post')); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');"
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