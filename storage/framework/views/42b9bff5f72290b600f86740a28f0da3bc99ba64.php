<?php $__env->startSection('title'); ?>
    Login
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!--current active page-->
    <?php 
        $active = Route::currentRouteName()
     ?>

    <div class="col-sm-4 col-md-3">
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
                <h2 class="row">Login</h2>
                <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login-post')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control <?php echo e($errors->has('username') ? ' has-error' : ''); ?>" name="username" value="<?php echo e(old('username')); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input id="password" type="password" class="form-control <?php echo e($errors->has('password') ? ' has-error' : ''); ?>" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="form-group">
                        New User?
                        <a class="btn btn-link" href="<?php echo e(route('register')); ?>">
                            Register
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>