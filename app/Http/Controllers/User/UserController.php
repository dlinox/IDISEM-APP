<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Encuesta;
use App\Models\InfoAdicional;
use App\Models\Pregunta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserController extends Controller
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
            ->where('enc_estado', 1)
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
        return Inertia::render('User/index', [
            'encuestas' => $encuestas
        ]);
    }

    public function saveInfoAdd(Request $request)
    {

        //2022-12-13
        $res = InfoAdicional::create([

            'ifa_fecha_nac' => $request->nacimiento,
            'ifa_sexo' => $request->sexo,
            'ifa_procedencia' => $request->procedencia,
            'ifa_lengua_mat' => $request->lengua_mat,
            'ifa_escuela_pro' => $request->escuela_pro,
            'ifa_semestre' => $request->semestre,
            'ifa_tipo_viv' => $request->vivienda == 'otro' ? $request->vivienda_otro : $request->vivienda,
            'ifa_soten' => $request->estudios,
            'ifa_orientacion_sex' => $request->orientacion == 'otro' ? $request->orientacion_otro :  $request->orientacion,
            'ifa_vive_con' => $request->vives,
            'user_id' => Auth::user()->id,
        ]);

        if ($res) {

            $user =  User::find(Auth::user()->id);
            $user->info_state =  1;
            $user->save();

            return Redirect::route('user.index')->with(
                [
                    'message' => 'Datos adiconales Gurdaros',
                    'data' => $res
                ]
            );
        } else {
            return Redirect::route('user.index')->with(
                [
                    'message' => 'Ocurrio un error',
                    'data' => $res
                ]
            );
        }
    }
}
