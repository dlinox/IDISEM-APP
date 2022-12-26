<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EstudiantesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.estudiantes.listado')->only('index');
        $this->middleware('can:admin.estudiantes.formulario.crear')->only('create');
        $this->middleware('can:admin.estudiantes.crear')->only('store');
        $this->middleware('can:admin.estudiantes.ver')->only('show');
        $this->middleware('can:admin.estudiantes.formulario.editar')->only('edit');
        $this->middleware('can:admin.estudiantes.editar')->only('update');
        $this->middleware('can:admin.estudiantes.eliminar')->only('destroy');
    }


    public function index()
    {
        $estudiantes = Estudiante::all()->map(function ($estu) {
            return [
                'id' => $estu->est_id,
                'nombres' => $estu->est_nombres,
                'apellidos' => $estu->est_paterno .' '. $estu->est_materno,
                'correo' => $estu->est_correo,
                'dni' => $estu->est_dni,
                'celular' => $estu->est_celular,
                'codigo' => $estu->est_codigo_mat,
                'registrado' => User::select('id')->where('student',  $estu->est_id)->first() ? true: false,
            ];
        });

        return Inertia::render(
            'Admin/Estudiantes/index',
            [
                'estudiantes' => $estudiantes
            ]
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
