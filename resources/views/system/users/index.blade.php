@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    @livewire('admin.users')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles

@stop

@section('js')
    @livewireScripts
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-2.1.0/src/jquery.stringtoslug.js')}}"></script>
    <script>

    </script>
@stop
