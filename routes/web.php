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
use App\Http\Controllers\MajhiController;
use App\Http\Controllers\BoatController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SandStocksController;
use App\Http\Controllers\SandSalesController;
use App\Http\Controllers\VehicleTripsController;
use App\Http\Controllers\WorkerAttendanceController;
use App\Http\Controllers\BoatTripController;
use App\Http\Controllers\EquipmentUsageController;
use App\Http\Controllers\FuelConsumptionController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\InvoiceController;
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
    Route::resource('majhis', MajhiController::class);
    Route::resource('boats', BoatController::class);
    Route::resource('equipments', EquipmentController::class);
    Route::resource('operators', OperatorController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('revenues', RevenueController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('sand_stocks', SandStocksController::class);
    Route::resource('sand_sales', SandSalesController::class);
    Route::resource('vehicle-trips', VehicleTripsController::class);
    Route::resource('worker-attendances', WorkerAttendanceController::class);
    Route::resource('boat-trips', BoatTripController::class);
    Route::resource('equipment-usages', EquipmentUsageController::class);
    Route::resource('fuel-consumptions', FuelConsumptionController::class);
    Route::resource('maintenances', MaintenanceController::class);
    Route::resource('contracts', ContractController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::get('sand-stocks-history', [SandStocksController::class, 'history'])->name('sand_stocks_history');




});
