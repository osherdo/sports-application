@extends('layouts.master')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <p>Welcome to click-and-fit!</p>
    <p> this is the homepage! </p>
@endsection
@yield('content')