<?php $__env->startSection('title'); ?>
    Login
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!--current active page-->
    <?php 
        $active = Route::currentRouteName()
     ?>

    <div class="col-sm-6 col-md-3">
        <div class="col-sm-12 main-nav">
            <h2>Navigation</h2>
            <ul class="nav navbar-nav">
                <li class="<?php echo e($active === 'index' ? 'front-active' : ''); ?>">
                    <a href="/">Home</a>
                </li>

                <?php if(Auth::check()): ?>
                    <li>
                        <a href="/dashboard">Dashboard</a>
                    </li>
                <?php endif; ?>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="/"><?php echo e($item->name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>


    <div class="col-sm-8">
        <div class="col-sm-12">
            <div class="form-container">
                <h2 class="row">Send Message to: <strong><?php echo e($receiver->username); ?></strong></h2>
                <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('send-message-post')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="receiver_id" value="<?php echo e($receiver->id); ?>">

                    <div class="form-group">
                        <label>Topic</label>
                        <input type="text" class="form-control <?php echo e($errors->has('topic') ? ' has-error' : ''); ?>" name="topic" value="<?php echo e(old('topic')); ?>">
                    </div>

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


<?php echo $__env->make('layouts.main_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>