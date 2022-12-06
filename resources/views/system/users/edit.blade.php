@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Actualizacion de usuario!</strong> Se han actualizado los permisos correctamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-title">

        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-4">
                   <form method="post" action="{{route('system.admin.users.update', $user)}}">
                       @csrf
                       @method('PUT')
                       <div class="form-group">
                           <label for="exampleInputEmail1">Nombres</label>
                           <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre" value="{{$user->name}}">
                       </div>

                       <div class="form-group">
                           <label for="exampleInputEmail1">Email</label>
                           <input type="text" name="email" class="form-control" placeholder="Ingrese el Email" value="{{$user->email}}">
                       </div>

                       @php
                           $user_roles = array();
                       @endphp

                       @foreach($user_with_roles as $role_selected)
                           @php
                               array_push($user_roles, $role_selected);
                           @endphp
                       @endforeach

                       @foreach($roles as $rol)
                           <div class="form-check">
                               <input type="checkbox" class="form-check-input" id="{{$rol->id}}" name="roles[]" value="{{$rol->id}}" @if(in_array($rol->name, $user_roles)) {{'checked=checked'}} @endif>
                               <label class="form-check-label" for="{{$rol->id}}">{{$rol->name}}</label>
                           </div>
                       @endforeach

                       <button type="submit" class="btn btn-primary">Guardar</button>
                   </form>
               </div>

               <div class="col-8">

               </div>
           </div>
        </div>
        <div class="card-footer">

        </div>
    </div>

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
