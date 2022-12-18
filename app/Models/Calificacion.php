<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'cal_detalle',
        'cal_mensaje',
        'cal_max',
        'cal_min',
        'cal_img_url',
        'cal_enc_id',
    ];
    protected $primaryKey  = 'cal_id';
}
