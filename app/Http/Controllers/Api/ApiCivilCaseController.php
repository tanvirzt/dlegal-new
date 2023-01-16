<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\CivilCases;
use App\models\SetupCaseTypes;
use App\models\SetupCourt;
use App\models\SetupCaseCategory;
use App\models\SetupLaw;
use App\models\SetupDesignation;
use App\models\SetupExternalCouncil;
use App\models\SetupCaseStatus;
use App\models\SetupPropertyType;
use App\models\SetupPersonTitle;
use App\models\SetupNextDateReason;
use App\models\SetupCompany;
use App\models\SetupRegion;
use App\models\SetupCourtLastOrder;
use App\models\SetupArea;
use App\models\SetupInternalCouncil;
use App\models\SetupClientCategory;
use App\models\SetupSection;
use App\models\SetupNextDayPresence;
use App\models\SetupInFavourOf;
use App\models\SetupDistrict;
use App\models\SetupThana;
use App\models\SetupExternalCouncilAssociate;
use App\models\SetupClientSubcategory;
use App\models\SetupCaseSubcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiCivilCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function civil_cases()
    {
        $data = CivilCases::all();
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();

        $data = DB::table('civil_cases')
            ->select('civil_cases.*')
            ->get();



        return response()->json([
            "status"=>200,
            "data"=>$data,
            "case_types"=>$case_types,
            "division"=>$division,
            "court"=>$court,
            "case_category"=>$case_category,

            "message"=>"data get successfully"
        ]);

    }
    public function add_civil_cases()
    {
        $law = SetupLaw::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
        $court = SetupCourt::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->get();
        $property_type = SetupPropertyType::where('delete_status', 0)->get();
        $division = DB::table("setup_divisions")->get();
        $person_title = SetupPersonTitle::where('delete_status', 0)->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        //  $next_date_reason = DB::table('setup_next_date_reasons')->get();
        $company = SetupCompany::where('delete_status', 0)->get();
        $zone = SetupRegion::where('delete_status', 0)->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
        $area = SetupArea::where('delete_status', 0)->get();
        $internal_council = SetupInternalCouncil::where('delete_status', 0)->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $in_favour_of = SetupInFavourOf::where('delete_status', 0)->orderBy('in_favour_of_name','asc')->get();

        
        return response()->json([
            "status"=>200,
            "person_title"=>$person_title,
            "division"=>$division,
            "case_status"=>$case_status,
            "case_category"=>$case_category,
            "external_council"=>$external_council,
            "designation"=>$designation,
            "court"=>$court,
            "law"=>$law,
            "next_date_reason"=>$next_date_reason,
            "last_court_order"=>$last_court_order,
            "property_type"=>$property_type,
            "case_types"=>$case_types,
            "company"=>$company,
            "zone"=>$zone,
            "area"=>$area,
            "internal_council"=>$internal_council,
            "client_category"=>$client_category,
            "section"=>$section,
            "next_day_presence"=>$next_day_presence,
            "in_favour_of"=>$in_favour_of,

            "message"=>"data added successfully"
        ]);
    }
   






    

        




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
