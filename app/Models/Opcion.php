<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    use HasFactory;
    protected $fillable = [
        'opc_detalle',
        'opc_ponderado',
        'opc_pre_id',
    ];
    protected $primaryKey  = 'opc_id';
}
