<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estudiante::create([
            'est_nombres' => 'Denis',
            'est_paterno' => 'Puma',
            'est_materno' => 'Ticona',
            'est_correo' => 'dpumaticona@gmail.com',
            'est_dni' => '71822317',
            'est_celular' => '951208106',
            'est_codigo_mat' => '141076',
            'est_estado' => 1,
        ]);

        Estudiante::create([
            'est_nombres' => 'Alejandro',
            'est_paterno' => 'Mendez',
            'est_materno' => 'Mendez',
            'est_correo' => 'andres123ml@gmail.com',
            'est_dni' => '70112233',
            'est_celular' => '951208101',
            'est_codigo_mat' => '151515',
            'est_estado' => 1,
        ]);

        Estudiante::create([
            'est_nombres' => 'Eliza',
            'est_paterno' => 'Pirír',
            'est_materno' => 'Sabán',
            'est_correo' => 'macove.polo@gmail.com',
            'est_dni' => '71800017',
            'est_celular' => '951208146',
            'est_codigo_mat' => '141414',
            'est_estado' => 1,
        ]);


    }
}
