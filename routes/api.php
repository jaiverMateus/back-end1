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
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\TypeServiceController;
use App\Http\Controllers\TypeAgendaController;
use App\Http\Controllers\TypeQueryController;
use App\Http\Controllers\TypeInComeController;
use App\Http\Controllers\TypeOutComeController;
use App\Http\Controllers\TypeNoveltyController;
use App\Http\Controllers\TypeRetentionController;

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
Route::resource('/cup', CupController::class);
Route::resource('/regime', RegimeController::class);
Route::resource('/tecnic_note_cup', TecnicNoteCupController::class);
Route::resource('/regime_tecnic_note', RegimeTecnicNoteController::class);
Route::resource('/companies', CompanyController::class, ['except' => ['update']]);
Route::put('/companies/update', [CompanyController::class, 'update']);
Route::resource('/locations',LocationController::class,['except' =>['update']]);
Route::put('/locations/update',[LocationController::class,'update']);
Route::resource('/patients',PatientController::class,['except' =>['update']]);
Route::put('/patients/update',[PatientController::class,'update']);
Route::resource('/specialities',SpecialityController::class,['except'=>['update']]);
Route::put('/specialities/update',[SpecialityController::class,'update']);
Route::resource('/levels',LevelController::class,['except' =>['update']]);
Route::put('/levels/update',[LevelController::class,'update']);
Route::resource('/people',PersonController::class,['except'=>['update']]);
Route::put('/people/update',[PersonController::class,'update']);
Route::resource('/type_documents',TypeDocumentController::class,['except' =>['update']]);
Route::put('/type_documents/update',[TypeDocumentController::class,'update']);
Route::resource('/type_services',TypeServiceController::class,['except'=>['update']]);
Route::put('/type_services/update',[TypeServiceController::class,'update']);
Route::resource('/type_agendas',TypeAgendaController::class);
Route::resource('/type_queries',TypeQueryController::class);
Route::resource('/type_incomes',TypeInComeController::class);
Route::resource('/type_outcomes',TypeOutComeController::class);
Route::resource('/type_novelties',TypeNoveltyController::class);
Route::resource('/type_retentions',TypeRetentionController::class);
Route::get('/contracts/getAdministratorType/{type}', [ContractController::class, 'getAdministratorType']);
Route::get('/contracts/getPaymentMethod/{id}', [ContractController::class, 'getPaymentMethod']);
Route::get('/contracts/getBenefitsPlan/{id}', [ContractController::class, 'getBenefitsPlan']);
Route::get('/contracts/getPriceList/{id}', [ContractController::class, 'getPriceList']);
Route::get('/contracts/getContractType/{contract_type}', [ContractController::class, 'getContractType']);
Route::get('/administrators/getContractId/{id}', [AdministratorController::class, 'getContractId']);
Route::get('/benefits_plan/getBenefitPlanContractId/{id}', [BenefitsPlanController::class, 'getBenefitPlanContractId']);
Route::get('/cup/getCUPPriceListId/{id}', [CupController::class, 'getCUPPriceListId']);
Route::get('/cup/getTecnicNoteCupId/{id}', [CupController::class, 'getTecnicNoteCupId']);
Route::get('/payment_method/getPaymentMethodContractId/{id}', [PaymentMethodController::class, 'getPaymentMethodContractId']);
Route::get('/price_list/getPriceListContractsId/{id}', [PriceListController::class, 'getPriceListContractsId']);
Route::get('/price_list/getCupId/{id}', [PriceListController::class, 'getCupId']);
Route::get('/regime/getRegimeTecnicNoteId/{id}', [RegimeController::class, 'getRegimeTecnicNoteId']);
Route::get('/tecnic_note_cup/getTecnicNoteCupCUPId/{id}', [TecnicNoteCupController::class, 'getTecnicNoteCupCUPId']);
Route::get('/tecnic_note_cup/getTecnicNoteCupTecnicId/{id}', [TecnicNoteCupController::class, 'getTecnicNoteCupTecnicId']);
Route::get('tecnic_note/getTecnicNoteCupId/{id}', [TecnicNoteController::class, 'getTecnicNoteCupId']);
Route::get('/regime_tecnic_note/getRegimeId/{id}', [RegimeTecnicNoteController::class, 'getRegimeId']);
Route::get('/regime_tecnic_note/getTecnicNoteId/{id}', [RegimeTecnicNoteController::class, 'getTecnicNoteId']);
