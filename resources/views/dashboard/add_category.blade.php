@extends('layouts.admin_layout')

@section('title')
    Add Category
@endsection


@section('content')
    <div class="col-sm-8">
        <div class="row">
            @include('includes._message_block')
            <div class="form-container">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('add-category-post') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

