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


    public $timestamps = false;


    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
