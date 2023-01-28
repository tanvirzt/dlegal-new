<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSetupController;
use App\Http\Controllers\Admin\CivilCasesController;
use App\Http\Controllers\Admin\CriminalCasesController;
use App\Http\Controllers\Admin\LabourCasesController;
use App\Http\Controllers\Admin\QuassiJudicialCasesController;
use App\Http\Controllers\Admin\SupremeCourtCasesController;
use App\Http\Controllers\Admin\HighCourtCasesController;
use App\Http\Controllers\Admin\AppellateCourtCasesController;
use App\Http\Controllers\Admin\AssignmentCategoryController;
use App\Http\Controllers\Admin\AssignmentController;
use App\Http\Controllers\Admin\BillingsController;
use App\Http\Controllers\Admin\LandInfoController;
use App\Http\Controllers\Admin\FlatInfoController;
use App\Http\Controllers\Admin\RegulatoryComplianceController;
use App\Http\Controllers\Admin\SocialComplianceController;
use App\Http\Controllers\Admin\DocManagementController;
use App\Http\Controllers\Admin\LitigationCalenderController;
use App\Http\Controllers\Admin\CounselLawyerController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ScheduleCategoryController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TaskCategoryController;
use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\DomainSetupController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LedgerCategoryController;
use App\Http\Controllers\LedgerHeadController;
use App\Http\Controllers\LedgerEntryController;
use FontLib\Table\Type\name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Clear cache
Route::get('/clear', function () {
    Artisan::call('cache:forget spatie.permission.cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "All Cleared!";
});


Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');



Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    //    Route::get('/dashboard','App\Http\Controllers\Admin\AdminController@dashboards')->name('dashboard');

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('add-role', [RoleController::class, 'add_role'])->name('roles.add-role');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('domain-setup', DomainSetupController::class);

    Route::get('individual-users-permission/{id}', [UserController::class, 'add_permissions'])->name('users.add-permissions');
    Route::post('save-user-permissions/{id}', [UserController::class, 'save_users_permissions'])->name('users.save_permissions');

    Route::get('designation', [AdminSetupController::class, 'designation'])->name('designation');
    Route::get('add-designation', [AdminSetupController::class, 'add_designation'])->name('add-designation');
    Route::post('save-designation', [AdminSetupController::class, 'save_designation'])->name('save-designation');
    Route::get('edit-designation/{id}', [AdminSetupController::class, 'edit_designation'])->name('edit-designation');
    Route::post('update-designation/{id}', [AdminSetupController::class, 'update_designation'])->name('update-designation');
    Route::post('delete-designation/{id}', [AdminSetupController::class, 'delete_designation'])->name('delete-designation');



    Route::get('case-status', [AdminSetupController::class, 'case_status'])->name('case-status');
    Route::get('add-case-status', [AdminSetupController::class, 'add_case_status'])->name('add-case-status');
    Route::post('save-case-status', [AdminSetupController::class, 'save_case_status'])->name('save-case-status');
    Route::get('edit-case-status/{id}', [AdminSetupController::class, 'edit_case_status'])->name('edit-case-status');
    Route::post('update-case-status/{id}', [AdminSetupController::class, 'update_case_status'])->name('update-case-status');
    Route::post('delete-case-status/{id}', [AdminSetupController::class, 'delete_case_status'])->name('delete-case-status');

    Route::get('case-types', [AdminSetupController::class, 'case_types'])->name('case-types');
    Route::get('add-case-types', [AdminSetupController::class, 'add_case_types'])->name('add-case-types');
    Route::post('save-case-types', [AdminSetupController::class, 'save_case_types'])->name('save-case-types');
    Route::get('edit-case-types/{id}', [AdminSetupController::class, 'edit_case_types'])->name('edit-case-types');
    Route::post('update-case-types/{id}', [AdminSetupController::class, 'update_case_types'])->name('update-case-types');
    Route::post('delete-case-types/{id}', [AdminSetupController::class, 'delete_case_types'])->name('delete-case-types');

    Route::get('property-type', [AdminSetupController::class, 'property_type'])->name('property-type');
    Route::get('add-property-type', [AdminSetupController::class, 'add_property_type'])->name('add-property-type');
    Route::post('save-property-type', [AdminSetupController::class, 'save_property_type'])->name('save-property-type');
    Route::get('edit-property-type/{id}', [AdminSetupController::class, 'edit_property_type'])->name('edit-property-type');
    Route::post('update-property-type/{id}', [AdminSetupController::class, 'update_property_type'])->name('update-property-type');
    Route::post('delete-property-type/{id}', [AdminSetupController::class, 'delete_property_type'])->name('delete-property-type');

    Route::get('compliance-category', [AdminSetupController::class, 'compliance_category'])->name('compliance-category');
    Route::get('add-compliance-category', [AdminSetupController::class, 'add_compliance_category'])->name('add-compliance-category');
    Route::post('save-compliance-category', [AdminSetupController::class, 'save_compliance_category'])->name('save-compliance-category');
    Route::get('edit-compliance-category/{id}', [AdminSetupController::class, 'edit_compliance_category'])->name('edit-compliance-category');
    Route::post('update-compliance-category/{id}', [AdminSetupController::class, 'update_compliance_category'])->name('update-compliance-category');
    Route::post('delete-compliance-category/{id}', [AdminSetupController::class, 'delete_compliance_category'])->name('delete-compliance-category');

    Route::get('external-council', [AdminSetupController::class, 'external_council'])->name('external-council');
    Route::get('add-external-council', [AdminSetupController::class, 'add_external_council'])->name('add-external-council');
    Route::post('save-external-council', [AdminSetupController::class, 'save_external_council'])->name('save-external-council');
    Route::get('edit-external-council/{id}', [AdminSetupController::class, 'edit_external_council'])->name('edit-external-council');
    Route::post('update-external-council/{id}', [AdminSetupController::class, 'update_external_council'])->name('update-external-council');
    Route::post('delete-external-council/{id}', [AdminSetupController::class, 'delete_external_council'])->name('delete-external-council');
    Route::get('download-external-council-files/{id}', [AdminSetupController::class, 'download_external_council_files'])->name('download-external-council-files');
    Route::get('download-internal-council-files/{id}', [AdminSetupController::class, 'download_internal_council_files'])->name('download-internal-council-files');


    Route::get('person-title', [AdminSetupController::class, 'person_title'])->name('person-title');
    Route::get('add-person-title', [AdminSetupController::class, 'add_person_title'])->name('add-person-title');
    Route::post('save-person-title', [AdminSetupController::class, 'save_person_title'])->name('save-person-title');
    Route::get('edit-person-title/{id}', [AdminSetupController::class, 'edit_person_title'])->name('edit-person-title');
    Route::post('update-person-title/{id}', [AdminSetupController::class, 'update_person_title'])->name('update-person-title');
    Route::post('delete-person-title/{id}', [AdminSetupController::class, 'delete_person_title'])->name('delete-person-title');

    Route::get('court', [AdminSetupController::class, 'court'])->name('court');
    Route::get('add-court', [AdminSetupController::class, 'add_court'])->name('add-court');
    Route::post('save-court', [AdminSetupController::class, 'save_court'])->name('save-court');
    Route::get('edit-court/{id}', [AdminSetupController::class, 'edit_court'])->name('edit-court');
    Route::post('update-court/{id}', [AdminSetupController::class, 'update_court'])->name('update-court');
    Route::post('delete-court/{id}', [AdminSetupController::class, 'delete_court'])->name('delete-court');

    Route::get('property-type', [AdminSetupController::class, 'property_type'])->name('property-type');
    Route::get('add-property-type', [AdminSetupController::class, 'add_property_type'])->name('add-property-type');
    Route::post('save-property-type', [AdminSetupController::class, 'save_property_type'])->name('save-property-type');
    Route::get('edit-property-type/{id}', [AdminSetupController::class, 'edit_property_type'])->name('edit-property-type');
    Route::post('update-property-type/{id}', [AdminSetupController::class, 'update_property_type'])->name('update-property-type');
    Route::post('delete-property-type/{id}', [AdminSetupController::class, 'delete_property_type'])->name('delete-property-type');

    Route::get('compliance-type', [AdminSetupController::class, 'compliance_type'])->name('compliance-type');
    Route::get('add-compliance-type', [AdminSetupController::class, 'add_compliance_type'])->name('add-compliance-type');
    Route::post('save-compliance-type', [AdminSetupController::class, 'save_compliance_type'])->name('save-compliance-type');
    Route::get('edit-compliance-type/{id}', [AdminSetupController::class, 'edit_compliance_type'])->name('edit-compliance-type');
    Route::post('update-compliance-type/{id}', [AdminSetupController::class, 'update_compliance_type'])->name('update-compliance-type');
    Route::post('delete-compliance-type/{id}', [AdminSetupController::class, 'delete_compliance_type'])->name('delete-compliance-type');

    Route::get('division', [AdminSetupController::class, 'division'])->name('division');
    Route::get('add-division', [AdminSetupController::class, 'add_division'])->name('add-division');
    Route::post('save-division', [AdminSetupController::class, 'save_division'])->name('save-division');
    Route::get('edit-division/{id}', [AdminSetupController::class, 'edit_division'])->name('edit-division');
    Route::post('update-division/{id}', [AdminSetupController::class, 'update_division'])->name('update-division');
    Route::post('delete-division/{id}', [AdminSetupController::class, 'delete_division'])->name('delete-division');

    Route::get('district', [AdminSetupController::class, 'district'])->name('district');
    Route::get('add-district', [AdminSetupController::class, 'add_district'])->name('add-district');
    Route::post('save-district', [AdminSetupController::class, 'save_district'])->name('save-district');
    Route::get('edit-district/{id}', [AdminSetupController::class, 'edit_district'])->name('edit-district');
    Route::post('update-district/{id}', [AdminSetupController::class, 'update_district'])->name('update-district');
    Route::post('delete-district/{id}', [AdminSetupController::class, 'delete_district'])->name('delete-district');

    Route::get('law', [AdminSetupController::class, 'law'])->name('law');
    Route::get('add-law', [AdminSetupController::class, 'add_law'])->name('add-law');
    Route::post('save-law', [AdminSetupController::class, 'save_law'])->name('save-law');
    Route::get('edit-law/{id}', [AdminSetupController::class, 'edit_law'])->name('edit-law');
    Route::post('update-law/{id}', [AdminSetupController::class, 'update_law'])->name('update-law');
    Route::post('delete-law/{id}', [AdminSetupController::class, 'delete_law'])->name('delete-law');

    Route::get('next-date-reason', [AdminSetupController::class, 'next_date_reason'])->name('next-date-reason');
    Route::get('add-next-date-reason', [AdminSetupController::class, 'add_next_date_reason'])->name('add-next-date-reason');
    Route::post('save-next-date-reason', [AdminSetupController::class, 'save_next_date_reason'])->name('save-next-date-reason');
    Route::get('edit-next-date-reason/{id}', [AdminSetupController::class, 'edit_next_date_reason'])->name('edit-next-date-reason');
    Route::post('update-next-date-reason/{id}', [AdminSetupController::class, 'update_next_date_reason'])->name('update-next-date-reason');
    Route::post('delete-next-date-reason/{id}', [AdminSetupController::class, 'delete_next_date_reason'])->name('delete-next-date-reason');

    Route::get('court-last-order', [AdminSetupController::class, 'court_last_order'])->name('court-last-order');
    Route::get('add-court-last-order', [AdminSetupController::class, 'add_court_last_order'])->name('add-court-last-order');
    Route::post('save-court-last-order', [AdminSetupController::class, 'save_court_last_order'])->name('save-court-last-order');
    Route::get('edit-court-last-order/{id}', [AdminSetupController::class, 'edit_court_last_order'])->name('edit-court-last-order');
    Route::post('update-court-last-order/{id}', [AdminSetupController::class, 'update_court_last_order'])->name('update-court-last-order');
    Route::post('delete-court-last-order/{id}', [AdminSetupController::class, 'delete_court_last_order'])->name('delete-court-last-order');

    Route::get('region', [AdminSetupController::class, 'region'])->name('region');
    Route::get('add-region', [AdminSetupController::class, 'add_region'])->name('add-region');
    Route::post('save-region', [AdminSetupController::class, 'save_region'])->name('save-region');
    Route::get('edit-region/{id}', [AdminSetupController::class, 'edit_region'])->name('edit-region');
    Route::post('update-region/{id}', [AdminSetupController::class, 'update_region'])->name('update-region');
    Route::post('delete-region/{id}', [AdminSetupController::class, 'delete_region'])->name('delete-region');

    Route::get('area', [AdminSetupController::class, 'area'])->name('area');
    Route::get('add-area', [AdminSetupController::class, 'add_area'])->name('add-area');
    Route::post('save-area', [AdminSetupController::class, 'save_area'])->name('save-area');
    Route::get('edit-area/{id}', [AdminSetupController::class, 'edit_area'])->name('edit-area');
    Route::post('update-area/{id}', [AdminSetupController::class, 'update_area'])->name('update-area');
    Route::post('delete-area/{id}', [AdminSetupController::class, 'delete_area'])->name('delete-area');

    Route::get('branch', [AdminSetupController::class, 'branch'])->name('branch');
    Route::get('add-branch', [AdminSetupController::class, 'add_branch'])->name('add-branch');
    Route::post('save-branch', [AdminSetupController::class, 'save_branch'])->name('save-branch');
    Route::get('edit-branch/{id}', [AdminSetupController::class, 'edit_branch'])->name('edit-branch');
    Route::post('update-branch/{id}', [AdminSetupController::class, 'update_branch'])->name('update-branch');
    Route::post('delete-branch/{id}', [AdminSetupController::class, 'delete_branch'])->name('delete-branch');

    Route::get('program', [AdminSetupController::class, 'program'])->name('program');
    Route::get('add-program', [AdminSetupController::class, 'add_program'])->name('add-program');
    Route::post('save-program', [AdminSetupController::class, 'save_program'])->name('save-program');
    Route::get('edit-program/{id}', [AdminSetupController::class, 'edit_program'])->name('edit-program');
    Route::post('update-program/{id}', [AdminSetupController::class, 'update_program'])->name('update-program');
    Route::post('delete-program/{id}', [AdminSetupController::class, 'delete_program'])->name('delete-program');

    Route::get('allegation', [AdminSetupController::class, 'allegation'])->name('allegation');
    Route::get('add-allegation', [AdminSetupController::class, 'add_allegation'])->name('add-allegation');
    Route::post('save-allegation', [AdminSetupController::class, 'save_allegation'])->name('save-allegation');
    Route::get('edit-allegation/{id}', [AdminSetupController::class, 'edit_allegation'])->name('edit-allegation');
    Route::post('update-allegation/{id}', [AdminSetupController::class, 'update_allegation'])->name('update-allegation');
    Route::post('delete-allegation/{id}', [AdminSetupController::class, 'delete_allegation'])->name('delete-allegation');

    Route::get('company-type', [AdminSetupController::class, 'company_type'])->name('company-type');
    Route::get('add-company-type', [AdminSetupController::class, 'add_company_type'])->name('add-company-type');
    Route::post('save-company-type', [AdminSetupController::class, 'save_company_type'])->name('save-company-type');
    Route::get('edit-company-type/{id}', [AdminSetupController::class, 'edit_company_type'])->name('edit-company-type');
    Route::post('update-company-type/{id}', [AdminSetupController::class, 'update_company_type'])->name('update-company-type');
    Route::post('delete-company-type/{id}', [AdminSetupController::class, 'delete_company_type'])->name('delete-company-type');

    Route::get('company', [AdminSetupController::class, 'company'])->name('company');
    Route::get('add-company', [AdminSetupController::class, 'add_company'])->name('add-company');
    Route::post('save-company', [AdminSetupController::class, 'save_company'])->name('save-company');
    Route::get('edit-company/{id}', [AdminSetupController::class, 'edit_company'])->name('edit-company');
    Route::post('update-company/{id}', [AdminSetupController::class, 'update_company'])->name('update-company');
    Route::post('delete-company/{id}', [AdminSetupController::class, 'delete_company'])->name('delete-company');

    Route::get('internal-council', [AdminSetupController::class, 'internal_council'])->name('internal-council');
    Route::get('add-internal-council', [AdminSetupController::class, 'add_internal_council'])->name('add-internal-council');
    Route::post('save-internal-council', [AdminSetupController::class, 'save_internal_council'])->name('save-internal-council');
    Route::get('edit-internal-council/{id}', [AdminSetupController::class, 'edit_internal_council'])->name('edit-internal-council');
    Route::post('update-internal-council/{id}', [AdminSetupController::class, 'update_internal_council'])->name('update-internal-council');
    Route::post('delete-internal-council/{id}', [AdminSetupController::class, 'delete_internal_council'])->name('delete-internal-council');

    Route::get('external-council-associates', [AdminSetupController::class, 'external_council_associates'])->name('external-council-associates');
    Route::get('add-external-council-associates', [AdminSetupController::class, 'add_external_council_associates'])->name('add-external-council-associates');
    Route::post('save-external-council-associates', [AdminSetupController::class, 'save_external_council_associates'])->name('save-external-council-associates');
    Route::get('edit-external-council-associates/{id}', [AdminSetupController::class, 'edit_external_council_associates'])->name('edit-external-council-associates');
    Route::post('update-external-council-associates/{id}', [AdminSetupController::class, 'update_external_council_associates'])->name('update-external-council-associates');
    Route::post('delete-external-council-associates/{id}', [AdminSetupController::class, 'delete_external_council_associates'])->name('delete-external-council-associates');
    Route::get('download-external-council-associates-files/{id}', [AdminSetupController::class, 'download_external_council_associates_files'])->name('download-external-council-associates-files');

    Route::get('bill-type', [AdminSetupController::class, 'bill_type'])->name('bill-type');
    Route::get('add-bill-type', [AdminSetupController::class, 'add_bill_type'])->name('add-bill-type');
    Route::post('save-bill-type', [AdminSetupController::class, 'save_bill_type'])->name('save-bill-type');
    Route::get('edit-bill-type/{id}', [AdminSetupController::class, 'edit_bill_type'])->name('edit-bill-type');
    Route::post('update-bill-type/{id}', [AdminSetupController::class, 'update_bill_type'])->name('update-bill-type');
    Route::post('delete-bill-type/{id}', [AdminSetupController::class, 'delete_bill_type'])->name('delete-bill-type');

    Route::get('bank', [AdminSetupController::class, 'bank'])->name('bank');
    Route::get('add-bank', [AdminSetupController::class, 'add_bank'])->name('add-bank');
    Route::post('save-bank', [AdminSetupController::class, 'save_bank'])->name('save-bank');
    Route::get('edit-bank/{id}', [AdminSetupController::class, 'edit_bank'])->name('edit-bank');
    Route::post('update-bank/{id}', [AdminSetupController::class, 'update_bank'])->name('update-bank');
    Route::post('delete-bank/{id}', [AdminSetupController::class, 'delete_bank'])->name('delete-bank');

    Route::get('bank-branch', [AdminSetupController::class, 'bank_branch'])->name('bank-branch');
    Route::get('add-bank-branch', [AdminSetupController::class, 'add_bank_branch'])->name('add-bank-branch');
    Route::post('save-bank-branch', [AdminSetupController::class, 'save_bank_branch'])->name('save-bank-branch');
    Route::get('edit-bank-branch/{id}', [AdminSetupController::class, 'edit_bank_branch'])->name('edit-bank-branch');
    Route::post('update-bank-branch/{id}', [AdminSetupController::class, 'update_bank_branch'])->name('update-bank-branch');
    Route::post('delete-bank-branch/{id}', [AdminSetupController::class, 'delete_bank_branch'])->name('delete-bank-branch');

    Route::get('digital-payment-type', [AdminSetupController::class, 'digital_payment_type'])->name('digital-payment-type');
    Route::get('add-digital-payment-type', [AdminSetupController::class, 'add_digital_payment_type'])->name('add-digital-payment-type');
    Route::post('save-digital-payment-type', [AdminSetupController::class, 'save_digital_payment_type'])->name('save-digital-payment-type');
    Route::get('edit-digital-payment-type/{id}', [AdminSetupController::class, 'edit_digital_payment_type'])->name('edit-digital-payment-type');
    Route::post('update-digital-payment-type/{id}', [AdminSetupController::class, 'update_digital_payment_type'])->name('update-digital-payment-type');
    Route::post('delete-digital-payment-type/{id}', [AdminSetupController::class, 'delete_digital_payment_type'])->name('delete-digital-payment-type');

    Route::get('thana', [AdminSetupController::class, 'thana'])->name('thana');
    Route::get('add-thana', [AdminSetupController::class, 'add_thana'])->name('add-thana');
    Route::post('save-thana', [AdminSetupController::class, 'save_thana'])->name('save-thana');
    Route::get('edit-thana/{id}', [AdminSetupController::class, 'edit_thana'])->name('edit-thana');
    Route::post('update-thana/{id}', [AdminSetupController::class, 'update_thana'])->name('update-thana');
    Route::post('delete-thana/{id}', [AdminSetupController::class, 'delete_thana'])->name('delete-thana');

    // floor setup

    Route::get('floor', [AdminSetupController::class, 'floor'])->name('floor');
    Route::get('add-floor', [AdminSetupController::class, 'add_floor'])->name('add-floor');
    Route::post('save-floor', [AdminSetupController::class, 'save_floor'])->name('save-floor');
    Route::get('edit-floor/{id}', [AdminSetupController::class, 'edit_floor'])->name('edit-floor');
    Route::post('update-floor/{id}', [AdminSetupController::class, 'update_floor'])->name('update-floor');
    Route::post('delete-floor/{id}', [AdminSetupController::class, 'delete_floor'])->name('delete-floor');
    // flat-number setup

    Route::get('flat-number', [AdminSetupController::class, 'flat_number'])->name('flat-number');
    Route::get('add-flat-number', [AdminSetupController::class, 'add_flat_number'])->name('add-flat-number');
    Route::post('save-flat-number', [AdminSetupController::class, 'save_flat_number'])->name('save-flat-number');
    Route::get('edit-flat-number/{id}', [AdminSetupController::class, 'edit_flat_number'])->name('edit-flat-number');
    Route::post('update-flat-number/{id}', [AdminSetupController::class, 'update_flat_number'])->name('update-flat-number');
    Route::post('delete-flat-number/{id}', [AdminSetupController::class, 'delete_flat_number'])->name('delete-flat-number');

    // seller buyer setup
    Route::get('seller-buyer', [AdminSetupController::class, 'seller_buyer'])->name('seller-buyer');
    Route::get('add-seller-buyer', [AdminSetupController::class, 'add_seller_buyer'])->name('add-seller-buyer');
    Route::post('save-seller-buyer', [AdminSetupController::class, 'save_seller_buyer'])->name('save-seller-buyer');
    Route::get('edit-seller-buyer/{id}', [AdminSetupController::class, 'edit_seller_buyer'])->name('edit-seller-buyer');
    Route::post('update-seller-buyer/{id}', [AdminSetupController::class, 'update_seller_buyer'])->name('update-seller-buyer');
    Route::post('delete-seller-buyer/{id}', [AdminSetupController::class, 'delete_seller_buyer'])->name('delete-seller-buyer');

    Route::get('case-category', [AdminSetupController::class, 'case_category'])->name('case-category');
    Route::get('add-case-category', [AdminSetupController::class, 'add_case_category'])->name('add-case-category');
    Route::post('save-case-category', [AdminSetupController::class, 'save_case_category'])->name('save-case-category');
    Route::get('edit-case-category/{id}', [AdminSetupController::class, 'edit_case_category'])->name('edit-case-category');
    Route::post('update-case-category/{id}', [AdminSetupController::class, 'update_case_category'])->name('update-case-category');
    Route::post('delete-case-category/{id}', [AdminSetupController::class, 'delete_case_category'])->name('delete-case-category');

    // supreme-case-subcategory setup

    Route::get('case-subcategory', [AdminSetupController::class, 'case_subcategory'])->name('case-subcategory');
    Route::get('add-case-subcategory', [AdminSetupController::class, 'add_case_subcategory'])->name('add-case-subcategory');
    Route::post('save-case-subcategory', [AdminSetupController::class, 'save_case_subcategory'])->name('save-case-subcategory');
    Route::get('edit-case-subcategory/{id}', [AdminSetupController::class, 'edit_case_subcategory'])->name('edit-case-subcategory');
    Route::post('update-case-subcategory/{id}', [AdminSetupController::class, 'update_case_subcategory'])->name('update-case-subcategory');
    Route::post('delete-case-subcategory/{id}', [AdminSetupController::class, 'delete_case_subcategory'])->name('delete-case-subcategory');
    Route::get('find-case-category', [AdminSetupController::class, 'find_case_category'])->name('find-case-category');

    Route::get('case-class', [AdminSetupController::class, 'case_class'])->name('case-class');
    Route::get('add-case-class', [AdminSetupController::class, 'add_case_class'])->name('add-case-class');
    Route::post('save-case-class', [AdminSetupController::class, 'save_case_class'])->name('save-case-class');
    Route::get('edit-case-class/{id}', [AdminSetupController::class, 'edit_case_class'])->name('edit-case-class');
    Route::post('update-case-class/{id}', [AdminSetupController::class, 'update_case_class'])->name('update-case-class');
    Route::post('delete-case-class/{id}', [AdminSetupController::class, 'delete_case_class'])->name('delete-case-class');

    Route::get('section', [AdminSetupController::class, 'section'])->name('section');
    Route::get('add-section', [AdminSetupController::class, 'add_section'])->name('add-section');
    Route::post('save-section', [AdminSetupController::class, 'save_section'])->name('save-section');
    Route::get('edit-section/{id}', [AdminSetupController::class, 'edit_section'])->name('edit-section');
    Route::post('update-section/{id}', [AdminSetupController::class, 'update_section'])->name('update-section');
    Route::post('delete-section/{id}', [AdminSetupController::class, 'delete_section'])->name('delete-section');

    Route::get('client-category', [AdminSetupController::class, 'client_category'])->name('client-category');
    Route::get('add-client-category', [AdminSetupController::class, 'add_client_category'])->name('add-client-category');
    Route::post('save-client-category', [AdminSetupController::class, 'save_client_category'])->name('save-client-category');
    Route::get('edit-client-category/{id}', [AdminSetupController::class, 'edit_client_category'])->name('edit-client-category');
    Route::post('update-client-category/{id}', [AdminSetupController::class, 'update_client_category'])->name('update-client-category');
    Route::post('delete-client-category/{id}', [AdminSetupController::class, 'delete_client_category'])->name('delete-client-category');

    Route::get('client-subcategory', [AdminSetupController::class, 'client_subcategory'])->name('client-subcategory');
    Route::get('add-client-subcategory', [AdminSetupController::class, 'add_client_subcategory'])->name('add-client-subcategory');
    Route::post('save-client-subcategory', [AdminSetupController::class, 'save_client_subcategory'])->name('save-client-subcategory');
    Route::get('edit-client-subcategory/{id}', [AdminSetupController::class, 'edit_client_subcategory'])->name('edit-client-subcategory');
    Route::post('update-client-subcategory/{id}', [AdminSetupController::class, 'update_client_subcategory'])->name('update-client-subcategory');
    Route::post('delete-client-subcategory/{id}', [AdminSetupController::class, 'delete_client_subcategory'])->name('delete-client-subcategory');

    Route::get('find-client-subcategory', [AdminSetupController::class, 'find_client_subcategory'])->name('find-client-subcategory');

    Route::get('next-day-presence', [AdminSetupController::class, 'next_day_presence'])->name('next-day-presence');
    Route::get('add-next-day-presence', [AdminSetupController::class, 'add_next_day_presence'])->name('add-next-day-presence');
    Route::post('save-next-day-presence', [AdminSetupController::class, 'save_next_day_presence'])->name('save-next-day-presence');
    Route::get('edit-next-day-presence/{id}', [AdminSetupController::class, 'edit_next_day_presence'])->name('edit-next-day-presence');
    Route::post('update-next-day-presence/{id}', [AdminSetupController::class, 'update_next_day_presence'])->name('update-next-day-presence');
    Route::post('delete-next-day-presence/{id}', [AdminSetupController::class, 'delete_next_day_presence'])->name('delete-next-day-presence');

    Route::get('legal-issue', [AdminSetupController::class, 'legal_issue'])->name('legal-issue');
    Route::get('add-legal-issue', [AdminSetupController::class, 'add_legal_issue'])->name('add-legal-issue');
    Route::post('save-legal-issue', [AdminSetupController::class, 'save_legal_issue'])->name('save-legal-issue');
    Route::get('edit-legal-issue/{id}', [AdminSetupController::class, 'edit_legal_issue'])->name('edit-legal-issue');
    Route::post('update-legal-issue/{id}', [AdminSetupController::class, 'update_legal_issue'])->name('update-legal-issue');
    Route::post('delete-legal-issue/{id}', [AdminSetupController::class, 'delete_legal_issue'])->name('delete-legal-issue');

    Route::get('legal-service', [AdminSetupController::class, 'legal_service'])->name('legal-service');
    Route::get('add-legal-service', [AdminSetupController::class, 'add_legal_service'])->name('add-legal-service');
    Route::post('save-legal-service', [AdminSetupController::class, 'save_legal_service'])->name('save-legal-service');
    Route::get('edit-legal-service/{id}', [AdminSetupController::class, 'edit_legal_service'])->name('edit-legal-service');
    Route::post('update-legal-service/{id}', [AdminSetupController::class, 'update_legal_service'])->name('update-legal-service');
    Route::post('delete-legal-service/{id}', [AdminSetupController::class, 'delete_legal_service'])->name('delete-legal-service');

    Route::get('matter', [AdminSetupController::class, 'matter'])->name('matter');
    Route::get('add-matter', [AdminSetupController::class, 'add_matter'])->name('add-matter');
    Route::post('save-matter', [AdminSetupController::class, 'save_matter'])->name('save-matter');
    Route::get('edit-matter/{id}', [AdminSetupController::class, 'edit_matter'])->name('edit-matter');
    Route::post('update-matter/{id}', [AdminSetupController::class, 'update_matter'])->name('update-matter');
    Route::post('delete-matter/{id}', [AdminSetupController::class, 'delete_matter'])->name('delete-matter');

    Route::get('coordinator', [AdminSetupController::class, 'coordinator'])->name('coordinator');
    Route::get('add-coordinator', [AdminSetupController::class, 'add_coordinator'])->name('add-coordinator');
    Route::post('save-coordinator', [AdminSetupController::class, 'save_coordinator'])->name('save-coordinator');
    Route::get('edit-coordinator/{id}', [AdminSetupController::class, 'edit_coordinator'])->name('edit-coordinator');
    Route::post('update-coordinator/{id}', [AdminSetupController::class, 'update_coordinator'])->name('update-coordinator');
    Route::post('delete-coordinator/{id}', [AdminSetupController::class, 'delete_coordinator'])->name('delete-coordinator');

    Route::get('mode', [AdminSetupController::class, 'mode'])->name('mode');
    Route::get('add-mode', [AdminSetupController::class, 'add_mode'])->name('add-mode');
    Route::post('save-mode', [AdminSetupController::class, 'save_mode'])->name('save-mode');
    Route::get('edit-mode/{id}', [AdminSetupController::class, 'edit_mode'])->name('edit-mode');
    Route::post('update-mode/{id}', [AdminSetupController::class, 'update_mode'])->name('update-mode');
    Route::post('delete-mode/{id}', [AdminSetupController::class, 'delete_mode'])->name('delete-mode');

    Route::get('court-proceeding', [AdminSetupController::class, 'court_proceeding'])->name('court-proceeding');
    Route::get('add-court-proceeding', [AdminSetupController::class, 'add_court_proceeding'])->name('add-court-proceeding');
    Route::post('save-court-proceeding', [AdminSetupController::class, 'save_court_proceeding'])->name('save-court-proceeding');
    Route::get('edit-court-proceeding/{id}', [AdminSetupController::class, 'edit_court_proceeding'])->name('edit-court-proceeding');
    Route::post('update-court-proceeding/{id}', [AdminSetupController::class, 'update_court_proceeding'])->name('update-court-proceeding');
    Route::post('delete-court-proceeding/{id}', [AdminSetupController::class, 'delete_court_proceeding'])->name('delete-court-proceeding');

    Route::get('day-notes', [AdminSetupController::class, 'day_notes'])->name('day-notes');
    Route::get('add-day-notes', [AdminSetupController::class, 'add_day_notes'])->name('add-day-notes');
    Route::post('save-day-notes', [AdminSetupController::class, 'save_day_notes'])->name('save-day-notes');
    Route::get('edit-day-notes/{id}', [AdminSetupController::class, 'edit_day_notes'])->name('edit-day-notes');
    Route::post('update-day-notes/{id}', [AdminSetupController::class, 'update_day_notes'])->name('update-day-notes');
    Route::post('delete-day-notes/{id}', [AdminSetupController::class, 'delete_day_notes'])->name('delete-day-notes');

    Route::get('in-favour-of', [AdminSetupController::class, 'in_favour_of'])->name('in-favour-of');
    Route::get('add-in-favour-of', [AdminSetupController::class, 'add_in_favour_of'])->name('add-in-favour-of');
    Route::post('save-in-favour-of', [AdminSetupController::class, 'save_in_favour_of'])->name('save-in-favour-of');
    Route::get('edit-in-favour-of/{id}', [AdminSetupController::class, 'edit_in_favour_of'])->name('edit-in-favour-of');
    Route::post('update-in-favour-of/{id}', [AdminSetupController::class, 'update_in_favour_of'])->name('update-in-favour-of');
    Route::post('delete-in-favour-of/{id}', [AdminSetupController::class, 'delete_in_favour_of'])->name('delete-in-favour-of');

    Route::get('referrer', [AdminSetupController::class, 'referrer'])->name('referrer');
    Route::get('add-referrer', [AdminSetupController::class, 'add_referrer'])->name('add-referrer');
    Route::post('save-referrer', [AdminSetupController::class, 'save_referrer'])->name('save-referrer');
    Route::get('edit-referrer/{id}', [AdminSetupController::class, 'edit_referrer'])->name('edit-referrer');
    Route::post('update-referrer/{id}', [AdminSetupController::class, 'update_referrer'])->name('update-referrer');
    Route::post('delete-referrer/{id}', [AdminSetupController::class, 'delete_referrer'])->name('delete-referrer');

    Route::get('party', [AdminSetupController::class, 'party'])->name('party');
    Route::get('add-party', [AdminSetupController::class, 'add_party'])->name('add-party');
    Route::post('save-party', [AdminSetupController::class, 'save_party'])->name('save-party');
    Route::get('edit-party/{id}', [AdminSetupController::class, 'edit_party'])->name('edit-party');
    Route::post('update-party/{id}', [AdminSetupController::class, 'update_party'])->name('update-party');
    Route::post('delete-party/{id}', [AdminSetupController::class, 'delete_party'])->name('delete-party');

    Route::get('client', [AdminSetupController::class, 'client'])->name('client');
    Route::get('add-client', [AdminSetupController::class, 'add_client'])->name('add-client');
    Route::post('save-client', [AdminSetupController::class, 'save_client'])->name('save-client');
    Route::get('edit-client/{id}', [AdminSetupController::class, 'edit_client'])->name('edit-client');
    Route::post('update-client/{id}', [AdminSetupController::class, 'update_client'])->name('update-client');
    Route::post('delete-client/{id}', [AdminSetupController::class, 'delete_client'])->name('delete-client');

    Route::get('client-name', [AdminSetupController::class, 'client_name'])->name('client-name');
    Route::get('add-client-name', [AdminSetupController::class, 'add_client_name'])->name('add-client-name');
    Route::post('save-client-name', [AdminSetupController::class, 'save_client_name'])->name('save-client-name');
    Route::get('edit-client-name/{id}', [AdminSetupController::class, 'edit_client_name'])->name('edit-client-name');
    Route::post('update-client-name/{id}', [AdminSetupController::class, 'update_client_name'])->name('update-client-name');
    Route::post('delete-client-name/{id}', [AdminSetupController::class, 'delete_client_name'])->name('delete-client-name');

    Route::get('profession', [AdminSetupController::class, 'profession'])->name('profession');
    Route::get('add-profession', [AdminSetupController::class, 'add_profession'])->name('add-profession');
    Route::post('save-profession', [AdminSetupController::class, 'save_profession'])->name('save-profession');
    Route::get('edit-profession/{id}', [AdminSetupController::class, 'edit_profession'])->name('edit-profession');
    Route::post('update-profession/{id}', [AdminSetupController::class, 'update_profession'])->name('update-profession');
    Route::post('delete-profession/{id}', [AdminSetupController::class, 'delete_profession'])->name('delete-profession');

    Route::get('documents-setup', [AdminSetupController::class, 'documents'])->name('documents-setup');
    Route::get('add-documents-setup', [AdminSetupController::class, 'add_documents'])->name('add-documents-setup');
    Route::post('save-documents-setup', [AdminSetupController::class, 'save_documents'])->name('save-documents-setup');
    Route::get('edit-documents-setup/{id}', [AdminSetupController::class, 'edit_documents'])->name('edit-documents-setup');
    Route::post('update-documents-setup/{id}', [AdminSetupController::class, 'update_documents'])->name('update-documents-setup');
    Route::post('delete-documents-setup/{id}', [AdminSetupController::class, 'delete_documents'])->name('delete-documents-setup');

    Route::get('documents-type', [AdminSetupController::class, 'documents_type'])->name('documents-type');
    Route::get('add-documents-type', [AdminSetupController::class, 'add_documents_type'])->name('add-documents-type');
    Route::post('save-documents-type', [AdminSetupController::class, 'save_documents_type'])->name('save-documents-type');
    Route::get('edit-documents-type/{id}', [AdminSetupController::class, 'edit_documents_type'])->name('edit-documents-type');
    Route::post('update-documents-type/{id}', [AdminSetupController::class, 'update_documents_type'])->name('update-documents-type');
    Route::post('delete-documents-type/{id}', [AdminSetupController::class, 'delete_documents_type'])->name('delete-documents-type');

    Route::get('case-title', [AdminSetupController::class, 'case_title'])->name('case-title');
    Route::get('add-case-title', [AdminSetupController::class, 'add_case_title'])->name('add-case-title');
    Route::post('save-case-title', [AdminSetupController::class, 'save_case_title'])->name('save-case-title');
    Route::get('edit-case-title/{id}', [AdminSetupController::class, 'edit_case_title'])->name('edit-case-title');
    Route::post('update-case-title/{id}', [AdminSetupController::class, 'update_case_title'])->name('update-case-title');
    Route::post('delete-case-title/{id}', [AdminSetupController::class, 'delete_case_title'])->name('delete-case-title');

    Route::get('opposition', [AdminSetupController::class, 'opposition'])->name('opposition');
    Route::get('add-opposition', [AdminSetupController::class, 'add_opposition'])->name('add-opposition');
    Route::post('save-opposition', [AdminSetupController::class, 'save_opposition'])->name('save-opposition');
    Route::get('edit-opposition/{id}', [AdminSetupController::class, 'edit_opposition'])->name('edit-opposition');
    Route::post('update-opposition/{id}', [AdminSetupController::class, 'update_opposition'])->name('update-opposition');
    Route::post('delete-opposition/{id}', [AdminSetupController::class, 'delete_opposition'])->name('delete-opposition');

    Route::get('complainant', [AdminSetupController::class, 'complainant'])->name('complainant');
    Route::get('add-complainant', [AdminSetupController::class, 'add_complainant'])->name('add-complainant');
    Route::post('save-complainant', [AdminSetupController::class, 'save_complainant'])->name('save-complainant');
    Route::get('edit-complainant/{id}', [AdminSetupController::class, 'edit_complainant'])->name('edit-complainant');
    Route::post('update-complainant/{id}', [AdminSetupController::class, 'update_complainant'])->name('update-complainant');
    Route::post('delete-complainant/{id}', [AdminSetupController::class, 'delete_complainant'])->name('delete-complainant');

    Route::get('accused', [AdminSetupController::class, 'accused'])->name('accused');
    Route::get('add-accused', [AdminSetupController::class, 'add_accused'])->name('add-accused');
    Route::post('save-accused', [AdminSetupController::class, 'save_accused'])->name('save-accused');
    Route::get('edit-accused/{id}', [AdminSetupController::class, 'edit_accused'])->name('edit-accused');
    Route::post('update-accused/{id}', [AdminSetupController::class, 'update_accused'])->name('update-accused');
    Route::post('delete-accused/{id}', [AdminSetupController::class, 'delete_accused'])->name('delete-accused');

    Route::get('court-short', [AdminSetupController::class, 'court_short'])->name('court-short');
    Route::get('add-court-short', [AdminSetupController::class, 'add_court_short'])->name('add-court-short');
    Route::post('save-court-short', [AdminSetupController::class, 'save_court_short'])->name('save-court-short');
    Route::get('edit-court-short/{id}', [AdminSetupController::class, 'edit_court_short'])->name('edit-court-short');
    Route::post('update-court-short/{id}', [AdminSetupController::class, 'update_court_short'])->name('update-court-short');
    Route::post('delete-court-short/{id}', [AdminSetupController::class, 'delete_court_short'])->name('delete-court-short');

    Route::get('progress', [AdminSetupController::class, 'progress'])->name('progress');
    Route::get('add-progress', [AdminSetupController::class, 'add_progress'])->name('add-progress');
    Route::post('save-progress', [AdminSetupController::class, 'save_progress'])->name('save-progress');
    Route::get('edit-progress/{id}', [AdminSetupController::class, 'edit_progress'])->name('edit-progress');
    Route::post('update-progress/{id}', [AdminSetupController::class, 'update_progress'])->name('update-progress');
    Route::post('delete-progress/{id}', [AdminSetupController::class, 'delete_progress'])->name('delete-progress');

    Route::get('bill-particulars', [AdminSetupController::class, 'bill_particulars'])->name('bill-particulars');
    Route::get('add-bill-particulars', [AdminSetupController::class, 'add_bill_particulars'])->name('add-bill-particulars');
    Route::post('save-bill-particulars', [AdminSetupController::class, 'save_bill_particulars'])->name('save-bill-particulars');
    Route::get('edit-bill-particulars/{id}', [AdminSetupController::class, 'edit_bill_particulars'])->name('edit-bill-particulars');
    Route::post('update-bill-particulars/{id}', [AdminSetupController::class, 'update_bill_particulars'])->name('update-bill-particulars');
    Route::post('delete-bill-particulars/{id}', [AdminSetupController::class, 'delete_bill_particulars'])->name('delete-bill-particulars');

    Route::get('particulars', [AdminSetupController::class, 'particulars'])->name('particulars');
    Route::get('add-particulars', [AdminSetupController::class, 'add_particulars'])->name('add-particulars');
    Route::post('save-particulars', [AdminSetupController::class, 'save_particulars'])->name('save-particulars');
    Route::get('edit-particulars/{id}', [AdminSetupController::class, 'edit_particulars'])->name('edit-particulars');
    Route::post('update-particulars/{id}', [AdminSetupController::class, 'update_particulars'])->name('update-particulars');
    Route::post('delete-particulars/{id}', [AdminSetupController::class, 'delete_particulars'])->name('delete-particulars');

    Route::get('bill-schedule', [AdminSetupController::class, 'bill_schedule'])->name('bill-schedule');
    Route::get('add-bill-schedule', [AdminSetupController::class, 'add_bill_schedule'])->name('add-bill-schedule');
    Route::post('save-bill-schedule', [AdminSetupController::class, 'save_bill_schedule'])->name('save-bill-schedule');
    Route::get('edit-bill-schedule/{id}', [AdminSetupController::class, 'edit_bill_schedule'])->name('edit-bill-schedule');
    Route::post('update-bill-schedule/{id}', [AdminSetupController::class, 'update_bill_schedule'])->name('update-bill-schedule');
    Route::post('delete-bill-schedule/{id}', [AdminSetupController::class, 'delete_bill_schedule'])->name('delete-bill-schedule');

    Route::get('payment-mode', [AdminSetupController::class, 'payment_mode'])->name('payment-mode');
    Route::get('add-payment-mode', [AdminSetupController::class, 'add_payment_mode'])->name('add-payment-mode');
    Route::post('save-payment-mode', [AdminSetupController::class, 'save_payment_mode'])->name('save-payment-mode');
    Route::get('edit-payment-mode/{id}', [AdminSetupController::class, 'edit_payment_mode'])->name('edit-payment-mode');
    Route::post('update-payment-mode/{id}', [AdminSetupController::class, 'update_payment_mode'])->name('update-payment-mode');
    Route::post('delete-payment-mode/{id}', [AdminSetupController::class, 'delete_payment_mode'])->name('delete-payment-mode');

    Route::get('group', [AdminSetupController::class, 'group'])->name('group');
    Route::get('add-group', [AdminSetupController::class, 'add_group'])->name('add-group');
    Route::post('save-group', [AdminSetupController::class, 'save_group'])->name('save-group');
    Route::get('edit-group/{id}', [AdminSetupController::class, 'edit_group'])->name('edit-group');
    Route::post('update-group/{id}', [AdminSetupController::class, 'update_group'])->name('update-group');
    Route::post('delete-group/{id}', [AdminSetupController::class, 'delete_group'])->name('delete-group');

    Route::get('cabinet', [AdminSetupController::class, 'cabinet'])->name('cabinet');
    Route::get('add-cabinet', [AdminSetupController::class, 'add_cabinet'])->name('add-cabinet');
    Route::post('save-cabinet', [AdminSetupController::class, 'save_cabinet'])->name('save-cabinet');
    Route::get('edit-cabinet/{id}', [AdminSetupController::class, 'edit_cabinet'])->name('edit-cabinet');
    Route::post('update-cabinet/{id}', [AdminSetupController::class, 'update_cabinet'])->name('update-cabinet');
    Route::post('delete-cabinet/{id}', [AdminSetupController::class, 'delete_cabinet'])->name('delete-cabinet');

    Route::get('civil-cases', [CivilCasesController::class, 'civil_cases'])->name('civil-cases');
    Route::get('add-civil-cases', [CivilCasesController::class, 'add_civil_cases'])->name('add-civil-cases');
    Route::post('save-civil-cases', [CivilCasesController::class, 'save_civil_cases'])->name('save-civil-cases');
    Route::get('edit-civil-cases/{id}', [CivilCasesController::class, 'edit_civil_cases'])->name('edit-civil-cases');
    Route::post('update-civil-cases/{id}', [CivilCasesController::class, 'update_civil_cases'])->name('update-civil-cases');
    Route::post('delete-civil-cases/{id}', [CivilCasesController::class, 'delete_civil_cases'])->name('delete-civil-cases');
    Route::get('view-civil-cases/{id}', [CivilCasesController::class, 'view_civil_cases'])->name('view-civil-cases');
    Route::get('download-civil-cases-files/{id}', [CivilCasesController::class, 'download_civil_cases_file'])->name('download-civil-cases-files');
    Route::post('update-civil-cases-status/{id}', [CivilCasesController::class, 'update_civil_cases_status'])->name('update-civil-cases-status');
    Route::post('search-civil-cases', [CivilCasesController::class, 'search_civil_cases'])->name('search_civil_cases');


    Route::get('/find-associates', [CivilCasesController::class, 'find_associates'])->name('find-associates');
    Route::get('/find-district', [CivilCasesController::class, 'find_district'])->name('find_district');

    //special court cases
    Route::get('special-court-cases-all', [CriminalCasesController::class, 'special_court_cases_all'])->name('special-court-cases-all');
    Route::get('special-court-cases-civil', [CriminalCasesController::class, 'special_court_cases_civil'])->name('special-court-cases-civil');
    Route::get('special-court-cases-criminal', [CriminalCasesController::class, 'special_court_cases_criminal'])->name('special-court-cases-criminal');
    //all court cases
    Route::get('all-cases', [CriminalCasesController::class, 'all_cases'])->name('all-cases');
    Route::get('all-civil-cases', [CriminalCasesController::class, 'all_civil_cases'])->name('all-civil-cases');
    Route::get('all-criminal-cases', [CriminalCasesController::class, 'all_criminal_cases'])->name('all-criminal-cases');

    // Criminal cases latest list

    Route::get('criminal-cases-latest', [CriminalCasesController::class, 'criminal_cases_latest'])->name('criminal-cases-latest');
    Route::get('civil-cases-latest', [CriminalCasesController::class, 'civil_cases_latest'])->name('civil-cases-latest');


    Route::get('criminal-cases', [CriminalCasesController::class, 'criminal_cases'])->name('criminal-cases');
    Route::get('add-criminal-cases', [CriminalCasesController::class, 'add_criminal_cases'])->name('add-criminal-cases');
    Route::post('save-criminal-cases', [CriminalCasesController::class, 'save_criminal_cases'])->name('save-criminal-cases');
    Route::post('upload-criminal-cases-files/{id}', [CriminalCasesController::class, 'upload_criminal_cases_files'])->name('upload-criminal-cases-files');
    Route::post('upload-criminal-cases-working-doc-files/{id}', [CriminalCasesController::class, 'upload_criminal_cases_working_doc_files'])->name('upload-criminal-cases-working-doc-files');
    Route::post('update-criminal-cases-files/{id}', [CriminalCasesController::class, 'update_criminal_cases_files'])->name('update-criminal-cases-files');
    Route::post('update-criminal-cases-working-doc/{id}', [CriminalCasesController::class, 'update_criminal_cases_working_doc'])->name('update-criminal-cases-working-doc');
    Route::get('edit-criminal-cases-files/{id}', [CriminalCasesController::class, 'edit_criminal_cases_files'])->name('edit-criminal-cases-files');
    Route::get('edit-criminal-cases-working-docs/{id}', [CriminalCasesController::class, 'edit_criminal_cases_working_docs'])->name('edit-criminal-cases-working-docs');
    Route::get('edit-criminal-cases/{id}', [CriminalCasesController::class, 'edit_criminal_cases'])->name('edit-criminal-cases');
    Route::post('update-criminal-cases/{id}', [CriminalCasesController::class, 'update_criminal_cases'])->name('update-criminal-cases');
    Route::post('update-criminal-case/{id}', [CriminalCasesController::class, 'update_criminal_case'])->name('update-criminal-case');
    Route::post('update-criminal-case-opp-lawyer/{id}', [CriminalCasesController::class, 'update_criminal_case_opp_lawyer'])->name('update-criminal-case_opp_lawyer');
    Route::post('delete-criminal-cases/{id}', [CriminalCasesController::class, 'delete_criminal_cases'])->name('delete-criminal-cases');
    Route::get('delete-criminal-cases-latest/{id}', [CriminalCasesController::class, 'delete_criminal_cases_latest'])->name('delete-criminal-cases-latest');
    Route::get('view-criminal-cases/{id}', [CriminalCasesController::class, 'view_criminal_cases'])->name('view-criminal-cases');
    Route::get('find-case-type/{type}', [CriminalCasesController::class, 'case_type'])->name('find-case-type');
    Route::get('download-criminal-cases-files/{id}', [CriminalCasesController::class, 'download_criminal_cases_file'])->name('download-criminal-cases-files');
    Route::get('download-criminal-cases-working-doc/{id}', [CriminalCasesController::class, 'download_criminal_cases_working_doc'])->name('download-criminal-cases-working-doc');
    Route::get('view-criminal-cases-files/{id}', [CriminalCasesController::class, 'view_criminal_cases_file'])->name('view-criminal-cases-files');
    Route::get('view-criminal-cases-working-docs/{id}', [CriminalCasesController::class, 'view_criminal_cases_working_docs'])->name('view-criminal-cases-working-docs');
    Route::post('delete-criminal-cases-working-docs/{id}', [CriminalCasesController::class, 'delete_criminal_cases_working_docs'])->name('delete-criminal-cases-working-docs');
    Route::post('delete-criminal-cases-files/{id}', [CriminalCasesController::class, 'delete_criminal_cases_file'])->name('delete-criminal-cases-files');
    Route::post('update-criminal-cases-status/{id}', [CriminalCasesController::class, 'update_criminal_cases_status'])->name('update-criminal-cases-status');
    Route::post('update-criminal-cases-activity/{id}', [CriminalCasesController::class, 'update_criminal_cases_activity'])->name('update-criminal-cases-activity');
    Route::post('search-criminal-cases', [CriminalCasesController::class, 'search_criminal_cases'])->name('search-criminal-cases');
    Route::get('advanced-search-criminal-cases', [CriminalCasesController::class, 'advanced_search_criminal_cases'])->name('advanced-search-criminal-cases');
    Route::post('delete-criminal-cases-status/{id}', [CriminalCasesController::class, 'delete_criminal_cases_status'])->name('delete-criminal-cases-status');
    Route::get('edit_criminal_cases_status/{id}', [CriminalCasesController::class, 'edit_criminal_cases_status'])->name('edit-criminal-cases-status');
    Route::post('update-criminal-cases-status-logs/{id}', [CriminalCasesController::class, 'update_criminal_cases_status_logs'])->name('update-criminal-cases-status-logs');
    Route::post('delete-criminal-cases-activity/{id}', [CriminalCasesController::class, 'delete_criminal_cases_activity'])->name('delete-criminal-cases-activity');
    Route::get('edit_criminal_cases_activity/{id}', [CriminalCasesController::class, 'edit_criminal_cases_activity'])->name('edit-criminal-cases-activity');
    Route::get('view-criminal-cases-proceedings/{id}', [CriminalCasesController::class, 'view_criminal_cases_proceedings'])->name('view-criminal-cases-proceedings');
    Route::get('view-criminal-cases-activity/{id}', [CriminalCasesController::class, 'view_criminal_cases_activity'])->name('view-criminal-cases-activity');
    Route::post('update-criminal-cases-activity-logs/{id}', [CriminalCasesController::class, 'update_criminal_cases_activity_logs'])->name('update-criminal-cases-activity-logs');
    Route::get('case-porceedings-print-preview/{id}', [CriminalCasesController::class, 'case_porceedings_print_preview'])->name('case-porceedings-print-preview');
    Route::get('billings-log-print-preview/{id}', [CriminalCasesController::class, 'billings_log_print_preview'])->name('billings-log-print-preview');
    Route::get('switch-log-print-preview/{id}', [CriminalCasesController::class, 'switch_log_print_preview'])->name('switch-log-print-preview');
    Route::get('criminal-case-print-preview/{id}', [CriminalCasesController::class, 'criminal_case_print_preview'])->name('criminal-case-print-preview');
    Route::get('billings-print-preview/{id}', [CriminalCasesController::class, 'billings_print_preview'])->name('billings-print-preview');
    Route::post('send-messages-for-criminal-cases/{id}', [CriminalCasesController::class, 'send_messages_for_criminal_cases'])->name('send-messages-for-criminal-cases');
    Route::post('criminal-cases-switch', [CriminalCasesController::class, 'criminal_cases_switch'])->name('criminal-cases-switch');
    Route::post('update-criminal-cases-status-column/{id}', [CriminalCasesController::class, 'update_criminal_cases_status_column'])->name('update-criminal-cases-status-column');
    Route::get('view-criminal-cases-read-notifications/{id}', [CriminalCasesController::class, 'view_criminal_cases_read_notifications'])->name('view-criminal-cases-read-notifications');

    Route::get('labour-cases', [LabourCasesController::class, 'labour_cases'])->name('labour-cases');
    Route::get('add-labour-cases', [LabourCasesController::class, 'add_labour_cases'])->name('add-labour-cases');
    Route::post('save-labour-cases', [LabourCasesController::class, 'save_labour_cases'])->name('save-labour-cases');
    Route::get('edit-labour-cases/{id}', [LabourCasesController::class, 'edit_labour_cases'])->name('edit-labour-cases');
    Route::post('update-labour-cases/{id}', [LabourCasesController::class, 'update_labour_cases'])->name('update-labour-cases');
    Route::post('delete-labour-cases/{id}', [LabourCasesController::class, 'delete_labour_cases'])->name('delete-labour-cases');
    Route::get('view-labour-cases/{id}', [LabourCasesController::class, 'view_labour_cases'])->name('view-labour-cases');
    Route::get('download-labour-cases-files/{id}', [LabourCasesController::class, 'download_labour_cases_file'])->name('download-labour-cases-files');
    Route::post('update-labour-cases-status/{id}', [LabourCasesController::class, 'update_labour_cases_status'])->name('update-labour-cases-status');
    Route::post('search-labour-cases', [LabourCasesController::class, 'search_labour_cases'])->name('search-labour-cases');

    Route::get('quassi-judicial-cases', [QuassiJudicialCasesController::class, 'quassi_judicial_cases'])->name('quassi-judicial-cases');
    Route::get('add-quassi-judicial-cases', [QuassiJudicialCasesController::class, 'add_quassi_judicial_cases'])->name('add-quassi-judicial-cases');
    Route::post('save-quassi-judicial-cases', [QuassiJudicialCasesController::class, 'save_quassi_judicial_cases'])->name('save-quassi-judicial-cases');
    Route::get('edit-quassi-judicial-cases/{id}', [QuassiJudicialCasesController::class, 'edit_quassi_judicial_cases'])->name('edit-quassi-judicial-cases');
    Route::post('update-quassi-judicial-cases/{id}', [QuassiJudicialCasesController::class, 'update_quassi_judicial_cases'])->name('update-quassi-judicial-cases');
    Route::post('delete-quassi-judicial-cases/{id}', [QuassiJudicialCasesController::class, 'delete_quassi_judicial_cases'])->name('delete-quassi-judicial-cases');
    Route::get('view-quassi-judicial-cases/{id}', [QuassiJudicialCasesController::class, 'view_quassi_judicial_cases'])->name('view-quassi-judicial-cases');
    Route::get('download-quassi-judicial-cases-files/{id}', [QuassiJudicialCasesController::class, 'download_quassi_judicial_cases_file'])->name('download-quassi-judicial-cases-files');
    Route::post('update-quassi-judicial-cases-status/{id}', [QuassiJudicialCasesController::class, 'update_quassi_judicial_cases_status'])->name('update-quassi-judicial-cases-status');
    Route::post('search-quassi-judicial-cases', [QuassiJudicialCasesController::class, 'search_quassi_judicial_cases'])->name('search-quassi-judicial-cases');

    Route::get('supreme-court-cases', [SupremeCourtCasesController::class, 'supreme_court_cases'])->name('supreme-court-cases');
    Route::get('add-supreme-court-cases', [SupremeCourtCasesController::class, 'add_supreme_court_cases'])->name('add-supreme-court-cases');
    Route::post('save-supreme-court-cases', [SupremeCourtCasesController::class, 'save_supreme_court_cases'])->name('save-supreme-court-cases');
    Route::get('edit-supreme-court-cases/{id}', [SupremeCourtCasesController::class, 'edit_supreme_court_cases'])->name('edit-supreme-court-cases');
    Route::post('update-supreme-court-cases/{id}', [SupremeCourtCasesController::class, 'update_supreme_court_cases'])->name('update-supreme-court-cases');
    Route::post('delete-supreme-court-cases/{id}', [SupremeCourtCasesController::class, 'delete_supreme_court_cases'])->name('delete-supreme-court-cases');
    Route::get('view-supreme-court-cases/{id}', [SupremeCourtCasesController::class, 'view_supreme_court_cases'])->name('view-supreme-court-cases');
    Route::get('download-supreme-court-cases-files/{id}', [SupremeCourtCasesController::class, 'download_supreme_court_cases_file'])->name('download-supreme-court-cases-files');
    Route::post('update-supreme-court-cases-status/{id}', [SupremeCourtCasesController::class, 'update_supreme_court_cases_status'])->name('update-supreme-court-cases-status');

    Route::get('high-court-cases', [HighCourtCasesController::class, 'high_court_cases'])->name('high-court-cases');
    Route::get('add-high-court-cases', [HighCourtCasesController::class, 'add_high_court_cases'])->name('add-high-court-cases');
    Route::post('save-high-court-cases', [HighCourtCasesController::class, 'save_high_court_cases'])->name('save-high-court-cases');
    Route::get('edit-high-court-cases/{id}', [HighCourtCasesController::class, 'edit_high_court_cases'])->name('edit-high-court-cases');
    Route::post('update-high-court-cases/{id}', [HighCourtCasesController::class, 'update_high_court_cases'])->name('update-high-court-cases');
    Route::post('delete-high-court-cases/{id}', [HighCourtCasesController::class, 'delete_high_court_cases'])->name('delete-high-court-cases');
    Route::get('view-high-court-cases/{id}', [HighCourtCasesController::class, 'view_high_court_cases'])->name('view-high-court-cases');
    Route::get('download-high-court-cases-files/{id}', [HighCourtCasesController::class, 'download_high_court_cases_file'])->name('download-high-court-cases-files');
    Route::post('update-high-court-cases-status/{id}', [HighCourtCasesController::class, 'update_high_court_cases_status'])->name('update-high-court-cases-status');
    Route::post('search-high-court-cases', [HighCourtCasesController::class, 'search_high_court_cases'])->name('search-high-court-cases');

    Route::get('appellate-court-cases', [AppellateCourtCasesController::class, 'appellate_court_cases'])->name('appellate-court-cases');
    Route::get('add-appellate-court-cases', [AppellateCourtCasesController::class, 'add_appellate_court_cases'])->name('add-appellate-court-cases');
    Route::post('save-appellate-court-cases', [AppellateCourtCasesController::class, 'save_appellate_court_cases'])->name('save-appellate-court-cases');
    Route::get('edit-appellate-court-cases/{id}', [AppellateCourtCasesController::class, 'edit_appellate_court_cases'])->name('edit-appellate-court-cases');
    Route::post('update-appellate-court-cases/{id}', [AppellateCourtCasesController::class, 'update_appellate_court_cases'])->name('update-appellate-court-cases');
    Route::post('delete-appellate-court-cases/{id}', [AppellateCourtCasesController::class, 'delete_appellate_court_cases'])->name('delete-appellate-court-cases');
    Route::get('view-appellate-court-cases/{id}', [AppellateCourtCasesController::class, 'view_appellate_court_cases'])->name('view-appellate-court-cases');
    Route::get('download-appellate-court-cases-files/{id}', [AppellateCourtCasesController::class, 'download_appellate_court_cases_file'])->name('download-appellate-court-cases-files');
    Route::post('update-appellate-court-cases-status/{id}', [AppellateCourtCasesController::class, 'update_appellate_court_cases_status'])->name('update-appellate-court-cases-status');
    Route::post('search-appellate-court-cases', [AppellateCourtCasesController::class, 'search_appellate_court_cases'])->name('search-appellate-court-cases');

    Route::get('billing', [BillingsController::class, 'billing'])->name('billing');
    Route::get('billing-report', [BillingsController::class, 'billing_report'])->name('billing-report');
    Route::get('billing-report-search', [BillingsController::class, 'billing_report_search'])->name('billing-report-search');
    Route::get('add-billing', [BillingsController::class, 'add_billing'])->name('add-billing');
    Route::get('/find-bank-branch', [BillingsController::class, 'find_bank_branch'])->name('find-bank-branch');
    Route::get('/find-case-no', [BillingsController::class, 'find_case_no'])->name('find-case-no');
    Route::post('/save-billing', [BillingsController::class, 'save_billing'])->name('save-billing');
    Route::get('/edit-billing/{id}', [BillingsController::class, 'edit_billing'])->name('edit-billing');
    Route::post('/update-billing/{id}', [BillingsController::class, 'update_billing'])->name('update-billing');
    Route::get('add-billing-civil-cases/{id}', [BillingsController::class, 'add_billing_civil_cases'])->name('add-billing-civil-cases');
    Route::get('add-billing-criminal-cases/{id}', [BillingsController::class, 'add_billing_criminal_cases'])->name('add-billing-criminal-cases');
    Route::get('add-criminal-cases-billling/{id}', [BillingsController::class, 'add_criminal_cases_billling'])->name('add-criminal-cases-billling');
    Route::get('edit-criminal-cases-billing/{id}', [BillingsController::class, 'edit_criminal_cases_billing'])->name('edit-criminal-cases-billing');
    Route::post('delete-criminal-cases-billing/{id}', [BillingsController::class, 'delete_criminal_cases_billing'])->name('delete-criminal-cases-billing');
    Route::post('update-criminal-cases-billing-submit/{id}', [BillingsController::class, 'update_criminal_cases_billing_submit'])->name('update-criminal-cases-billing-submit');
    Route::post('save-criminal-cases-billing/{id}', [BillingsController::class, 'save_criminal_cases_billing'])->name('save-criminal-cases-billing');
    Route::post('delete-billing/{id}', [BillingsController::class, 'delete_billing'])->name('delete-billing');
    Route::get('add-billing-labour-cases/{id}', [BillingsController::class, 'add_billing_labour_cases'])->name('add-billing-labour-cases');
    Route::get('add-billing-quassi-judicial-cases/{id}', [BillingsController::class, 'add_billing_quassi_judicial_cases'])->name('add-billing-quassi-judicial-cases');
    Route::get('add-billing-supreme-court-cases/{id}', [BillingsController::class, 'add_billing_supreme_court_cases'])->name('add-billing-supreme-court-cases');
    Route::get('add-billing-high-court-cases/{id}', [BillingsController::class, 'add_billing_high_court_cases'])->name('add-billing-high-court-cases');
    Route::get('add-billing-appellate-court-cases/{id}', [BillingsController::class, 'add_billing_appellate_court_cases'])->name('add-billing-appellate-court-cases');
    Route::post('search-case-billings', [BillingsController::class, 'search_case_billings'])->name('search-case-billings');
    Route::get('billings', [BillingsController::class, 'billings'])->name('billings');
    Route::get('view-billing/{id}', [BillingsController::class, 'view_billing'])->name('view-billing');
    Route::get('/edit-billings/{id}', [BillingsController::class, 'edit_billings'])->name('edit-billings');
    Route::get('view-money-receipt/{id}', [BillingsController::class, 'view_money_receipt'])->name('view-money-receipt');
    Route::get('money-receipt-print-preview/{id}', [BillingsController::class, 'money_receipt_print_preview'])->name('money-receipt-print-preview');

    Route::get('add-billing-from-district-court/{id}', [BillingsController::class, 'add_billing_from_district_court'])->name('add-billing-from-district-court');

    // thana setup

    Route::get('land-information', [LandInfoController::class, 'land_information'])->name('land-information');
    Route::get('add-land-information', [LandInfoController::class, 'add_land_information'])->name('add-land-information');
    Route::post('save-land-information', [LandInfoController::class, 'save_land_information'])->name('save-land-information');
    Route::get('edit-land-information/{id}', [LandInfoController::class, 'edit_land_information'])->name('edit-land-information');
    Route::post('delete-land-information/{id}', [LandInfoController::class, 'delete_land_information'])->name('delete-land-information');
    Route::post('update-land-information/{id}', [LandInfoController::class, 'update_land_information'])->name('update-land-information');
    Route::get('view-land-information/{id}', [LandInfoController::class, 'view_land_information'])->name('view-land-information');
    Route::get('download-land-information-files/{id}', [LandInfoController::class, 'download_land_information_files'])->name('download-land-information-files');
    Route::post('search-land-information', [LandInfoController::class, 'search_land_information'])->name('search-land-information');

    Route::get('flat-information', [FlatInfoController::class, 'flat_information'])->name('flat-information');
    Route::get('add-flat-information', [FlatInfoController::class, 'add_flat_information'])->name('add-flat-information');
    Route::post('save-flat-information', [FlatInfoController::class, 'save_flat_information'])->name('save-flat-information');
    Route::get('edit-flat-information/{id}', [FlatInfoController::class, 'edit_flat_information'])->name('edit-flat-information');
    Route::post('delete-flat-information/{id}', [FlatInfoController::class, 'delete_flat_information'])->name('delete-flat-information');
    Route::post('update-flat-information/{id}', [FlatInfoController::class, 'update_flat_information'])->name('update-flat-information');
    Route::get('view-flat-information/{id}', [FlatInfoController::class, 'view_flat_information'])->name('view-flat-information');
    Route::get('download-flat-information-files/{id}', [FlatInfoController::class, 'download_flat_information_files'])->name('download-flat-information-files');
    Route::post('search-flat-information', [FlatInfoController::class, 'search_flat_information'])->name('search-flat-information');

    Route::get('/find-thana', [LandInfoController::class, 'find_thana'])->name('find-thana');
    Route::get('/find-case-infos-thana', [LandInfoController::class, 'find_case_infos_thana'])->name('find-case-infos-thana');
    Route::get('/find-seller-details', [LandInfoController::class, 'find_seller_details'])->name('find-seller-details');
    Route::get('/find-buyer-details', [LandInfoController::class, 'find_buyer_details'])->name('find-buyer-details');
    Route::get('/find-flat-number', [FlatInfoController::class, 'find_flat_number'])->name('find-flat-number');

    Route::get('regulatory-compliance', [RegulatoryComplianceController::class, 'regulatory_compliance'])->name('regulatory-compliance');
    Route::get('add-regulatory-compliance', [RegulatoryComplianceController::class, 'add_regulatory_compliance'])->name('add-regulatory-compliance');
    Route::post('save-regulatory-compliance', [RegulatoryComplianceController::class, 'save_regulatory_compliance'])->name('save-regulatory-compliance');
    Route::get('edit-regulatory-compliance/{id}', [RegulatoryComplianceController::class, 'edit_regulatory_compliance'])->name('edit-regulatory-compliance');
    Route::post('delete-regulatory-compliance/{id}', [RegulatoryComplianceController::class, 'delete_regulatory_compliance'])->name('delete-regulatory-compliance');
    Route::post('update-regulatory-compliance/{id}', [RegulatoryComplianceController::class, 'update_regulatory_compliance'])->name('update-regulatory-compliance');
    Route::get('view-regulatory-compliance/{id}', [RegulatoryComplianceController::class, 'view_regulatory_compliance'])->name('view-regulatory-compliance');
    Route::post('search-regulatory-compliance', [RegulatoryComplianceController::class, 'search_regulatory_compliance'])->name('search-regulatory-compliance');

    Route::get('social-compliance', [SocialComplianceController::class, 'social_compliance'])->name('social-compliance');
    Route::get('add-social-compliance', [SocialComplianceController::class, 'add_social_compliance'])->name('add-social-compliance');
    Route::post('save-social-compliance', [SocialComplianceController::class, 'save_social_compliance'])->name('save-social-compliance');
    Route::get('edit-social-compliance/{id}', [SocialComplianceController::class, 'edit_social_compliance'])->name('edit-social-compliance');
    Route::post('delete-social-compliance/{id}', [SocialComplianceController::class, 'delete_social_compliance'])->name('delete-social-compliance');
    Route::post('update-social-compliance/{id}', [SocialComplianceController::class, 'update_social_compliance'])->name('update-social-compliance');
    Route::get('view-social-compliance/{id}', [SocialComplianceController::class, 'view_social_compliance'])->name('view-social-compliance');
    Route::post('search-social-compliance', [SocialComplianceController::class, 'search_social_compliance'])->name('search-social-compliance');

    Route::get('document-management', [DocManagementController::class, 'document_management'])->name('document-management');
    Route::get('add-documents', [DocManagementController::class, 'add_documents'])->name('add-documents');
    Route::get('find-admin-setup', [DocManagementController::class, 'find_admin_setup'])->name('find-admin-setup');
    Route::get('find-litigation-cases', [DocManagementController::class, 'find_litigation_cases'])->name('find-litigation-cases');
    Route::get('find-property-management', [DocManagementController::class, 'find_property_management'])->name('find-property-management');
    Route::post('save-document', [DocManagementController::class, 'save_document'])->name('save-document');
    Route::get('download-external-files/{id}', [DocManagementController::class, 'download_external_files'])->name('download-external-files');
    Route::get('external-document', [DocManagementController::class, 'external_document'])->name('external-document');

    Route::get('find-case-subcategory', [HighCourtCasesController::class, 'find_case_subcategory'])->name('find-case-subcategory');
    // Route::get('find-case-type',[HighCourtCasesController::class, 'find_case_type'])->name('find-case-type');
    Route::get('litigation-calender-list-print/{date}', [LitigationCalenderController::class, 'print_litigation_calender_list'])->name('litigation-calender-print');
    Route::get('litigation-calender-list', [LitigationCalenderController::class, 'litigation_calender_list'])->name('litigation-calender-list');
    Route::get('litigation-calender-short', [LitigationCalenderController::class, 'litigation_calender_short'])->name('litigation-calender-short');
    Route::get('litigation-calender-short-court-wise', [LitigationCalenderController::class, 'litigation_calender_short_court_wise'])->name('litigation-calender-short-court-wise');
    Route::get('search-litigation-calendar', [LitigationCalenderController::class, 'search_litigation_calendar'])->name('search-litigation-calendar');
    Route::post('search-litigation-calendar-short', [LitigationCalenderController::class, 'search_litigation_calendar_short'])->name('search-litigation-calendar-short');
    Route::get('search-case-pages', [LitigationCalenderController::class, 'search_case_pages'])->name('search-case-pages');
    Route::get('search-cases', [LitigationCalenderController::class, 'search_cases'])->name('search-cases');
    Route::post('calendar-short-next-previous', [LitigationCalenderController::class, 'calendar_short_next_previous'])->name('calendar-short-next-previous');
    Route::post('calendar-short-next', [LitigationCalenderController::class, 'calendar_short_next'])->name('calendar-short-next');
    Route::post('calendar-list-arrow-up', [LitigationCalenderController::class, 'calendar_list_arrow_up'])->name('calendar-list-arrow-up');
    Route::post('calendar-list-arrow-down', [LitigationCalenderController::class, 'calendar_list_arrow_down'])->name('calendar-list-arrow-down');
    Route::get('litigation-calendar-list-print-preview', [LitigationCalenderController::class, 'litigation_calendar_list_print_preview'])->name('litigation-calendar-list-print-preview');
    Route::get('litigation-calendar-list-print-preview-search/{param1}/{param2}', [LitigationCalenderController::class, 'litigation_calendar_list_print_preview_search'])->name('litigation-calendar-list-print-preview-search');

    Route::get('chamber', [CounselLawyerController::class, 'index'])->name('chamber');
    Route::get('add-chamber', [CounselLawyerController::class, 'create'])->name('add-chamber');
    Route::post('save-chamber', [CounselLawyerController::class, 'store'])->name('save-chamber');
    Route::get('edit-chamber/{id}', [CounselLawyerController::class, 'edit'])->name('edit-chamber');
    Route::post('update-chamber/{id}', [CounselLawyerController::class, 'update'])->name('update-chamber');
    Route::post('delete-chamber/{id}', [CounselLawyerController::class, 'destroy'])->name('delete-chamber');


    Route::get('counsel', [CounselLawyerController::class, 'index_counsel'])->name('counsel');
    Route::get('counsel-chamber', [CounselLawyerController::class, 'index_counsel_chamber'])->name('counsel-chamber');
    Route::get('counsel-company', [CounselLawyerController::class, 'index_counsel_company'])->name('counsel-company');

    Route::get('add-counsel', [CounselLawyerController::class, 'create_counsel'])->name('add-counsel');
    Route::get('add-counsel/employee', [CounselLawyerController::class, 'create_counsel'])->name('add-counsel-employee');

    Route::post('save-counsel', [CounselLawyerController::class, 'store_counsel'])->name('save-counsel');
    Route::get('edit-counsel/{id}', [CounselLawyerController::class, 'edit_counsel'])->name('edit-counsel');
    Route::post('update-counsel/{id}', [CounselLawyerController::class, 'update_counsel'])->name('update-counsel');
    Route::post('delete-counsel/{id}', [CounselLawyerController::class, 'destroy_counsel'])->name('delete-counsel');
    Route::get('view-counsel/{id}', [CounselLawyerController::class, 'show_counsel'])->name('view-counsel');

    Route::get('chamber-staff', [CounselLawyerController::class, 'index_chamber_staff'])->name('chamber-staff');
    Route::get('create-chamber-staff', [CounselLawyerController::class, 'create_chamber_staff'])->name('create-chamber-staff');
    Route::post('store-chamber-staff', [CounselLawyerController::class, 'store_chamber_staff'])->name('store-chamber-staff');
    Route::get('edit-chamber-staff/{id}', [CounselLawyerController::class, 'edit_chamber_staff'])->name('edit-chamber-staff');
    Route::post('update-chamber-staff/{id}', [CounselLawyerController::class, 'update_chamber_staff'])->name('update-chamber-staff');
    Route::post('delete-chamber-staff/{id}', [CounselLawyerController::class, 'destroy_chamber_staff'])->name('delete-chamber-staff');
    Route::get('view-chamber-staff/{id}', [CounselLawyerController::class, 'show_chamber_staff'])->name('view-chamber-staff');

    // Route::get('internal-counsel', [CounselLawyerController::class, 'index_internal_counsel'])->name('internal-counsel');
    // Route::get('add-internal-counsel',[CounselLawyerController::class, 'create_internal_counsel'])->name('add-internal-counsel');
    Route::post('save-internal-counsel', [CounselLawyerController::class, 'store_internal_counsel'])->name('save-internal-counsel');
    Route::get('edit-internal-counsel/{id}', [CounselLawyerController::class, 'edit_internal_counsel'])->name('edit-internal-counsel');
    Route::post('update-internal-counsel/{id}', [CounselLawyerController::class, 'update_internal_counsel'])->name('update-internal-counsel');
    Route::post('delete-internal-counsel/{id}', [CounselLawyerController::class, 'destroy_internal_counsel'])->name('delete-internal-counsel');
    Route::get('view-internal-counsel/{id}', [CounselLawyerController::class, 'show_internal_counsel'])->name('view-internal-counsel');

    Route::get('print-report-search', [ReportController::class, 'print_report_search'])->name('print-report-search');


    /////New Change Counser will be together (Internal & Exernal)

    Route::get('internal-counsel-new', [CounselLawyerController::class, 'index_internal_counsel_new'])->name('internal-counsel-new');
    Route::get('internal-counsel-chamber', [CounselLawyerController::class, 'index_internal_counsel_new_chamber'])->name('internal-counsel-chamber');
    Route::get('internal-counsel-company', [CounselLawyerController::class, 'index_internal_counsel_new_company'])->name('internal-counsel-company');



    ///////////////////// Report Managenent Start /////////////////////

    //Litigation report
    Route::get('litigation/report', [ReportController::class, 'litigation_report'])->name('litigation.report');

    Route::get('litigation/report/result', [ReportController::class, 'litigation_report_result'])->name('litigation.report.result');

    // Route::post('send-cause-list-pdf-to-mail', [LitigationCalenderController::class, 'send_cause_list_pdf_to_mail'])->name('send-cause-list-pdf-to-mail');

    Route::post('send-cause-list-pdf-to-mail', [LitigationCalenderController::class, 'send_cause_list_pdf_to_mail'])->name('send-cause-list-pdf-to-mail');

    ///////////////////// Report Management End /////////////////////
    Route::get('documents-list', [CriminalCasesController::class, 'documents_list'])->name('documents-list');
    Route::get('add-documents-list', [CriminalCasesController::class, 'add_documents_list'])->name('add-documents-list');
    Route::post('save-document-list', [CriminalCasesController::class, 'save_document_list'])->name('save-document-list');
    Route::get('edit-documents-list/{id}', [CriminalCasesController::class, 'edit_documents_list'])->name('edit-documents-list');
    Route::post('update-documents-list/{id}', [CriminalCasesController::class, 'update_documents_list'])->name('update-documents-list');
    Route::get('delete-documents-list', [CriminalCasesController::class, 'delete_documents_list'])->name('delete-documents-list');


    Route::resource('employee', EmployeeController::class);

    Route::get('employee-new', [EmployeeController::class, 'employee_new'])->name('employee-new');

    Route::resource('ledger-category', LedgerCategoryController::class);
    Route::resource('ledger-head', LedgerHeadController::class);
    Route::resource('ledger-entry', LedgerEntryController::class);

    Route::get('ledger-report', [ReportController::class, 'ledger_report'])->name('ledger-report');
    Route::get('ledger-report-search', [ReportController::class, 'ledger_report_search'])->name('ledger-report-search');
    Route::get('print-ledger-report', [ReportController::class, 'print_ledger_report'])->name('print-ledger-report');

    Route::get('ledger-head-report-list', [ReportController::class, 'ledger_head_report_list'])->name('ledger-head-report-list');
    Route::get('ledger-head-report-list-search', [ReportController::class, 'ledger_head_report_list_search'])->name('ledger-head-report-list-search');
    Route::get('print-ledger-head-report-list', [ReportController::class, 'print_ledger_head_report_list'])->name('print-ledger-head-report-list');

    Route::get('income-expense-report', [ReportController::class, 'income_expense_report'])->name('income-expense-report');
    Route::get('income-expense-report-search', [ReportController::class, 'income_expense_report_search'])->name('income-expense-report-search');
    Route::get('print-income-expense-report', [ReportController::class, 'print_income_expense_report'])->name('print-income-expense-report');

    Route::get('/find-bill', [BillingsController::class, 'find_bill'])->name('find-bill');
    Route::get('/find-ledger-head', [BillingsController::class, 'find_ledger_head'])->name('find-ledger-head');

    Route::get('balance-report', [ReportController::class, 'balance_report'])->name('balance-report');
    Route::get('balance-report-search', [ReportController::class, 'balance_report_search'])->name('balance-report-search');
    Route::get('print-balance-report', [ReportController::class, 'print_balance_report'])->name('print-balance-report');
    Route::get('print-billing-report', [ReportController::class, 'print_billing_report'])->name('print-billing-report');
    Route::get('add-ledger-entry/{id}', [LedgerEntryController::class, 'add_ledger_entry'])->name('add-ledger-entry');

    // criminal cases latest list


    //Task management\

    Route::resource('task-category', TaskCategoryController::class,  ['names' => 'task.category']);
    Route::resource('task', TaskController::class);
    Route::put('task/change-status/{id}', [TaskController::class, 'changeStatus'])->name('task.change.status');

    //Schedule management\
    Route::resource('schedule-category', ScheduleCategoryController::class,  ['names' => 'schedule.category']);
    Route::resource('schedule', ScheduleController::class);
    Route::put('schedule/change-status/{id}', [ScheduleController::class, 'changeStatus'])->name('schedule.change.status');

    //Assignment management\
    Route::resource('assignment-category', AssignmentCategoryController::class,  ['names' => 'assignment.category']);
    Route::resource('assignment', AssignmentController::class);
    Route::put('assignment/change-status/{id}', [AssignmentController::class, 'changeStatus'])->name('assignment.change.status');
});





Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {

    // all admin routes are here
    Route::match(['get', 'post'], '/', 'AdminController@login');

    Route::group(['middleware' => ['admin']], function () {

        //        Route::get('dashboard','AdminController@dashboard')->name('dashboard');

        Route::get('logout', 'AdminController@logout')->name('admin.logout');

        //        Route::get('settings','AdminController@settings');
        //
        //        Route::post('admin_update_password','AdminController@chkCurrentPassword');
        //
        //        Route::post('admins_update_password','AdminController@updateCurrentPassword');
        //
        //        Route::match(['get','post'],'admin_details_update','AdminController@admin_details_update');


        //        Route::get('case-category','AdminSetupController@case_category')->name('case-category');
        //        Route::get('add-case-category','AdminSetupController@add_case_category')->name('add-case-category');
        //        Route::post('save-case-category','AdminSetupController@save_case_category')->name('save-case-category');
        //        Route::get('edit-case-category/{id}','AdminSetupController@edit_case_category')->name('edit-case-category');
        //        Route::post('update-case-category/{id}','AdminSetupController@update_case_category')->name('update-case-category');
        //        Route::post('delete-case-category/{id}','AdminSetupController@delete_case_category')->name('delete-case-category');

    });
});
