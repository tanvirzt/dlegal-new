<?php

use App\Http\Controllers\Admin\AdminSetupController;
use App\Http\Controllers\Api\ApiAdminclientcontroller;
use App\Http\Controllers\Api\ApiAdminclientnamecontroller;
use App\Http\Controllers\Api\ApiAdminilitigationcalendercontroller;
use App\Http\Controllers\Api\ApiAdmininternalcouncilcontroller;
use App\Http\Controllers\Api\Apiadminlitigationcallendercontroller;
use App\Http\Controllers\Api\ApiAdminmattercontroller;
use App\Http\Controllers\Api\Apiadminsetupcontroller;
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
route::get("designation",[Apiadminsetupcontroller::class,"designation"]);
route::post("add_designation",[Apiadminsetupcontroller::class,"add_degignation"]);
route::put("update_designation/{id}",[Apiadminsetupcontroller::class,"update"]);
route::delete("delete_designation/{id}",[Apiadminsetupcontroller::class,"delete_designation"]);
route::get("case_status",[Apiadminsetupcontroller::class,"case_status"]);
route::post("add_case_status",[Apiadminsetupcontroller::class,"add_case_status"]);
route::put("update_case_status/{id}",[Apiadminsetupcontroller::class,"update_case_status"]);
route::delete("delete_case_status/{id}",[Apiadminsetupcontroller::class,"delete_case_status"]);
route::get("case_types",[Apiadminsetupcontroller::class,"case_types"]);
route::post("add_case_types",[Apiadminsetupcontroller::class,"add_case_types"]);
route::put("update_case_types/{id}",[Apiadminsetupcontroller::class,"update_case_types"]);
route::delete("delete_case_types/{id}",[Apiadminsetupcontroller::class,"delete_case_types"]);
route::get("property_type",[Apiadminsetupcontroller::class,"property_type"]);
route::post("add_property_type",[Apiadminsetupcontroller::class,"add_property_type"]);
route::put("update_property_types/{id}",[Apiadminsetupcontroller::class,"update_property_types"]);
route::delete("delete_property_types/{id}",[Apiadminsetupcontroller::class,"delete_property_types"]);
route::get("compliance_category",[Apiadminsetupcontroller::class,"compliance_category"]);
route::post("add_compliance_category",[Apiadminsetupcontroller::class,"add_compliance_category"]);