<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\SetupExternalCouncil;
use App\models\SetupClientName;
use App\models\SetupMatter;
use App\models\SetupCourtProceeding;
use App\models\SetupNextDateReason;
use App\models\SetupCourtLastOrder;
use App\models\SetupDayNote;
use App\models\SetupNextDayPresence;
use App\models\SetupCaseStatus;
use App\models\SetupLaw;
use App\models\SetupCourt;
use App\models\SetupMode;
use App\models\SetupDesignation;
use App\models\SetupCaseCategory;
use App\models\SetupPropertyType;
use App\models\SetupPersonTitle;
use App\models\SetupCaseTypes;
use App\models\SetupCompany;
use App\models\SetupRegion;
use App\models\SetupArea;
use App\models\SetupInternalCouncil;
use App\models\SetupClientCategory;
use App\models\SetupBranch;
use App\models\SetupProgram;
use App\models\SetupSection;
use App\models\SetupLegalIssue;
use App\models\SetupLegalService;
use App\models\SetupCoordinator;
use App\models\SetupAllegation;
use App\models\SetupInFavourOf;
use App\models\SetupReferrer;
use App\models\SetupParty;
use App\models\SetupClient;
use App\models\SetupProfession;
use App\models\SetupOpposition;
use App\models\SetupDocument;
use App\models\SetupCaseTitle;
use App\models\SetupComplainant;
use App\models\SetupAccused;
use App\models\SetupCabinet;
use App\models\SetupParticulars;
use App\models\SetupDocumentsType;
use App\models\SetupGroup;
use App\models\Counsel;
use App\models\CriminalCaseStatusLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiLitigationCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function litigation_calander_list()
    {
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $criminal_cases = DB::table('criminal_case_status_logs')->distinct()->orderBy('updated_next_date', 'asc')->where(['delete_status' => 0])->where('updated_next_date', '>=', date('Y-m-d'))->get(['updated_next_date as next_date']);
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();


        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
        $day_notes = SetupDayNote::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();

        $law = SetupLaw::where(['case_type' => 'Criminal', 'delete_status' => 0])->orderBy('law_name', 'asc')->get();
        $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->orderBy('court_name', 'asc')->get();
        $designation = SetupDesignation::where('delete_status', 0)->orderBy('designation_name', 'asc')->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->orderBy('first_name', 'asc')->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->orderBy('case_category', 'asc')->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $property_type = SetupPropertyType::where('delete_status', 0)->orderBy('property_type_name', 'asc')->get();
        $division = DB::table("setup_divisions")->orderBy('division_name', 'asc')->get();
        $person_title = SetupPersonTitle::where('delete_status', 0)->orderBy('person_title_name', 'asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->orderBy('next_date_reason_name', 'asc')->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->orderBy('case_types_name', 'asc')->get();
        $company = SetupCompany::where('delete_status', 0)->orderBy('company_name', 'asc')->get();
        $zone = SetupRegion::where('delete_status', 0)->orderBy('region_name', 'asc')->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->orderBy('court_last_order_name', 'asc')->get();
        $area = SetupArea::where('delete_status', 0)->orderBy('area_name', 'asc')->get();
        $internal_council = SetupInternalCouncil::where('delete_status', 0)->orderBy('first_name', 'asc')->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->orderBy('client_category_name', 'asc')->get();
        $branch = SetupBranch::where('delete_status', 0)->orderBy('branch_name', 'asc')->get();
        $program = SetupProgram::where('delete_status', 0)->orderBy('program_name', 'asc')->get();
        $section = SetupSection::where('delete_status', 0)->orderBy('section_name', 'asc')->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->orderBy('next_day_presence_name', 'asc')->get();
        $legal_issue = SetupLegalIssue::where('delete_status', 0)->orderBy('legal_issue_name', 'asc')->get();
        $legal_service = SetupLegalService::where('delete_status', 0)->orderBy('legal_service_name', 'asc')->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $coordinator = SetupCoordinator::where('delete_status', 0)->orderBy('coordinator_name', 'asc')->get();
        $allegation = SetupAllegation::where('delete_status', 0)->orderBy('allegation_name', 'asc')->get();
        $in_favour_of = SetupInFavourOf::where('delete_status', 0)->orderBy('in_favour_of_name', 'asc')->get();
        $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();
        $referrer = SetupReferrer::where('delete_status', 0)->orderBy('referrer_name', 'asc')->get();
        $party = SetupParty::where('delete_status', 0)->orderBy('party_name', 'asc')->get();
        $client = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
        $profession = SetupProfession::where('delete_status', 0)->orderBy('profession_name', 'asc')->get();
        $opposition = SetupOpposition::where('delete_status', 0)->orderBy('opposition_name', 'asc')->get();
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name', 'asc')->get();
        $case_title = SetupCaseTitle::where(['case_type' => 'Criminal', 'delete_status' => 0])->orderBy('case_title_name', 'asc')->get();
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $accused = SetupAccused::where('delete_status', 0)->orderBy('accused_name', 'asc')->get();
        $court_short = SetupCourt::where('delete_status', 0)->orderBy('court_short_name', 'asc')->get();
        $cabinet = SetupCabinet::where('delete_status', 0)->orderBy('cabinet_name', 'asc')->get();
        $particulars = SetupParticulars::where('delete_status', 0)->orderBy('particulars_name', 'asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();
        $group_name = SetupGroup::get();

        $chamber = Counsel::where('counsel_category','Chamber')->get();
        $leadLaywer = Counsel::where('counsel_type','Internal')->get();
        $assignedlaywer = Counsel::get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();
        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->orderBy('court_proceeding_name', 'asc')->get();
        $day_notes = SetupDayNote::where('delete_status', 0)->orderBy('day_notes_name', 'asc')->get();
        return response()->json([
            "status" => 200,
            "criminal_cases_count" => $criminal_cases_count,
            "criminal_cases" => $criminal_cases,
            "external_council" => $external_council,
            "matter" => $matter ,
            "court_proceeding" => $court_proceeding ,
            "next_date_reason" => $next_date_reason ,
            "last_court_order" => $last_court_order,
            "day_nates" => $day_notes,
            "external_council" => $external_council,
            "next_day_presence" => $next_day_presence, 
            "law" => $law,
            "court" => $court,
            "designation" => $designation,
            "external_council" => $external_council,
            "case_category" => $case_category,
            "case_status" => $case_status,
            "property_type" => $property_type,
            "division" =>  $division ,
            "person_title" => $person_title,
            "next_date_reason" => $next_date_reason,
            "case_types" => $case_types,
            "company" => $company,
            "zone" => $zone ,
            "last_court_order" => $last_court_order,
            "area" =>  $area,
            "internal_council" =>  $internal_council,
            "client_category" => $client_category,
            "branch" => $branch ,
            "program" => $program,
            "section" => $section ,
            "next_day_presence" => $next_day_presence,
            "legal_issue" => $legal_issue,
            "legal_service" => $legal_service,
            "matter" =>  $matter ,
            "coordinator" => $coordinator,
            "allegation" =>  $allegation,
            "in_favour_of" =>  $in_favour_of,
            "mode" =>  $mode,
            "referrer" =>  $referrer,
            "party" =>  $party,
            "client" =>  $client,
            "profession" =>  $profession,
            "opposition" =>  $opposition ,
            "documents" =>  $documents,
            "case_title" =>  $case_title,
            "complaint" =>   $complainant,
            "accused" =>  $accused,
            "court_short" =>  $court_short,
            "cabinet" =>  $cabinet ,
            "particulars" =>  $particulars,
            "document_type" =>  $documents_type,
            "group_name" =>  $group_name ,
            "chamber" =>  $chamber,
            "leadlaywer" => $leadLaywer,
            "assignedlaywer" => $assignedlaywer,
          
           
            
            

            "message" => "data get successfully"
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    
    
           

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function print_litigation_calender_list($date)
    {
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $criminal_cases = DB::table('criminal_case_status_logs')->distinct()->orderBy('updated_next_date', 'asc')->where(['delete_status' => 0])->where('updated_next_date', $date)->get();
        $client_name = SetupClientName::where('delete_status', 0)->where(['delete_status' => 0])->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->where(['delete_status' => 0])->get();
        return response()->json([
            "status"=>200,
            "criminal_cases_count"=>$criminal_cases_count,
            "external_council"=>$external_council,
            "criminal_cases"=>$criminal_cases,
            "client_name"=>$client_name,
            "matter"=>$matter,

            "message"=>"data get successfully"]);
    }
    public function litigation_calender_short()
    {

        $redirect_url =  url('litigation-calender-list');

        $civilCases = CriminalCaseStatusLog::select('updated_next_date')
        ->groupBy('updated_next_date')
        ->get();

        foreach($civilCases as $case){

            $civilCount= CriminalCaseStatusLog::join('criminal_cases','criminal_cases.id','=','criminal_case_status_logs.case_id')
            ->where('case_category_id','Civil')->where('updated_next_date',$case->updated_next_date)->count();

            $criminalCount= CriminalCaseStatusLog::join('criminal_cases','criminal_cases.id','=','criminal_case_status_logs.case_id')
            ->where('case_category_id','Criminal')->where('updated_next_date',$case->updated_next_date)->count();

            $criminal_events[] = [
                'title' => "Civil: $civilCount | Criminal: $criminalCount",
                'url' => "$redirect_url#$case->updated_next_date",
                'start' => $case->updated_next_date,
                'display' => 'list-item',
                'backgroundColor' => '#e50000',
            ];
        }



        
        $criminal_cases = \App\Models\CriminalCaseStatusLog::select('updated_next_date')->where(['delete_status' => 0])->groupBy('updated_next_date')->get();
        $criminal_events = array();
        foreach ($criminal_cases as $case) {
            $case_count = \App\Models\CriminalCaseStatusLog::where(['updated_next_date' => $case->updated_next_date, 'delete_status' => 0])->count();

            $criminal_events[] = [
                'title' => "Criminal: $case_count",
                'url' => "$redirect_url#$case->updated_next_date",
                'start' => $case->updated_next_date,
                'display' => 'list-item',
                'backgroundColor' => 'pink',
            ];
        }



        
        $civil_cases = \App\Models\CivilCases::select('next_date')->where(['delete_status' => 0])->groupBy('next_date')->get();
        $civil_events = array();
        foreach ($civil_cases as $case) {
            $case_count = \App\Models\CivilCases::where(['next_date' => $case->next_date, 'delete_status' => 0])->count();

            $civil_events[] = [
                'title' => "Civil: $case_count",
                'url' => "$redirect_url",
                'start' => $case->next_date,
                'display' => 'list-item',
                'backgroundColor' => 'orange'
            ];
        }

        
        $labour_cases = \App\Models\LabourCase::select('next_date')->where(['delete_status' => 0])->groupBy('next_date')->get();
        $labour_events = array();
        foreach ($labour_cases as $case) {
            $case_count = \App\Models\LabourCase::where(['next_date' => $case->next_date, 'delete_status' => 0])->count();

            $labour_events[] = [
                'title' => "Service: $case_count",
                'url' => "$redirect_url",
                'start' => $case->next_date,
                'display' => 'list-item',
                'backgroundColor' => 'gray'
            ];
        }


        
        $quassi_judicial_cases  = \App\Models\QuassiJudicialCase::select('next_date')->where(['delete_status' => 0])->groupBy('next_date')->get();
        $quassi_judicial_events = array();
        foreach ($quassi_judicial_cases as $case) {
            $case_count = \App\Models\QuassiJudicialCase::where(['next_date' => $case->next_date, 'delete_status' => 0])->count();

            $quassi_judicial_events[] = [
                'title' => "Others: $case_count",
                'url' => "$redirect_url",
                'start' => $case->next_date,
                'display' => 'list-item',
                'backgroundColor' => 'green'
            ];
        }

        
        $high_court_cases  = \App\Models\HighCourtCase::select('order_date')->where(['delete_status' => 0])->groupBy('order_date')->get();
        $high_court_events = array();
        foreach ($high_court_cases as $case) {
            $case_count = \App\Models\HighCourtCase::where(['order_date' => $case->order_date, 'delete_status' => 0])->count();

            $high_court_events[] = [
                'title' => "HCD: $case_count",
                'url' => "$redirect_url",
                'start' => $case->order_date,
                'display' => 'list-item',
                'backgroundColor' => 'blue'
            ];
        }

        
        $appellate_court_case  = \App\Models\AppellateCourtCase::select('order_date')->where(['delete_status' => 0])->groupBy('order_date')->get();
        $appellate_court_events = array();
        foreach ($appellate_court_case as $case) {
            $case_count = \App\Models\AppellateCourtCase::where(['order_date' => $case->order_date, 'delete_status' => 0])->count();

            $appellate_court_events[] = [
                'title' => "AD: $case_count",
                'url' => "$redirect_url",
                'start' => $case->order_date,
                'display' => 'list-item',
                'backgroundColor' => 'blue'
            ];
        }

        
        $events = array_merge($criminal_events, $civil_events, $labour_events, $quassi_judicial_events, $high_court_events, $appellate_court_events);


        return response()->json([
            "status"=>200,
            "criminal_events"=>$criminal_events,
            "civil_events"=>$civil_events,
            "labour_events"=>$labour_events,
            "quassi_judicial_events"=>$quassi_judicial_events,
            "high_court_events"=>$high_court_events,
            "appellate_court_events"=>$appellate_court_events,

            "message" => " data get successfully"
        ]);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function litigation_calender_short_court_wise()
    {
        $redirect_url =  url('litigation-calender-list');

        $totalCaseLog = CriminalCaseStatusLog::select('updated_next_date')
        ->groupBy('updated_next_date')
        ->get();
        foreach($totalCaseLog as $case){

            $districtCount= CriminalCaseStatusLog::join('criminal_cases','criminal_cases.id','=','criminal_case_status_logs.case_id')
            ->where('case_type','District')->where('updated_next_date',$case->updated_next_date)->count();

            $specialCount= CriminalCaseStatusLog::join('criminal_cases','criminal_cases.id','=','criminal_case_status_logs.case_id')
            ->where('case_type','Special')->where('updated_next_date',$case->updated_next_date)->count();

            $criminal_events[] = [
                'title' => "District: $districtCount | Special: $specialCount",
                'url' => "$redirect_url#$case->updated_next_date",
                'start' => $case->updated_next_date,
                'display' => 'list-item',
                'backgroundColor' => 'darkorange',
            ];
        }
           
           $labour_cases = \App\Models\LabourCase::select('next_date')->where(['delete_status' => 0])->groupBy('next_date')->get();
           $labour_events = array();
           foreach ($labour_cases as $case) {
               $case_count = \App\Models\LabourCase::where(['next_date' => $case->next_date, 'delete_status' => 0])->count();
   
               $labour_events[] = [
                   'title' => "Service: $case_count",
                   'url' => "$redirect_url",
                   'start' => $case->next_date,
                   'display' => 'list-item',
                   'backgroundColor' => 'gray'
               ];
           }
           $quassi_judicial_cases  = \App\Models\QuassiJudicialCase::select('next_date')->where(['delete_status' => 0])->groupBy('next_date')->get();
        $quassi_judicial_events = array();
        foreach ($quassi_judicial_cases as $case) {
            $case_count = \App\Models\QuassiJudicialCase::where(['next_date' => $case->next_date, 'delete_status' => 0])->count();

            $quassi_judicial_events[] = [
                'title' => "Others: $case_count",
                'url' => "$redirect_url",
                'start' => $case->next_date,
                'display' => 'list-item',
                'backgroundColor' => 'green'
            ];
        }
        $high_court_cases  = \App\Models\HighCourtCase::select('order_date')->where(['delete_status' => 0])->groupBy('order_date')->get();
        $high_court_events = array();
        foreach ($high_court_cases as $case) {
            $case_count = \App\Models\HighCourtCase::where(['order_date' => $case->order_date, 'delete_status' => 0])->count();

            $high_court_events[] = [
                'title' => "HCD: $case_count",
                'url' => "$redirect_url",
                'start' => $case->order_date,
                'display' => 'list-item',
                'backgroundColor' => 'blue'
            ];
        }
        $appellate_court_case  = \App\Models\AppellateCourtCase::select('order_date')->where(['delete_status' => 0])->groupBy('order_date')->get();
        $appellate_court_events = array();
        foreach ($appellate_court_case as $case) {
            $case_count = \App\Models\AppellateCourtCase::where(['order_date' => $case->order_date, 'delete_status' => 0])->count();

            $appellate_court_events[] = [
                'title' => "AD: $case_count",
                'url' => "$redirect_url",
                'start' => $case->order_date,
                'display' => 'list-item',
                'backgroundColor' => 'red'
            ];
        }
        $events = array_merge($criminal_events, $labour_events, $quassi_judicial_events, $high_court_events, $appellate_court_events);
        return response()->json([
            "status"=>200,
            "criminal_events"=>$criminal_events,
            "labour_events"=>$labour_events,
            "quassi_judiial_events"=>$quassi_judicial_events,
            "high_court_events"=>$high_court_events,
            "appellate_court_events"=>$appellate_court_events,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search_litigation_calendar(Request $request)
    {
        $request_data = $request->all();

        $is_searched = 'Searched';
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        if ($request->from_date != "dd/mm/yyyy" && $request->to_date != "dd/mm/yyyy") {

            $from_date_explode = explode('/', $request->from_date);
            $from_date_implode = implode('-', $from_date_explode);
            $from_date = date('Y-m-d', strtotime($from_date_implode));

            $to_date_explode = explode('/', $request->to_date);
            $to_date_implode = implode('-', $to_date_explode);
            $to_date = date('Y-m-d', strtotime($to_date_implode));

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])

                ->where('next_date', '>=', $from_date)
                ->where('next_date', '<=', $to_date)->get(['next_date']);


            return response()->json([
            "status"=>200,
            "matter"=>$matter,
            "client_name"=>$client_name,
            "external_council"=>$external_council,
            "criminal_cases"=>$criminal_cases,
            "criminal_cases_count"=>$criminal_cases_count,
            "is_searched"=>$is_searched,
            "from_date"=>$from_date,
            "to_date"=>$to_date,

            "message" => " data get successfully"
        ]);
    

        } else if ($request->from_date != "dd/mm/yyyy") {

            $from_date_explode = explode('/', $request->from_date);
            $from_date_implode = implode('-', $from_date_explode);
            $from_date = date('Y-m-d', strtotime($from_date_implode));

            

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
             
                ->where('next_date', '=', $from_date)
                ->get(['next_date']);
            $to_date = $from_date;
            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
            
        } else if ($request->to_date != "dd/mm/yyyy") {

            $to_date_explode = explode('/', $request->to_date);
            $to_date_implode = implode('-', $to_date_explode);
            $to_date = date('Y-m-d', strtotime($to_date_implode));

          

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
              
                ->where('next_date', '=', $to_date)
                ->get(['next_date']);
            $from_date = $to_date;

            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
        } else if ($request->lawyer_advocate_id) {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                ->where('lawyer_advocate_id', '=', $request->lawyer_advocate_id)
                ->get(['next_date']);
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
         
            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
        } else if ($request->client_id) {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                ->where('case_infos_complainant_informant_name', 'LIKE', "%{$request->client_id}%")
                ->orWhere('case_infos_accused_name', 'like', "%{$request->client_id}%")
                ->get(['next_date']);
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');

            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
        } else if ($request->client_name_write) {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                ->where('criminal_cases.case_infos_complainant_informant_name', 'LIKE', "%{$request->client_name_write}%")
                ->orWhere('criminal_cases.case_infos_accused_name', 'like', "%{$request->client_name_write}%")
                ->get(['next_date']);
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');

            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
        } else if ($request->matter_id) {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                ->where('matter_id', '=', $request->matter_id)
                ->get(['next_date']);
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            
            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
        } else if ($request->matter_write) {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                ->where('matter_write', '=', $request->matter_write)
                ->get(['next_date']);
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');

            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
        } else if ($request->todays_case) {

            $from_date = date('Y-m-d');

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
               
                ->where('next_date', '=', $from_date)
                ->get(['next_date']);
            $to_date = $from_date;

            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
        }else if ($request->tomorrows_case) {

            // $curr_date = date('Y-m-d');

            $from_date = date("Y-m-d", strtotime("tomorrow"));


            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
              
                ->where('next_date', '=', $from_date)
                ->get(['next_date']);
            $to_date = $from_date;

            return response()->json([
                "status"=>200,
                "matter"=>$matter,
                "client_name"=>$client_name,
                "external_council"=>$external_council,
                "criminal_cases"=>$criminal_cases,
                "criminal_cases_count"=>$criminal_cases_count,
                "is_searched"=>$is_searched,
                "from_date"=>$from_date,
                "to_date"=>$to_date,

                "message" => " data get successfully"
            ]);
        } else {
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
            $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
        }
        return response()->json([
            "status"=>200,
            "matter"=>$matter,
            "client_name"=>$client_name,
            "external_council"=>$external_council,
            "criminal_cases"=>$criminal_cases,
            "criminal_cases_count"=>$criminal_cases_count,
            "is_searched"=>$is_searched,
            "from_date"=>$from_date,
            "to_date"=>$to_date,

            "message" => " data get successfully"
        ]);

    }
    // public function calendar_short_next(Request $request)
    // {

       

    //     $time = strtotime($request->from_date);
    //     $date = date('F d, Y', strtotime("+1 month", $time));

    //     $search_month = explode('-', $request->from_date);

    //     $month = $search_month[0] . '-' . ($search_month[1]);
    //     $start = Carbon::parse($month)->startOfMonth();
    //     $end = Carbon::parse($month)->endOfMonth();
    //     $dates = [];
    //     while ($start->lte($end)) {
    //         $dates[] = $start->copy();
    //         $start->addDay();
    //     }

    //     return response()->json([
    //         "status"=>200,
    //         "dates"=>$dates,
    //         "date"=>$date,
    //         "month"=>$month,
    //         "search_month"=>$search_month,
    //         "start"=>$start,
    //         "end"=>$end,


    //         "message" => " data get successfully"
    //     ]);
    // }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function litigation_calendar_list_print_preview()
    {
        
        
           
            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
            $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
       

            $criminal_cases = DB::table('criminal_cases')
                ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
                ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
                ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
                ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
                ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
                ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
                ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
                ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
               ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
                ->select('criminal_cases.*',
                'setup_case_statuses.case_status_name',
                'setup_case_titles.case_title_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_courts.court_name',
                'setup_districts.district_name',
                'accused_district.district_name as accused_district_name',
                'setup_case_types.case_types_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_title.case_title_name as sub_seq_case_title_name')
                ->orderBy('criminal_cases.received_date','asc')
                ->where('criminal_cases.delete_status',0)
                ->distinct('criminal_cases.next_date')
                ->get();
                return response()->json([
                    "status"=>200,
                    "criminal_cases_count"=>$criminal_cases_count,
                    "criminal_cases"=>$criminal_cases,

                    "message"=> "data get succesfully"
                ]);
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
