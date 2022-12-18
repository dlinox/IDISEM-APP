<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Respuesta;
use App\Models\RespuestaOpcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RespuestaController extends Controller
{
    protected $ponderado;

    public function __construct()
    {
        $this->ponderado = 0;
    }

    private function createRespuesta()
    {
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                foreach ($request->secciones as $value) {
                    foreach ($value['preguntas'] as $item) {

                        if ($item['tipo'] == 'TEXT' || $item['tipo'] == 'TEXTAREA') {
                            Respuesta::create([
                                'res_respuesta' => $item['respuesta'],
                                'res_use_id' => Auth::user()->id,
                                'res_pre_id' =>  $item['id'],
                                'res_opciones' => false,
                                //'res_ponderado_total' => '', default 0
                            ]);
                        } elseif ($item['tipo'] == 'RADIO' || $item['tipo'] == 'SELECT') {
                            $respuesta =  Respuesta::create([
                                'res_respuesta' => $item['respuesta']['id'], //probar
                                'res_use_id' => Auth::user()->id,
                                'res_pre_id' =>  $item['id'],
                                'res_opciones' => true,
                                'res_ponderado_total' => $item['respuesta']['ponderado'],
                            ]);

                            RespuestaOpcion::create([
                                'ro_res_id' =>  $respuesta->res_id,
                                'ro_opc_id' => $item['respuesta']['id'],
                            ]);
                        } else {

                            $ponderado_total = array_reduce(
                                $item['respuesta'],
                                function ($acumulador, $val) {
                                    return $acumulador + $val['ponderado'];
                                },
                                0
                            );
                            $respuesta =  Respuesta::create([
                                //'res_respuesta' => $item['respuesta']['id'], //probar
                                'res_use_id' => Auth::user()->id,
                                'res_pre_id' =>  $item['id'],
                                'res_opciones' => true,
                                'res_ponderado_total' => $ponderado_total,
                            ]);

                            foreach ($item['respuesta'] as $op)
                                RespuestaOpcion::create([
                                    'ro_res_id' =>  $respuesta->res_id,
                                    'ro_opc_id' => $op['id'],
                                ]);
                        }
                    }
                }
            });
        } catch (\Throwable $th) {
            return back()->with('message', 'Ocurrio un error vuelva a intentarlo');
        }
        return back()->with(
            [
                'message' => 'Respuetas evnidas',
                'data' =>  [
                    'respondido' => true
                ]
            ]
        );
    }
}
