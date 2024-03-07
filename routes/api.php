<?php

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

// routes/api.php

use App\Http\Controllers\NoteController;

Route::get('/notas', [NoteController::class, 'index']);
Route::get('/notas/{id}', [NoteController::class, 'show']);
Route::post('/notas', [NoteController::class, 'store']);
Route::post('/notas/{id}', [NoteController::class, 'update']);
Route::delete('/notas/{id}', [NoteController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
