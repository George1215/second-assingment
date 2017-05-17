@if(count($errors)>0)
    <ul>
        @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!--if error-->
@if(Session::has('error'))
    <ul>
        <li class="text-danger">{{ Session::get('error') }}</li>
    </ul>
@endif

<!--if success-->
@if(Session::has('success'))
    <p class="text-success front-message">
        <i class="icon fa fa-check"></i>
        {{ Session::get('success') }}
    </p>
@endif