<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <title><?php echo $__env->yieldContent('title'); ?> - Olx</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(URL::to('bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo e(URL::to('css/style.css')); ?>">

</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Olx</a>
        </div>
        <ul class="nav navbar-nav">
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if(Auth::check()): ?>
                <li>
                    <a class="user-a">
                        Hello <?php echo e(Auth::user()->username); ?> !
                    </a>

                </li>

                <li>
                    <a href="<?php echo e(route('dashboard')); ?>">
                        <i class="fa fa-dashboard" aria-hidden="true"></i>&nbsp;
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                        Logout
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="<?php echo e(route('login')); ?>">
                        <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                        Login
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('register')); ?>">
                        <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;
                        Register
                    </a>
                </li>
            <?php endif; ?>
        </ul>

    </div>
</nav>

<div class="container-fluid">
    <div class="col-sm-12">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>


<!-- Jquery -->
<script src="<?php echo e(URL::to('js/jquery-1.12.4.min.js')); ?>"></script>
<!-- Bootstrap js -->
<script src="<?php echo e(URL::to('bootstrap/js/bootstrap.min.js')); ?>"></script>

<script>
    $("#search_box").on("change paste keyup", function () {
        var q = $('#search_box').val();

        $.ajax
        ({
            type: 'POST',
            url: url_search,
            data: {
                "_token": token,
                "q": q
            },
            success: function (response) {
                document.getElementById("product_content").innerHTML = response;
            },
            error: function (response) {

            }
        });

    });
</script>

<script>
    $('.img').click(function () {
        $('.product-image-overlay').remove();
        $('body').append('<div class="product-image-overlay"><span class="product-image-overlay-close">x</span><img src="" /></div>');
        var productImage = $('img');
        var productOverlay = $('.product-image-overlay');
        var productOverlayImage = $('.product-image-overlay img');

        var productImageSource = $(this).attr('src');

        productOverlayImage.attr('src', productImageSource);
        productOverlay.fadeIn(100);
        $('body').css('overflow', 'hidden');

        $('.product-image-overlay-close').click(function () {
            productOverlay.fadeOut(100);
            $('body').css('overflow', 'auto');
        });
    });
</script>


<script>
    $(document).ajaxStop(function () {
        $('.img').click(function () {
            $('.product-image-overlay').remove();
            $('body').append('<div class="product-image-overlay"><span class="product-image-overlay-close">x</span><img src="" /></div>');
            var productImage = $('img');
            var productOverlay = $('.product-image-overlay');
            var productOverlayImage = $('.product-image-overlay img');

            var productImageSource = $(this).attr('src');

            productOverlayImage.attr('src', productImageSource);
            productOverlay.fadeIn(100);
            $('body').css('overflow', 'hidden');

            $('.product-image-overlay-close').click(function () {
                productOverlay.fadeOut(100);
                $('body').css('overflow', 'auto');
            });
        });

    });
</script>
</body>
</html>
