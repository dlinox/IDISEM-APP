<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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


        foreach ($rutas as $key => $value) {
            if ($value) {
                Permission::create(
                    [
                        'name' => $value['as'],
                        'guard_name' => 'admin'
                    ]
                );
            }
        }
    }
}
