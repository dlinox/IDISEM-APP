<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'sec_titulo', //JSON
        'sec_descripcion',
        'sec_enc_id',
    ];
    protected $primaryKey  = 'sec_id';

}
