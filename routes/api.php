<?php

use App\Http\Controllers\Admin\AdminSetupController;





use App\Http\Controllers\Api\ApiAdminSetupController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiBillingsController;
use App\Http\Controllers\Api\ApiCivilCaseController;
use App\Http\Controllers\Api\ApiCounselLawyerController;
use App\Http\Controllers\Api\ApiCriminalCaseController;
use App\Http\Controllers\Api\ApiDocManagementController;
use App\Http\Controllers\Api\ApiEmployeeController;
use App\Http\Controllers\Api\ApiFlatInfoController;
use App\Http\Controllers\Api\ApiHighCourtCaseController;
use App\Http\Controllers\Api\ApilabourCaseController;
use App\Http\Controllers\Api\ApiLandInfoController;
use App\Http\Controllers\Api\ApiLedgerCategoryController;
use App\Http\Controllers\Api\ApiLedgerEntryController;
use App\Http\Controllers\Api\ApiLitigationCalenderController;
use App\Http\Controllers\Api\ApiRegulatoryComplianceController;
use App\Http\Controllers\Api\ApiReportController;
use App\Http\Controllers\Api\ApiSupremeCourtCaseController;
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
route::delete("delete_floor/{id}",[ApiAdminSetupController::class,"delete_floor"]);

route::get("flat_number",[ApiAdminSetupController::class,"flat_number"]);
route::post("add_flat_number",[ApiAdminSetupController::class,"add_flat_number"]);
route::put("update_flat_number/{id}",[ApiAdminSetupController::class,"update_flat_number"]);
route::delete("delete_flat_number/{id}",[ApiAdminSetupController::class,"delete_flat_number"]);

route::get("seller_buyer",[ApiAdminSetupController::class,"seller_buyer"]);
route::post("add_seller_buyer",[ApiAdminSetupController::class,"add_seller_buyer"]);
route::put("update_seller_buyer/{id}",[ApiAdminSetupController::class,"update_seller_buyer"]);
route::delete("delete_seller_buyer/{id}",[ApiAdminSetupController::class,"delete_seller_buyer"]);

route::get("case_category",[ApiAdminSetupController::class,"case_category"]);
route::post("add_case_category",[ApiAdminSetupController::class,"add_case_category"]);
route::put("update_case_category/{id}",[ApiAdminSetupController::class,"update_case_category"]);
route::delete("delete_case_category/{id}",[ApiAdminSetupController::class,"delete_case_category"]);

route::get("case_subcategory",[ApiAdminSetupController::class,"case_subcategory"]);
route::post("add_case_subcategory",[ApiAdminSetupController::class,"add_case_subcategory"]);
route::put("update_case_subcategory/{id}",[ApiAdminSetupController::class,"update_case_subcategory"]);
route::delete("delete_case_subcategory/{id}",[ApiAdminSetupController::class,"delete_case_subcategory"]);

route::get("case_class",[ApiAdminSetupController::class,"case_class"]);
route::post("add_case_class",[ApiAdminSetupController::class,"add_case_class"]);
route::put("update_case_class/{id}",[ApiAdminSetupController::class,"update_case_class"]);
route::delete("delete_case_class/{id}",[ApiAdminSetupController::class,"delete_case_class"]);


route::get("section",[ApiAdminSetupController::class,"section"]);
route::post("add_section",[ApiAdminSetupController::class,"add_section"]);
route::put("update_section/{id}",[ApiAdminSetupController::class,"update_section"]);
route::delete("deletete_section/{id}",[ApiAdminSetupController::class,"delete_section"]);

route::get("client_category",[ApiAdminSetupController::class,"client_category"]);
route::post("add_client_category",[ApiAdminSetupController::class,"add_client_category"]);
route::put("update_client_category/{id}",[ApiAdminSetupController::class,"update_client_category"]);
route::delete("delete_client_category/{id}",[ApiAdminSetupController::class,"delete_client_category"]);

route::get("client_subcategory",[ApiAdminSetupController::class,"client_subcategory"]);
route::post("add_client_subcategory",[ApiAdminSetupController::class,"add_client_subcategory"]);
route::put("update_client_subcategory/{id}",[ApiAdminSetupController::class,"update_client_subcategory"]);
route::delete("delete_client_subcategory/{id}",[ApiAdminSetupController::class,"delete_client_subcategory"]);

route::get("next_day_presence",[ApiAdminSetupController::class,"next_day_presence"]);
route::post("add_next_day_presence",[ApiAdminSetupController::class,"add_next_day_presence"]);
route::put("update_next_day_presence/{id}",[ApiAdminSetupController::class,"update_next_day_presence"]);
route::delete("delete_next_day_presence/{id}",[ApiAdminSetupController::class,"delete_next_day_presence"]);

route::get("legal_issue",[ApiAdminSetupController::class,"legal_issue"]);
route::post("add_legal_issue",[ApiAdminSetupController::class,"add_legal_issue"]);
route::put("update_legal_issue/{id}",[ApiAdminSetupController::class,"update_legal_issue"]);
route::delete("deletete_legal_issue/{id}",[ApiAdminSetupController::class,"delete_legal_issue"]);

route::get("legal_service",[ApiAdminSetupController::class,"legal_service"]);
route::post("add_legal_service",[ApiAdminSetupController::class,"add_legal_service"]);
route::put("update_legal_service/{id}",[ApiAdminSetupController::class,"update_legal_service"]);
route::delete("delete_legal_service/{id}",[ApiAdminSetupController::class,"delete_legal_service"]);

route::get("matter",[ApiAdminSetupController::class,"matter"]);
route::post("add_matter",[ApiAdminSetupController::class,"add_matter"]);
route::put("update_matter/{id}",[ApiAdminSetupController::class,"update_matter"]);
route::delete("delete_matter/{id}",[ApiAdminSetupController::class,"delete_matter"]);

route::get("coordinator",[ApiAdminSetupController::class,"coordinator"]);
route::post("add_coordinator",[ApiAdminSetupController::class,"add_coordinator"]);
route::put("update_coordinator/{id}",[ApiAdminSetupController::class,"update_coordinator"]);
route::delete("delete_coordinator/{id}",[ApiAdminSetupController::class,"delete_coordinator"]);

route::get("mode",[ApiAdminSetupController::class,"mode"]);
route::post("add_mode",[ApiAdminSetupController::class,"add_mode"]);
route::put("update_mode/{id}",[ApiAdminSetupController::class,"update_mode"]);
route::delete("delete_mode/{id}",[ApiAdminSetupController::class,"delete_mode"]);

route::get("court_proceeding",[ApiAdminSetupController::class,"court_proceeding"]);
route::post("add_court_proceeding",[ApiAdminSetupController::class,"add_court_proceeding"]);
route::put("update_court_proceeding/{id}",[ApiAdminSetupController::class,"update_court_proceeding"]);
route::delete("delete_court_proceeding/{id}",[ApiAdminSetupController::class,"delete_court_proceeding"]);

route::get("day_notes",[ApiAdminSetupController::class,"day_notes"]);
route::post("add_day_notes",[ApiAdminSetupController::class,"add_day_notes"]);
route::put("update_day_notes/{id}",[ApiAdminSetupController::class,"update_day_notes"]);
route::delete("delete_day_notes/{id}",[ApiAdminSetupController::class,"delete_day_notes"]);

route::get("in_favour_of",[ApiAdminSetupController::class,"in_favour_of"]);
route::post("add_in_favour_of",[ApiAdminSetupController::class,"add_in_favour_of"]);
route::put("update_in_favour_of/{id}",[ApiAdminSetupController::class,"update_in_favour_of"]);
route::delete("delete_in_favour_of/{id}",[ApiAdminSetupController::class,"delete_in_favour_of"]);

route::get("referrer",[ApiAdminSetupController::class,"referrer"]);
route::post("add_referrer",[ApiAdminSetupController::class,"add_referrer"]);
route::put("update_referrer/{id}",[ApiAdminSetupController::class,"update_referrer"]);
route::delete("delete_referrer/{id}",[ApiAdminSetupController::class,"delete_referrer"]);


route::get("party",[ApiAdminSetupController::class,"party"]);
route::post("add_party",[ApiAdminSetupController::class,"add_party"]);
route::put("update_party/{id}",[ApiAdminSetupController::class,"update_party"]);
route::delete("delete_party/{id}",[ApiAdminSetupController::class,"delete_party"]);

route::get("client",[ApiAdminSetupController::class,"client"]);
route::post("add_client",[ApiAdminSetupController::class,"add_client"]);
route::put("update_client/{id}",[ApiAdminSetupController::class,"update_client"]);
route::delete("delete_client/{id}",[ApiAdminSetupController::class,"delete_client"]);

route::get("client_name",[ApiAdminSetupController::class,"client_name"]);
route::get("add_client_name",[ApiAdminSetupController::class,"add_client_name"]);
route::put("update_client_name/{id}",[ApiAdminSetupController::class,"update_client_name"]);
route::delete("deletete_client_name/{id}",[ApiAdminSetupController::class,"delete_client_name"]);

route::get("profession",[ApiAdminSetupController::class,"profession"]);
route::post("add_profession",[ApiAdminSetupController::class,"add_profession"]);
route::put("update_profession/{id}",[ApiAdminSetupController::class,"update_profession"]);
route::delete("delete_profession/{id}",[ApiAdminSetupController::class,"delete_profession"]);

route::get("documents",[ApiAdminSetupController::class,"documents"]);
route::post("add_documents",[ApiAdminSetupController::class,"add_documents"]);
route::put("update_documents/{id}",[ApiAdminSetupController::class,"update_documents"]);
route::delete("delete_documents/{id}",[ApiAdminSetupController::class,"delete_documents"]);

route::get("documents_type",[ApiAdminSetupController::class,"documents_type"]);
route::post("add_documents_type",[ApiAdminSetupController::class,"add_documents_type"]);
route::put("update_documents_type/{id}",[ApiAdminSetupController::class,"update_documents_type"]);
route::delete("delete_documents_type/{id}",[ApiAdminSetupController::class,"delete_documents_type"]);

route::get("case_title",[ApiAdminSetupController::class,"case_title"]);
route::post("add_case_title",[ApiAdminSetupController::class,"add_case_title"]);
route::put("update_case_title/{id}",[ApiAdminSetupController::class,"update_case_title"]);
route::delete("delete_case_title/{id}",[ApiAdminSetupController::class,"delete_case_title"]);

route::get("opposition",[ApiAdminSetupController::class,"opposition"]);
route::post("add_opposition",[ApiAdminSetupController::class,"add_opposition"]);
route::put("update_opposition/{id}",[ApiAdminSetupController::class,"update_opposition"]);
route::delete("delete_opposition/{id}",[ApiAdminSetupController::class,"delete_opposition"]);

route::get("complainant",[ApiAdminSetupController::class,"complainant"]);
route::post("add_complainant",[ApiAdminSetupController::class,"add_complainant"]);
route::put("update_complainant/{id}",[ApiAdminSetupController::class,"update_complainant"]);
route::delete("deletete_complainant/{id}",[ApiAdminSetupController::class,"delete_complainant"]);

route::get("accused",[ApiAdminSetupController::class,"accused"]);
route::post("add_accused",[ApiAdminSetupController::class,"add_accused"]);
route::put("update_accused/{id}",[ApiAdminSetupController::class,"update_accused"]);
route::delete("delete_accused/{id}",[ApiAdminSetupController::class,"delete_accused"]);

route::get("court_short",[ApiAdminSetupController::class,"court_short"]);
route::post("add_court_short",[ApiAdminSetupController::class,"add_court_short"]);
route::put("update_court_short/{id}",[ApiAdminSetupController::class,"update_court_short"]);
route::delete("delete_court_short/{id}",[ApiAdminSetupController::class,"delete_court_short"]);


route::get("progress",[ApiAdminSetupController::class,"progress"]);
route::post("add_progress",[ApiAdminSetupController::class,"add_progress"]);
route::put("update_progress/{id}",[ApiAdminSetupController::class,"update_progress"]);
route::delete("delete_progress/{id}",[ApiAdminSetupController::class,"delete_progress"]);

route::get("bill_particulars",[ApiAdminSetupController::class,"bill_particulars"]);
route::post("add_bill_particulars",[ApiAdminSetupController::class,"add_bill_particulars"]);
route::put("update_bill_particulars/{id}",[ApiAdminSetupController::class,"update_bill_particulars"]);
route::delete("delete_bill_particulars/{id}",[ApiAdminSetupController::class,"delete_bill_particulars"]);

route::get("particulars",[ApiAdminSetupController::class,"particulars"]);
route::post("add_particulars",[ApiAdminSetupController::class,"add_particulars"]);
route::put("update_particulars/{id}",[ApiAdminSetupController::class,"update_particulars"]);
route::delete("delete_particulars/{id}",[ApiAdminSetupController::class,"delete_particulars"]);

route::get("bill_schedule",[ApiAdminSetupController::class,"bill_schedule"]);
route::post("add_bill_schedule",[ApiAdminSetupController::class,"add_bill_schedule"]);
route::put("update_bill_schedule/{id}",[ApiAdminSetupController::class,"update_bill_schedule"]);
route::delete("delete_bill_schedule/{id}",[ApiAdminSetupController::class,"delete_bill_schedule"]);

route::get("payment_mode",[ApiAdminSetupController::class,"payment_mode"]);
route::post("add_payment_mode",[ApiAdminSetupController::class,"add_payment_mode"]);
route::put("update_payment_mode/{id}",[ApiAdminSetupController::class,"update_payment_mode"]);
route::delete("delete_payment_mode/{id}",[ApiAdminSetupController::class,"delete_payment_mode"]);

route::get("group",[ApiAdminSetupController::class,"group"]);
route::post("add_group",[ApiAdminSetupController::class,"add_group"]);
route::put("update_group/{id}",[ApiAdminSetupController::class,"update_group"]);
route::delete("delete_group/{id}",[ApiAdminSetupController::class,"delete_group"]);

route::get("cabinet",[ApiAdminSetupController::class,"cabinet"]);
route::post("add_cabinet",[ApiAdminSetupController::class,"add_cabinet"]);
route::put("update_cabinet/{id}",[ApiAdminSetupController::class,"update_cabinet"]);
route::delete("delete_cabinet/{id}",[ApiAdminSetupController::class,"delete_cabinet"]);

route::get("search/{name}",[ApiAdminSetupController::class,"search"]);
route::get("search_matter/{name}",[ApiAdminSetupController::class,"search_matter"]);

route::get("index_counsel",[ApiCounselLawyerController::class,"index_counsel"]);
route::post("add_counsel",[ApiCounselLawyerController::class,"add_counsel"]);
route::put("update_counsel/{id}",[ApiCounselLawyerController::class,"update_counsel"]);
route::delete("delete_counsel/{id}",[ApiCounselLawyerController::class,"delete_counsel"]);

route::get("internal_consel_new",[ApiCounselLawyerController::class,"internal_consel_new"]);

route::get("chamber",[ApiCounselLawyerController::class,"chamber"]);
// route::post("add_chamber",[ApiCounselLawyerController::class,"add_chamber"]);
// route::put("update_chamber/{id}",[ApiCounselLawyerController::class,"update_chamber"]);
// route::delete("delete_chamber/{id}",[ApiCounselLawyerController::class,"delete_chamber"]);

route::get("litigation_calander_list",[ApiLitigationCalenderController::class,"litigation_calander_list"]);
route::get("search_litigation_calendar",[ApiLitigationCalenderController::class,"search_litigation_calendar"]);
route::get("litigation-calender-list-print/{date}",[ApiLitigationCalenderController::class,"print_litigation_calender_list"]);
route::get("litigation_calender_short",[ApiLitigationCalenderController::class,"litigation_calender_short"]);
route::get("litigation_calender_short_court_wise",[ApiLitigationCalenderController::class,"litigation_calender_short_court_wise"]);
// route::get("calendar_short_next",[ApiLitigationCalenderController::class,"calendar_short_next"]);
route::get("litigation_calendar_list_print_preview",[ApiLitigationCalenderController::class,"litigation_calendar_list_print_preview"]);

route::get("document_management",[ApiDocManagementController::class,"document_management"]);


route::get("billing",[ApiBillingsController::class,"billing"]);
route::get("add_billing",[ApiBillingsController::class,"add_billing"]);
route::get("add-billing-from-district-court/{id}",[ApiBillingsController::class,"add_billing_from_district_court"]);
// route::get("edit_billing/{id}",[ApiBillingsController::class,"edit_billing"]);
route::get("add_billing_civil_cases/{id}",[ApiBillingsController::class,"add_billing_civil_cases"]);
route::get("add_billing_criminal_cases/{id}",[ApiBillingsController::class,"add_billing_criminal_cases"]);
route::get("add_criminal_cases_billling/{id}",[ApiBillingsController::class,"add_criminal_cases_billling"]);
route::get("add_billing_labour_cases/{id}",[ApiBillingsController::class,"add_billing_labour_cases"]);
route::get("add_billing_quassi_judicial_cases/{id}",[ApiBillingsController::class,"add_billing_quassi_judicial_cases"]);
route::get("add_billing_supreme_court_cases/{id}",[ApiBillingsController::class,"add_billing_supreme_court_cases"]);
route::get("add_billing_high_court_cases/{id}",[ApiBillingsController::class,"add_billing_high_court_cases"]);
route::get("add_billing_appellate_court_cases/{id}",[ApiBillingsController::class,"add_billing_appellate_court_cases"]);


route::get("civil_cases",[ApiCivilCaseController::class,"civil_cases"]);
route::get("add_civil_cases",[ApiCivilCaseController::class,"add_civil_cases"]);






route::get("flat_information",[ApiFlatInfoController::class,"flat_information"]);
route::get("add_flat_information",[ApiFlatInfoController::class,"add_flat_information"]);

route::get("land_information",[ApiLandInfoController::class,"land_information"]);
route::get("add_land_information",[ApiLandInfoController::class,"add_land_information"]);
// route::get("edit_land_information/{id}",[ApiLandInfoController::class,"edit_land_information"]);


route::get("regulatory_compliance",[ApiRegulatoryComplianceController::class,"regulatory_compliance"]);
route::get("edit_regulatory_compliance/{id}",[ApiRegulatoryComplianceController::class,"edit_regulatory_compliance"]);


route::get("high_court_cases",[ApiHighCourtCaseController::class,"high_court_cases"]);
route::get("add_high_court_cases",[ApiHighCourtCaseController::class,"add_high_court_cases"]);

route::get("labour_cases",[ApilabourCaseController::class,"labour_cases"]);
route::get("add_labour_cases",[ApilabourCaseController::class,"add_labour_cases"]);
route::get("edit_labour_cases/{id}",[ApilabourCaseController::class,"edit_labour_cases"]);
route::post("update_labour_cases/{id}",[ApilabourCaseController::class,"update_labour_cases"]);
route::get("view_labour_cases/{id}",[ApilabourCaseController::class,"view_labour_cases"]);
route::get("update_labour_cases_status/{id}",[ApilabourCaseController::class,"update_labour_cases_status"]);


route::get("ledger-report",[ApiReportController::class,"ledger_report"]);
route::get("ledger-report-search",[ApiReportController::class,"ledger_report_search"]);
route::get("print-ledger-report",[ApiReportController::class,"print_ledger_report"]);
route::get("ledger-head-report-list",[ApiReportController::class,"ledger_head_report_list"]);
route::get("ledger-head-report-list-search",[ApiReportController::class,"ledger_head_report_list_search"]);
route::get("print-ledger-head-report-list",[ApiReportController::class,"print_ledger_head_report_list"]);
route::get("income-expense-report",[ApiReportController::class,"income_expense_report"]);
route::get("print-income-expense-report",[ApiReportController::class,"print_income_expense_report"]);
route::get("income-expense-report-search",[ApiReportController::class,"income_expense_report_search"]);
route::get("balance-report",[ApiReportController::class,"balance_report"]);
route::get("balance-report-search",[ApiReportController::class,"balance_report_search"]);
route::get("print-balance-report",[ApiReportController::class,"print_balance_report"]);


route::get("ledger-category",[ApiLedgerCategoryController::class,"index"]);


route::get("ledger-head",[ApiLedgerCategoryController::class,"index"]);

route::get("ledger-entry",[ApiLedgerEntryController::class,"index"]);
route::get("add-ledger-entry/{id}",[ApiLedgerEntryController::class,"add_ledger_entry"]);

// route::get("employee",[ApiEmployeeController::class,"index"]);
route::get("all-cases",[ApiCriminalCaseController::class,"all_cases"]);
route::get("add-criminal-cases",[ApiCriminalCaseController::class,"add_criminal_cases"]);

route::post("save-criminal-cases",[ApiCriminalCaseController::class,"save_criminal_cases"]);




