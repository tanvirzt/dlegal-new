<?php

use App\Http\Controllers\Admin\AdminSetupController;
use App\Http\Controllers\Api\ApiAdminclientcontroller;
use App\Http\Controllers\Api\ApiAdminclientnamecontroller;
use App\Http\Controllers\Api\ApiAdminilitigationcalendercontroller;
use App\Http\Controllers\Api\ApiAdmininternalcouncilcontroller;
use App\Http\Controllers\Api\Apiadminlitigationcallendercontroller;
use App\Http\Controllers\Api\ApiAdminmattercontroller;
use App\Http\Controllers\Api\ApiAdminSetupController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\PermissionTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login',[ApiAuthController::class,'login']);

Route::get('/test',[PermissionTestController::class,'index']);

route::get("client_name",[ApiAdminclientnamecontroller::class,"index"]);
route::post("add_client_name",[ApiAdminclientnamecontroller::class,"add"]);
route::put("update_client_name/{id}",[ApiAdminclientnamecontroller::class,"update"]);
route::delete("delete_client_name/{id}",[ApiAdminclientnamecontroller::class,"delete"]);

route::get("client",[ApiAdminclientcontroller::class,"index"]);
route::post("add_client",[ApiAdminclientcontroller::class,"add"]);
route::put("update_client/{id}",[ApiAdminclientcontroller::class,"update"]);
route::delete("delete_client/{id}",[ApiAdminclientcontroller::class,"delete"]);

route::get("matter",[ApiAdminmattercontroller::class,"index"]);
route::post("add_matter",[ApiAdminmattercontroller::class,"add"]);
route::put("update_matter/{id}",[ApiAdminmattercontroller::class,"update"]);
route::delete("delete_matter/{id}",[ApiAdminmattercontroller::class,"delete"]);

route::get("internalcouncil",[ApiAdmininternalcouncilcontroller::class,"index"]);
route::post("add_internalcouncil",[ApiAdmininternalcouncilcontroller::class,"add"]);
route::put("update_internalcouncil/{id}",[ApiAdmininternalcouncilcontroller::class,"update"]);
route::delete("delete_internalcouncil/{id}",[ApiAdmininternalcouncilcontroller::class,"delete"]);

route::get("search",[Apiadminlitigationcallendercontroller::class,"search"]);

route::get("designation",[ApiAdminSetupController::class,"designation"]);
route::post("add_designation",[ApiAdminSetupController::class,"add_degignation"]);
route::put("update_designation/{id}",[ApiAdminSetupController::class,"update"]);
route::delete("delete_designation/{id}",[ApiAdminSetupController::class,"delete_designation"]);

route::get("case_status",[ApiAdminSetupController::class,"case_status"]);
route::post("add_case_status",[ApiAdminSetupController::class,"add_case_status"]);
route::put("update_case_status/{id}",[ApiAdminSetupController::class,"update_case_status"]);
route::delete("delete_case_status/{id}",[ApiAdminSetupController::class,"delete_case_status"]);

route::get("case_types",[ApiAdminSetupController::class,"case_types"]);
route::post("add_case_types",[ApiAdminSetupController::class,"add_case_types"]);
route::put("update_case_types/{id}",[ApiAdminSetupController::class,"update_case_types"]);
route::delete("delete_case_types/{id}",[ApiAdminSetupController::class,"delete_case_types"]);

route::get("property_type",[ApiAdminSetupController::class,"property_type"]);
route::post("add_property_type",[ApiAdminSetupController::class,"add_property_type"]);
route::put("update_property_types/{id}",[ApiAdminSetupController::class,"update_property_types"]);
route::delete("delete_property_types/{id}",[ApiAdminSetupController::class,"delete_property_types"]);

route::get("compliance_category",[ApiAdminSetupController::class,"compliance_category"]);
route::post("add_compliance_category",[ApiAdminSetupController::class,"add_compliance_category"]);
route::put("update_compliance_category/{id}",[ApiAdminSetupController::class,"update_compliance_category"]);
route::delete("delete_compliance_category/{id}",[ApiAdminSetupController::class,"delete_compliance_category"]);

route::get("external_council",[ApiAdminSetupController::class,"external_council"]);
route::post("add_external_council",[ApiAdminSetupController::class,"add_external_council"]);
route::put("update_external_council/{id}",[ApiAdminSetupController::class,"update_external_council"]);
route::delete("delete_external_council/{id}",[ApiAdminSetupController::class,"delete_external_council"]);

route::get("person_title",[ApiAdminSetupController::class,"person_title"]);
route::post("add_person_title",[ApiAdminSetupController::class,"add_person_title"]);
route::put("update_person_title/{id}",[ApiAdminSetupController::class,"update_person_title"]);
route::delete("delete_person_title/{id}",[ApiAdminSetupController::class,"delete_person_title"]);

route::get("court",[ApiAdminSetupController::class,"court"]);
route::post("add_court",[ApiAdminSetupController::class,"add_court"]);
route::put("update_court/{id}",[ApiAdminSetupController::class,"update_court"]);
route::delete("delete_court/{id}",[ApiAdminSetupController::class,"delete_court"]);

route::get("compliance_type",[ApiAdminSetupController::class,"compliance_type"]);
route::post("add_compliance_type",[ApiAdminSetupController::class,"add_compliance_type"]);
route::put("update_compliance_type/{id}",[ApiAdminSetupController::class,"update_compliance_type"]);
route::delete("delete_compliance_type/{id}",[ApiAdminSetupController::class,"delete_compliance_type"]);

route::get("division",[ApiAdminSetupController::class,"division"]);
route::post("add_division",[ApiAdminSetupController::class,"add_division"]);
route::put("update_division/{id}",[ApiAdminSetupController::class,"update_division"]);
route::delete("delete_division/{id}",[ApiAdminSetupController::class,"delete_division"]);

route::get("district",[ApiAdminSetupController::class,"district"]);
route::post("add_district",[ApiAdminSetupController::class,"add_district"]);
route::put("update_district/{id}",[ApiAdminSetupController::class,"update_district"]);
route::delete("delete_district/{id}",[ApiAdminSetupController::class,"delete_district"]);

route::get("law",[ApiAdminSetupController::class,"law"]);
route::post("add_law",[ApiAdminSetupController::class,"add_law"]);
route::put("update_law/{id}",[ApiAdminSetupController::class,"update_law"]);
route::delete("delete_law/{id}",[ApiAdminSetupController::class,"delete_law"]);

route::get("next_date_reason",[ApiAdminSetupController::class,"next_date_reason"]);
route::post("add_next_date_reason",[ApiAdminSetupController::class,"add_next_date_reason"]);
route::put("update_next_date_reason/{id}",[ApiAdminSetupController::class,"update_next_date_reason"]);
route::delete("delete_next_date_reason/{id}",[ApiAdminSetupController::class,"delete_next_date_reason"]);

route::get("court_last_order",[ApiAdminSetupController::class,"court_last_order"]);
route::post("add_court_last_order",[ApiAdminSetupController::class,"add_court_last_order"]);
route::put("update_court_last_order/{id}",[ApiAdminSetupController::class,"update_court_last_order"]);
route::delete("delete_court_last_order/{id}",[ApiAdminSetupController::class,"delete_court_last_order"]);

route::get("region",[ApiAdminSetupController::class,"region"]);
route::post("add_region",[ApiAdminSetupController::class,"add_region"]);
route::put("update_region/{id}",[ApiAdminSetupController::class,"update_region"]);
route::delete("delete_region/{id}",[ApiAdminSetupController::class,"delete_region"]);

route::get("area",[ApiAdminSetupController::class,"area"]);
route::post("add_area",[ApiAdminSetupController::class,"add_area"]);
route::put("update_area/{id}",[ApiAdminSetupController::class,"update_area"]);
route::delete("delete_area/{id}",[ApiAdminSetupController::class,"delete_area"]);

route::get("branch",[ApiAdminSetupController::class,"branch"]);
route::post("add_branch",[ApiAdminSetupController::class,"add_branch"]);
route::put("update_branch/{id}",[ApiAdminSetupController::class,"update_branch"]);
route::delete("delete_branch/{id}",[ApiAdminSetupController::class,"delete_branch"]);

route::get("program",[ApiAdminSetupController::class,"program"]);
route::post("add_program",[ApiAdminSetupController::class,"add_program"]);
route::put("update_program/{id}",[ApiAdminSetupController::class,"update_program"]);
route::delete("delete_program/{id}",[ApiAdminSetupController::class,"delete_program"]);

route::get("allegation",[ApiAdminSetupController::class,"allegation"]);
route::post("add_allegation",[ApiAdminSetupController::class,"add_allegation"]);
route::put("update_allegation/{id}",[ApiAdminSetupController::class,"update_allegation"]);
route::delete("delete_allegation/{id}",[ApiAdminSetupController::class,"delete_allegation"]);

route::get("company_type",[ApiAdminSetupController::class,"company_type"]);
route::post("add_company_type",[ApiAdminSetupController::class,"add_company_type"]);
route::put("update_company_type/{id}",[ApiAdminSetupController::class,"update_company_type"]);
route::delete("delete_company_type/{id}",[ApiAdminSetupController::class,"delete_company_type"]);

route::get("company",[ApiAdminSetupController::class,"company"]);
route::post("add_company",[ApiAdminSetupController::class,"add_company"]);
route::put("update_company/{id}",[ApiAdminSetupController::class,"update_company"]);
route::delete("delete_company/{id}",[ApiAdminSetupController::class,"delete_company"]);

route::get("internal_council",[ApiAdminSetupController::class,"internal_council"]);
route::post("add_internal_council",[ApiAdminSetupController::class,"add_internal_council"]);
route::put("update_internal_council/{id}",[ApiAdminSetupController::class,"update_internal_council"]);
route::delete("delete_internal_council/{id}",[ApiAdminSetupController::class,"delete_internal_council"]);

route::get("external_council_associates",[ApiAdminSetupController::class,"external_council_associates"]);
route::post("add_external_council_associates",[ApiAdminSetupController::class,"add_external_council_associates"]);
route::put("update_external_council_associates/{id}",[ApiAdminSetupController::class,"update_external_council_associates"]);
route::delete("delete_external_council_associates/{id}",[ApiAdminSetupController::class,"delete_external_council_associates"]);

route::get("bill_type",[ApiAdminSetupController::class,"bill_type"]);
route::post("add_bill_type",[ApiAdminSetupController::class,"add_bill_type"]);
route::put("update_bill_type/{id}",[ApiAdminSetupController::class,"update_bill_type"]);
route::delete("delete_bill_type/{id}",[ApiAdminSetupController::class,"delete_bill_type"]);

route::get("bank",[ApiAdminSetupController::class,"bank"]);
route::post("add_bank",[ApiAdminSetupController::class,"add_bank"]);
route::put("update_bank/{id}",[ApiAdminSetupController::class,"update_bank"]);
route::delete("delete_bank/{id}",[ApiAdminSetupController::class,"delete_bank"]);

route::get("bank_branch",[ApiAdminSetupController::class,"bank_branch"]);
route::post("add_bank_branch",[ApiAdminSetupController::class,"add_bank_branch"]);
route::put("update_bank_branch/{id}",[ApiAdminSetupController::class,"update_bank_branch"]);
route::delete("delete_bank_branch/{id}",[ApiAdminSetupController::class,"delete_bank_branch"]);

route::get("digital_payment_type",[ApiAdminSetupController::class,"digital_payment_type"]);
route::post("add_digital_payment_type",[ApiAdminSetupController::class,"add_digital_payment_type"]);
route::put("update_digital_payment_type/{id}",[ApiAdminSetupController::class,"update_digital_payment_type"]);
route::delete("delete_digital_payment_type/{id}",[ApiAdminSetupController::class,"delete_digital_payment_type"]);

route::get("thana",[ApiAdminSetupController::class,"thana"]);
route::post("add_thana",[ApiAdminSetupController::class,"add_thana"]);
route::put("update_thana/{id}",[ApiAdminSetupController::class,"update_thana"]);
route::delete("delete_thana/{id}",[ApiAdminSetupController::class,"delete_thana"]);

route::get("floor",[ApiAdminSetupController::class,"floor"]);
route::post("add_floor",[ApiAdminSetupController::class,"add_floor"]);
route::put("update_floor/{id}",[ApiAdminSetupController::class,"update_floor"]);