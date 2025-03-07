<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;

class CandidatoController extends Controller
{
        public function index()
    {
        return Candidato::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento_identidad' => 'required|string|unique:candidatos',
            'correo' => 'required|email|unique:candidatos',
            'telefono' => 'required|string',
        ]);

        return Candidato::create($validatedData);
    }

    public function show(Candidato $candidato)
    {
        return $candidato;
    }

    public function update(Request $request, Candidato $candidato)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'documento_identidad' => 'required|string|unique:candidatos,documento_identidad,'.$candidato->id,
            'correo' => 'required|email|unique:candidatos,correo,'.$candidato->id,
            'telefono' => 'required|string',
        ]);

        $candidato->update($validatedData);
        return $candidato;
    }

    public function destroy(Candidato $candidato)
    {
        $candidato->delete();
        return response()->json(['message' => 'Candidato eliminado']);
    }
}
