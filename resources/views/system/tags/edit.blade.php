@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Tags</h1>
@stop

@section('content')
    <p>Tags</p>
    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Editar Tag</h3>
                </div>

                <form action="{{route('system.admin.tags.update', $tag)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tag</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre del Tag" value="{{$tag->name}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$tag->slug}}">
                            @error('slug')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Color</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="Color" value="{{$tag->color}}">
                            @error('color')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar Tag</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Historial de cambios</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tag</th>
                            <th>Slug</th>
                            <th>Color</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->slug}}</td>
                                <td>{{$tag->color}}</td>
                            </tr>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">

                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-2.1.0/src/jquery.stringtoslug.js')}}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop
