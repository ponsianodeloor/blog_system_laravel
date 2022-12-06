<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(){
        User::create([
            'name'=>'Ponsiano De Loor',
            'email' => 'ponsianodeloor@gmail.com',
            'password' => Hash::make('ponsiano')
        ])->assignRole('Admin');

        User::create([
            'name'=>'Beta Provider',
            'email' => 'proveedor@gmail.com',
            'password' => Hash::make('ponsiano')
        ])->assignRole('Proveedor');

        User::create([
            'name'=>'Gama Validator',
            'email' => 'validador@gmail.com',
            'password' => Hash::make('ponsiano')
        ])->assignRole('Validador');
        User::factory(99)->create();
    }
}
