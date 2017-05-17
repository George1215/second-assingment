@extends('layouts.admin_layout')

@section('title')
    Categories
@endsection


@section('content')
        <div class="row">

            @include('includes._message_block')

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 20">Id</th>
                    <th>Category Name</th>
                    <th>Date Added</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('update-category', ['id'=>$item->id]) }}" class="btn btn-info btn-sm">Edit</a>

                            <form action="{{ route('delete-category-post') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');"
                                  style="display: inline-block">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
@endsection

