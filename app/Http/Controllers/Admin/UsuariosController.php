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


    public function index(Request $request)
    {

        $search = $request->search ?? '';

        $usuarios = User::select()
            ->orWhere('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render(
            'Admin/Usuarios/index',
            [
                'usuarios' => $usuarios,
                'filters' => $request->all('search'),
            ]
        );
    }
}
