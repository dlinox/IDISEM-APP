<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;

class EncuestaExport implements FromView
{

    public function __construct($encuesta)
    {
        $this->encuesta = $encuesta;
    }

    public function view(): View
    {

        $data = DB::select("
        SELECT  preguntas.pre_id,  pre_titulo , respuesta_opcions.created_at, opc_detalle
        FROM encuestas
        JOIN seccions ON sec_enc_id = enc_id
        JOIN preguntas ON pre_sec_id = sec_id
        JOIN opcions ON opc_pre_id = pre_id
        JOIN respuesta_opcions ON ro_opc_id = opc_id
        WHERE enc_id = {$this->encuesta}
        ORDER BY preguntas.pre_id, pre_titulo , respuesta_opcions.created_at");

        $header = array_unique(array_column($data, 'pre_titulo'));
        array_unshift($header, 'Marca temporal');

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

        return view('exports.encuesta', ['header' => $header, 'data' => $datos]);
    }
}
