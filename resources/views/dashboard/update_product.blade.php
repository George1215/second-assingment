@extends('layouts.admin_layout')

@section('title')
    Update Product
@endsection


@section('content')
    <div class="col-sm-8">
        <div class="row">
            @include('includes._message_block')
            <div class="form-container">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('update-product-post') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="form-group">
                        <label>Category</label>

                        @foreach($categories as $item)
                            <p>
                                <input type="radio" name="category_id" value="{{ $item->id }}" {{ ($item->id == $product->category_id) ? 'checked' : '' }} required> {{
                                $item->name  }}
                            </p>
                        @endforeach

                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ $product->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control {{ $errors->has('price') ? ' has-error' : '' }}" name="price" value="{{ $product->price }}" required>
                        <span>(In GBP)</span>
                    </div>

                    <div class="form-group">
                        <label>Purchase Year</label>
                        <input type="text" class="form-control {{ $errors->has('year') ? ' has-error' : '' }}" name="year" value="{{ $product->year }}" required>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <p>
                            <img src="{{ URL::to($product->image) }}" alt="" width="100">
                        </p>
                        <input type="file" name="file" size="40" accept=".png, .jpg, .jpegf">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" required style="resize: vertical">{{ $product->description }}</textarea>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

