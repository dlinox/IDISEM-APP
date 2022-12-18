<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EncuestaExport;
use App\Http\Controllers\Controller;
use App\Models\RespuestaOpcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{

    public function downloadExcelEncuesta($id)
    {
        /**
        SELECT  
        GROUP_CONCAT(respuesta_opcions.updated_at) AS fecha, 
        GROUP_CONCAT(opc_detalle) AS res, 
        pre_titulo,
        pre_id
        from respuesta_opcions
        JOIN opcions ON ro_opc_id = opc_id
        JOIN respuestas ON res_id = ro_res_id
        JOIN preguntas on res_pre_id = pre_id
        GROUP BY  pre_id
         */





        return (new EncuestaExport($id))->download('invoices.xlsx');

    }
}
