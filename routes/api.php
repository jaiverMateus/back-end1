<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\TecnicNoteController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\BenefitsPlanController;
use App\Http\Controllers\CupController;
use App\Http\Controllers\RegimeController;
use App\Http\Controllers\TecnicNoteCupController;
use App\Http\Controllers\RegimeTecnicNoteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/contracts', ContractController::class);
Route::resource('/administrators', AdministratorController::class);
Route::resource('/tecnic_note', TecnicNoteController::class);
Route::resource('/price_list', PriceListController::class);
Route::resource('/payment_method', PaymentMethodController::class);
Route::resource('/benefits_plan', BenefitsPlanController::class);
Route::resource('/cup',CupController::class);
Route::resource('/regime',RegimeController::class);
Route::resource('/tecnic_note_cup',TecnicNoteCupController::class);
Route::resource('/regime_tecnic_note',RegimeTecnicNoteController::class);
Route::get('/contracts/getAdministratorType/{type}',[ContractController::class,'getAdministratorType']);
Route::get('/contracts/getPaymentMethod/{id}',[ContractController::class,'getPaymentMethod']);
Route::get('/contracts/getBenefitsPlan/{id}',[ContractController::class,'getBenefitsPlan']);
Route::get('/contracts/getPriceList/{id}',[ContractController::class,'getPriceList']);
Route::get('/contracts/getContractType/{contract_type}',[ContractController::class,'getContractType']);