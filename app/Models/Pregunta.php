<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'pre_titulo', //varchar 200
        'pre_tipo', //enum : TEXT-TEXTAREA-RADIO-CHECKBOX-SELECT
        'pre_opcion', //enum : NO-UNICA-MULTIPLE
        'pre_sec_id', //seccion id ID
        'pre_estado', //boolean
    ];
    protected $primaryKey  = 'pre_id';
}
