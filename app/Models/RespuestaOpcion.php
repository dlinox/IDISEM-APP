<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaOpcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'ro_res_id', 
        'ro_opc_id',
    ];
    protected $primaryKey  = 'ro_id';
}
