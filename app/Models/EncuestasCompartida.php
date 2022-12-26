<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestasCompartida extends Model
{
    use HasFactory;

    protected $fillable = [
        'ec_permiso',
        'ec_adm_id',
        'ec_enc_id',
    ];
    protected $primaryKey  = 'ec_id';
}
