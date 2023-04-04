<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $admin = Role::create([
            'guard_name' => 'admin',
            'name' => 'ADMINISTRADOR',
            'redirect' => 'admin.dashboard'
        ]);
        $investigator = Role::create([
            'guard_name' => 'admin',
            'name' => 'INVESTIGADOR',
            'redirect' => 'admin.encuestas.listado'
        ]);



        $rutas  = collect(Route::getRoutes())->map(function ($value) {
            if ($value->action['prefix'] === '/admin') {
                return [
                    'uri' => $value->uri,
                    'prefix' => $value->action['prefix'],
                    'as' => $value->action['as'],
                ];
            } else {
                return false;
            }
        });

        $permisos = [];

        foreach ($rutas as $key => $value) {
            if ($value) {
                $aux = Permission::create(
                    [
                        'name' => $value['as'],
                        'guard_name' => 'admin'
                    ]
                );

                array_push($permisos,  $aux->name);
                
            }
        }

        $admin->syncPermissions($permisos);
    }
}
