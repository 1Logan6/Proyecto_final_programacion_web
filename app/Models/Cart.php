<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'cart_producto', 'cart_id', 'producto_id')->withPivot('cantidad');
    }
}
