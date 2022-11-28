@extends('adminlte::page')

@section('title', 'Posts')

@section('content_header')
    <h1>Posts</h1>
@stop

@section('content')
<div>
    <div class="row">
        <div class="col-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Editar Posts</h3>
                </div>

                <form action="{{route('system.admin.posts.update', $post)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <x-adminlte-select name="category_id" label="Category" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                            </x-slot>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if($category->id == $post->category->id) {{'selected=selected'}} @endif>{{$category->name}}</option>
                            @endforeach

                        </x-adminlte-select>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre de la Categoria" value="{{$post->name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$post->slug}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Extract</label>
                            <input type="text" class="form-control" id="extract" name="extract" placeholder="Extract" value="{{$post->extract}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Body</label>
                            <input type="text" class="form-control" id="body" name="body" placeholder="Body" value="{{$post->body}}">
                        </div>


                        <x-adminlte-select name="status" label="Status" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                            </x-slot>

                            <option value="1" @if($post->status == 1) {{'selected=selected'}} @endif>Activo</option>
                            <option value="2" @if($post->status == 2) {{'selected=selected'}} @endif>Inactivo</option>

                        </x-adminlte-select>

                        @php
                            $post_tags = array();
                        @endphp

                        @foreach($post->tags as $tag_selected)
                            @php
                                array_push($post_tags, $tag_selected->id)
                            @endphp
                        @endforeach

                        @foreach($tags as $tag)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="{{$tag->id}}" name="tags[]" value="{{$tag->id}}" @if(in_array($tag->id, $post_tags)) {{'checked=checked'}} @endif>
                            <label class="form-check-label" for="{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                        @endforeach
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar Post</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->

        <div class="col-6">

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
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
