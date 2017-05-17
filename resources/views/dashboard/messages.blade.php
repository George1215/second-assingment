@extends('layouts.admin_layout')

@section('title')
    Messages
@endsection


@section('content')
    <div class="row">

        @include('includes._message_block')

        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 20">Id</th>
                <th>Sender</th>
                <th>Topic</th>
                <th>Date</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>

            @php
                $user_id=Auth::user()->id;
            @endphp

            @foreach($messages as $item)

                @if($item->receiver_id == $user_id || $item->sender_id == $user_id)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            @if(!is_null($item->sender))
                                {{ $item->sender->username }}
                            @endif
                        </td>
                        <td>{{ $item->topic }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('message', ['id'=>$item->id]) }}" class="btn btn-info btn-sm">Read</a>
                            <form action="{{ route('delete-message-post') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');"
                                  style="display: inline-block">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>


    </div>
@endsection

