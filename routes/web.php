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

//        Route::get('case-category','AdminSetupController@case_category')->name('case-category');
//        Route::get('add-case-category','AdminSetupController@add_case_category')->name('add-case-category');
//        Route::post('save-case-category','AdminSetupController@save_case_category')->name('save-case-category');
//        Route::get('edit-case-category/{id}','AdminSetupController@edit_case_category')->name('edit-case-category');
//        Route::post('update-case-category/{id}','AdminSetupController@update_case_category')->name('update-case-category');
//        Route::post('delete-case-category/{id}','AdminSetupController@delete_case_category')->name('delete-case-category');

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
        Route::get('download-external-council-files/{id}','AdminSetupController@download_external_council_files')->name('download-external-council-files');
        Route::get('download-internal-council-files/{id}','AdminSetupController@download_internal_council_files')->name('download-internal-council-files');


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
        Route::get('download-civil-cases-files/{id}','CivilCasesController@download_civil_cases_file')->name('download-civil-cases-files');
        Route::post('update-civil-cases-status/{id}','CivilCasesController@update_civil_cases_status')->name('update-civil-cases-status');
        Route::post('search-civil-cases','CivilCasesController@search_civil_cases')->name('search_civil_cases');

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

        Route::get('law','AdminSetupController@law')->name('law');
        Route::get('add-law','AdminSetupController@add_law')->name('add-law');
        Route::post('save-law','AdminSetupController@save_law')->name('save-law');
        Route::get('edit-law/{id}','AdminSetupController@edit_law')->name('edit-law');
        Route::post('update-law/{id}','AdminSetupController@update_law')->name('update-law');
        Route::post('delete-law/{id}','AdminSetupController@delete_law')->name('delete-law');

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
        Route::get('view-criminal-cases/{id}','CriminalCasesController@view_criminal_cases')->name('view-criminal-cases');
        Route::get('download-criminal-cases-files/{id}','CriminalCasesController@download_criminal_cases_file')->name('download-criminal-cases-files');
        Route::get('delete-criminal-cases-files/{id}','CriminalCasesController@delete_criminal_cases_file')->name('delete-criminal-cases-files');
        Route::post('update-criminal-cases-status/{id}','CriminalCasesController@update_criminal_cases_status')->name('update-criminal-cases-status');
        Route::post('update-criminal-cases-activity/{id}','CriminalCasesController@update_criminal_cases_activity')->name('update-criminal-cases-activity');
        Route::post('search-criminal-cases','CriminalCasesController@search_criminal_cases')->name('search-criminal-cases');

        Route::get('labour-cases','LabourCasesController@labour_cases')->name('labour-cases');
        Route::get('add-labour-cases','LabourCasesController@add_labour_cases')->name('add-labour-cases');
        Route::post('save-labour-cases','LabourCasesController@save_labour_cases')->name('save-labour-cases');
        Route::get('edit-labour-cases/{id}','LabourCasesController@edit_labour_cases')->name('edit-labour-cases');
        Route::post('update-labour-cases/{id}','LabourCasesController@update_labour_cases')->name('update-labour-cases');
        Route::post('delete-labour-cases/{id}','LabourCasesController@delete_labour_cases')->name('delete-labour-cases');
        Route::get('view-labour-cases/{id}','LabourCasesController@view_labour_cases')->name('view-labour-cases');
        Route::get('download-labour-cases-files/{id}','LabourCasesController@download_labour_cases_file')->name('download-labour-cases-files');
        Route::post('update-labour-cases-status/{id}','LabourCasesController@update_labour_cases_status')->name('update-labour-cases-status');
        Route::post('search-labour-cases','LabourCasesController@search_labour_cases')->name('search-labour-cases');

        Route::get('quassi-judicial-cases','QuassiJudicialCasesController@quassi_judicial_cases')->name('quassi-judicial-cases');
        Route::get('add-quassi-judicial-cases','QuassiJudicialCasesController@add_quassi_judicial_cases')->name('add-quassi-judicial-cases');
        Route::post('save-quassi-judicial-cases','QuassiJudicialCasesController@save_quassi_judicial_cases')->name('save-quassi-judicial-cases');
        Route::get('edit-quassi-judicial-cases/{id}','QuassiJudicialCasesController@edit_quassi_judicial_cases')->name('edit-quassi-judicial-cases');
        Route::post('update-quassi-judicial-cases/{id}','QuassiJudicialCasesController@update_quassi_judicial_cases')->name('update-quassi-judicial-cases');
        Route::post('delete-quassi-judicial-cases/{id}','QuassiJudicialCasesController@delete_quassi_judicial_cases')->name('delete-quassi-judicial-cases');
        Route::get('view-quassi-judicial-cases/{id}','QuassiJudicialCasesController@view_quassi_judicial_cases')->name('view-quassi-judicial-cases');
        Route::get('download-quassi-judicial-cases-files/{id}','QuassiJudicialCasesController@download_quassi_judicial_cases_file')->name('download-quassi-judicial-cases-files');
        Route::post('update-quassi-judicial-cases-status/{id}','QuassiJudicialCasesController@update_quassi_judicial_cases_status')->name('update-quassi-judicial-cases-status');
        Route::post('search-quassi-judicial-cases','QuassiJudicialCasesController@search_quassi_judicial_cases')->name('search-quassi-judicial-cases');

        Route::get('supreme-court-cases','SupremeCourtCasesController@supreme_court_cases')->name('supreme-court-cases');
        Route::get('add-supreme-court-cases','SupremeCourtCasesController@add_supreme_court_cases')->name('add-supreme-court-cases');
        Route::post('save-supreme-court-cases','SupremeCourtCasesController@save_supreme_court_cases')->name('save-supreme-court-cases');
        Route::get('edit-supreme-court-cases/{id}','SupremeCourtCasesController@edit_supreme_court_cases')->name('edit-supreme-court-cases');
        Route::post('update-supreme-court-cases/{id}','SupremeCourtCasesController@update_supreme_court_cases')->name('update-supreme-court-cases');
        Route::post('delete-supreme-court-cases/{id}','SupremeCourtCasesController@delete_supreme_court_cases')->name('delete-supreme-court-cases');
        Route::get('view-supreme-court-cases/{id}','SupremeCourtCasesController@view_supreme_court_cases')->name('view-supreme-court-cases');
        Route::get('download-supreme-court-cases-files/{id}','SupremeCourtCasesController@download_supreme_court_cases_file')->name('download-supreme-court-cases-files');
        Route::post('update-supreme-court-cases-status/{id}','SupremeCourtCasesController@update_supreme_court_cases_status')->name('update-supreme-court-cases-status');

        Route::get('high-court-cases','HighCourtCasesController@high_court_cases')->name('high-court-cases');
        Route::get('add-high-court-cases','HighCourtCasesController@add_high_court_cases')->name('add-high-court-cases');
        Route::post('save-high-court-cases','HighCourtCasesController@save_high_court_cases')->name('save-high-court-cases');
        Route::get('edit-high-court-cases/{id}','HighCourtCasesController@edit_high_court_cases')->name('edit-high-court-cases');
        Route::post('update-high-court-cases/{id}','HighCourtCasesController@update_high_court_cases')->name('update-high-court-cases');
        Route::post('delete-high-court-cases/{id}','HighCourtCasesController@delete_high_court_cases')->name('delete-high-court-cases');
        Route::get('view-high-court-cases/{id}','HighCourtCasesController@view_high_court_cases')->name('view-high-court-cases');
        Route::get('download-high-court-cases-files/{id}','HighCourtCasesController@download_high_court_cases_file')->name('download-high-court-cases-files');
        Route::post('update-high-court-cases-status/{id}','HighCourtCasesController@update_high_court_cases_status')->name('update-high-court-cases-status');
        Route::post('search-high-court-cases','HighCourtCasesController@search_high_court_cases')->name('search-high-court-cases');

        Route::get('appellate-court-cases','AppellateCourtCasesController@appellate_court_cases')->name('appellate-court-cases');
        Route::get('add-appellate-court-cases','AppellateCourtCasesController@add_appellate_court_cases')->name('add-appellate-court-cases');
        Route::post('save-appellate-court-cases','AppellateCourtCasesController@save_appellate_court_cases')->name('save-appellate-court-cases');
        Route::get('edit-appellate-court-cases/{id}','AppellateCourtCasesController@edit_appellate_court_cases')->name('edit-appellate-court-cases');
        Route::post('update-appellate-court-cases/{id}','AppellateCourtCasesController@update_appellate_court_cases')->name('update-appellate-court-cases');
        Route::post('delete-appellate-court-cases/{id}','AppellateCourtCasesController@delete_appellate_court_cases')->name('delete-appellate-court-cases');
        Route::get('view-appellate-court-cases/{id}','AppellateCourtCasesController@view_appellate_court_cases')->name('view-appellate-court-cases');
        Route::get('download-appellate-court-cases-files/{id}','AppellateCourtCasesController@download_appellate_court_cases_file')->name('download-appellate-court-cases-files');
        Route::post('update-appellate-court-cases-status/{id}','AppellateCourtCasesController@update_appellate_court_cases_status')->name('update-appellate-court-cases-status');
        Route::post('search-appellate-court-cases','AppellateCourtCasesController@search_appellate_court_cases')->name('search-appellate-court-cases');

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

        Route::get('allegation','AdminSetupController@allegation')->name('allegation');
        Route::get('add-allegation','AdminSetupController@add_allegation')->name('add-allegation');
        Route::post('save-allegation','AdminSetupController@save_allegation')->name('save-allegation');
        Route::get('edit-allegation/{id}','AdminSetupController@edit_allegation')->name('edit-allegation');
        Route::post('update-allegation/{id}','AdminSetupController@update_allegation')->name('update-allegation');
        Route::post('delete-allegation/{id}','AdminSetupController@delete_allegation')->name('delete-allegation');

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
        Route::get('download-external-council-associates-files/{id}','AdminSetupController@download_external_council_associates_files')->name('download-external-council-associates-files');

        Route::get('bill-type','AdminSetupController@bill_type')->name('bill-type');
        Route::get('add-bill-type','AdminSetupController@add_bill_type')->name('add-bill-type');
        Route::post('save-bill-type','AdminSetupController@save_bill_type')->name('save-bill-type');
        Route::get('edit-bill-type/{id}','AdminSetupController@edit_bill_type')->name('edit-bill-type');
        Route::post('update-bill-type/{id}','AdminSetupController@update_bill_type')->name('update-bill-type');
        Route::post('delete-bill-type/{id}','AdminSetupController@delete_bill_type')->name('delete-bill-type');

        Route::get('bank','AdminSetupController@bank')->name('bank');
        Route::get('add-bank','AdminSetupController@add_bank')->name('add-bank');
        Route::post('save-bank','AdminSetupController@save_bank')->name('save-bank');
        Route::get('edit-bank/{id}','AdminSetupController@edit_bank')->name('edit-bank');
        Route::post('update-bank/{id}','AdminSetupController@update_bank')->name('update-bank');
        Route::post('delete-bank/{id}','AdminSetupController@delete_bank')->name('delete-bank');

        Route::get('bank-branch','AdminSetupController@bank_branch')->name('bank-branch');
        Route::get('add-bank-branch','AdminSetupController@add_bank_branch')->name('add-bank-branch');
        Route::post('save-bank-branch','AdminSetupController@save_bank_branch')->name('save-bank-branch');
        Route::get('edit-bank-branch/{id}','AdminSetupController@edit_bank_branch')->name('edit-bank-branch');
        Route::post('update-bank-branch/{id}','AdminSetupController@update_bank_branch')->name('update-bank-branch');
        Route::post('delete-bank-branch/{id}','AdminSetupController@delete_bank_branch')->name('delete-bank-branch');

        Route::get('digital-payment-type','AdminSetupController@digital_payment_type')->name('digital-payment-type');
        Route::get('add-digital-payment-type','AdminSetupController@add_digital_payment_type')->name('add-digital-payment-type');
        Route::post('save-digital-payment-type','AdminSetupController@save_digital_payment_type')->name('save-digital-payment-type');
        Route::get('edit-digital-payment-type/{id}','AdminSetupController@edit_digital_payment_type')->name('edit-digital-payment-type');
        Route::post('update-digital-payment-type/{id}','AdminSetupController@update_digital_payment_type')->name('update-digital-payment-type');
        Route::post('delete-digital-payment-type/{id}','AdminSetupController@delete_digital_payment_type')->name('delete-digital-payment-type');

// billing

        Route::get('billing','BillingsController@billing')->name('billing');
        Route::get('add-billing','BillingsController@add_billing')->name('add-billing');
        Route::get('/find-bank-branch','BillingsController@find_bank_branch')->name('find-bank-branch');
        Route::get('/find-case-no','BillingsController@find_case_no')->name('find-case-no');
        Route::post('/save-billing','BillingsController@save_billing')->name('save-billing');
        Route::get('/edit-billing/{id}','BillingsController@edit_billing')->name('edit-billing');
        Route::post('/update-billing/{id}','BillingsController@update_billing')->name('update-billing');
        Route::get('add-billing-civil-cases/{id}','BillingsController@add_billing_civil_cases')->name('add-billing-civil-cases');
        Route::get('add-billing-criminal-cases/{id}','BillingsController@add_billing_criminal_cases')->name('add-billing-criminal-cases');
        Route::post('delete-billing/{id}','BillingsController@delete_billing')->name('delete-billing');
        Route::get('add-billing-labour-cases/{id}','BillingsController@add_billing_labour_cases')->name('add-billing-labour-cases');
        Route::get('add-billing-quassi-judicial-cases/{id}','BillingsController@add_billing_quassi_judicial_cases')->name('add-billing-quassi-judicial-cases');
        Route::get('add-billing-supreme-court-cases/{id}','BillingsController@add_billing_supreme_court_cases')->name('add-billing-supreme-court-cases');
        Route::get('add-billing-high-court-cases/{id}','BillingsController@add_billing_high_court_cases')->name('add-billing-high-court-cases');
        Route::get('add-billing-appellate-court-cases/{id}','BillingsController@add_billing_appellate_court_cases')->name('add-billing-appellate-court-cases');
        Route::post('search-case-billings','BillingsController@search_case_billings')->name('search-case-billings');
// thana setup

        Route::get('thana','AdminSetupController@thana')->name('thana');
        Route::get('add-thana','AdminSetupController@add_thana')->name('add-thana');
        Route::post('save-thana','AdminSetupController@save_thana')->name('save-thana');
        Route::get('edit-thana/{id}','AdminSetupController@edit_thana')->name('edit-thana');
        Route::post('update-thana/{id}','AdminSetupController@update_thana')->name('update-thana');
        Route::post('delete-thana/{id}','AdminSetupController@delete_thana')->name('delete-thana');

// floor setup

        Route::get('floor','AdminSetupController@floor')->name('floor');
        Route::get('add-floor','AdminSetupController@add_floor')->name('add-floor');
        Route::post('save-floor','AdminSetupController@save_floor')->name('save-floor');
        Route::get('edit-floor/{id}','AdminSetupController@edit_floor')->name('edit-floor');
        Route::post('update-floor/{id}','AdminSetupController@update_floor')->name('update-floor');
        Route::post('delete-floor/{id}','AdminSetupController@delete_floor')->name('delete-floor');
// flat-number setup

        Route::get('flat-number','AdminSetupController@flat_number')->name('flat-number');
        Route::get('add-flat-number','AdminSetupController@add_flat_number')->name('add-flat-number');
        Route::post('save-flat-number','AdminSetupController@save_flat_number')->name('save-flat-number');
        Route::get('edit-flat-number/{id}','AdminSetupController@edit_flat_number')->name('edit-flat-number');
        Route::post('update-flat-number/{id}','AdminSetupController@update_flat_number')->name('update-flat-number');
        Route::post('delete-flat-number/{id}','AdminSetupController@delete_flat_number')->name('delete-flat-number');

// seller buyer setup
        Route::get('seller-buyer','AdminSetupController@seller_buyer')->name('seller-buyer');
        Route::get('add-seller-buyer','AdminSetupController@add_seller_buyer')->name('add-seller-buyer');
        Route::post('save-seller-buyer','AdminSetupController@save_seller_buyer')->name('save-seller-buyer');
        Route::get('edit-seller-buyer/{id}','AdminSetupController@edit_seller_buyer')->name('edit-seller-buyer');
        Route::post('update-seller-buyer/{id}','AdminSetupController@update_seller_buyer')->name('update-seller-buyer');
        Route::post('delete-seller-buyer/{id}','AdminSetupController@delete_seller_buyer')->name('delete-seller-buyer');

        Route::get('land-information','LandInfoController@land_information')->name('land-information');
        Route::get('add-land-information','LandInfoController@add_land_information')->name('add-land-information');
        Route::post('save-land-information','LandInfoController@save_land_information')->name('save-land-information');
        Route::get('edit-land-information/{id}','LandInfoController@edit_land_information')->name('edit-land-information');
        Route::post('delete-land-information/{id}','LandInfoController@delete_land_information')->name('delete-land-information');
        Route::post('update-land-information/{id}','LandInfoController@update_land_information')->name('update-land-information');
        Route::get('view-land-information/{id}','LandInfoController@view_land_information')->name('view-land-information');
        Route::get('download-land-information-files/{id}','LandInfoController@download_land_information_files')->name('download-land-information-files');
        Route::post('search-land-information','LandInfoController@search_land_information')->name('search-land-information');

        Route::get('flat-information','FlatInfoController@flat_information')->name('flat-information');
        Route::get('add-flat-information','FlatInfoController@add_flat_information')->name('add-flat-information');
        Route::post('save-flat-information','FlatInfoController@save_flat_information')->name('save-flat-information');
        Route::get('edit-flat-information/{id}','FlatInfoController@edit_flat_information')->name('edit-flat-information');
        Route::post('delete-flat-information/{id}','FlatInfoController@delete_flat_information')->name('delete-flat-information');
        Route::post('update-flat-information/{id}','FlatInfoController@update_flat_information')->name('update-flat-information');
        Route::get('view-flat-information/{id}','FlatInfoController@view_flat_information')->name('view-flat-information');
        Route::get('download-flat-information-files/{id}','FlatInfoController@download_flat_information_files')->name('download-flat-information-files');
        Route::post('search-flat-information','FlatInfoController@search_flat_information')->name('search-flat-information');

        Route::get('/find-thana','LandInfoController@find_thana')->name('find-thana');
        Route::get('/find-seller-details','LandInfoController@find_seller_details')->name('find-seller-details');
        Route::get('/find-buyer-details','LandInfoController@find_buyer_details')->name('find-buyer-details');
        Route::get('/find-flat-number','FlatInfoController@find_flat_number')->name('find-flat-number');

// regulatory compliance

        Route::get('regulatory-compliance','RegulatoryComplianceController@regulatory_compliance')->name('regulatory-compliance');
        Route::get('add-regulatory-compliance','RegulatoryComplianceController@add_regulatory_compliance')->name('add-regulatory-compliance');
        Route::post('save-regulatory-compliance','RegulatoryComplianceController@save_regulatory_compliance')->name('save-regulatory-compliance');
        Route::get('edit-regulatory-compliance/{id}','RegulatoryComplianceController@edit_regulatory_compliance')->name('edit-regulatory-compliance');
        Route::post('delete-regulatory-compliance/{id}','RegulatoryComplianceController@delete_regulatory_compliance')->name('delete-regulatory-compliance');
        Route::post('update-regulatory-compliance/{id}','RegulatoryComplianceController@update_regulatory_compliance')->name('update-regulatory-compliance');
        Route::get('view-regulatory-compliance/{id}','RegulatoryComplianceController@view_regulatory_compliance')->name('view-regulatory-compliance');
        Route::post('search-regulatory-compliance','RegulatoryComplianceController@search_regulatory_compliance')->name('search-regulatory-compliance');

// regulatory compliance

        Route::get('social-compliance','SocialComplianceController@social_compliance')->name('social-compliance');
        Route::get('add-social-compliance','SocialComplianceController@add_social_compliance')->name('add-social-compliance');
        Route::post('save-social-compliance','SocialComplianceController@save_social_compliance')->name('save-social-compliance');
        Route::get('edit-social-compliance/{id}','SocialComplianceController@edit_social_compliance')->name('edit-social-compliance');
        Route::post('delete-social-compliance/{id}','SocialComplianceController@delete_social_compliance')->name('delete-social-compliance');
        Route::post('update-social-compliance/{id}','SocialComplianceController@update_social_compliance')->name('update-social-compliance');
        Route::get('view-social-compliance/{id}','SocialComplianceController@view_social_compliance')->name('view-social-compliance');
        Route::post('search-social-compliance','SocialComplianceController@search_social_compliance')->name('search-social-compliance');

        Route::get('document-management','DocManagementController@document_management')->name('document-management');
        Route::get('add-documents','DocManagementController@add_documents')->name('add-documents');
        Route::get('find-admin-setup','DocManagementController@find_admin_setup')->name('find-admin-setup');
        Route::get('find-litigation-cases','DocManagementController@find_litigation_cases')->name('find-litigation-cases');
        Route::get('find-property-management','DocManagementController@find_property_management')->name('find-property-management');
        Route::post('save-document','DocManagementController@save_document')->name('save-document');
        Route::get('download-external-files/{id}','DocManagementController@download_external_files')->name('download-external-files');
        Route::get('external-document','DocManagementController@external_document')->name('external-document');

// supreme-case-category setup

        Route::get('case-category','AdminSetupController@case_category')->name('case-category');
        Route::get('add-case-category','AdminSetupController@add_case_category')->name('add-case-category');
        Route::post('save-case-category','AdminSetupController@save_case_category')->name('save-case-category');
        Route::get('edit-case-category/{id}','AdminSetupController@edit_case_category')->name('edit-case-category');
        Route::post('update-case-category/{id}','AdminSetupController@update_case_category')->name('update-case-category');
        Route::post('delete-case-category/{id}','AdminSetupController@delete_case_category')->name('delete-case-category');
// supreme-case-subcategory setup

        Route::get('case-subcategory','AdminSetupController@case_subcategory')->name('case-subcategory');
        Route::get('add-case-subcategory','AdminSetupController@add_case_subcategory')->name('add-case-subcategory');
        Route::post('save-case-subcategory','AdminSetupController@save_case_subcategory')->name('save-case-subcategory');
        Route::get('edit-case-subcategory/{id}','AdminSetupController@edit_case_subcategory')->name('edit-case-subcategory');
        Route::post('update-case-subcategory/{id}','AdminSetupController@update_case_subcategory')->name('update-case-subcategory');
        Route::post('delete-case-subcategory/{id}','AdminSetupController@delete_case_subcategory')->name('delete-case-subcategory');
        Route::get('find-case-category','AdminSetupController@find_case_category')->name('find-case-category');

        Route::get('case-class', 'AdminSetupController@case_class')->name('case-class');
        Route::get('add-case-class','AdminSetupController@add_case_class')->name('add-case-class');
        Route::post('save-case-class','AdminSetupController@save_case_class')->name('save-case-class');
        Route::get('edit-case-class/{id}','AdminSetupController@edit_case_class')->name('edit-case-class');
        Route::post('update-case-class/{id}','AdminSetupController@update_case_class')->name('update-case-class');
        Route::post('delete-case-class/{id}','AdminSetupController@delete_case_class')->name('delete-case-class');

        Route::get('section', 'AdminSetupController@section')->name('section');
        Route::get('add-section','AdminSetupController@add_section')->name('add-section');
        Route::post('save-section','AdminSetupController@save_section')->name('save-section');
        Route::get('edit-section/{id}','AdminSetupController@edit_section')->name('edit-section');
        Route::post('update-section/{id}','AdminSetupController@update_section')->name('update-section');
        Route::post('delete-section/{id}','AdminSetupController@delete_section')->name('delete-section');

        Route::get('find-case-subcategory','HighCourtCasesController@find_case_subcategory')->name('find-case-subcategory');

        Route::get('client-category', 'AdminSetupController@client_category')->name('client-category');
        Route::get('add-client-category','AdminSetupController@add_client_category')->name('add-client-category');
        Route::post('save-client-category','AdminSetupController@save_client_category')->name('save-client-category');
        Route::get('edit-client-category/{id}','AdminSetupController@edit_client_category')->name('edit-client-category');
        Route::post('update-client-category/{id}','AdminSetupController@update_client_category')->name('update-client-category');
        Route::post('delete-client-category/{id}','AdminSetupController@delete_client_category')->name('delete-client-category');

        Route::get('client-subcategory', 'AdminSetupController@client_subcategory')->name('client-subcategory');
        Route::get('add-client-subcategory','AdminSetupController@add_client_subcategory')->name('add-client-subcategory');
        Route::post('save-client-subcategory','AdminSetupController@save_client_subcategory')->name('save-client-subcategory');
        Route::get('edit-client-subcategory/{id}','AdminSetupController@edit_client_subcategory')->name('edit-client-subcategory');
        Route::post('update-client-subcategory/{id}','AdminSetupController@update_client_subcategory')->name('update-client-subcategory');
        Route::post('delete-client-subcategory/{id}','AdminSetupController@delete_client_subcategory')->name('delete-client-subcategory');

        Route::get('find-client-subcategory','AdminSetupController@find_client_subcategory')->name('find-client-subcategory');

        Route::get('next-day-presence', 'AdminSetupController@next_day_presence')->name('next-day-presence');
        Route::get('add-next-day-presence','AdminSetupController@add_next_day_presence')->name('add-next-day-presence');
        Route::post('save-next-day-presence','AdminSetupController@save_next_day_presence')->name('save-next-day-presence');
        Route::get('edit-next-day-presence/{id}','AdminSetupController@edit_next_day_presence')->name('edit-next-day-presence');
        Route::post('update-next-day-presence/{id}','AdminSetupController@update_next_day_presence')->name('update-next-day-presence');
        Route::post('delete-next-day-presence/{id}','AdminSetupController@delete_next_day_presence')->name('delete-next-day-presence');

        Route::get('legal-issue', 'AdminSetupController@legal_issue')->name('legal-issue');
        Route::get('add-legal-issue','AdminSetupController@add_legal_issue')->name('add-legal-issue');
        Route::post('save-legal-issue','AdminSetupController@save_legal_issue')->name('save-legal-issue');
        Route::get('edit-legal-issue/{id}','AdminSetupController@edit_legal_issue')->name('edit-legal-issue');
        Route::post('update-legal-issue/{id}','AdminSetupController@update_legal_issue')->name('update-legal-issue');
        Route::post('delete-legal-issue/{id}','AdminSetupController@delete_legal_issue')->name('delete-legal-issue');

        Route::get('legal-service', 'AdminSetupController@legal_service')->name('legal-service');
        Route::get('add-legal-service','AdminSetupController@add_legal_service')->name('add-legal-service');
        Route::post('save-legal-service','AdminSetupController@save_legal_service')->name('save-legal-service');
        Route::get('edit-legal-service/{id}','AdminSetupController@edit_legal_service')->name('edit-legal-service');
        Route::post('update-legal-service/{id}','AdminSetupController@update_legal_service')->name('update-legal-service');
        Route::post('delete-legal-service/{id}','AdminSetupController@delete_legal_service')->name('delete-legal-service');

        Route::get('matter', 'AdminSetupController@matter')->name('matter');
        Route::get('add-matter','AdminSetupController@add_matter')->name('add-matter');
        Route::post('save-matter','AdminSetupController@save_matter')->name('save-matter');
        Route::get('edit-matter/{id}','AdminSetupController@edit_matter')->name('edit-matter');
        Route::post('update-matter/{id}','AdminSetupController@update_matter')->name('update-matter');
        Route::post('delete-matter/{id}','AdminSetupController@delete_matter')->name('delete-matter');

        Route::get('coordinator', 'AdminSetupController@coordinator')->name('coordinator');
        Route::get('add-coordinator','AdminSetupController@add_coordinator')->name('add-coordinator');
        Route::post('save-coordinator','AdminSetupController@save_coordinator')->name('save-coordinator');
        Route::get('edit-coordinator/{id}','AdminSetupController@edit_coordinator')->name('edit-coordinator');
        Route::post('update-coordinator/{id}','AdminSetupController@update_coordinator')->name('update-coordinator');
        Route::post('delete-coordinator/{id}','AdminSetupController@delete_coordinator')->name('delete-coordinator');

        Route::get('mode', 'AdminSetupController@mode')->name('mode');
        Route::get('add-mode','AdminSetupController@add_mode')->name('add-mode');
        Route::post('save-mode','AdminSetupController@save_mode')->name('save-mode');
        Route::get('edit-mode/{id}','AdminSetupController@edit_mode')->name('edit-mode');
        Route::post('update-mode/{id}','AdminSetupController@update_mode')->name('update-mode');
        Route::post('delete-mode/{id}','AdminSetupController@delete_mode')->name('delete-mode');

        Route::get('court-proceeding', 'AdminSetupController@court_proceeding')->name('court-proceeding');
        Route::get('add-court-proceeding','AdminSetupController@add_court_proceeding')->name('add-court-proceeding');
        Route::post('save-court-proceeding','AdminSetupController@save_court_proceeding')->name('save-court-proceeding');
        Route::get('edit-court-proceeding/{id}','AdminSetupController@edit_court_proceeding')->name('edit-court-proceeding');
        Route::post('update-court-proceeding/{id}','AdminSetupController@update_court_proceeding')->name('update-court-proceeding');
        Route::post('delete-court-proceeding/{id}','AdminSetupController@delete_court_proceeding')->name('delete-court-proceeding');

        Route::get('day-notes', 'AdminSetupController@day_notes')->name('day-notes');
        Route::get('add-day-notes','AdminSetupController@add_day_notes')->name('add-day-notes');
        Route::post('save-day-notes','AdminSetupController@save_day_notes')->name('save-day-notes');
        Route::get('edit-day-notes/{id}','AdminSetupController@edit_day_notes')->name('edit-day-notes');
        Route::post('update-day-notes/{id}','AdminSetupController@update_day_notes')->name('update-day-notes');
        Route::post('delete-day-notes/{id}','AdminSetupController@delete_day_notes')->name('delete-day-notes');

        Route::get('in-favour-of', 'AdminSetupController@in_favour_of')->name('in-favour-of');
        Route::get('add-in-favour-of','AdminSetupController@add_in_favour_of')->name('add-in-favour-of');
        Route::post('save-in-favour-of','AdminSetupController@save_in_favour_of')->name('save-in-favour-of');
        Route::get('edit-in-favour-of/{id}','AdminSetupController@edit_in_favour_of')->name('edit-in-favour-of');
        Route::post('update-in-favour-of/{id}','AdminSetupController@update_in_favour_of')->name('update-in-favour-of');
        Route::post('delete-in-favour-of/{id}','AdminSetupController@delete_in_favour_of')->name('delete-in-favour-of');

        Route::get('referrer', 'AdminSetupController@referrer')->name('referrer');
        Route::get('add-referrer','AdminSetupController@add_referrer')->name('add-referrer');
        Route::post('save-referrer','AdminSetupController@save_referrer')->name('save-referrer');
        Route::get('edit-referrer/{id}','AdminSetupController@edit_referrer')->name('edit-referrer');
        Route::post('update-referrer/{id}','AdminSetupController@update_referrer')->name('update-referrer');
        Route::post('delete-referrer/{id}','AdminSetupController@delete_referrer')->name('delete-referrer');

        Route::get('party', 'AdminSetupController@party')->name('party');
        Route::get('add-party','AdminSetupController@add_party')->name('add-party');
        Route::post('save-party','AdminSetupController@save_party')->name('save-party');
        Route::get('edit-party/{id}','AdminSetupController@edit_party')->name('edit-party');
        Route::post('update-party/{id}','AdminSetupController@update_party')->name('update-party');
        Route::post('delete-party/{id}','AdminSetupController@delete_party')->name('delete-party');

        Route::get('client', 'AdminSetupController@client')->name('client');
        Route::get('add-client','AdminSetupController@add_client')->name('add-client');
        Route::post('save-client','AdminSetupController@save_client')->name('save-client');
        Route::get('edit-client/{id}','AdminSetupController@edit_client')->name('edit-client');
        Route::post('update-client/{id}','AdminSetupController@update_client')->name('update-client');
        Route::post('delete-client/{id}','AdminSetupController@delete_client')->name('delete-client');

        Route::get('profession', 'AdminSetupController@profession')->name('profession');
        Route::get('add-profession','AdminSetupController@add_profession')->name('add-profession');
        Route::post('save-profession','AdminSetupController@save_profession')->name('save-profession');
        Route::get('edit-profession/{id}','AdminSetupController@edit_profession')->name('edit-profession');
        Route::post('update-profession/{id}','AdminSetupController@update_profession')->name('update-profession');
        Route::post('delete-profession/{id}','AdminSetupController@delete_profession')->name('delete-profession');

        Route::get('documents-setup', 'AdminSetupController@documents')->name('documents-setup');
        Route::get('add-documents-setup','AdminSetupController@add_documents')->name('add-documents-setup');
        Route::post('save-documents-setup','AdminSetupController@save_documents')->name('save-documents-setup');
        Route::get('edit-documents-setup/{id}','AdminSetupController@edit_documents')->name('edit-documents-setup');
        Route::post('update-documents-setup/{id}','AdminSetupController@update_documents')->name('update-documents-setup');
        Route::post('delete-documents-setup/{id}','AdminSetupController@delete_documents')->name('delete-documents-setup');

        Route::get('case-title', 'AdminSetupController@case_title')->name('case-title');
        Route::get('add-case-title','AdminSetupController@add_case_title')->name('add-case-title');
        Route::post('save-case-title','AdminSetupController@save_case_title')->name('save-case-title');
        Route::get('edit-case-title/{id}','AdminSetupController@edit_case_title')->name('edit-case-title');
        Route::post('update-case-title/{id}','AdminSetupController@update_case_title')->name('update-case-title');
        Route::post('delete-case-title/{id}','AdminSetupController@delete_case_title')->name('delete-case-title');

        Route::get('opposition', 'AdminSetupController@opposition')->name('opposition');
        Route::get('add-opposition','AdminSetupController@add_opposition')->name('add-opposition');
        Route::post('save-opposition','AdminSetupController@save_opposition')->name('save-opposition');
        Route::get('edit-opposition/{id}','AdminSetupController@edit_opposition')->name('edit-opposition');
        Route::post('update-opposition/{id}','AdminSetupController@update_opposition')->name('update-opposition');
        Route::post('delete-opposition/{id}','AdminSetupController@delete_opposition')->name('delete-opposition');



    });

});





