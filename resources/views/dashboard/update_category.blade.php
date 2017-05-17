@extends('layouts.admin_layout')

@section('title')
    Update Category
@endsection


@section('content')
    <div class="col-sm-8">
        <div class="row">
            @include('includes._message_block')
            <div class="form-container">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('update-category-post') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" value="{{ $category->id }}">

                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="{{ $category->name }}" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

