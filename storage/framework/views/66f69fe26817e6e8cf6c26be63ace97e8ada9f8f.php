<?php if(count($errors)>0): ?>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="text-danger"><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>

<!--if error-->
<?php if(Session::has('error')): ?>
    <ul>
        <li class="text-danger"><?php echo e(Session::get('error')); ?></li>
    </ul>
<?php endif; ?>

<!--if success-->
<?php if(Session::has('success')): ?>
    <p class="text-success front-message">
        <i class="icon fa fa-check"></i>
        <?php echo e(Session::get('success')); ?>

    </p>
<?php endif; ?>