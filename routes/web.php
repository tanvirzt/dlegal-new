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


    });

});





