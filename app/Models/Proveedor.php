<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre_completo',
        'num_telefono',
        'correo',
        'direccion',
        'nombre_empresa',
    ];
}