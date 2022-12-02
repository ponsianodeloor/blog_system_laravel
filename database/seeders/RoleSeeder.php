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

        Permission::create(['name'=>'system']);

        Permission::create(['name'=>'system.admin.categories.index']);
        Permission::create(['name'=>'system.admin.categories.store']);
        Permission::create(['name'=>'system.admin.categories.edit']);
        Permission::create(['name'=>'system.admin.categories.update']);
        Permission::create(['name'=>'system.admin.categories.destroy']);

        Permission::create(['name'=>'system.admin.tags.index']);
        Permission::create(['name'=>'system.admin.tags.store']);
        Permission::create(['name'=>'system.admin.tags.edit']);
        Permission::create(['name'=>'system.admin.tags.update']);
        Permission::create(['name'=>'system.admin.tags.destroy']);

        Permission::create(['name'=>'system.admin.posts.index']);
        Permission::create(['name'=>'system.admin.posts.store']);
        Permission::create(['name'=>'system.admin.posts.edit']);
        Permission::create(['name'=>'system.admin.posts.update']);
        Permission::create(['name'=>'system.admin.posts.destroy']);

        $role_1->permissions()->attach([1, 2, 3, 6, 11]);
    }
}
