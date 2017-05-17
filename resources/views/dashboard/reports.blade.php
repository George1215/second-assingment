@extends('layouts.admin_layout')

@section('title')
    Reported Products
@endsection


@section('content')
        <div class="row">

            @include('includes._message_block')
        </div>

        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 20">Id</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Name of Product</th>
                    <th>Price (GBP)</th>
                    <th>Description</th>
                    <th>Date Added</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{ URL::to($item->image) }}" alt="" width="100">
                        </td>
                        <td>
                            @if(!is_null($item->category))
                                {{ $item->category->name }}
                            @endif
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('update-product', ['id'=>$item->id]) }}" class="btn btn-info btn-sm">Edit</a>

                            <form action="{{ route('delete-product-post') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');"
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

