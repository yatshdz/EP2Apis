<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\AuthController;

// Rutas públicas para autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas por autenticación con Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Rutas para gestionar estudiantes (protegidas con autenticación)
    Route::get('estudiantes', [EstudianteController::class, 'index']);
    Route::post('estudiantes', [EstudianteController::class, 'store']);
    Route::put('estudiantes/{id}', [EstudianteController::class, 'update']);
    Route::delete('estudiantes/{id}', [EstudianteController::class, 'destroy']);

    // Cerrar sesión (revocar tokens)
    Route::post('/logout', [AuthController::class, 'logout']);
});
