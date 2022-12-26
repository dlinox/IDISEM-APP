<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Calificacion;
use App\Models\Encuesta;
use App\Models\EncuestasCompartida;
use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\RespuestaOpcion;
use App\Models\Seccion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Str;

class EncuestaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.encuestas.listado')->only('index');
        $this->middleware('can:admin.encuestas.formulario.crear')->only('create');
        $this->middleware('can:admin.encuestas.crear')->only('store');
        $this->middleware('can:admin.encuestas.ver')->only('show');
        $this->middleware('can:admin.encuestas.formulario.editar')->only('edit');
        $this->middleware('can:admin.encuestas.editar')->only('update');
        $this->middleware('can:admin.encuestas.eliminar')->only('destroy');
        //$this->middleware('can:admin.encuestas.shaer')->only('shaer');
    }

    public function index()
    {
        $user = Auth::user();

        $admins = Admin::where('id', '!=', $user->id)
            ->get()->map(function ($admin) {
                return [
                    'id' => $admin->id,
                    'nombre' => $admin->name,
                    'correo' => $admin->email,
                ];
            });


        if (Auth::user()->can('admin.listar.editar.todo')) {
            $encuestas = Encuesta::join('admins', 'enc_adm_id', 'id')
                ->get()
                ->map(function ($encuersta) {
                    return [
                        'id' => $encuersta->enc_id,
                        'titulo' => $encuersta->enc_titulo,
                        'descripcion' => $encuersta->enc_descripcion,
                        'estado' => $encuersta->enc_estado,
                        'creado' => Carbon::createFromTimeStamp(strtotime($encuersta->created_at))->diffForHumans(),
                        'actualizado' => Carbon::createFromTimeStamp(strtotime($encuersta->updated_at))->diffForHumans(),
                        'autor' => $encuersta->name,
                        'autor_id' => $encuersta->id,
                    ];
                });
        } else {
            $encuestas = Encuesta::join('admins', 'enc_adm_id', 'id')
                ->join('encuestas_compartidas', 'ec_enc_id', 'enc_id')
                ->where('enc_adm_id', $user->id)
                ->orWhere('ec_adm_id', $user->id)
                ->get()
                ->map(function ($encuersta) {
                    return [
                        'id' => $encuersta->enc_id,
                        'titulo' => $encuersta->enc_titulo,
                        'descripcion' => $encuersta->enc_descripcion,
                        'estado' => $encuersta->enc_estado,
                        'creado' => Carbon::createFromTimeStamp(strtotime($encuersta->created_at))->diffForHumans(),
                        'actualizado' => Carbon::createFromTimeStamp(strtotime($encuersta->updated_at))->diffForHumans(),
                        'autor' => $encuersta->name,
                        'autor_id' => $encuersta->id,
                    ];
                });
        }
        return Inertia::render('Admin/Encuestas/index', ['encuestas' => $encuestas, 'admins' => $admins]);
    }

    public function share(Request $request)
    {

        foreach ($request->admins as $val) {
            EncuestasCompartida::create([
                'ec_permiso' => true,
                'ec_adm_id' => $val['id'],
                'ec_enc_id' => $request->encuesta
            ]);
        }

        return back()->with([
            'message' => 'Compartido.',
            'status' => true,
            'data' => $request->admins
        ]);
    }

    public function create()
    {
        //crear una encuesta
        return Inertia::render('Admin/Encuestas/Crear');
    }

    private function createEncuesta($data)
    { //REQUEST ENCUESTA --> Pasar al modelo encuesta
        return Encuesta::create([
            'enc_titulo' => $data->titulo,
            'enc_descripcion' =>  $data->descripcion,
            'enc_adm_id' =>  Auth::user()->id,
        ]);
    }

    private function createCalificaciones($data, $encuesta)
    { //REQUEST ENCUESTA --> Pasar al modelo calificaion

        foreach ($data as $val) {
            $fileName = Str::random(8) . '-' . time() . '.' . $val['img']->extension();
            $val['img']->move(public_path('uploads'), $fileName);

            Calificacion::create([
                'cal_detalle' => $val['detalle'],
                'cal_mensaje' => $val['mensaje'],
                'cal_max' => $val['max'],
                'cal_min' => $val['min'],
                'cal_img_url' => $fileName,
                'cal_enc_id' => $encuesta->enc_id,
            ]);
        }
    }
    private function createSeccion($data, $encuesta)
    { //REQUEST ENCUESTA --> Pasar al modelo seccion
        return Seccion::create([
            'sec_titulo' => $data['titulo'],
            'sec_enc_id' => $encuesta->enc_id
        ]);
    }
    private function createPregunta($data, $seccion)
    { //REQUEST ENCUESTA --> Pasar al modelo Pregunta

        $opcion = $data['tipo'] === 'TEXT' ||  $data['tipo'] === 'TEXTAREA'
            ? 'NO'
            : ($data['tipo'] === 'RADIO' ||  $data['tipo'] === 'SELECT'
                ? 'UNICA'
                : 'MULTIPLE');

        return Pregunta::create([
            'pre_titulo' => $data['titulo'],
            'pre_tipo' => $data['tipo'],
            'pre_opcion' => $opcion,
            'pre_sec_id' => $seccion->sec_id
        ]);
    }

    private function createOpcion($data, $pregunta)
    { //REQUEST ENCUESTA --> Pasar al modelo Opcion
        return Opcion::create([
            'opc_detalle' => $data['detalle'],
            'opc_ponderado' =>  $data['ponderado'],
            'opc_pre_id' => $pregunta->pre_id
        ]);
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $encuesta = $this->createEncuesta($request);
                $this->createCalificaciones($request['calificaciones'], $encuesta);
                foreach ($request->secciones as $value) {
                    $seccion = $this->createSeccion($value, $encuesta);
                    foreach ($value['preguntas'] as $item) {
                        $pregunta = $this->createPregunta($item, $seccion);
                        if ($pregunta->pre_opcion != 'NO') {
                            foreach ($item['opciones'] as $element) {
                                $this->createOpcion($element, $pregunta);
                            }
                        }
                    }
                }
            });
            return Redirect::route('admin.encuestas.formulario.crear')->with([
                'message' => 'Encuesta created.',
                'status' => true,
            ]);
        } catch (\Throwable $error) {

            return Redirect::route('admin.encuestas.formulario.crear')->with([
                'message' => 'Encuesta created.',
                'status' => true,
                'data' => $error
            ]);
        }
    }

    public function show($id)
    {
        $encuesta = Encuesta::find($id);
        $preguntas = Pregunta::select('pre_id', 'pre_titulo', 'pre_tipo', 'pre_opcion')
            ->join('seccions', 'sec_id', 'pre_sec_id')
            ->where('sec_enc_id', $id)
            ->get()
            ->map(function ($pregunta) {
                return [

                    'titulo' => $pregunta->pre_titulo,
                    'data' =>
                    Opcion::select(DB::raw('GROUP_CONCAT((select count(*) from respuesta_opcions where ro_opc_id = opc_id)) as data'))
                        ->where('opc_pre_id', $pregunta->pre_id)
                        ->groupBy('opc_pre_id')
                        ->first(),
                    'labels' => Opcion::select(DB::Raw('GROUP_CONCAT(opc_detalle) AS labels'))
                        ->where('opc_pre_id', $pregunta->pre_id)
                        ->groupBy('opc_pre_id')
                        ->first(),
                ];
            });

        return Inertia::render(
            'Admin/Encuestas/Respuestas',
            [
                'encuesta' => $encuesta,
                'preguntas' => $preguntas
            ]
        );
    }

    public function edit($id)
    {
        $encuesta = Encuesta::find($id);

        $seciones = Seccion::where('sec_enc_id', $id)
            ->get()->map(function ($seccion) {
                return [
                    'id' => $seccion->sec_id,
                    'titulo' => $seccion->sec_titulo,
                    'preguntas' => Pregunta::where('pre_sec_id', $seccion->sec_id)
                        ->get()
                        ->map(function ($pregunta) {
                            return [
                                'id' => $pregunta->pre_id,
                                'titulo' => $pregunta->pre_titulo,
                                'tipo' => $pregunta->pre_tipo,
                                'opcion' => $pregunta->pre_opcion,
                                'opciones' => Opcion::where('opc_pre_id', $pregunta->pre_id)
                                    ->get()->map(function ($opcion) {
                                        return [
                                            'id' => $opcion->opc_id,
                                            'detalle' => $opcion->opc_detalle,
                                            'ponderado' => $opcion->opc_ponderado
                                        ];
                                    })
                            ];
                        })
                ];
            });

        $calificaciones = Calificacion::where('cal_enc_id', $id)
            ->get()->map(function ($calificacion) {
                return [
                    'id' => $calificacion->cal_id,
                    'detalle' => $calificacion->cal_detalle,
                    'mensaje' => $calificacion->cal_mensaje,
                    'img' => $calificacion->cal_img,
                    'min' => $calificacion->cal_min,
                    'max' => $calificacion->cal_max
                ];
            });

        return Inertia::render(
            'Admin/Encuestas/Editar',
            [
                'encuesta' => $encuesta,
                'seciones' => $seciones,
                'calificaciones' => $calificaciones

            ]
        );
    }

    public function update(Request $request, $id)
    {
        $encuesta = Encuesta::find($id);
        $encuesta->enc_titulo = $request->titulo;
        $encuesta->enc_descripcion = $request->descripcion;
        $encuesta->save();

        return back()->with([
            'message' => 'Actualizado.',
            'status' => true,
        ]);
    }

    public function destroy($id)
    {
        //
    }
}
