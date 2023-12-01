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
        'prov_archivo_ubicacion',
        'prov_archivo_nombre',
    ];

    //***********************************************************************  
    //************************ ACCESSOR Y MUTATORS **************************
    //***********************************************************************

    public function getNombreCompletoAttribute($value)
    {
        return ucfirst($value); // Devuelve el nombre completo con la primera letra en mayúscula
    }
    
    // public function getNumTelefonoAttribute($value)
    // {
    //     return '+1' . $value; // Devuelve el número de teléfono con el prefijo internacional
    // }

    public function setCorreoAttribute($value)
    {
        $this->attributes['correo'] = strtolower($value); // Guarda el correo en minúsculas
    }

    public function setNombreEmpresaAttribute($value)
    {
        $this->attributes['nombre_empresa'] = strtoupper($value); // Guarda el nombre de la empresa en mayúsculas
    }

    //***********************************************************************  
    //***************************** RELACIONES ******************************
    //***********************************************************************

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}