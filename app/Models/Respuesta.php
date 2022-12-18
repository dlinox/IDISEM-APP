<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'res_respuesta', //JSON
        'res_use_id',
        'res_pre_id',
        'res_opciones',
        'res_ponderado_total',
        
    ];
    protected $primaryKey  = 'res_id';
}
