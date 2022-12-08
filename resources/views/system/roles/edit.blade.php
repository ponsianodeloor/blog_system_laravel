@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Edit Role</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Actualizacion de rol!</strong> {{session('info')}}
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
                    <form method="post" action="{{route('system.admin.roles.update', $role)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rol</label>
                            <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre" value="{{$role->name}}">
                            @error('name')
                            <small class="text-danger">
                                {{$message}}
                            </small>
                            @enderror
                        </div>

                        @php
                            $rol_permissions = array();
                        @endphp

                        @foreach($rol_with_permissions as $permission_selected)
                            @php
                                array_push($rol_permissions, $permission_selected->name);
                            @endphp
                        @endforeach

                        @foreach($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{$permission->id}}" name="permissions[]" value="{{$permission->id}}" @if(in_array($permission->name, $rol_permissions)) {{'checked=checked'}} @endif>
                                <label class="form-check-label" for="{{$permission->id}}">{{$permission->name}}</label>
                            </div>
                        @endforeach


                        <button type="submit" class="btn btn-primary">Guardar</button>

                        <div>

                        </div>

                        <div>

                        </div>


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
