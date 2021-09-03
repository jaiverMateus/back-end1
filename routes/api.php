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
use App\Http\Controllers\TypeExpenseController;
use App\Http\Controllers\TypeRiskController;
use App\Http\Controllers\TypeSalaryController;
use App\Http\Controllers\TypeContractController;
use App\Http\Controllers\TypePqrsController;
use App\Http\Controllers\NonPaymentCausalController;
use App\Http\Controllers\AppointmentCancellationCausalController;
use App\Http\Controllers\CancellationCausalController;
use App\Http\Controllers\TypeFixedAssetController;
use App\Http\Controllers\TypeReturnController;
use App\Http\Controllers\TypeGlossyController;
use App\Http\Controllers\RegimenAndLevelController;
use App\Http\Controllers\DependenceController;
use App\Http\Controllers\ResolutionController;
use App\Http\Controllers\ChargeController;



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
Route::resource('/type_agendas',TypeAgendaController::class,['except'=>['update']]);
Route::put('/type_agendas/update',[TypeAgendaController::class,'update']);
Route::resource('/type_queries',TypeQueryController::class,['except'=>['update']]);
Route::put('/type_queries/update',[TypeQueryController::class,'update']);
Route::resource('/type_incomes',TypeInComeController::class,['except'=>['update']]);
Route::put('/type_incomes/update',[TypeInComeController::class,'update']);
Route::resource('/type_outcomes',TypeOutComeController::class,['except'=>['update']]);
Route::put('/type_outcomes/update',[TypeOutComeController::class,'update']);
Route::resource('/type_novelties',TypeNoveltyController::class,['except'=>['update']]);
Route::put('/type_novelties/update',[TypeNoveltyController::class,'update']);
Route::resource('/type_retentions',TypeRetentionController::class,['except'=>['update']]);
Route::put('/type_retentions/update',[TypeRetentionController::class,'update']);
Route::resource('/type_expenses',TypeExpenseController::class,['except'=>['update']]);
Route::put('/type_expenses/update',[TypeExpenseController::class,'update']);
Route::resource('/type_risks',TypeRiskController::class,['except'=>['update']]);
Route::put('/type_risks/update',[TypeRiskController::class,'update']);
Route::resource('/type_salaries',TypeSalaryController::class,['except'=>['update']]);
Route::put('/type_salaries/update',[TypeSalaryController::class,'update']);
Route::resource('/type_contracts',TypeContractController::class,['except'=>['update']]);
Route::put('/type_contracts/update',[TypeContractController::class,'update']);
Route::resource('/type_pqrs',TypePqrsController::class,['except'=>['update']]);
Route::put('/type_pqrs/update',[TypePqrsController::class,'update']);
Route::resource('/non_payment_causals',NonPaymentCausalController::class,['except'=>['update']]);
Route::put('/non_payment_causals/update',[NonPaymentCausalController::class,'update']);
Route::resource('appointment_cancellation_causal',AppointmentCancellationCausalController::class,['except'=>['update']]);
Route::put('appointment_cancellation_causal/update',[AppointmentCancellationCausalController::class,'update']);
Route::resource('/cancellation_causal',CancellationCausalController::class,['except'=>['update']]);
Route::put('/cancellation_causal/update',[CancellationCausalController::class,'update']);
Route::resource('/type_fixed_assets',TypeFixedAssetController::class,['except'=>['update']]);
Route::put('/type_fixed_assets/update',[TypeFixedAssetController::class,'update']);
Route::resource('/type_returns',TypeReturnController::class,['except'=>['update']]);
Route::put('/type_returns/update',[TypeReturnController::class,'update']);
Route::resource('/type_glossies',TypeGlossyController::class,['except'=>['update']]);
Route::put('/type_glossies/update',[TypeGlossyController::class,'update']);
Route::resource('/regimen_and_levels',RegimenAndLevelController::class,['except'=>['update']]);
Route::put('/regimen_and_levels/update',[RegimenAndLevelController::class,'update']);

Route::resource('/dependences',DependenceController::class,['except'=>['update']]);
Route::put('/dependences/update',[DependenceController::class,'update']);
Route::resource('/resolutions',ResolutionController::class,['except'=>['update']]);
Route::put('/resolutions/update',[ResolutionController::class,'update']);

Route::resource('/charges',ChargeController::class,['except'=>['update']]);
Route::put('/charges/update',[ChargeController::class,'update']);

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
