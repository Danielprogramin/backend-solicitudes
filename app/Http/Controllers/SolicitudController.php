<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        $query = Solicitud::with(['candidato', 'tipoEstudio']);
        
        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }
        
        if ($request->has('tipo_estudio_id')) {
            $query->where('tipo_estudio_id', $request->tipo_estudio_id);
        }
        
        return $query->get();
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'candidato_id' => 'required|exists:candidatos,id',
            'tipo_estudio_id' => 'required|exists:tipo_estudios,id',
            'estado' => 'sometimes|in:pendiente,en_proceso,completado',
        ]);
        
        $solicitud = new Solicitud($validatedData);
        $solicitud->fecha_solicitud = now();
        $solicitud->save();
        
        return $solicitud->load(['candidato', 'tipoEstudio']);
    }
    
    public function show(Solicitud $solicitud)
    {
        return $solicitud->load(['candidato', 'tipoEstudio']);
    }
    
    public function update(Request $request, Solicitud $solicitud)
    {
        $validatedData = $request->validate([
            'candidato_id' => 'sometimes|exists:candidatos,id',
            'tipo_estudio_id' => 'sometimes|exists:tipo_estudios,id',
            'estado' => 'sometimes|in:pendiente,en_proceso,completado',
        ]);
        
        $solicitud->update($validatedData);
        
        if ($request->estado === 'completado' && $solicitud->fecha_completado === null) {
            $solicitud->fecha_completado = now();
            $solicitud->save();
        }
        
        return $solicitud->load(['candidato', 'tipoEstudio']);
    }
    
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();
        return response()->json(['message' => 'Solicitud eliminada']);
    }
    
    public function updateEstado(Request $request, Solicitud $solicitud)
    {
        $validatedData = $request->validate([
            'estado' => 'required|in:pendiente,en_proceso,completado',
        ]);
        
        $solicitud->estado = $validatedData['estado'];
        
        if ($validatedData['estado'] === 'completado') {
            $solicitud->fecha_completado = now();
        }
        
        $solicitud->save();
        
        return $solicitud->load(['candidato', 'tipoEstudio']);
    }
}
