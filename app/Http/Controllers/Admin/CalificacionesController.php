<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {


        /**
        SELECT  res_use_id , name,  sum(res_ponderado_total) AS res, 
                (SELECT CONCAT(cal_id,'-',cal_detalle) 
                FROM calificacions
                WHERE cal_enc_id = 3 
                AND  cal_max >= sum(res_ponderado_total) 
                AND cal_min <= sum(res_ponderado_total) ) AS nivel
            FROM respuestas
            JOIN preguntas ON res_pre_id = pre_id
            JOIN seccions ON pre_sec_id= sec_id
            JOIN encuestas ON sec_enc_id = enc_id
            JOIN users ON res_use_id = id
            WHERE enc_id = 3
            GROUP BY  res_use_id
         */

        $res = Respuesta::select(
            DB::raw("
                (SELECT cal_id 
                FROM calificacions
                WHERE cal_enc_id = $id 
                AND  cal_max >= sum(res_ponderado_total) 
                AND cal_min <= sum(res_ponderado_total) ) AS nivel
         ")
        )->leftjoin('preguntas', 'res_pre_id', 'pre_id')
            ->leftjoin('seccions', 'pre_sec_id', 'sec_id')
            ->leftjoin('encuestas', 'sec_enc_id', 'enc_id')
            ->leftjoin('users', 'res_use_id', 'id')
            ->where('enc_id', $id)
            ->groupby('res_use_id')
            ->get();



        $calificaciones = Calificacion::select('cal_id', 'cal_detalle')->where('cal_enc_id', $id)->get();
        $repetidos = (array) (array_count_values(array_column($res->toArray(), 'nivel')));

        foreach ($calificaciones as $value) {
            $value->cant = 0;
            foreach ($repetidos as $j => $item) {

                if ($value->cal_id === $j) {
                    $value->cant = $item;
                }
            }
        }

        //$respuestas = 
        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        $this->response['mensaje'] =  'todo bien';
        $this->response['calificaciones'] =  $calificaciones;
        return response()->json($this->response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
