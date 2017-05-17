@extends('layouts.main_layout')

@section('title')
    Send Message
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
                <h2 class="row">Send Message to: <strong>{{ $receiver->username }}</strong></h2>
                @include('includes._message_block')

                <form class="form-horizontal" role="form" method="POST" action="{{ route('send-message-post') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="receiver_id" value="{{  $receiver->id }}">

                    <div class="form-group">
                        <label>Topic</label>
                        <input type="text" class="form-control {{ $errors->has('topic') ? ' has-error' : '' }}" name="topic" value="{{ old('topic') }}">
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="message" required style="resize: vertical; min-height: 200px;">{{ old('message') }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

