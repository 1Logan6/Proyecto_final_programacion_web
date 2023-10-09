<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
