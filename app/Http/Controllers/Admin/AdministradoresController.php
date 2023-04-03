<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CrearCuentaAdminMail;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\URL;

class AdministradoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.administradores.listado')->only('index');
        $this->middleware('can:admin.administradores.formulario.crear')->only('create');
        $this->middleware('can:admin.administradores.crear')->only('store');
        $this->middleware('can:admin.administradores.ver')->only('show');
        $this->middleware('can:admin.administradores.formulario.editar')->only('edit');
        $this->middleware('can:admin.administradores.editar')->only('update');
        $this->middleware('can:admin.administradores.eliminar')->only('destroy');
    }

    public function index(Request $request)
    {

        $search = $request->search ?? '';

        $admins = Admin::select()
            ->orWhere('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($admin) => [
                'id' => $admin->id,
                'name' => $admin->name,
                'email' => $admin->email,
                'registrado' => Carbon::createFromTimeStamp(strtotime($admin->created_at))->diffForHumans(),
            ]);

        return Inertia::render(
            'Admin/Administradores/index',
            [
                'admins' => $admins,
                'filters' => $request->all('search'),
            ]
        );
    }

    public function create()
    {
        $roles = Role::all();

        return Inertia::render(
            'Admin/Administradores/Crear',
            [
                'roles' => $roles
            ]
        );
    }

    public function store(Request $request)
    {

        $password =  Str::random(8);

        $admin = Admin::create([
            'name' => $request->nombres,
            'email' =>  $request->correo,
            'password' =>  Hash::make($password),
        ]);

        $admin->assignRole($request->rol);

        $admin->url =  URL::signedRoute('admin.auth.login-token', ['id' => $admin->id]);

        Mail::to($admin->email)->send(new CrearCuentaAdminMail($admin));

        return back()->with([
            'message' => 'usuario creado.',
            'status' => true,
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $roles = Role::all();

        $admin =  Admin::find($id);

        $admin->rol = $admin->getRoleNames()[0];

        return Inertia::render(
            'Admin/Administradores/Editar',
            [
                'roles' => $roles,
                'admin' => $admin
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $admin =  Admin::find($id);

        $admin->syncRoles($request->rol);

        $admin->name = $request->name;
        $admin->email = $request->email;

        $admin->save();

        return back()->with([
            'message' => 'Actualizado con exito.',
            'status' => true,
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
