<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('system.users.index');
    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(User $user){

    }

    public function edit(User $user){
        $user_with_roles = $user->getRoleNames();
        $roles = Role::all();

        return view('system.users.edit', compact('user', 'roles', 'user_with_roles'));
    }

    public function update(Request $request, User $user){
        $user->name = $request->name;
        $user->email = $request->email;

        //return $request->roles;
        $user->save();
        $user->roles()->sync($request->roles);

        $roles = Role::all();
        $user_with_roles = $user->getRoleNames();

        return redirect()->route('system.admin.users.edit', $user)->with('info', 'Se han asignado los roles correctamente');
    }

    public function destroy(User $user){

    }
}
