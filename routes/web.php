<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiverPointController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\SandTypeController;
use App\Http\Controllers\TenderOwnerController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SalePointController;
use App\Http\Controllers\TransportRateController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/front', function () {
    return view('front');
});



Auth::routes();

Route::middleware('auth:web')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('river-points', RiverPointController::class);
    Route::resource('tenders', TenderController::class);
    Route::resource('sand-types', SandTypeController::class);
    Route::resource('tender-owners', TenderOwnerController::class);
    Route::resource('buyers', BuyerController::class);
    Route::resource('sale-points', SalePointController::class);
    Route::resource('transport-rates', TransportRateController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('workers', WorkerController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('roles/{role_id}/permission', [RoleController::class, 'permission'])->name('roles.permission');
    Route::post('roles/{role_id}/permission', [RoleController::class, 'savePermission'])->name('roles.assignPermission');
});
