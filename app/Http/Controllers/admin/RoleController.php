<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        return view('system.roles.index');
    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(Role $role){

    }

    public function edit(Role $role){
        $permissions = Permission::all();

        $rol_with_permissions = Permission::with('roles')->whereRelation('roles', 'name', $role->name)->orderBy('name')->get();

        return view('system.roles.edit', compact('role', 'permissions', 'rol_with_permissions'));
    }

    public function update(Request $request, Role $role){
        $request->validate([
            'name'=>'required'
        ]);
        $role->name = $request->name;
        $role->save();

        $role->permissions()->sync($request->permissions);

        return redirect()->route('system.admin.roles.edit', $role)->with('info', 'Se han asignado los permisos correctamente');
    }

    public function destroy(Role $role){

    }
}
