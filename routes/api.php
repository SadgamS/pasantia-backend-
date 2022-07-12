<?php

use App\Http\Controllers\EvaluacionPController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasanteTrabajoDController;
use App\Http\Controllers\PasantiaTrabajoDirigidoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PostulantesController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TutorAcademicoController;
use App\Http\Controllers\TutorInstitucionalController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/rols', [RolController::class, 'index']);
Route::get('/universidades', [UniversidadController::class, 'index']);
Route::get('/tutores_academicos', [TutorAcademicoController::class, 'index']);
Route::get('/unidades', [UnidadController::class, 'index']);
Route::get('/tutores_institucionales', [TutorInstitucionalController::class, 'index']);
Route::get('/pasantias_trabajodirigido', [PasantiaTrabajoDirigidoController::class, 'index']);
Route::get('/postulantes', [PostulantesController::class, 'index']);
Route::get('/pasantes', [PasanteTrabajoDController::class, 'index']);
Route::get('/evaluacion_pasantes', [EvaluacionPController::class, 'index']);
Route::get('/personas', [PersonaController::class, 'index']);
Route::get('/personas/users', [PersonaController::class, 'selected']);
Route::get('/convocatorias/{tipo}', [PasantiaTrabajoDirigidoController::class, 'convocatorias']);
Route::post('/postulantes/crear', [PostulantesController::class, 'store']);