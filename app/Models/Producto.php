<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'precio',
        'descripcion',
        'fecha_vencimiento',
        'nombre',
        'stock',
        'imagen_url',
        'generado',
        'archivo_ubicacion',
        'archivo_nombre',
    ];

    //Este se puede usar en lugar del fillable, pero es mas seguro con el fillable para mas seguridad
    /* protected $guarded = ['id']; */


    public $timestamps = false;


    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
