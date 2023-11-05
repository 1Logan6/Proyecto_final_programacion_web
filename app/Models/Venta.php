<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id'];
    // public function venta()
    // {
    //     return $this->belongsTo(Venta::class);
    // }
}
