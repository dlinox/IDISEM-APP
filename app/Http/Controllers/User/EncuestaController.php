<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\Encuesta;
use App\Models\Opcion;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class EncuestaController extends Controller
{

    public function index()
    {

        $encuestas =
            Encuesta::select(
                'enc_id',
                'enc_titulo',
                'enc_descripcion',
                'created_at'
            )
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->enc_id,
                    'titulo' => $item->enc_titulo,
                    'descripcion' => $item->enc_descripcion,
                    'fecha' => $item->created_at->diffForHumans(),
                    'num_preguntas' => Pregunta::join('seccions', 'pre_sec_id', '=', 'sec_id')
                        ->where('sec_enc_id', $item->enc_id)
                        ->count(),
                    //'fehca' => $ str_replace("ll", "", "good golly miss molly!", $count);
                ];
            });


        return Inertia::render('User/Encuestas/index', [
            'encuestas' => $encuestas
        ]);
    }
    public function show($id)
    {
        $encuesta = Encuesta::find($id);

        $respuestas = Respuesta::select('res_id', 'res_respuesta', 'res_ponderado_total',  'respuestas.created_at', 'pre_id', 'sec_id')
            ->join('preguntas', 'res_pre_id', '=', 'pre_id')
            ->join('seccions', 'pre_sec_id', '=', 'sec_id')
            ->join('encuestas', 'sec_enc_id', '=', 'enc_id')
            ->where('res_use_id', Auth::user()->id)
            ->where('enc_id', $id)
            ->get();

        if (count($respuestas) > 0) {

            $ponderado_total = array_reduce(
                $respuestas->toArray(),
                function ($acumulador, $item) {
                    return $acumulador + $item['res_ponderado_total'];
                },
                0
            );;

            $calificaciones = Calificacion::where('cal_enc_id', $id)
                ->where('cal_max', '>=', $ponderado_total)
                ->where('cal_min', '<=', $ponderado_total)
                ->first();

            return Inertia::render('User/Encuestas/ShowEncuesta', [
                'encuesta' => $encuesta,
                'secciones' => null,
                'respuestas' => $respuestas,
                'ponderado' => $ponderado_total,
                'calificaciones' => $calificaciones,
            ]);
        } else {
            $secciones = Seccion::where('sec_enc_id', $id)->get()->map(function ($seccion) {
                return [
                    'sec_id' => $seccion->sec_id,
                    'sec_titulo' => $seccion->sec_titulo,
                    'preguntas' => Pregunta::where('pre_sec_id', $seccion->sec_id)->get()->map(function ($pregunta) {
                        return [
                            'id' => $pregunta->pre_id,
                            'titulo' => $pregunta->pre_titulo,
                            'tipo' => $pregunta->pre_tipo,
                            'opcion' => $pregunta->pre_opcion,
                            'opciones' => Opcion::where('opc_pre_id', $pregunta->pre_id)->get()
                                ->map(function ($opcion) {
                                    return [
                                        'id' => $opcion->opc_id,
                                        'detalle' => $opcion->opc_detalle,
                                        'ponderado' => $opcion->opc_ponderado,
                                    ];
                                }),
                            'estado' => $pregunta->pre_estado,
                            'enc_id' => $pregunta->pre_enc_id,
                        ];
                    })
                ];
            });
            return Inertia::render('User/Encuestas/ShowEncuesta', [
                'encuesta' => $encuesta,
                'secciones' => $secciones
            ]);
        }
    }
}
