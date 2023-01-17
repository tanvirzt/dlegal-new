<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SetupArea;
use App\Models\SetupBranch;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseClass;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseTypes;
use App\Models\SetupCompany;
use App\Models\SetupCourt;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupDesignation;
use App\Models\SetupExternalCouncil;
use App\Models\SetupInternalCouncil;
use App\Models\SetupLaw;
use App\Models\SetupNextDateReason;
use App\Models\SetupPersonTitle;
use App\Models\SetupProgram;
use App\Models\SetupPropertyType;
use App\Models\SetupRegion;
use App\Models\SetupSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiHighCourtCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function high_court_cases()
    {
        $data = DB::table('high_court_cases')
        ->leftJoin('setup_case_categories', 'high_court_cases.case_category_id', 'setup_case_categories.id')
        ->leftJoin('setup_case_subcategories', 'high_court_cases.case_subcategory_id', 'setup_case_subcategories.id')
        ->select('high_court_cases.*', 'setup_case_categories.case_category', 'setup_case_subcategories.case_subcategory')
        ->get();

    $court = SetupCourt::where('delete_status', 0)->get();
    $case_category = SetupCaseCategory::where(['case_type' => 'High Court Division', 'delete_status' => 0])->get();
    //    $case_category = SetupCaseCategory::where(['delete_status' => 0])->get();

       return response()->json([
        "status"=>200,
        "data"=>$data,
        "case_category"=>$case_category,

        "message"=>"data get successfully"

       ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_high_court_cases()
    {
        $court = SetupCourt::where(['case_type' => 'High Court Division','delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'High Court Division', 'delete_status' => 0])->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->get();
        $property_type = SetupPropertyType::where('delete_status', 0)->get();
        $division = DB::table("setup_divisions")->get();
        $person_title = SetupPersonTitle::where('delete_status', 0)->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $company = SetupCompany::where('delete_status', 0)->get();
        $zone = SetupRegion::where('delete_status', 0)->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
        $area = SetupArea::where('delete_status', 0)->get();
        $internal_council = SetupInternalCouncil::where('delete_status', 0)->get();
        $branch = SetupBranch::where('delete_status', 0)->get();
        $program = SetupProgram::where('delete_status', 0)->get();
        $case_class = SetupCaseClass::where('delete_status', 0)->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $law = SetupLaw::where(['case_type' => 'High Court Division','delete_status' => 0])->get();

        return response()->json([
            "status"=>200,
            "court"=>$court,
            "designation"=>$designation,
            "external_council"=>$external_council,
            "case_category"=>$case_category,
            "case_status"=>$case_status,
            "property_type"=>$property_type,
            "division"=>$division,
            "person_title"=>$person_title,
            "next_date_reason"=>$next_date_reason,
            "case_types"=>$case_types,
            "company"=>$company,
            "zone"=>$zone,
            "last_court_oeder"=>$last_court_order,
            "area"=>$area,
            "internal_council"=>$internal_council,
            "branch"=>$branch,
            "program"=>$program,
            "case_class"=>$case_class,
            "section"=>$section,
            "law"=>$law,

            "message"=>"data added successfully"
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
