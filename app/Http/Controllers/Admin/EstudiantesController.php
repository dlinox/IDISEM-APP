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


    public function index(Request $request)
    {

        $search = $request->search ?? '';
        $estudiantes = Estudiante::select(
            'est_id as id',
            'est_nombres as nombres',
            'est_paterno as paterno',
            'est_materno as materno',
            'est_correo as correo',
            'est_dni as dni',
            'est_celular as celular',
            'est_codigo_mat as codigo_mat',
            'est_estado as estado',
            )
            ->orWhere('est_nombres', 'LIKE', '%' . $search . '%')
            ->orWhere('est_paterno', 'LIKE', '%' . $search . '%')
            ->orWhere('est_materno', 'LIKE', '%' . $search . '%')
            ->orWhere('est_correo', 'LIKE', '%' . $search . '%')
            ->orWhere('est_dni', 'LIKE', '%' . $search . '%')
            ->orWhere('est_celular', 'LIKE', '%' . $search . '%')
            ->orWhere('est_codigo_mat', 'LIKE', '%' . $search . '%')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Admin/Estudiantes/index', [
            'filters' => $request->all('search'),
            'estudiantes' => $estudiantes
        ]);
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
