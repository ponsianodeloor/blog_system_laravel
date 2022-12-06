<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role_1 = Role::create(['name'=>'Admin']);
        $role_2 = Role::create(['name'=>'Proveedor']);
        $role_3 = Role::create(['name'=>'Validador']);

        Permission::create(['name'=>'system']);

        /**
         * permisos para relacionar un rol con un permiso
         */
        //Permission::create(['name'=>'system.admin.categories.index'])->assingRole($role_1);
        Permission::create(['name'=>'system.admin.categories.index'])->syncRoles([$role_1, $role_2]);
        Permission::create(['name'=>'system.admin.categories.store'])->syncRoles([$role_1, $role_2]);
        Permission::create(['name'=>'system.admin.categories.edit'])->syncRoles([$role_1, $role_2]);
        Permission::create(['name'=>'system.admin.categories.update'])->syncRoles([$role_1, $role_2]);
        Permission::create(['name'=>'system.admin.categories.destroy'])->syncRoles([$role_1]);

        Permission::create(['name'=>'system.admin.tags.index'])->syncRoles([$role_1, $role_2]);
        Permission::create(['name'=>'system.admin.tags.store'])->syncRoles([$role_1, $role_2]);
        Permission::create(['name'=>'system.admin.tags.edit'])->syncRoles([$role_1, $role_2]);
        Permission::create(['name'=>'system.admin.tags.update'])->syncRoles([$role_1, $role_2]);
        Permission::create(['name'=>'system.admin.tags.destroy'])->syncRoles([$role_1]);

        Permission::create(['name'=>'system.admin.posts.index'])->syncRoles([$role_1, $role_2, $role_3]);
        Permission::create(['name'=>'system.admin.posts.store'])->syncRoles([$role_1, $role_2, $role_3]);
        Permission::create(['name'=>'system.admin.posts.edit'])->syncRoles([$role_1, $role_2, $role_3]);
        Permission::create(['name'=>'system.admin.posts.update'])->syncRoles([$role_1, $role_2, $role_3]);
        Permission::create(['name'=>'system.admin.posts.destroy'])->syncRoles([$role_1, $role_3]);

        /**
         * Se pueden asignar los permisos de usando attach
         */
        //$role_1->permissions()->attach([1, 2, 3, 6, 11]);
    }
}
