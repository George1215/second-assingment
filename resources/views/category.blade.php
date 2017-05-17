@extends('layouts.main_layout')

@section('title')
    {{ $category->name }}
@endsection


@section('content')

    <div class="col-sm-6 col-md-3">
        <div class="col-sm-12 main-nav">
            <h2>Navigation</h2>
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">Home</a>
                </li>

                @if(Auth::check())
                    <li>
                        <a href="/dashboard">Dashboard</a>
                    </li>
                @endif

                @foreach($categories as $item)
                    <li class="{{ $category->id == $item->id ? 'front-active' : '' }}">
                        <a href="/category/{{ $item->id }}">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="col-sm-9">
        <div class="col-sm-12">
            <h2>{{ $category->name }}</h2>
        </div>

        @foreach($products as $item)
            <div class="col-xs-12 col-sm-6 col-md-4 prduct-box-cnt">
                <p>
                    <strong>Category: </strong>
                    @if(!is_null($item->category))
                        {{ $item->category->name }}
                    @endif
                </p>
                <p>
                    <strong>Product: </strong>{{ $item->name }}
                </p>
                <div class="prduct-box">
                    <label class="label label-warning" style="font-size: 14px;position: absolute">
                        <i class="fa fa-tag"></i>
                        {{ $item->price }}</label>
                    <a href="#" data-toggle="modal" data-target="#lightbox">
                        <img src="{{ URL::to($item->image) }}" alt=""
                             class="thumbnail img-responsive img-style img">
                    </a>
                </div>

                @if(Auth::check())
                <div class="box-meta text-center">

                    @if($item->report==1)
                        <label class="btn btn-info btn-sm">Reported</label>
                    @else

                        <form action="{{ route('report-product') }}" method="POST" onsubmit="return confirm('Are you sure you want to report this product?');"
                              style="display: inline-block">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">Report</button>
                        </form>

                    @endif

                    <button type="submit" class="btn btn-success btn-sm">Send Message</button>
                </div>
                @endif

            </div>
    @endforeach

@endsection

