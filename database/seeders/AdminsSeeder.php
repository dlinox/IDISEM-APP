<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        Admin::create([
            'name' => 'Admin Uno',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
        ])->assignRole('ADMINISTRADOR');

        Admin::create([
            'name' => 'INVESTIGADOR Uno',
            'email' => 'inve@gmail.com',
            'password' => Hash::make('inve@gmail.com'),
        ])->assignRole('INVESTIGADOR');
    }
}
