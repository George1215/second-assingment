<?php $__env->startSection('title'); ?>
    Index
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
                        <a href="/category/<?php echo e($item->id); ?>"><?php echo e($item->name); ?></a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>

    <div class="col-sm-9">
        <div class="col-sm-12">
            <h2>Find a Product</h2>
            <div class="margin-bottom30">
                <input type="text" placeholder="Name of Product" class="form-control" id="search_box" name="q" style="height: 40px;">
            </div>
        </div>

        <div id="product_content">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-12 col-sm-6 col-md-4 prduct-box-cnt">
                    <p>
                        <strong>Category: </strong>
                        <?php if(!is_null($item->category)): ?>
                            <?php echo e($item->category->name); ?>

                        <?php endif; ?>
                    </p>
                    <p>
                        <strong>Product: </strong><?php echo e($item->name); ?>

                    </p>
                    <div class="prduct-box">
                        <label class="label label-warning" style="font-size: 14px;position: absolute">
                            <i class="fa fa-tag"></i>
                            <?php echo e($item->price); ?></label>
                            <img src="<?php echo e(URL::to($item->image)); ?>" alt=""
                                 class="thumbnail img-responsive img-style img">
                    </div>

                    <?php if(Auth::check()): ?>
                        <div class="box-meta text-center">

                            <?php if($item->report==1): ?>
                                <label class="btn btn-info btn-sm">Reported</label>
                            <?php else: ?>

                                <form action="<?php echo e(route('report-product')); ?>" method="POST" onsubmit="return confirm('Are you sure you want to report this product?');"
                                      style="display: inline-block">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Report</button>
                                </form>

                            <?php endif; ?>

                            <a href="/send-message/<?php echo e($item->user_id); ?>" class="btn btn-success btn-sm">Send Message</a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <script>
            var url_search = '<?php echo e(route("search")); ?>';
            var token = '<?php echo e(Session::token()); ?>';
        </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>