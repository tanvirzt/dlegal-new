<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\SetupDesignation;
use App\models\SetupCaseStatus;
use App\Models\SetupCaseTypes;
use App\Models\SetupPropertyType;
use App\models\SetupComplianceCategory;
use App\models\SetupExternalCouncil;
use App\models\SetupPersonTitle;
use App\models\SetupCourt;
use App\models\SetupComplianceType;
use App\models\SetupDivision;
use App\models\SetupDistrict;
use App\models\SetupLaw;
use App\models\SetupNextDateReason;
use App\models\SetupCourtLastOrder;
use App\models\SetupRegion;
use App\models\SetupArea;
use App\models\SetupBranch;
use App\models\SetupProgram;
use App\models\SetupAllegation;
use App\models\SetupCompanyType;
use App\models\SetupCompany;
use App\models\SetupInternalCouncil;
use App\models\SetupExternalCouncilAssociate;
use App\models\SetupBillType;
use App\models\SetupBank;
use App\models\SetupBankBranch;
use App\models\SetupDigitalPayment;
use App\models\SetupThana;
use App\models\SetupFloor;
use Illuminate\Http\Request;

class ApiAdminSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function designation()
    {
        $data =  SetupDesignation::where('delete_status',0)->get();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => "data get successfully"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_degignation(Request $request)
    {
        $data = new  SetupDesignation();
        $data->designation_name= $request->designation_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = SetupDesignation::find($id);
        $data->designation_name = $request->designation_name;
        $data->update();
        return response()->json([
            "status" => 200,
            "-test_data" => $data,
            "message" => " data updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_designation($id)
    {
        $data = SetupDesignation::find($id);
        $data->delete_status=1;
        $data->update();
        return response()->json([
            "status" => 200,
            "-test_data" => $data,
            "message" => " data deleted successfully"
        ]);
    }
    public function case_status()
    {
        $data = SetupCaseStatus::where('delete_status',0)->get();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => "data get successfully"
        ]);
}
public function add_case_status(Request $request)
    {
        $data = new  SetupCaseStatus();
        $data->case_status_name= $request->case_status_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_case_status(Request $request, $id)
{
    $data = SetupCaseStatus::find($id);
    $data->case_status_name = $request->case_status_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_case_status($id)
{
    $data = SetupCaseStatus::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function case_types()
{
    $data = SetupCaseTypes::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_case_types(Request $request)
    {
        $data = new  SetupCaseTypes();
        $data->case_types_name= $request->case_types_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_case_types(Request $request, $id)
{
    $data = SetupCaseTypes::find($id);
    $data->case_types_name = $request->case_types_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_case_types($id)
{
    $data = SetupCaseTypes::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function property_type()
{
    $data = SetupPropertyType::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_property_type(Request $request)
    {
        $data = new  SetupPropertyType();
        $data->property_type_name= $request->property_type_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_property_types(Request $request, $id)
{
    $data = SetupPropertyType::find($id);
    $data->property_type_name = $request->property_type_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_property_types($id)
{
    $data = SetupPropertyType::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function compliance_category()
{
    $data = SetupComplianceCategory::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_compliance_category(Request $request)
    {
        $data = new  SetupComplianceCategory();
        $data->compliance_category_name= $request->compliance_category_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_compliance_category(Request $request, $id)
{
    $data = SetupComplianceCategory::find($id);
    $data->compliance_category_name = $request->compliance_category_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_compliance_category($id)
{
    $data = SetupComplianceCategory::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function external_council()
{
    $data = SetupExternalCouncil::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_external_council(Request $request)
    {
        $data = new SetupExternalCouncil ();
        $data->first_name= $request->first_name;
        $data->middle_name= $request->middle_name;
        $data->last_name= $request->last_name;
        $data->is_associate= $request->is_associate;
        $data->email= $request->email;
        $data->work_phone= $request->work_phone;
        $data->home_phone= $request->home_phone;
        $data->mobile_phone= $request->mobile_phone;
        $data->emergency_contact= $request->emergency_contact;
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_external_council(Request $request, $id)
{
    $data = SetupExternalCouncil::find($id);
    $data->first_name= $request->first_name;
        $data->middle_name= $request->middle_name;
        $data->last_name= $request->last_name;
        $data->is_associate= $request->is_associate;
        $data->email= $request->email;
        $data->work_phone= $request->work_phone;
        $data->home_phone= $request->home_phone;
        $data->mobile_phone= $request->mobile_phone;
        $data->emergency_contact= $request->emergency_contact;
        $data->save();
    
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_external_council($id)
{
    $data = SetupExternalCouncil::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function person_title()
{
    $data = SetupPersonTitle::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_person_title(Request $request)
    {
        $data = new  SetupPersonTitle();
        $data->person_title_name= $request->person_title_name;
      
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_person_title(Request $request, $id)
{
    $data = SetupPersonTitle::find($id);
    $data-> person_title_name= $request->person_title_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_person_title($id)
{
    $data = SetupPersonTitle::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function court()
{
    $data = SetupCourt::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_court(Request $request)
    {
        $data = new  SetupCourt();
        $data->case_class_id= $request->case_class_id;
        $data->applicable_district_id= $request->applicable_district_id;
        $data->court_name= $request->court_name;
        $data->court_short_name= $request->court_short_name;
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_court(Request $request, $id)
{
    $data = SetupCourt::find($id);
    $data->case_class_id= $request->case_class_id;
        $data->applicable_district_id= $request->applicable_district_id;
        $data->court_name= $request->court_name;
        $data->court_short_name= $request->court_short_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_court($id)
{
    $data = SetupCourt::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function compliance_type()
{
    $data = SetupComplianceType::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_compliance_type(Request $request)
    {
        $data = new  SetupComplianceType();
        $data->compliance_type_name= $request->compliance_type_name;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_compliance_type(Request $request, $id)
{
    $data = SetupComplianceType::find($id);
    $data->compliance_type_name= $request->compliance_type_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_compliance_type($id)
{
    $data = SetupComplianceType::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function division()
{
    $data = SetupDivision::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_division(Request $request)
    {
        $data = new  SetupDivision();
        $data->division_name= $request->division_name;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_division(Request $request, $id)
{
    $data = SetupDivision::find($id);
    $data->division_name= $request->division_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_division($id)
{
    $data = SetupDivision::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function district()
{
    $data = SetupDistrict::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_district(Request $request)
    {
        $data = new  SetupDistrict();
        $data->district_name= $request->district_name;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_district(Request $request, $id)
{
    $data = SetupDistrict::find($id);
    $data->district_name= $request->district_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_district($id)
{
    $data = SetupDistrict::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function law()
{
    $data = SetupLaw::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_law(Request $request)
    {
        $data = new  SetupLaw();
        $data->case_type= $request->case_type;
        $data->law_name= $request->law_name;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_law(Request $request, $id)
{
    $data = Setuplaw::find($id);
    $data->case_type= $request->case_type;
    $data->law_name= $request->law_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_law($id)
{
    $data = SetupLaw::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function next_date_reason()
{
    $data = SetupNextDateReason::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_next_date_reason(Request $request)
    {
        $data = new  SetupNextDateReason();
        $data->next_date_reason_name= $request->next_date_reason_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_next_date_reason(Request $request, $id)
{
    $data = SetupNextDateReason::find($id);
    
    $data->next_date_reason_name= $request->next_date_reason_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_next_date_reason($id)
{
    $data = SetupNextDateReason::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function court_last_order()
{
    $data = SetupCourtLastOrder::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_court_last_order(Request $request)
    {
        $data = new  SetupCourtLastOrder();
        $data->court_last_order_name= $request->court_last_order_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_court_last_order(Request $request, $id)
{
    $data = SetupCourtLastOrder::find($id);
    
    $data->court_last_order_name= $request->court_last_order_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_court_last_order($id)
{
    $data = SetupCourtLastOrder::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function region()
{
    $data = SetupRegion::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_region(Request $request)
    {
        $data = new  SetupRegion();
        $data->region_name= $request->region_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_region(Request $request, $id)
{
    $data = SetupRegion::find($id);
    
    $data->region_name= $request->region_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_region($id)
{
    $data = SetupRegion::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function area()
{
    $data = SetupArea::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_area(Request $request)
    {
        $data = new  SetupArea();
        $data->area_name= $request->area_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_area(Request $request, $id)
{
    $data = SetupArea::find($id);
    
    $data->area_name= $request->area_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_area($id)
{
    $data = SetupArea::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function branch()
{
    $data = SetupBranch::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_branch(Request $request)
    {
        $data = new  SetupBranch();
        $data->branch_name= $request->branch_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_branch(Request $request, $id)
{
    $data = SetupBranch::find($id);
    
    $data->branch_name= $request->branch_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_branch($id)
{
    $data = SetupBranch::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function program()
{
    $data = SetupProgram::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_program(Request $request)
    {
        $data = new  SetupProgram();
        $data->program_name= $request->program_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_program(Request $request, $id)
{
    $data = SetupProgram::find($id);
    
    $data->program_name= $request->program_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_program($id)
{
    $data = SetupProgram::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function allegation()
{
    $data = SetupAllegation::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_allegation(Request $request)
    {
        $data = new  SetupAllegation();
        $data->allegation_name= $request->allegation_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_allegation(Request $request, $id)
{
    $data = SetupAllegation::find($id);
    
    $data->allegation_name= $request->allegation_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_allegation($id)
{
    $data = SetupAllegation::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function company_type()
{
    $data = SetupCompanyType::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_company_type(Request $request)
    {
        $data = new  SetupCompanyType();
        $data->company_type_name= $request->company_type_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_company_type(Request $request, $id)
{
    $data = SetupCompanyType::find($id);
    
    $data->company_type_name= $request->company_type_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_company_type($id)
{
    $data = SetupCompanyType::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function company()
{
    $data = SetupCompany::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_company(Request $request)
    {
        $data = new  SetupCompany();
        $data->company_name= $request->company_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_company(Request $request, $id)
{
    $data = SetupCompany::find($id);
    
    $data->company_name= $request->company_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_company($id)
{
    $data = SetupCompany::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function internal_council()
{
    $data = SetupInternalCouncil::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_internal_council(Request $request)
    {
        $data = new  SetupInternalCouncil();
        $data->first_name= $request->first_name;
        $data->middle_name= $request->middle_name;
        $data->last_name= $request->last_name;
        $data->email= $request->email;
        $data->work_phone= $request->work_phone;
        $data->home_phone= $request->home_phone;
        $data->emergency_contact= $request->emergency_contact;
        
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_internal_council(Request $request, $id)
{
    $data = SetupInternalCouncil::find($id);
    $data->first_name= $request->first_name;
    $data->middle_name= $request->middle_name;
    $data->last_name= $request->last_name;
    $data->email= $request->email;
    $data->work_phone= $request->work_phone;
    $data->home_phone= $request->home_phone;
    $data->emergency_contact= $request->emergency_contact;
    
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_internal_council($id)
{
    $data = SetupInternalCouncil::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function external_council_associates()
{
    $data = SetupExternalCouncilAssociate::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_external_council_associates(Request $request)
    {
        $data = new  SetupExternalCouncilAssociate();
        $data->first_name= $request->first_name;
        $data->middle_name= $request->middle_name;
        $data->last_name= $request->last_name;
        $data->email= $request->email;
        $data->work_phone= $request->work_phone;
        $data->home_phone= $request->home_phone;
        $data->mobile_phone= $request->mobile_phone;
        $data->emergency_contact= $request->emergency_contact;
        
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_external_council_associates(Request $request, $id)
{
    $data = SetupExternalCouncilAssociate::find($id);
    $data->first_name= $request->first_name;
    $data->middle_name= $request->middle_name;
    $data->last_name= $request->last_name;
    $data->email= $request->email;
    $data->work_phone= $request->work_phone;
    $data->home_phone= $request->home_phone;
    $data->mobile_phone= $request->mobile_phone;
    $data->emergency_contact= $request->emergency_contact;
    
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_external_council_associates($id)
{
    $data = SetupExternalCouncilAssociate::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function bill_type()
{
    $data = SetupBillType::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_bill_type(Request $request)
    {
        $data = new  SetupBillType();
        $data->bill_type_name= $request->bill_type_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_bill_type(Request $request, $id)
{
    $data = SetupBillType::find($id);
    
    $data->bill_type_name= $request->bill_type_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_bill_type($id)
{
    $data = SetupBillType::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function bank()
{
    $data = SetupBank::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_bank(Request $request)
    {
        $data = new  SetupBank();
        $data->bank_name= $request->bank_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_bank(Request $request, $id)
{
    $data = SetupBank::find($id);
    
    $data->bank_name= $request->bank_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_bank($id)
{
    $data = SetupBank::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function bank_branch()
{
    $data = SetupBankBranch::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_bank_branch(Request $request)
    {
        $data = new  SetupBankBranch();
        $data->bank_id= $request->bank_id;
        $data->bank_branch_name= $request->bank_branch_name;
        
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_bank_branch(Request $request, $id)
{
    $data = SetupBankBranch::find($id);
    
    $data->bank_id= $request->bank_id;
        $data->bank_branch_name= $request->bank_branch_name;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_bank_branch($id)
{
    $data = SetupBankBranch::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function digital_payment_type()
{
    $data = SetupDigitalPayment::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_digital_payment_type(Request $request)
    {
        $data = new SetupDigitalPayment();
       
        $data->digital_payment_type_name= $request->digital_payment_type_name;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_digital_payment_type(Request $request, $id)
{
    $data = SetupDigitalPayment::find($id);
    
    $data->digital_payment_type_name= $request->digital_payment_type_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_digital_payment_type($id)
{
    $data = SetupDigitalPayment::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function thana()
{
    $data = SetupThana::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_thana(Request $request)
    {
        $data = new SetupThana();
       
        $data->district_id= $request->district_id;
        $data->thana_name= $request->thana_name;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_thana(Request $request, $id)
{
    $data = SetupThana::find($id);
    
    $data->district_id= $request->district_id;
    $data->thana_name= $request->thana_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_thana($id)
{
    $data = SetupThana::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function floor()
{
    $data = SetupFloor::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_floor(Request $request)
    {
        $data = new SetupFloor();
       
        $data->floor_name= $request->floor_name;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_floor(Request $request, $id)
{
    $data = SetupFloor::find($id);
    
    
    $data->floor_name= $request->floor_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
}