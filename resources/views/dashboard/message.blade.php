@extends('layouts.admin_layout')

@section('title')
    Message
@endsection


@section('content')
    <div class="row margin-bottom30">

        <div class="col-sm-12 margin-bottom15">
            <h4>Sender:
                @if(!is_null($parent_message->sender))
                    {{ $parent_message->sender->username }}
                @endif
            </h4>
            <h4>Topic: {{ $parent_message->topic }}</h4>
        </div>


        @foreach($messages as $item)
            @if(Auth::user()->id != $item->receiver_id)

                <div class="col-sm-12  mes-receive">
                    <p>
                        <strong>
                            @if(!is_null($item->sender))
                                {{ $item->sender->username }}
                            @endif
                        </strong>
                    </p>
                    <p>
                        {{ $item->message }}
                    </p>
                </div>

            @else
                <div class="col-sm-12 mes-sender">
                    <p>
                        <strong>
                            @if(!is_null($item->sender))
                                {{ $item->sender->username }}
                            @endif
                        </strong>
                    </p>
                    <p>
                        {{ $item->message }}
                    </p>
                </div>
            @endif

        @endforeach

    </div>


    @php
        $receiver_id=0;
        $user_id=Auth::user()->id;

        if($parent_message->sender_id == $user_id){
            $receiver_id=$parent_message->receiver_id;
        }
        if($parent_message->receiver_id == $user_id){
            $receiver_id=$parent_message->sender_id;
        }
    @endphp


    <div class="row">
        <div class="col-sm-12">
            <div class="form-container">
                @include('includes._message_block')

                <form class="form-horizontal" role="form" method="POST" action="{{ route('send-message-post') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="receiver_id" value="{{ $receiver_id }}">
                    <input type="hidden" name="topic" value="{{ $parent_message->topic }}">
                    <input type="hidden" name="parent_id" value="{{ $parent_message->id }}">

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

