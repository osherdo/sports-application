

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
$('#getRequest').click(function(){
$.get('getRequest',function(data){ // Make a GET request for the getRequest route. The returned message will be store in data parameter.
  $('#getRequestData').append(data); // append the data returned to the getRequestData div.
  console.log(data);
  $('#postRequestData').html(data);
})
});
$('#register').submit(function()
{
  var fname= $('#firstname').val();
  var lname=$('#lastname').val();

  $.post('register',{firstname:fname,lastname:lname},function(data){
    console.log(data);
  }})
})
});
</script>
@extends('layouts.master')
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


<div class="container">
<p><b>Register form </b> </p>

<div class="row col-lg-5">
  <h2>Get Request</h2>
  <button type="button" class="btn btn-warning" id="getRequest">getRequest</button>
  <br><br>
<div class="row col-lg-5">
  <h3> Register Form</h3>
  <form id="register">
    <label for="firstname"></label>
    <input type="text" id="firstname" class="form-control">

  <label for="lastname"></label>
  <input type="text" id="lastname" class="form-control">

  <input type="submit" value="register" class="btn btn-primary">
  </form>
</div>
<div id="getRequestData"> </div></div>

<div id="postRequestData"></div>
