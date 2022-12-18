<?php

namespace App\Exports;

use App\Models\Calificacion;
use App\Models\RespuestaOpcion;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class EncuestaExport implements FromCollection
{
    use Exportable;

    public function __construct($idEncuesta = "")
    {
        $this->idEncuesta = $idEncuesta;
    }


    public function collection()
    {
        /**
        SELECT 
        from respuesta_opcions
        JOIN opcions ON ro_opc_id = opc_id
        JOIN respuestas ON res_id = ro_res_id
        JOIN preguntas on res_pre_id = pre_id
        GROUP BY  pre_id 
         **/

        $res = RespuestaOpcion::select(
            DB::raw("
            GROUP_CONCAT(respuesta_opcions.updated_at) AS fecha, 
            GROUP_CONCAT(opc_detalle) AS res, 
            pre_titulo,
            pre_id
         ")
        )->join('opcions', 'ro_opc_id', 'opc_id')
            ->join('respuestas', 'res_id', 'ro_res_id')
            ->join('preguntas', 'res_pre_id', 'pre_id')
            ->groupBy('pre_id')
            ->get();

        $data = $res->toArray();

        $collection = [];

        foreach ($data as $key => $value) {
            $collection[$value['pre_titulo']]['fecha'] =  explode(',', $value['fecha']);
            $collection[$value['pre_titulo']]['opc'] =  explode(',', $value['res']);
        }

        return  collect($collection);
    }

   
}
