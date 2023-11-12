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
    ];

    //Este se puede usar en lugar del fillable, pero es mas seguro con el fillable para mas seguridad
    /* protected $guarded = ['id']; */


    protected $table = 'productos';
    public $timestamps = false;


    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class);
    }

    public function carritos()
    {
        return $this->belongsToMany(Carrito::class);
    }
}
