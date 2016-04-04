@extends('layouts.master')
@section('scripts')
 <script type="text/javascript" src="{!! asset('js/status.min.js') !!}"></script>
@stop

@section('content')

@if (count($errors) > 0)
  <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 {!! csrf_field() !!}


<p> {{ $user->name }}, Welcome to the search page:<br><br>
Here are your search results:<br><br> </p>

<hr>
@foreach($prefQuery as $name)
@foreach($prefQuery as $age)
@foreach($prefQuery as $userSelect)

{{}}
@endforeach

<br><br><br><hr>