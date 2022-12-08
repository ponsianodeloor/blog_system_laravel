<div>
    <div class="card">
        <div class="card-title mt-2 mx-2">
            <input type="search" class="form-control" placeholder="Busqueda" wire:model="search">
        </div>

        @if(count($roles)>0)

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{$role->name}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('system.admin.roles.edit', $role)}}">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$roles->links()}}
            </div>

        @else
            <div class="card-body">
                <p>No existen registros</p>
            </div>
        @endif
    </div>
</div>
