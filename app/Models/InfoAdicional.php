<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoAdicional extends Model
{
    use HasFactory;

    protected $fillable = [
        'ifa_fecha_nac',
        'ifa_sexo',
        'ifa_procedencia',
        'ifa_lengua_mat',
        'ifa_escuela_pro',
        'ifa_semestre',
        'ifa_tipo_viv',
        'ifa_soten',
        'ifa_orientacion_sex',
        'ifa_vive_con',
        'user_id',
    ];
    protected $primaryKey  = 'ifa_id';
}
