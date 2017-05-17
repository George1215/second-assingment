<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Olx</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">

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
            @if(Auth::check())
                <li>
                    <a class="user-a">
                        Hello {{ Auth::user()->username }} !
                    </a>

                </li>
                <li>
                    <a href="{{ route('index') }}">
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        View Site
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;
                        Logout
                    </a>
                </li>
            @endif
        </ul>

    </div>
</nav>
<!--current active page-->
@php
    $active = Route::currentRouteName()
@endphp

<div class="container">
    <div class="row">
        <h2 class="text-center">Dashboard</h2>
        <div class="col-sm-12 text-center margin-bottom30 admin-nav">
            <div class="row">
                <ul class="nav navbar-nav">
                    <li class="{{ ($active === 'add-product' || $active=='dashboard') ? 'active' : '' }}">
                        <a href="/add-product">Add Product</a>
                    </li>
                    @if(Auth::user()->role==1)
                        <li class="{{ $active === 'products' ? 'active' : '' }}">
                            <a href="/products">Products</a>
                        </li>
                    @else
                        <li class="{{ $active === 'products' ? 'active' : '' }}">
                            <a href="/products">My Products</a>
                        </li>
                    @endif

                    @if(Auth::user()->role==1)
                        <li class="{{ $active === 'add-category' ? 'active' : '' }}">
                            <a href="/add-category">Add Category</a>
                        </li>
                        <li class="{{ $active === 'categories' ? 'active' : '' }}">
                            <a href="/categories">Categories</a>
                        </li>
                        <li class="{{ $active === 'users' ? 'active' : '' }}">
                            <a href="/users">Users</a>
                        </li>
                        <li class="{{ $active === 'reports' ? 'active' : '' }}">
                            <a href="/reports">Reported Posts</a>
                        </li>
                    @endif

                    <li class="{{ $active === 'messages' ? 'active' : '' }}">
                        <a href="/messages">Messages</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-sm-12">

            @yield('content')

        </div>
    </div>
</div>


<!-- Jquery -->
<script src="{{ URL::to('js/jquery-1.12.4.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ URL::to('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
