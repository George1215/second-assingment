<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> - Olx</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::to('bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('bootstrap/css/bootstrap-theme.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo e(URL::to('css/style.css')); ?>">

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Olx</a>
        </div>
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if(Auth::check()): ?>
                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">
                        <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;
                        Admin Panel
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                        Logout
                    </a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <h2>Navigation</h2>
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
            </ul>
        </div>
        <div class="col-sm-9">

            <?php echo $__env->yieldContent('content'); ?>

        </div>
    </div>
</div>


<!-- Jquery -->
<script src="<?php echo e(URL::to('js/jquery-1.12.4.min.js')); ?>"></script>
<!-- Bootstrap js -->
<script src="<?php echo e(URL::to('bootstrap/js/bootstrap.min.js')); ?>"></script>
</body>
</html>
