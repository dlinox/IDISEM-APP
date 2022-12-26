<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.roles.listado')->only('index');
        $this->middleware('can:admin.roles.formulario.crear')->only('create');
        $this->middleware('can:admin.roles.crear')->only('store');
        $this->middleware('can:admin.roles.ver')->only('show');
        $this->middleware('can:admin.roles.formulario.editar')->only('edit');
        $this->middleware('can:admin.roles.editar')->only('update');
        $this->middleware('can:admin.roles.eliminar')->only('destroy');
    }

    public function index()
    {
        try {
            $roles =  Role::where('guard_name', 'admin')->get()->map(function ($rol) {
                return [
                    'id' => $rol->id,
                    'nombre' => $rol->name,
                    'redirect' => $rol->redirect,
                    'creado' =>  Carbon::createFromTimeStamp(strtotime($rol->created_at))->diffForHumans(),
                    'permisos' => $rol->permissions->map(function ($permiso) {
                        return [
                            'id' => $permiso->id,
                            'nombre' => $permiso->name,
                        ];
                    })
                ];
            });

            $permisos =  Permission::where('guard_name', 'admin')->get()->map(function ($permiso) {
                return [
                    'id' => $permiso->id,
                    'nombre' => $permiso->name,
                ];
            });

            return Inertia::render('Admin/Roles/index', ['roles' => $roles, 'permisos' => $permisos]);
        } catch (\Throwable $th) {
            return back()->with([
                'message' => 'Credenciales incorrectas.',
                'status' => false,
                'data' => $th
            ]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $rol =  Role::find($id);

        $res = [
            'id' => $rol->id,
            'nombre' => $rol->name,
            'redirect' => $rol->redirect,
            'creado' =>  Carbon::createFromTimeStamp(strtotime($rol->created_at))->diffForHumans(),
            'permisos' => $rol->permissions->map(function ($permiso) {
                return [
                    'id' => $permiso->id,
                    'nombre' => $permiso->name,
                ];
            })
        ];


        $permisos =  Permission::where('guard_name', 'admin')->get()->map(function ($permiso) {
            return [
                'id' => $permiso->id,
                'nombre' => $permiso->name,
            ];
        });

        return Inertia::render('Admin/Roles/Editar', ['rol' => $res, 'permisos' => $permisos]);
    }

    public function update(Request $request, $id)
    {


        DB::transaction(function () use ($request, $id) {
            $permisos  = array_column($request->permisos, 'id');
            $role =  Role::find($id);

            $role->syncPermissions($permisos);

            $role->name  =  $request->nombre;
            $role->redirect  =  $request->redirect;

            $role->save();
        });


        return back()->with([
            'message' => 'Credenciales incorrectas.',
            'status' => false,
            'data' => array_column($request->permisos, 'id')
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
