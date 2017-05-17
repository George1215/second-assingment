@extends('layouts.admin_layout')

@section('title')
    Add Product
@endsection


@section('content')
    <div class="col-sm-8">
        <div class="row">
            @include('includes._message_block')
            <div class="form-container">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('add-product-post') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Category</label>

                        @foreach($categories as $item)
                            <p>
                                <input type="radio" name="category_id" value="{{ $item->id }}" required> {{ $item->name  }}
                            </p>
                        @endforeach

                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control {{ $errors->has('price') ? ' has-error' : '' }}" name="price" value="{{ old('price') }}" required>
                        <span>(In GBP)</span>
                    </div>

                    <div class="form-group">
                        <label>Purchase Year</label>
                        <input type="text" class="form-control {{ $errors->has('year') ? ' has-error' : '' }}" name="year" value="{{ old('year') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="file" size="40" accept=".png, .jpg, .jpegf" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required style="resize: vertical"></textarea>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

