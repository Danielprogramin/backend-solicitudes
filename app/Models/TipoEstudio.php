<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEstudio extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio'];
    
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}