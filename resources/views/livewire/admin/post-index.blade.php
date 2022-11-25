<div>
    <div class="row">
        <div class="col-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nuevo Posts</h3>
                </div>

                <form method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Category</label>
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
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar Categoria</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Posts</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 35%">Actions</th>
                            <th>Category</th>
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

                <div class="card-footer clearfix">
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
