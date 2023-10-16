<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'precio', 'descripcion', 'fecha_vencimiento', 'stock'];

    public $timestamps = false;


    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
