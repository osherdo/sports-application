@extends('layouts.master')
@section('scripts')
 <script type="text/javascript" src="{!! asset('js/status.min.js') !!}"></script>
@stop



@section('content')
    {!! csrf_field() !!}

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

<p> Welcome to the search page: </p>