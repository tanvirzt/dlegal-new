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
use App\models\SetupFlatNumber;
use App\models\SetupSellerBuyer;
use App\models\SetupCaseCategory;
use App\models\SetupSupremeCourtSubcategory;
use App\models\SetupCaseClass;
use App\models\SetupSection;
use App\models\SetupClientCategory;
use App\models\SetupClientSubcategory;
use App\models\SetupNextDayPresence;
use App\models\SetupLegalIssue;
use App\models\SetupLegalService;
use App\models\SetupMatter;
use App\models\SetupCoordinator;
use App\models\SetupMode;
use App\models\SetupCourtProceeding;
use App\models\SetupDayNote;
use App\models\SetupInFavourOf;
use App\models\SetupReferrer;
use App\models\SetupParty;
use App\models\SetupClient;
use App\models\SetupClientName;
use App\models\SetupProfession;
use App\models\SetupDocument;
use App\models\SetupDocumentsType;
use App\models\SetupCaseTitle;
use App\models\SetupOpposition;
use App\models\SetupComplainant;
use App\models\SetupAccused;
use App\models\SetupCourtShort;
use App\models\SetupProgress;
use App\models\SetupBillParticular;
use App\models\SetupParticulars;
use App\models\BillSchedule;
use App\models\PaymentMode;
use App\models\SetupGroup;
use App\models\SetupCabinet;
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
public function delete_floor($id)
{
    $data = SetupFloor::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function flat_number()
{
    $data = SetupFlatNumber::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_flat_number(Request $request)
    {
        $data = new SetupFlatNumber();
       
        $data->flat_number= $request->flat_number;
        $data->floor_id= $request->floor_id;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_flat_number(Request $request, $id)
{
    $data = SetupFlatNumber::find($id);
    
    
    $data->flat_number= $request->flat_number;
    $data->floor_id= $request->floor_id;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_flat_number($id)
{
    $data = SetupFlatNumber::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function seller_buyer()
{
    $data = SetupSellerBuyer::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_seller_buyer(Request $request)
    {
        $data = new SetupSellerBuyer();
        $data->title_id= $request->title_id;
        $data->seller_or_buyer= $request->seller_or_buyer;
        $data->seller_buyer_name= $request->seller_buyer_name;
        $data->email= $request->email;
        $data->work_phone= $request->work_phone;
        $data->home_phone= $request->home_phone;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_seller_buyer(Request $request, $id)
{
    $data = SetupSellerBuyer::find($id);
    
    $data->title_id= $request->title_id;
    $data->seller_or_buyer= $request->seller_or_buyer;
    $data->seller_buyer_name= $request->seller_buyer_name;
    $data->email= $request->email;
    $data->work_phone= $request->work_phone;
    $data->home_phone= $request->home_phone;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_seller_buyer($id)
{
    $data =  SetupSellerBuyer::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function case_category()
{
    $data = SetupCaseCategory::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_case_category(Request $request)
    {
        $data = new SetupCaseCategory();
        $data->case_type= $request->case_type;
        $data->case_category= $request->case_category;
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_case_category(Request $request, $id)
{
    $data = SetupCaseCategory::find($id);
    
        $data->case_type= $request->case_type;
        $data->case_category= $request->case_category;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_case_category($id)
{
    $data =  SetupCaseCategory::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function case_subcategory()
{
    $data = SetupSupremeCourtSubcategory::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_case_subcategory(Request $request)
    {
        $data = new SetupSupremeCourtSubcategory();
        $data->supreme_court_type= $request->supreme_court_type;
        $data->supreme_court_subcategory= $request->supreme_court_subcategory;
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_case_subcategory(Request $request, $id)
{
    $data = SetupSupremeCourtSubcategory::find($id);
    
    $data->supreme_court_type= $request->supreme_court_type;
    $data->supreme_court_subcategory= $request->supreme_court_subcategory;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_case_subcategory($id)
{
    $data =  SetupSupremeCourtSubcategory::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function case_class()
{
    $data = SetupCaseClass::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_case_class(Request $request)
    {
        $data = new SetupCaseClass();
        $data->case_class_name= $request->case_class_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_case_class(Request $request, $id)
{
    $data = SetupCaseClass::find($id);
    $data->case_class_name= $request->case_class_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_case_class($id)
{
    $data =  SetupCaseClass::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function section()
{
    $data = SetupSection::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "test_data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_section(Request $request)
    {
        $data = new SetupSection();
        $data->section_name= $request->section_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "test_data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_section(Request $request, $id)
{
    $data = SetupSection::find($id);
    $data->section_name= $request->section_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_section($id)
{
    $data =  SetupSection::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "-test_data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function client_category()
{
    $data = SetupClientCategory::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_client_category(Request $request)
    {
        $data = new SetupClientCategory();
        $data->client_category_name= $request->client_category_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_client_category(Request $request, $id)
{
    $data = SetupClientCategory::find($id);
    $data->client_category_name= $request->client_category_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_client_category($id)
{
    $data =  SetupClientCategory::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function client_subcategory()
{
    $data = SetupClientSubcategory::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_client_subcategory(Request $request)
    {
        $data = new  SetupClientSubcategory();
        $data->client_subcategory_name= $request->client_subcategory_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_client_subcategory(Request $request, $id)
{
    $data = SetupClientSubcategory::find($id);
    $data->client_subcategory_name= $request->client_subcategory_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_client_subcategory($id)
{
    $data =  SetupClientSubcategory::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function next_day_presence()
{
    $data = SetupNextDayPresence::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_next_day_presence(Request $request)
    {
        $data = new  SetupNextDayPresence();
        $data->next_day_presence_name= $request->next_day_presence_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_next_day_presence(Request $request, $id)
{
    $data =  SetupNextDayPresence::find($id);
    $data->next_day_presence_name= $request->next_day_presence_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_next_day_presence($id)
{
    $data =  SetupNextDayPresence::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function legal_issue()
{
    $data = SetupLegalIssue::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_legal_issue(Request $request)
    {
        $data = new  SetupLegalIssue();
        $data->legal_issue_name= $request->legal_issue_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_legal_issue(Request $request, $id)
{
    $data =  SetupLegalIssue::find($id);
    $data->legal_issue_name= $request->legal_issue_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_legal_issue($id)
{
    $data =  SetupLegalIssue::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}


public function legal_service()
{
    $data = SetupLegalService::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_legal_service(Request $request)
    {
        $data = new  SetupLegalService();
        $data->legal_service_name= $request->legal_service_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_legal_service(Request $request, $id)
{
    $data =  SetupLegalService::find($id);
    $data->legal_service_name= $request->legal_service_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_legal_service($id)
{
    $data =  SetupLegalService::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function matter()
{
    $data = SetupMatter::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_matter(Request $request)
    {
        $data = new  SetupMatter();
        $data->case_class_id= $request->case_class_id;
        $data->case_category_id= $request->case_category_id;
        $data->matter_name= $request->matter_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_matter(Request $request, $id)
{
    $data =  SetupMatter::find($id);
    $data->case_class_id= $request->case_class_id;
    $data->case_category_id= $request->case_category_id;
    $data->matter_name= $request->matter_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_matter($id)
{
    $data =  SetupMatter::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function coordinator()
{
    $data = SetupCoordinator::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_coordinator(Request $request)
    {
        $data = new  SetupCoordinator();
        $data->coordinator_name= $request->coordinator_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_coordinator(Request $request, $id)
{
    $data =  SetupCoordinator::find($id);
    $data->coordinator_name= $request->coordinator_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_coordinator($id)
{
    $data =  SetupCoordinator::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function mode()
{
    $data = SetupMode::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_mode(Request $request)
    {
        $data = new  SetupMode();
        $data->mode_name= $request->mode_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_mode(Request $request, $id)
{
    $data =  SetupMode::find($id);
    $data->mode_name= $request->mode_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_mode($id)
{
    $data =   SetupMode::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function court_proceeding()
{
    $data = SetupCourtProceeding::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_court_proceeding(Request $request)
    {
        $data = new  SetupCourtProceeding();
        $data->court_proceeding_name= $request->court_proceeding_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_court_proceeding(Request $request, $id)
{
    $data =  SetupCourtProceeding::find($id);
    $data->court_proceeding_name= $request->court_proceeding_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_court_proceeding($id)
{
    $data =   SetupCourtProceeding::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function day_notes()
{
    $data = SetupDayNote::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_day_notes(Request $request)
    {
        $data = new  SetupDayNote();
        $data->day_notes_name= $request->day_notes_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_day_notes(Request $request, $id)
{
    $data =   SetupDayNote::find($id);
    $data->day_notes_name= $request->day_notes_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_day_notes($id)
{
    $data =    SetupDayNote::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function in_favour_of()
{
    $data =SetupInFavourOf::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_in_favour_of(Request $request)
    {
        $data = new  SetupInFavourOf();
        $data->in_favour_of_name= $request->in_favour_of_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_in_favour_of(Request $request, $id)
{
    $data =   SetupInFavourOf::find($id);
    $data->in_favour_of_name= $request->in_favour_of_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_in_favour_of($id)
{
    $data =    SetupInFavourOf::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function referrer()
{
    $data = SetupReferrer::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_referrer(Request $request)
    {
        $data = new  SetupReferrer();
        $data->referrer_name= $request->referrer_name;
        $data->referrer_mobile= $request->referrer_mobile;
        $data->referrer_email= $request->referrer_email;
        $data->referrer_address= $request->referrer_address;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_referrer(Request $request, $id)
{
    $data =   SetupReferrer::find($id);
    
   
        $data->referrer_name= $request->referrer_name;
        $data->referrer_mobile= $request->referrer_mobile;
        $data->referrer_email= $request->referrer_email;
        $data->referrer_address= $request->referrer_address;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_referrer($id)
{
    $data =    SetupReferrer::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function party()
{
    $data = SetupParty::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_party(Request $request)
    {
        $data = new  SetupParty();
        $data->party_name= $request->party_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_party(Request $request, $id)
{
    $data =   SetupParty::find($id);
    $data->party_name= $request->party_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_party($id)
{
    $data =   SetupParty ::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function client()
{
    $data =SetupClient::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_client(Request $request)
    {
        $data = new  SetupClient();
        $data->client_name= $request->client_name;
        $data->client_mobile= $request->client_mobile;
        $data->client_address= $request->client_address;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_client(Request $request, $id)
{
    $data =    SetupClient::find($id);
    
   
    $data->client_name= $request->client_name;
    $data->client_mobile= $request->client_mobile;
    $data->client_address= $request->client_address;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_client($id)
{
    $data =   SetupClient ::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function client_name()
{
    $data =SetupClientName::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_client_name(Request $request)
    {
        $data = new  SetupClientName();
        $data->client_name= $request->client_name;
        
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_client_name(Request $request, $id)
{
    $data =   SetupClientName::find($id);
    $data->client_name= $request->client_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_client_name($id)
{
    $data =    SetupClientName::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function profession()
{
    $data =SetupProfession::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_profession(Request $request)
    {
        $data = new  SetupProfession();
        $data->profession_name= $request->profession_name;
        
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_profession(Request $request, $id)
{
    $data =   SetupProfession::find($id);
    $data->profession_name= $request->profession_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_profession($id)
{
    $data =    SetupProfession::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function documents()
{
    $data =SetupDocument::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_documents(Request $request)
    {
        $data = new  SetupDocument();
        $data->documents_name= $request->documents_name;
        
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_documents(Request $request, $id)
{
    $data =   SetupDocument::find($id);
    $data->documents_name= $request->documents_name;
    
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_documents($id)
{
    $data =    SetupDocument::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function documents_type()
{
    $data =SetupDocumentsType::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_documents_type(Request $request)
    {
        $data = new  SetupDocumentsType();
        $data->documents_type_name= $request->documents_type_name;
        
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_documents_type(Request $request, $id)
{
    $data =  SetupDocumentsType ::find($id);
    $data->documents_type_name= $request->documents_type_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_documents_type($id)
{
    $data =   SetupDocumentsType ::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function case_title()
{
    $data =SetupCaseTitle::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_case_title(Request $request)
    {
        $data = new  SetupCaseTitle();
        $data->case_type= $request->case_type;
        $data->case_title_name= $request->case_title_name;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_case_title(Request $request, $id)
{
    $data =   SetupCaseTitle::find($id);
    $data->case_type= $request->case_type;
    $data->case_title_name= $request->case_title_name;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_case_title($id)
{
    $data =    SetupCaseTitle::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function opposition()
{
    $data =SetupOpposition::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_opposition(Request $request)
    {
        $data = new  SetupOpposition();
        $data->opposition_name= $request->opposition_name;
        $data->opposition_mobile= $request->opposition_mobile;
        $data->opposition_email= $request->opposition_email;
        $data->opposition_address= $request->opposition_address;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_opposition(Request $request, $id)
{
    $data =   SetupOpposition::find($id);
    $data->opposition_name= $request->opposition_name;
    $data->opposition_mobile= $request->opposition_mobile;
    $data->opposition_email= $request->opposition_email;
    $data->opposition_address= $request->opposition_address;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_opposition($id)
{
    $data =   SetupOpposition ::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function complainant()
{
    $data =SetupComplainant::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_complainant(Request $request)
    {
        $data = new  SetupComplainant();
        $data->complainant_name= $request->complainant_name;
        $data->complainant_mobile= $request->complainant_mobile;
        $data->complainant_email= $request->complainant_email;
        $data->complainant_address= $request->complainant_address;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_complainant(Request $request, $id)
{
    $data =   SetupComplainant::find($id);
    $data->complainant_name= $request->complainant_name;
    $data->complainant_mobile= $request->complainant_mobile;
    $data->complainant_email= $request->complainant_email;
    $data->complainant_address= $request->complainant_address;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_complainant($id)
{
    $data =    SetupComplainant::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function accused()
{
    $data =SetupAccused::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_accused(Request $request)
    {
        $data = new  SetupAccused();
        $data->accused_name= $request->accused_name;
        $data->accused_mobile= $request->accused_mobile;
        $data->accused_email= $request->accused_email;
        $data->accused_address= $request->accused_address;
        
       
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_accused(Request $request, $id)
{
    $data =   SetupAccused::find($id);
    $data->accused_name= $request->accused_name;
    $data->accused_mobile= $request->accused_mobile;
    $data->accused_email= $request->accused_email;
    $data->accused_address= $request->accused_address;
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_accused($id)
{
    $data =    SetupAccused::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function court_short()
{
    $data =SetupCourtShort::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_court_short(Request $request)
    {
        $data = new  SetupCourtShort();
        $data->case_type= $request->case_type;
        $data->court_short_name= $request->court_short_name;
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_court_short(Request $request, $id)
{
    $data =   SetupCourtShort::find($id);
    $data->case_type= $request->case_type;
    $data->court_short_name= $request->court_short_name;
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_court_short($id)
{
    $data =    SetupCourtShort::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function progress()
{
    $data =SetupProgress::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_progress(Request $request)
    {
        $data = new  SetupProgress();
        $data->progress_name= $request->progress_name;
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_progress(Request $request, $id)
{
    $data =   SetupProgress::find($id);
    $data->progress_name= $request->progress_name;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_progress($id)
{
    $data =    SetupProgress::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function bill_particulars()
{
    $data =SetupBillParticular::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_bill_particulars(Request $request)
    {
        $data = new  SetupBillParticular();
        $data->bill_particulars_name= $request->bill_particulars_name;
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_bill_particulars(Request $request, $id)
{
    $data =   SetupBillParticular::find($id);
    $data->bill_particulars_name= $request->bill_particulars_name;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_bill_particulars($id)
{
    $data =    SetupBillParticular::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function particulars()
{
    $data =SetupParticulars::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_particulars(Request $request)
    {
        $data = new  SetupParticulars();
        $data->particulars_name= $request->particulars_name;
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_particulars(Request $request, $id)
{
    $data =   SetupParticulars::find($id);
    $data->particulars_name= $request->particulars_name;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_particulars($id)
{
    $data =    SetupParticulars::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function bill_schedule()
{
    $data =BillSchedule::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_bill_schedule(Request $request)
    {
        $data = new  BillSchedule();
        $data->bill_schedule_name= $request->bill_schedule_name;
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_bill_schedule(Request $request, $id)
{
    $data =   BillSchedule::find($id);
    $data->bill_schedule_name= $request->bill_schedule_name;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_bill_schedule($id)
{
    $data =    BillSchedule::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function payment_mode()
{
    $data =PaymentMode::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_payment_mode(Request $request)
    {
        $data = new  PaymentMode();
        $data->payment_mode_name= $request->payment_mode_name;
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_payment_mode(Request $request, $id)
{
    $data =  PaymentMode::find($id);
    $data->payment_mode_name= $request->payment_mode_name;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_payment_mode($id)
{
    $data =    PaymentMode::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function group()
{
    $data =SetupGroup::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
public function add_group(Request $request)
    {
        $data = new  SetupGroup();
        $data->group_name= $request->group_name;
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_group(Request $request, $id)
{
    $data =  SetupGroup::find($id);
    $data->group_name= $request->group_name;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}
public function delete_group($id)
{
    $data =    SetupGroup::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function cabinet()
{
    $data =SetupCabinet::where('delete_status',0)->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}

public function add_cabinet(Request $request)
    {
        $data = new  SetupCabinet();
        $data->cabinet_name= $request->cabinet_name;
       
        
        $data->save();
        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => " data added successfully"
        ]);
}
public function update_cabinet(Request $request, $id)
{
    $data =  SetupCabinet::find($id);
    $data->cabinet_name= $request->cabinet_name;
    
    
        
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data updated successfully"
    ]);
}

public function delete_cabinet($id)
{
    $data =    SetupCabinet::find($id);
    $data->delete_status=1;
    $data->update();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => " data deleted successfully"
    ]);
}
public function search($name)
{
    $data =SetupCabinet::where("cabinet_name","like", "%". $name. "%")->get();
    return response()->json([
        "status" => 200,
        "data" => $data,
        "message" => "data get successfully"
    ]);
}
}






