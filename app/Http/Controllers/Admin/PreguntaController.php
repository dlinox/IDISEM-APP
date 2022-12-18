<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PreguntaController extends Controller
{

    public function index()
    {
        //lista de encuestas creadas - view
    }

    public function create()
    {
        return Inertia::render('Admin/Pregunta/Crear');
    }


    public function store(Request $request)
    {
        //Crear nuevo formulario
    }


    public function show($id)
    {
        // ver detalles del formulario
    }

    public function edit($id)
    {
        //Ver formulario de edicion de formulario
    }

    public function update(Request $request, $id)
    {
        //Actulizar forumario
    }

    public function destroy($id)
    {
        //Eliminar formulario
    }
}
