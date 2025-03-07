<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Candidato extends Model
{
    protected $fillable = ['nombre', 'apellido', 'documento_identidad', 'correo', 'telefono'];
    
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
}
