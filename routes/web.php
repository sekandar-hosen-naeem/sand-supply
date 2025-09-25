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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/front', function () {
    return view('front');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::resource('river-points', RiverPointController::class);
Route::resource('tenders', TenderController::class);
// routes/web.php
Route::resource('sand-types', SandTypeController::class);
// routes/web.php
Route::resource('tender-owners', TenderOwnerController::class);
// routes/web.php
Route::resource('buyers', BuyerController::class);
// routes/web.php
Route::resource('sale-points', SalePointController::class);
// routes/web.php
Route::resource('transport-rates', TransportRateController::class);
// routes/web.php
// routes/web.php
Route::resource('vehicles', VehicleController::class);
// routes/web.php
// routes/web.php
Route::resource('workers', WorkerController::class);
