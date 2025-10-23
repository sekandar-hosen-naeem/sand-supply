<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrontController;

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

Route::get('/supply-areas', [FrontController::class, 'supplyAreas']);
Route::get('/river-points', [FrontController::class, 'riverPoints']);
Route::get('/sand-types', [FrontController::class, 'sandTypes']);
Route::post('/save-sand-order', [FrontController::class, 'saveSandOrder']);