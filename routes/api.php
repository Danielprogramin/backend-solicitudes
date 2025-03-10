<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\TipoEstudioController;
use App\Http\Controllers\SolicitudController;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    Route::apiResource('candidatos', CandidatoController::class);
    Route::get('tipo-estudios', [TipoEstudioController::class, 'index']);
    Route::get('tipo-estudios/{tipoEstudio}', [TipoEstudioController::class, 'show']);
    Route::apiResource('solicitudes', SolicitudController::class);
    Route::put('solicitudes/{solicitud}/estado', [SolicitudController::class, 'updateEstado']);
});

Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

Route::get('/dashboard', function () {
    return response()->json([
        'message' => 'Welcome to the API',
    ]);
});
