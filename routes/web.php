<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    // all admin routes are here
    Route::match(['get','post'],'/','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){

        Route::get('dashboard','AdminController@dashboard')->name('dashboard');

        Route::get('logout','AdminController@logout')->name('admin.logout');

//        Route::get('settings','AdminController@settings');
//
//        Route::post('admin_update_password','AdminController@chkCurrentPassword');
//
//        Route::post('admins_update_password','AdminController@updateCurrentPassword');
//
//        Route::match(['get','post'],'admin_details_update','AdminController@admin_details_update');

        Route::get('designation', 'AdminSetupController@designation')->name('designation');
        Route::get('add-designation','AdminSetupController@add_designation')->name('add-designation');
        Route::post('save-designation','AdminSetupController@save_designation')->name('save-designation');
        Route::get('edit-designation/{id}','AdminSetupController@edit_designation')->name('edit-designation');
        Route::post('update-designation/{id}','AdminSetupController@update_designation')->name('update-designation');
        Route::post('delete-designation/{id}','AdminSetupController@delete_designation')->name('delete-designation');

        Route::get('case-category','AdminSetupController@case_category')->name('case_category');
        Route::get('add-case-category','AdminSetupController@add_case_category')->name('add-case-category');
        Route::post('save-case-category','AdminSetupController@save_case_category')->name('save-case-category');
        Route::get('edit-case-category/{id}','AdminSetupController@edit_case_category')->name('edit-case-category');
        Route::post('update-case-category/{id}','AdminSetupController@update_case_category')->name('update-case-category');
        Route::post('delete-case-category/{id}','AdminSetupController@delete_case_category')->name('delete-case-category');

        Route::get('case-status','AdminSetupController@case_status')->name('case-status');
        Route::get('add-case-status','AdminSetupController@add_case_status')->name('add-case-status');
        Route::post('save-case-status','AdminSetupController@save_case_status')->name('save-case-status');
        Route::get('edit-case-status/{id}','AdminSetupController@edit_case_status')->name('edit-case-status');
        Route::post('update-case-status/{id}','AdminSetupController@update_case_status')->name('update-case-status');
        Route::post('delete-case-status/{id}','AdminSetupController@delete_case_status')->name('delete-case-status');

        Route::get('case-types','AdminSetupController@case_types')->name('case-types');
        Route::get('add-case-types','AdminSetupController@add_case_types')->name('add-case-types');
        Route::post('save-case-types','AdminSetupController@save_case_types')->name('save-case-types');
        Route::get('edit-case-types/{id}','AdminSetupController@edit_case_types')->name('edit-case-types');
        Route::post('update-case-types/{id}','AdminSetupController@update_case_types')->name('update-case-types');
        Route::post('delete-case-types/{id}','AdminSetupController@delete_case_types')->name('delete-case-types');

        Route::get('property-type','AdminSetupController@property_type')->name('property-type');
        Route::get('add-property-type','AdminSetupController@add_property_type')->name('add-property-type');
        Route::post('save-property-type','AdminSetupController@save_property_type')->name('save-property-type');
        Route::get('edit-property-type/{id}','AdminSetupController@edit_property_type')->name('edit-property-type');
        Route::post('update-property-type/{id}','AdminSetupController@update_property_type')->name('update-property-type');
        Route::post('delete-property-type/{id}','AdminSetupController@delete_property_type')->name('delete-property-type');

        Route::get('compliance-category','AdminSetupController@compliance_category')->name('compliance-category');
        Route::get('add-compliance-category','AdminSetupController@add_compliance_category')->name('add-compliance-category');
        Route::post('save-compliance-category','AdminSetupController@save_compliance_category')->name('save-compliance-category');
        Route::get('edit-compliance-category/{id}','AdminSetupController@edit_compliance_category')->name('edit-compliance-category');
        Route::post('update-compliance-category/{id}','AdminSetupController@update_compliance_category')->name('update-compliance-category');
        Route::post('delete-compliance-category/{id}','AdminSetupController@delete_compliance_category')->name('delete-compliance-category');

        Route::get('external-council','AdminSetupController@external_council')->name('external-council');
        Route::get('add-external-council','AdminSetupController@add_external_council')->name('add-external-council');
        Route::post('save-external-council','AdminSetupController@save_external_council')->name('save-external-council');
        Route::get('edit-external-council/{id}','AdminSetupController@edit_external_council')->name('edit-external-council');
        Route::post('update-external-council/{id}','AdminSetupController@update_external_council')->name('update-external-council');
        Route::post('delete-external-council/{id}','AdminSetupController@delete_external_council')->name('delete-external-council');

        Route::get('person-title','AdminSetupController@person_title')->name('person-title');
        Route::get('add-person-title','AdminSetupController@add_person_title')->name('add-person-title');
        Route::post('save-person-title','AdminSetupController@save_person_title')->name('save-person-title');
        Route::get('edit-person-title/{id}','AdminSetupController@edit_person_title')->name('edit-person-title');
        Route::post('update-person-title/{id}','AdminSetupController@update_person_title')->name('update-person-title');
        Route::post('delete-person-title/{id}','AdminSetupController@delete_person_title')->name('delete-person-title');

        Route::get('court','AdminSetupController@court')->name('court');
        Route::get('add-court','AdminSetupController@add_court')->name('add-court');
        Route::post('save-court','AdminSetupController@save_court')->name('save-court');
        Route::get('edit-court/{id}','AdminSetupController@edit_court')->name('edit-court');
        Route::post('update-court/{id}','AdminSetupController@update_court')->name('update-court');
        Route::post('delete-court/{id}','AdminSetupController@delete_court')->name('delete-court');

        Route::get('property-type','AdminSetupController@property_type')->name('property-type');
        Route::get('add-property-type','AdminSetupController@add_property_type')->name('add-property-type');
        Route::post('save-property-type','AdminSetupController@save_property_type')->name('save-property-type');
        Route::get('edit-property-type/{id}','AdminSetupController@edit_property_type')->name('edit-property-type');
        Route::post('update-property-type/{id}','AdminSetupController@update_property_type')->name('update-property-type');
        Route::post('delete-property-type/{id}','AdminSetupController@delete_property_type')->name('delete-property-type');

        Route::get('compliance-type','AdminSetupController@compliance_type')->name('compliance-type');
        Route::get('add-compliance-type','AdminSetupController@add_compliance_type')->name('add-compliance-type');
        Route::post('save-compliance-type','AdminSetupController@save_compliance_type')->name('save-compliance-type');
        Route::get('edit-compliance-type/{id}','AdminSetupController@edit_compliance_type')->name('edit-compliance-type');
        Route::post('update-compliance-type/{id}','AdminSetupController@update_compliance_type')->name('update-compliance-type');
        Route::post('delete-compliance-type/{id}','AdminSetupController@delete_compliance_type')->name('delete-compliance-type');

        Route::get('civil-cases','CivilCasesController@civil_cases')->name('civil-cases');
        Route::get('add-civil-cases','CivilCasesController@add_civil_cases')->name('add-civil-cases');
        Route::post('save-civil-cases','CivilCasesController@save_civil_cases')->name('save-civil-cases');
        Route::get('edit-civil-cases/{id}','CivilCasesController@edit_civil_cases')->name('edit-civil-cases');
        Route::post('update-civil-cases/{id}','CivilCasesController@update_civil_cases')->name('update-civil-cases');
        Route::post('delete-civil-cases/{id}','CivilCasesController@delete_civil_cases')->name('delete-civil-cases');
        Route::get('view-civil-cases/{id}','CivilCasesController@view_civil_cases')->name('view-civil-cases');
        Route::post('delete-civil-cases-files/{id}','CivilCasesController@delete_civil_cases_files')->name('delete-civil-cases-files');
        Route::get('download-civil-cases-files/{id}','CivilCasesController@download_civil_cases_file')->name('download-civil-cases-files');
        
        
        Route::get('division','AdminSetupController@division')->name('division');
        Route::get('add-division','AdminSetupController@add_division')->name('add-division');
        Route::post('save-division','AdminSetupController@save_division')->name('save-division');
        Route::get('edit-division/{id}','AdminSetupController@edit_division')->name('edit-division');
        Route::post('update-division/{id}','AdminSetupController@update_division')->name('update-division');
        Route::post('delete-division/{id}','AdminSetupController@delete_division')->name('delete-division');

        Route::get('district','AdminSetupController@district')->name('district');
        Route::get('add-district','AdminSetupController@add_district')->name('add-district');
        Route::post('save-district','AdminSetupController@save_district')->name('save-district');
        Route::get('edit-district/{id}','AdminSetupController@edit_district')->name('edit-district');
        Route::post('update-district/{id}','AdminSetupController@update_district')->name('update-district');
        Route::post('delete-district/{id}','AdminSetupController@delete_district')->name('delete-district');

        Route::get('law-section','AdminSetupController@law_section')->name('law-section');
        Route::get('add-law-section','AdminSetupController@add_law_section')->name('add-law-section');
        Route::post('save-law-section','AdminSetupController@save_law_section')->name('save-law-section');
        Route::get('edit-law-section/{id}','AdminSetupController@edit_law_section')->name('edit-law-section');
        Route::post('update-law-section/{id}','AdminSetupController@update_law_section')->name('update-law-section');
        Route::post('delete-law-section/{id}','AdminSetupController@delete_law_section')->name('delete-law-section');

        Route::get('/find-associates','CivilCasesController@find_associates')->name('find-associates');
        Route::get('/find-district','CivilCasesController@find_district')->name('find_district');

        Route::get('next-date-reason','AdminSetupController@next_date_reason')->name('next-date-reason');
        Route::get('add-next-date-reason','AdminSetupController@add_next_date_reason')->name('add-next-date-reason');
        Route::post('save-next-date-reason','AdminSetupController@save_next_date_reason')->name('save-next-date-reason');
        Route::get('edit-next-date-reason/{id}','AdminSetupController@edit_next_date_reason')->name('edit-next-date-reason');
        Route::post('update-next-date-reason/{id}','AdminSetupController@update_next_date_reason')->name('update-next-date-reason');
        Route::post('delete-next-date-reason/{id}','AdminSetupController@delete_next_date_reason')->name('delete-next-date-reason');

        Route::get('court-last-order','AdminSetupController@court_last_order')->name('court-last-order');
        Route::get('add-court-last-order','AdminSetupController@add_court_last_order')->name('add-court-last-order');
        Route::post('save-court-last-order','AdminSetupController@save_court_last_order')->name('save-court-last-order');
        Route::get('edit-court-last-order/{id}','AdminSetupController@edit_court_last_order')->name('edit-court-last-order');
        Route::post('update-court-last-order/{id}','AdminSetupController@update_court_last_order')->name('update-court-last-order');
        Route::post('delete-court-last-order/{id}','AdminSetupController@delete_court_last_order')->name('delete-court-last-order');

        Route::get('criminal-cases','CriminalCasesController@criminal_cases')->name('criminal-cases');
        Route::get('add-criminal-cases','CriminalCasesController@add_criminal_cases')->name('add-criminal-cases');
        Route::post('save-criminal-cases','CriminalCasesController@save_criminal_cases')->name('save-criminal-cases');
        Route::get('edit-criminal-cases/{id}','CriminalCasesController@edit_criminal_cases')->name('edit-criminal-cases');
        Route::post('update-criminal-cases/{id}','CriminalCasesController@update_criminal_cases')->name('update-criminal-cases');
        Route::post('delete-criminal-cases/{id}','CriminalCasesController@delete_criminal_cases')->name('delete-criminal-cases');

        Route::get('labour-cases','LabourCasesController@labour_cases')->name('labour-cases');
        Route::get('add-labour-cases','LabourCasesController@add_labour_cases')->name('add-labour-cases');
        Route::post('save-labour-cases','LabourCasesController@save_labour_cases')->name('save-labour-cases');
        Route::get('edit-labour-cases/{id}','LabourCasesController@edit_labour_cases')->name('edit-labour-cases');
        Route::post('update-labour-cases/{id}','LabourCasesController@update_labour_cases')->name('update-labour-cases');
        Route::post('delete-labour-cases/{id}','LabourCasesController@delete_labour_cases')->name('delete-labour-cases');

        Route::get('quassi-judicial-cases','QuassiJudicialCasesController@quassi_judicial_cases')->name('quassi-judicial-cases');
        Route::get('add-quassi-judicial-cases','QuassiJudicialCasesController@add_quassi_judicial_cases')->name('add-quassi-judicial-cases');
        Route::post('save-quassi-judicial-cases','QuassiJudicialCasesController@save_quassi_judicial_cases')->name('save-quassi-judicial-cases');
        Route::get('edit-quassi-judicial-cases/{id}','QuassiJudicialCasesController@edit_quassi_judicial_cases')->name('edit-quassi-judicial-cases');
        Route::post('update-quassi-judicial-cases/{id}','QuassiJudicialCasesController@update_quassi_judicial_cases')->name('update-quassi-judicial-cases');
        Route::post('delete-quassi-judicial-cases/{id}','QuassiJudicialCasesController@delete_quassi_judicial_cases')->name('delete-quassi-judicial-cases');

        Route::get('supreme-court-cases','SupremeCourtCasesController@supreme_court_cases')->name('supreme-court-cases');
        Route::get('add-supreme-court-cases','SupremeCourtCasesController@add_supreme_court_cases')->name('add-supreme-court-cases');
        Route::post('save-supreme-court-cases','SupremeCourtCasesController@save_supreme_court_cases')->name('save-supreme-court-cases');
        Route::get('edit-supreme-court-cases/{id}','SupremeCourtCasesController@edit_supreme_court_cases')->name('edit-supreme-court-cases');
        Route::post('update-supreme-court-cases/{id}','SupremeCourtCasesController@update_supreme_court_cases')->name('update-supreme-court-cases');
        Route::post('delete-supreme-court-cases/{id}','SupremeCourtCasesController@delete_supreme_court_cases')->name('delete-supreme-court-cases');

        Route::get('high-court-cases','HighCourtCasesController@high_court_cases')->name('high-court-cases');
        Route::get('add-high-court-cases','HighCourtCasesController@add_high_court_cases')->name('add-high-court-cases');
        Route::post('save-high-court-cases','HighCourtCasesController@save_high_court_cases')->name('save-high-court-cases');
        Route::get('edit-high-court-cases/{id}','HighCourtCasesController@edit_high_court_cases')->name('edit-high-court-cases');
        Route::post('update-high-court-cases/{id}','HighCourtCasesController@update_high_court_cases')->name('update-high-court-cases');
        Route::post('delete-high-court-cases/{id}','HighCourtCasesController@delete_high_court_cases')->name('delete-high-court-cases');

        Route::get('appellate-court-cases','AppellateCourtCasesController@appellate_court_cases')->name('appellate-court-cases');
        Route::get('add-appellate-court-cases','AppellateCourtCasesController@add_appellate_court_cases')->name('add-appellate-court-cases');
        Route::post('save-appellate-court-cases','AppellateCourtCasesController@save_appellate_court_cases')->name('save-appellate-court-cases');
        Route::get('edit-appellate-court-cases/{id}','AppellateCourtCasesController@edit_appellate_court_cases')->name('edit-appellate-court-cases');
        Route::post('update-appellate-court-cases/{id}','AppellateCourtCasesController@update_appellate_court_cases')->name('update-appellate-court-cases');
        Route::post('delete-appellate-court-cases/{id}','AppellateCourtCasesController@delete_appellate_court_cases')->name('delete-appellate-court-cases');

        Route::get('region','AdminSetupController@region')->name('region');
        Route::get('add-region','AdminSetupController@add_region')->name('add-region');
        Route::post('save-region','AdminSetupController@save_region')->name('save-region');
        Route::get('edit-region/{id}','AdminSetupController@edit_region')->name('edit-region');
        Route::post('update-region/{id}','AdminSetupController@update_region')->name('update-region');
        Route::post('delete-region/{id}','AdminSetupController@delete_region')->name('delete-region');

        Route::get('area','AdminSetupController@area')->name('area');
        Route::get('add-area','AdminSetupController@add_area')->name('add-area');
        Route::post('save-area','AdminSetupController@save_area')->name('save-area');
        Route::get('edit-area/{id}','AdminSetupController@edit_area')->name('edit-area');
        Route::post('update-area/{id}','AdminSetupController@update_area')->name('update-area');
        Route::post('delete-area/{id}','AdminSetupController@delete_area')->name('delete-area');

        Route::get('branch','AdminSetupController@branch')->name('branch');
        Route::get('add-branch','AdminSetupController@add_branch')->name('add-branch');
        Route::post('save-branch','AdminSetupController@save_branch')->name('save-branch');
        Route::get('edit-branch/{id}','AdminSetupController@edit_branch')->name('edit-branch');
        Route::post('update-branch/{id}','AdminSetupController@update_branch')->name('update-branch');
        Route::post('delete-branch/{id}','AdminSetupController@delete_branch')->name('delete-branch');

        Route::get('program','AdminSetupController@program')->name('program');
        Route::get('add-program','AdminSetupController@add_program')->name('add-program');
        Route::post('save-program','AdminSetupController@save_program')->name('save-program');
        Route::get('edit-program/{id}','AdminSetupController@edit_program')->name('edit-program');
        Route::post('update-program/{id}','AdminSetupController@update_program')->name('update-program');
        Route::post('delete-program/{id}','AdminSetupController@delete_program')->name('delete-program');

        Route::get('alligation','AdminSetupController@alligation')->name('alligation');
        Route::get('add-alligation','AdminSetupController@add_alligation')->name('add-alligation');
        Route::post('save-alligation','AdminSetupController@save_alligation')->name('save-alligation');
        Route::get('edit-alligation/{id}','AdminSetupController@edit_alligation')->name('edit-alligation');
        Route::post('update-alligation/{id}','AdminSetupController@update_alligation')->name('update-alligation');
        Route::post('delete-alligation/{id}','AdminSetupController@delete_alligation')->name('delete-alligation');

        Route::get('company-type','AdminSetupController@company_type')->name('company-type');
        Route::get('add-company-type','AdminSetupController@add_company_type')->name('add-company-type');
        Route::post('save-company-type','AdminSetupController@save_company_type')->name('save-company-type');
        Route::get('edit-company-type/{id}','AdminSetupController@edit_company_type')->name('edit-company-type');
        Route::post('update-company-type/{id}','AdminSetupController@update_company_type')->name('update-company-type');
        Route::post('delete-company-type/{id}','AdminSetupController@delete_company_type')->name('delete-company-type');

        Route::get('company','AdminSetupController@company')->name('company');
        Route::get('add-company','AdminSetupController@add_company')->name('add-company');
        Route::post('save-company','AdminSetupController@save_company')->name('save-company');
        Route::get('edit-company/{id}','AdminSetupController@edit_company')->name('edit-company');
        Route::post('update-company/{id}','AdminSetupController@update_company')->name('update-company');
        Route::post('delete-company/{id}','AdminSetupController@delete_company')->name('delete-company');

        Route::get('internal-council','AdminSetupController@internal_council')->name('internal-council');
        Route::get('add-internal-council','AdminSetupController@add_internal_council')->name('add-internal-council');
        Route::post('save-internal-council','AdminSetupController@save_internal_council')->name('save-internal-council');
        Route::get('edit-internal-council/{id}','AdminSetupController@edit_internal_council')->name('edit-internal-council');
        Route::post('update-internal-council/{id}','AdminSetupController@update_internal_council')->name('update-internal-council');
        Route::post('delete-internal-council/{id}','AdminSetupController@delete_internal_council')->name('delete-internal-council');

        Route::get('external-council-associates','AdminSetupController@external_council_associates')->name('external-council-associates');
        Route::get('add-external-council-associates','AdminSetupController@add_external_council_associates')->name('add-external-council-associates');
        Route::post('save-external-council-associates','AdminSetupController@save_external_council_associates')->name('save-external-council-associates');
        Route::get('edit-external-council-associates/{id}','AdminSetupController@edit_external_council_associates')->name('edit-external-council-associates');
        Route::post('update-external-council-associates/{id}','AdminSetupController@update_external_council_associates')->name('update-external-council-associates');
        Route::post('delete-external-council-associates/{id}','AdminSetupController@delete_external_council_associates')->name('delete-external-council-associates');


    });

});





