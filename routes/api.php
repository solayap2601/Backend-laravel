<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotoController;
use App\Http\Controllers\AuthController;

Route::get('/Nombre', function () {
    return 'Hola soy Sebastián Olaya';
});

Route::post('/signup', [AuthController::class, 'register']);

Route::post('/signin', [AuthController::class, 'login']);

// Rutas públicas (solo lectura)
Route::get('/motos', [MotoController::class, 'index']);  // Listar todas las motos (paginadas)

Route::get('/motos/{moto}', [MotoController::class, 'show']);  // Obtener detalles de una moto

// Rutas protegidas (requieren autenticación)
Route::middleware('auth:sanctum')->group(function () {
    
    // Rutas de creación de motos
    Route::post('/motos/create', [MotoController::class, 'store']);  // Crear una nueva moto

    // Rutas de verificación de motos
    Route::get('/motos/{moto}', [MotoController::class, 'show']);  // Obtener detalles de una moto
    
    // Rutas de actualización de motos
    Route::put('/motos/{moto}/update', [MotoController::class, 'update']);  // Actualizar una moto

    // Rutas de eliminación de motos
    Route::delete('/motos/{moto}/delete', [MotoController::class, 'destroy']);  // Eliminar una moto
});