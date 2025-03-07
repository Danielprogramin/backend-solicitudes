<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoEstudio;

class TipoEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TipoEstudio::create([
            'nombre' => 'Básico',
            'descripcion' => 'Verificación básica de antecedentes',
            'precio' => 100.00,
        ]);
    
        TipoEstudio::create([
            'nombre' => 'Estándar',
            'descripcion' => 'Verificación completa incluyendo historial laboral',
            'precio' => 250.00,
        ]);
    
        TipoEstudio::create([
            'nombre' => 'Premium',
            'descripcion' => 'Verificación exhaustiva con visita domiciliaria',
            'precio' => 500.00,
        ]);
    }
}
