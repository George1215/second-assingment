@extends('layouts.admin_layout')

@section('title')
    Users
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
                    <th>Username</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Date Added</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <form action="{{ route('delete-user-post') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');"
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

