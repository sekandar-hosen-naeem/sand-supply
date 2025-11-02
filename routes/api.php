<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrontController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\FeesController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::apiResource('users', UserController::class);
Route::apiResource('member', MemberController::class);
Route::apiResource('fees', FeesController::class);

Route::get('/supply-areas', [FrontController::class, 'supplyAreas']);
Route::get('/river-points', [FrontController::class, 'riverPoints']);
Route::get('/sand-types', [FrontController::class, 'sandTypes']);
Route::post('/save-sand-order', [FrontController::class, 'saveSandOrder']);