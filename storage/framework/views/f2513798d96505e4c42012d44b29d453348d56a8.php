<?php $__env->startSection('title'); ?>
    Register
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
                <h2 class="row">Register</h2>

                <?php echo $__env->make('includes._message_block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('register-post')); ?>">

                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control <?php echo e($errors->has('username') ? ' has-error' : ''); ?>" name="username" value="<?php echo e(old('username')); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>E-Mail Address</label>
                        <input type="email" class="form-control <?php echo e($errors->has('email') ? ' has-error' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control <?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>" name="first_name" value="<?php echo e(old('first_name')); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control <?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>" name="last_name" value="<?php echo e(old('last_name')); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control <?php echo e($errors->has('phone') ? ' has-error' : ''); ?>" name="phone" value="<?php echo e(old('phone')); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control <?php echo e($errors->has('password') ? ' has-error' : ''); ?>" name="password" value="<?php echo e(old('password')); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control <?php echo e($errors->has('password') ? ' has-error' : ''); ?>" name="password_confirmation"
                               value="<?php echo e(old('password_confirmation')); ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <div class="form-group">
                        Already have an account?
                        <a class="btn btn-link" href="<?php echo e(route('login')); ?>">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>