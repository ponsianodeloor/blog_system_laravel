<div>

    <div class="card">
        <div class="card-title mt-2 mx-2">
            <input type="search" class="form-control" placeholder="Busqueda" wire:model="search">
        </div>

        @if(count($users)>0)

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('system.admin.users.edit', $user)}}">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$users->links()}}
        </div>

        @else
            <div class="card-body">
                <p>No existen registros</p>
            </div>
        @endif

    </div>
</div>
