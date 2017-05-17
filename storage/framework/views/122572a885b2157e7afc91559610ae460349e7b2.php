<?php $__env->startSection('title'); ?>
    Messages
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row margin-bottom30">

        <div class="col-sm-12 margin-bottom15">
            <h4>Sender:
                <?php if(!is_null($parent_message->sender)): ?>
                    <?php echo e($parent_message->sender->username); ?>

                <?php endif; ?>
            </h4>
            <h4>Topic: <?php echo e($parent_message->topic); ?></h4>
        </div>

        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(Auth::user()->id != $item->user_id): ?>

                <div class="col-sm-12  mes-receive">
                    <p>
                        <strong>
                            <?php if(!is_null($item->sender)): ?>
                                <?php echo e($item->sender->username); ?>

                            <?php endif; ?>
                        </strong>
                    </p>
                    <p>
                        <?php echo e($item->message); ?>

                    </p>
                </div>

            <?php else: ?>
                <div class="col-sm-12 ">
                    <p>
                        <strong>
                            <?php if(!is_null($item->sender)): ?>
                                <?php echo e($item->sender->username); ?>

                            <?php endif; ?>
                        </strong>
                    </p>
                    <p>
                        <?php echo e($item->message); ?>

                    </p>
                </div>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-container">
                <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('send-message-post')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="receiver_id" value="<?php echo e($parent_message->sender_id); ?>">
                    <input type="hidden" name="topic" value="<?php echo e($parent_message->topic); ?>">
                    <input type="hidden" name="parent_id" value="<?php echo e($parent_message->id); ?>">

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="message" required style="resize: vertical; min-height: 200px;"><?php echo e(old('message')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>