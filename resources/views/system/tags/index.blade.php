@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Tags</h1>
@stop

@section('content')
    <p>Tags</p>
    <div class="row">
        <div class="col-6">
            @if(session('message_info'))
                <div class="alert alert-success">
                    <strong>{{session('message_info')}}</strong>
                </div>
            @endif
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">New Tag</h3>
                </div>

                <form action="{{route('system.admin.tag.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tag</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre de la Categoria">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Color</label>
                            <input type="text" class="form-control" id="color" name="color" placeholder="Slug">
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
                    <h3 class="card-title">Tags</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 35%">Actions</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Color</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>
                                        <a href="{{route('system.admin.tags.edit', $tag->id)}}" class="btn btn-primary mb-2">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{route('system.admin.tags.destroy', $tag->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td>{{$tag->name}}</td>
                                    <td>{{$tag->slug}}</td>
                                    <td>{{$tag->color}}</td>
                                </tr>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{$tags->links()}}
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

        $(document).Toasts('create', {
            title: 'Toast Title',
            body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
            delay: 3000,
            autohide:true,
            class: 'success'
        });



    </script>
@stop
