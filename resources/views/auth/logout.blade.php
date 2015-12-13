@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <p>Thanks for your time!</p>
    <p> You're now logged out. </p>
@endsection
@yield('content')