<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'cart_producto', 'cart_id', 'producto_id')->withPivot('cantidad');
    }
}
