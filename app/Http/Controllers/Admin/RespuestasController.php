<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calificacion;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RespuestasController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.respuestas.listado')->only('index');
        $this->middleware('can:admin.respuestas.formulario.crear')->only('create');
        $this->middleware('can:admin.respuestas.crear')->only('store');
        $this->middleware('can:admin.respuestas.ver')->only('show');
        $this->middleware('can:admin.respuestas.formulario.editar')->only('edit');
        $this->middleware('can:admin.respuestas.editar')->only('update');
        $this->middleware('can:admin.respuestas.eliminar')->only('destroy');
    }

    public function index()
    {
        //
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
            'res_use_id',
            'name',
            DB::raw("
            sum(res_ponderado_total) AS res")
        )->join('preguntas', 'res_pre_id', 'pre_id')
            ->join('seccions', 'pre_sec_id', 'sec_id')
            ->join('encuestas', 'sec_enc_id', 'enc_id')
            ->join('users', 'res_use_id', 'id')
            ->where('enc_id', $id)
            ->groupby('res_use_id', 'name')
            ->get();

        $calificaciones = Calificacion::select('cal_id', 'cal_detalle', 'cal_max', 'cal_min')->where('cal_enc_id', $id)->get();

        $repetidos = (array) (array_count_values(array_column($res->toArray(), 'nivel')));

        foreach ($res as $item) {
            foreach ($calificaciones as $value) {
                if (($value->cal_min <= $item->res) && ($item->res <= $value->cal_max)) {
                    $item->nivel = $value->cal_detalle . '(' . $value->cal_min . ' - ' . $value->cal_max . ')';
                }
            }
        }

        $this->response['estado'] = true;
        $this->response['datos'] = $res;
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
