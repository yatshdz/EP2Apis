<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Ruta para listar estudiantes (GET)
Route::get('estudiantes', [EstudianteController::class, 'index']);

//Ruta para crear un estudiante (POST)
Route::post('estudiantes', [EstudianteController::class, 'store']);

//Ruta para modificar un estudiante (PUT)
Route::put('estudiantes/{id}', [EstudianteController::class, 'update']);

//Ruta para eliminar un estudiante (DELETE)
Route::delete('estudiantes/{id}', [EstudianteController::class, 'destroy']);
