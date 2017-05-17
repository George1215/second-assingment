<?php $__env->startSection('title'); ?>
    Messages
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">

        <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 20">Id</th>
                <th>Sender</th>
                <th>Topic</th>
                <th>Date</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>

            <?php 
                $user_id=Auth::user()->id;
             ?>

            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($item->receiver_id == $user_id || $item->sender_id == $user_id): ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td>
                            <?php if(!is_null($item->sender)): ?>
                                <?php echo e($item->sender->username); ?>

                            <?php endif; ?>
                        </td>
                        <td><?php echo e($item->topic); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('message', ['id'=>$item->id])); ?>" class="btn btn-info btn-sm">Read</a>
                            <form action="<?php echo e(route('delete-message-post')); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');"
                                  style="display: inline-block">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>


    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>