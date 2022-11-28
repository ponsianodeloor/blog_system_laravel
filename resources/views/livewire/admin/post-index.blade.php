<div>
    <div class="row">
        <div class="col-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nuevo Posts</h3>
                </div>

                <form action="{{route('system.admin.posts.store')}}" method="post">
                    @csrf
                    <div class="card-body">

                        <x-adminlte-select name="category_id" label="Category" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                            </x-slot>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </x-adminlte-select>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre de la Categoria">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Extract</label>
                            <input type="text" class="form-control" id="extract" name="extract" placeholder="Extract">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Body</label>
                            <input type="text" class="form-control" id="body" name="body" placeholder="Body">
                        </div>

                        <x-adminlte-select name="status" label="Status" label-class="text-lightblue">
                            <x-slot name="prependSlot">
                                <div class="input-group-text bg-gradient-info">
                                    <i class="fas fa-sitemap"></i>
                                </div>
                            </x-slot>

                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>

                        </x-adminlte-select>

                        @foreach($tags as $tag)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{$tag->id}}" name="tags[]" value="{{$tag->id}}">
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
            <div class="card">
                <div class="card-header">
                    {{$search}}
                    <input wire:model="search" class="form-control" placeholder="Ingrese el post a buscar">
                </div>

                @if(count($posts)>0)
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 35%">Actions</th>
                                <th>Name</th>
                                <th>Slug</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <a href="{{route('system.admin.categories.edit', $post->id)}}" class="btn btn-primary mb-2">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{route('system.admin.categories.destroy', $post->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->slug}}</td>
                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            NO existe ningun registro
                        </div>
                    </div>
                @endif


                <div class="card-footer clearfix">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
