<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.usuarios.listado')->only('index');
        $this->middleware('can:admin.usuarios.formulario.crear')->only('create');
        $this->middleware('can:admin.usuarios.crear')->only('store');
        $this->middleware('can:admin.usuarios.ver')->only('show');
        $this->middleware('can:admin.usuarios.formulario.editar')->only('edit');
        $this->middleware('can:admin.usuarios.editar')->only('update');
        $this->middleware('can:admin.usuarios.eliminar')->only('destroy');
    }


    public function index()
    {
        $usuarios = User::all();

        return Inertia::render(
            'Admin/Usuarios/index',
            [
                'usuarios' => $usuarios
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
