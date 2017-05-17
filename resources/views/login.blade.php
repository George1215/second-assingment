@extends('layouts.main_layout')

@section('title')
    Login
@endsection


@section('content')
    <!--current active page-->
    @php
        $active = Route::currentRouteName()
    @endphp

    <div class="col-sm-4 col-md-3">
        <div class="col-sm-12 main-nav">
            <h2>Navigation</h2>
            <ul class="nav navbar-nav">
                <li class="{{ $active === 'index' ? 'front-active' : '' }}">
                    <a href="/">Home</a>
                </li>

                @if(Auth::check())
                    <li>
                        <a href="/dashboard">Dashboard</a>
                    </li>
                @endif

                @foreach($categories as $item)
                    <li>
                        <a href="/">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>


    <div class="col-sm-8">
        <div class="col-sm-12">
            <div class="form-container">
                <h2 class="row">Login</h2>
                @include('includes._message_block')

                <form class="form-horizontal" role="form" method="POST" action="{{ route('login-post') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control {{ $errors->has('username') ? ' has-error' : '' }}" name="username" value="{{ old('username') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="form-group">
                        New User?
                        <a class="btn btn-link" href="{{ route('register') }}">
                            Register
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

