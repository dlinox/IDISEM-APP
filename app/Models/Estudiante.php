<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $primaryKey  = 'est_id';

    protected $fillable = [
        'est_nombres',
        'est_paterno',
        'est_materno',
        'est_correo',
        'est_dni',
        'est_celular',
        'est_codigo_mat',
        'est_estado',
    ];
}
