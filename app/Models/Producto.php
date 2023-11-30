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
        'archivo_ubicacion',
        'archivo_nombre',
    ];

    //Este se puede usar en lugar del fillable, pero es mas seguro con el fillable para mas seguridad
    /* protected $guarded = ['id']; */


    protected $table = 'productos';
    public $timestamps = false;

    //***********************************************************************  
    //************************ ACCESSOR Y MUTATORS **************************
    //***********************************************************************

    // Mutator para formatear el precio antes de guardarlo
    public function setPrecioAttribute($value)
    {
        // Puedes realizar alguna manipulación en el valor antes de guardarlo
        $this->attributes['precio'] = number_format($value, 2);
    }

    // Accessor para formatear la descripción
    public function getDescripcionAttribute($value)
    {
        return ucfirst($value); // Capitaliza la primera letra de la descripción
    }

    // Accessor para formatear la fecha de vencimiento
    public function getFechaVencimientoAttribute($value)
    {
        // Puedes modificar el formato de la fecha al acceder al atributo
        return date('Y-m-d', strtotime($value));
    }
    
    // Mutator para asegurarse de que el nombre siempre esté en mayúsculas antes de guardarlo
    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = strtoupper($value);
    }

    // Mutator para asegurarse de que el stock sea un número entero antes de guardarlo
    public function setStockAttribute($value)
    {
        $this->attributes['stock'] = intval($value);
    }

    // Accessor para construir la URL completa de la imagen (ejemplo)
    public function getArchivo_ubicacionAttribute($value)
    {
        return asset('public/' . $value); // Supongamos que las imágenes se almacenan en la carpeta 'uploads'
    }

    //***********************************************************************  
    //***************************** RELACIONES ******************************
    //***********************************************************************

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
        return $this->belongsToMany(Carrito::class, 'cart_producto', 'producto_id', 'cart_id')->withPivot('cantidad');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_producto')->withPivot('cantidad');
    }
}
