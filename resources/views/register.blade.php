@extends('layouts.main_layout')

@section('title')
    Register
@endsection


@section('content')
    <!--current active page-->
    @php
        $active = Route::currentRouteName()
    @endphp

    <div class="col-sm-6 col-md-3">
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
                <h2 class="row">Register</h2>

                @include('includes._message_block')

                <form class="form-horizontal" role="form" method="POST" action="{{ route('register-post') }}">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control {{ $errors->has('username') ? ' has-error' : '' }}" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="form-group">
                        <label>E-Mail Address</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control {{ $errors->has('first_name') ? ' has-error' : '' }}" name="first_name" value="{{ old('first_name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control {{ $errors->has('last_name') ? ' has-error' : '' }}" name="last_name" value="{{ old('last_name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control {{ $errors->has('phone') ? ' has-error' : '' }}" name="phone" value="{{ old('phone') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password" value="{{ old('password') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password_confirmation"
                               value="{{ old('password_confirmation') }}" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <div class="form-group">
                        Already have an account?
                        <a class="btn btn-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

