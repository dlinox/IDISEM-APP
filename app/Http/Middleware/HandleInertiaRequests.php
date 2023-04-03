<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{

    protected $rootView = 'app';

    protected $permisos = [];

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [


            'auth' => function () use ($request) {
                return [
                    'user' => $request->user() ? [
                        'id' => $request->user()->id,
                        'email' => $request->user()->email,
                        'name' => $request->user()->name,
                        'rol_name' =>   Auth::guard('admin')->check() ?  $request->user()->getRoleNames()[0] :  '-',
                        'pass_state' => $request->user()->password_state,
                        'info_state' => $request->user()->info_state,
                        'tyc_state' => $request->user()->tyc_state,
                        'menu' => Auth::guard('admin')->check() ?  $this->getUserMenu($request->user()) : ''
                    ] : null,
                ];
            },

            'flash' => [
                'status' => fn () => $request->session()->get('status'),
                'message' => fn () => $request->session()->get('message'),
                'data' => fn () => $request->session()->get('data')
            ],
        ]);
    }

    private function getUserMenu($user)
    {
        $user->getAllPermissions()->map(function ($permiso) {
            array_push($this->permisos, $permiso->name);
        });

        $menu = [];

        foreach ($this->menus as $item) {
            $can  =  explode(",", $item['can']);
            if (array_intersect($can,  $this->permisos)) {

                if (array_key_exists('children', $item)) {

                    $aux = $item['children'];
                    $item['children'] = [];
                    foreach ($aux as $child) {
                        $can_child  =  explode(",", $child['can']);
                        if (array_intersect($can_child,  $this->permisos)) {
                            array_push($item['children'],  $child);
                        }
                    }
                }
                array_push($menu,  $item);
            }
        }

        return $menu;
    }

    private $menus =  [
        [
            'label' => "Dashboard",
            'icon' =>  "bi bi-layout-wtf",
            'route' => "/admin",
            'can' => 'admin.dashboard',
            'childrens' => false
        ],
        [
            'label' => "Encuestas",
            'icon' => "bi bi-clipboard",
            'can' => 'admin.encuestas.listado',
            'childrens' => [
                [
                    'label' => "Lista",
                    'route' => "/admin/encuestas",
                    'can' => 'admin.encuestas.listado',
                ],
                [
                    'label' => "Nuevo",
                    'route' => "/admin/encuestas/create",
                    'can' => 'admin.encuestas.formulario.crear',
                ],
            ],
        ],
        [
            'label' => "Administración",
            'icon' => "bi bi-gear",
            'can' => 'admin.usuarios.listado,admin.roles.listado',
            'childrens' => [
                [
                    'label' => "Administradores",
                    'route' => "/admin/administradores",
                    'can' => 'admin.administradores.listado',
                ],
                [
                    'label' => "Usuarios",
                    'route' => "/admin/usuarios",
                    'can' => 'admin.usuarios.listado',
                ],
                [
                    'label' => "Roles",
                    'route' => "/admin/roles",
                    'can' => 'admin.roles.listado',
                ],
                [
                    'label' => "Estudiantes",
                    'route' => "/admin/estudiantes",
                    'can' => 'admin.estudiantes.listado',
                ],
            ],
        ],
    ];
}
