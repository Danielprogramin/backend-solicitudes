<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEstudio;

class TipoEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TipoEstudio::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoEstudio $tipoEstudio)
    {
        return $tipoEstudio;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
