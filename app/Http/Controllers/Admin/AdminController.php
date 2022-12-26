<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.dashboard')->only('index');
    }

    public function index()
    {

        // SELECT  preguntas.pre_id,  pre_titulo , respuesta_opcions.created_at, opc_detalle
        // FROM encuestas
        // JOIN seccions ON sec_enc_id = enc_id
        // JOIN preguntas ON pre_sec_id = sec_id
        // JOIN opcions ON opc_pre_id = pre_id
        // JOIN respuesta_opcions ON ro_opc_id = opc_id
        // WHERE enc_id = 4
        // #GROUP BY  pre_titulo
        // ORDER BY preguntas.pre_id, pre_titulo , respuesta_opcions.created_at

        $data = DB::select("
        SELECT  preguntas.pre_id,  pre_titulo , respuesta_opcions.created_at, opc_detalle
        FROM encuestas
        JOIN seccions ON sec_enc_id = enc_id
        JOIN preguntas ON pre_sec_id = sec_id
        JOIN opcions ON opc_pre_id = pre_id
        JOIN respuesta_opcions ON ro_opc_id = opc_id
        WHERE enc_id = 4
        #GROUP BY  pre_titulo
        ORDER BY preguntas.pre_id, pre_titulo , respuesta_opcions.created_at
        
        ");

        $header = array_unique(array_column($data, 'pre_titulo'));
        array_unshift($header, 'fecha');

        $fechas = array_unique(array_column($data, 'created_at'));

        $datos = [];

        foreach ($fechas as $i => $fecha) {
            $datos[$i] = [];
            foreach ($data as $item) {
                if ($fecha ==  $item->created_at) {
                    array_push($datos[$i], $item->opc_detalle);
                }
            }
        }

        foreach ($fechas as $i => $fecha) {
            array_unshift($datos[$i], $fecha);
        }

        return Inertia::render('Admin/index', ['header' => $header, 'data' => $datos]);
    }
}
