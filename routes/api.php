<?php

use App\Http\Controllers\DiseasesController;
use App\Http\Controllers\SymptomsController;
use App\Http\Controllers\DiseasesSymptomsController;
use App\Models\Diseases;
use App\Models\Symptoms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::get('/diseases', [DiseasesController::class, 'index']);
// Route::get('/symptoms', [SymptomsController::class, 'index']);
// Route::post('/predict', [DiseasesSymptomsController::class, 'index']);
// Route::get('/diseases/{id}', [DiseasesController::class, 'filterDiseases']);
// Route::post('/diseases/filter', [DiseasesController::class, 'filterDiseases2']);


// Sanctum Route
Route::middleware('auth:sanctum')->get('/getdiseases', [DiseasesController::class, 'index']);
Route::middleware('auth:sanctum')->get('/getsymptoms', [SymptomsController::class, 'index']);
// Route::middleware('auth:sanctum')->post('/getspecsymptoms', [DiseasesController::class, 'filterDiseases']);
Route::middleware('auth:sanctum')->post('/predict', [DiseasesSymptomsController::class, 'index']);
