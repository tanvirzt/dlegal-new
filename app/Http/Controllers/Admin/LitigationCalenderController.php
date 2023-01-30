<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalCase;
use App\Models\CriminalCaseStatusLog;
use App\Models\SetupClientName;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SetupCaseTypes;
use App\Models\SetupCourt;
use App\Models\SetupCaseCategory;
use App\Models\SetupComplainant;
use App\Models\SetupMatter;
use App\Models\SetupClient;
use App\Models\SetupExternalCouncil;
use App\Models\SetupCaseStatus;
use App\Models\SetupNextDateReason;
use App\Models\SetupClientCategory;
use App\Models\SetupGroup;
use App\Models\SetupCourtProceeding;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupDayNote;
use App\Models\SetupNextDayPresence;
use App\Models\SetupMode;
use App\Models\CriminalCasesCaseSteps;
use App\Models\SetupLaw;
use App\Models\SetupDesignation;
use App\Models\SetupPropertyType;
use App\Models\SetupCompany;
use App\Models\SetupInternalCouncil;
use App\Models\SetupDivision;
use App\Models\SetupDistrict;
use App\Models\SetupExternalCouncilAssociate;
use App\Models\SetupSection;
use App\Models\SetupPersonTitle;
use App\Models\SetupThana;
use App\Models\SetupRegion;
use App\Models\CriminalCasesSwitchRecord;
use App\Models\CriminalCasesWorkingDoc;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Admin;
use App\Models\CriminalCaseActivityLog;
use App\Models\SetupAccused;
use App\Models\SetupAllegation;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupCaseTitle;
use App\Models\SetupClientSubcategory;
use App\Models\SetupCoordinator;
use App\Models\SetupCourtShort;
use App\Models\SetupDocument;
use App\Models\SetupInFavourOf;

use App\Models\SetupLegalIssue;
use App\Models\SetupLegalService;

use App\Models\SetupOpposition;
use App\Models\SetupParty;

use App\Models\SetupProfession;
use App\Models\SetupReferrer;

use App\Models\SetupArea;
use App\Models\SetupBranch;
use App\Models\SetupProgram;
use App\Models\SetupAlligation;
use App\Models\CriminalCasesFile;
use Illuminate\Support\Facades\Auth;
use App\Models\CivilCases;
use App\Models\SetupBillType;
use App\Models\SetupBillParticular;
use App\Models\BillSchedule;
use App\Models\PaymentMode;
use App\Models\CriminalCasesBilling;

use App\Mail\CaseForwardedMail;
use App\Models\CasesNotifications;
use App\Models\SetupCabinet;

use App\Models\CriminalCasesDocumentsReceived;
use App\Models\CriminalCasesDocumentsRequired;
use App\Models\SetupParticulars;
use App\Models\CriminalCasesLetterNotice;
use App\Models\CriminalCasesSendMessage;
use App\Mail\SendMessage;
use App\Models\Counsel;
use App\Models\CriminalCasesCaseFileLocation;
use App\Models\CriminalCasesOppsitionLawyer;
use App\Models\SetupDocumentsType;

use App\Models\DocumentLatest;
use Session;
use PDF;
use Mail;


class LitigationCalenderController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('permission:search-wizard-list', ['only' => ['search_case_pages']]);
        $this->middleware('permission:litigation-calendar-list', ['only' => ['litigation_calender_list', 'search_litigation_calendar', 'litigation_calendar_list_print_preview_search', 'calendar_list_arrow_up', 'calendar_list_arrow_down']]);
        $this->middleware('permission:litigation-calendar-short', ['only' => ['litigation_calender_short', 'search_litigation_calendar_short', 'calendar_short_next_previous', 'calendar_short_next']]);
    }

    //
    public function print_litigation_calender_list($date)
    {

        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $criminal_cases = DB::table('criminal_case_status_logs')->distinct()->orderBy('updated_next_date', 'asc')->where(['delete_status' => 0])->where('updated_next_date', $date)->get();
        $client_name = SetupClientName::where('delete_status', 0)->where(['delete_status' => 0])->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->where(['delete_status' => 0])->get();
       // dd($criminal_cases);
       $print_date=$date;
        return view('litigation_management.litigation_calender.print', compact( 'criminal_cases','client_name','matter','criminal_cases_count','external_council','print_date'));
    }

    public function  litigation_calender_list()
    {
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $criminal_cases = DB::table('criminal_case_status_logs')->distinct()->orderBy('updated_next_date', 'asc')->where(['delete_status' => 0])->where('updated_next_date', '>=', date('Y-m-d'))->get(['updated_next_date as next_date']);
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $criminal_cases = DB::table('criminal_case_status_logs')->distinct()->orderBy('updated_next_date', 'asc')->where(['delete_status' => 0])->where('updated_next_date', '>=', date('Y-m-d'))->get(['updated_next_date as next_date']);
//dd($criminal_cases);
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
        return view('litigation_management.litigation_calender.litigation_calender_list',compact('mode','matter','next_day_presence', 'client_name', 'external_council', 'criminal_cases','last_court_order','external_council',
         'criminal_cases_count','assignedlaywer','leadLaywer','chamber', 'group_name','next_date_reason','court_proceeding',
          'documents_type', 'particulars','case_status','next_date_reason','court_proceeding','day_notes'));

    }

    public function litigation_calender_short()
    {

        $redirect_url =  url('litigation-calender-list');

        $civilCases = CriminalCaseStatusLog::select('updated_next_date')
        ->groupBy('updated_next_date')
        ->get();

        // foreach($civilCases as $case){

        //     $civilCount= CriminalCaseStatusLog::join('criminal_cases','criminal_cases.id','=','criminal_case_status_logs.case_id')
        //     ->where('case_category_id','Civil')->where('updated_next_date',$case->updated_next_date)->count();

        //     $criminalCount= CriminalCaseStatusLog::join('criminal_cases','criminal_cases.id','=','criminal_case_status_logs.case_id')
        //     ->where('case_category_id','Criminal')->where('updated_next_date',$case->updated_next_date)->count();

        //     $criminal_events[] = [
        //         'title' => "Civil: $civilCount | Criminal: $criminalCount",
        //         'url' => "$redirect_url#$case->updated_next_date",
        //         'start' => $case->updated_next_date,
        //         'display' => 'list-item',
        //         'backgroundColor' => '#e50000',
        //     ];
        // }



        // Criminal Case
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

        //Civil Case
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

        //Service/LabourCase
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


        //Others/QuassiJudicialCase
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

        //HCD/HighCourtCase
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

        //AD/HighCourtCase
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

        //Marge all cases
        $events = array_merge($criminal_events, $civil_events, $labour_events, $quassi_judicial_events, $high_court_events, $appellate_court_events);

//dd($events);
        return view('litigation_management.litigation_calender.litigation_calender_short', ['events' => $events]);
    }

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



        //Service/LabourCase
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


        //Others/QuassiJudicialCase
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

        //HCD/HighCourtCase
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

        //AD/HighCourtCase
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

        //Marge all cases
        $events = array_merge($criminal_events, $labour_events, $quassi_judicial_events, $high_court_events, $appellate_court_events);


        return view('litigation_management.litigation_calender.litigation_calender_short', ['events' => $events]);
    }

    public function search_litigation_calendar(Request $request)
    {
        //dd($request->all());

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
                // ->where('next_date','>=',date('Y-m-d'))
                ->where('next_date', '>=', $from_date)
                ->where('next_date', '<=', $to_date)->get(['next_date']);


            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
        } else if ($request->from_date != "dd/mm/yyyy") {

            $from_date_explode = explode('/', $request->from_date);
            $from_date_implode = implode('-', $from_date_explode);
            $from_date = date('Y-m-d', strtotime($from_date_implode));

            // $to_date_explode = explode('/', $request->to_date);
            // $to_date_implode = implode('-', $to_date_explode);
            // $to_date = date('Y-m-d', strtotime($to_date_implode));

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                // ->where('next_date','>=',date('Y-m-d'))
                ->where('next_date', '=', $from_date)
                ->get(['next_date']);
            $to_date = $from_date;

            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
        } else if ($request->to_date != "dd/mm/yyyy") {

            $to_date_explode = explode('/', $request->to_date);
            $to_date_implode = implode('-', $to_date_explode);
            $to_date = date('Y-m-d', strtotime($to_date_implode));

            // $to_date_explode = explode('/', $request->to_date);
            // $to_date_implode = implode('-', $to_date_explode);
            // $to_date = date('Y-m-d', strtotime($to_date_implode));

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                // ->where('next_date','>=',date('Y-m-d'))
                ->where('next_date', '=', $to_date)
                ->get(['next_date']);
            $from_date = $to_date;

            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
        } else if ($request->lawyer_advocate_id) {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                ->where('lawyer_advocate_id', '=', $request->lawyer_advocate_id)
                ->get(['next_date']);
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            // dd($criminal_cases);
            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
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

            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
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

            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
        } else if ($request->matter_id) {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                ->where('matter_id', '=', $request->matter_id)
                ->get(['next_date']);
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            // dd($criminal_cases);
            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
        } else if ($request->matter_write) {

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                ->where('matter_write', '=', $request->matter_write)
                ->get(['next_date']);
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');

            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
        } else if ($request->todays_case) {

            $from_date = date('Y-m-d');

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                // ->where('next_date','>=',date('Y-m-d'))
                ->where('next_date', '=', $from_date)
                ->get(['next_date']);
           
            $to_date = $from_date;

            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
        }else if ($request->tomorrows_case) {

            // $curr_date = date('Y-m-d');

            $from_date = date("Y-m-d", strtotime("tomorrow"));


            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);

            $criminal_cases = DB::table('criminal_cases')
                ->distinct()->orderBy('next_date', 'asc')
                ->where(['delete_status' => 0])
                // ->where('next_date','>=',date('Y-m-d'))
                ->where('next_date', '=', $from_date)
                ->get(['next_date']);
            $to_date = $from_date;

            // return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date'));
        } else {
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');

            $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
            $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
        }
         //dd($criminal_cases);
        return view('litigation_management.litigation_calender.litigation_calender_list', compact('matter', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date', 'request_data'));

    }

    public function search_case_pages()
    {

        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->get();
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $client = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->orderBy('client_category_name', 'asc')->get();
        $group_name = SetupGroup::get();


        return view('litigation_management.litigation_search.cases', compact('group_name', 'client_category', 'next_date_reason', 'case_status', 'external_council', 'division', 'case_types', 'court', 'case_category', 'complainant', 'matter', 'client', 'client_name'));
    }

    public function search_cases(Request $request)
    {
        $request_data = $request->all();

        //    dd($request->all());
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->get();
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $client = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->orderBy('client_category_name', 'asc')->get();
        $group_name = SetupGroup::get();


        if ($request->from_next_date != "dd/mm/yyyy") {
            $from_next_date_explode = explode('/', $request->from_next_date);
            $from_next_date_implode = implode('-', $from_next_date_explode);
            $from_next_date = date('Y-m-d', strtotime($from_next_date_implode));
        } else if ($request->from_next_date == "dd/mm/yyyy") {
            $from_next_date = null;
        }

        if ($request->to_next_date != "dd/mm/yyyy") {
            $to_next_date_explode = explode('/', $request->to_next_date);
            $to_next_date_implode = implode('-', $to_next_date_explode);
            $to_next_date = date('Y-m-d', strtotime($to_next_date_implode));
        } else if ($request->to_next_date == "dd/mm/yyyy") {
            $to_next_date = null;
        }


        // dd($received_date);
        $query = DB::table('criminal_cases')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
            ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id');


        switch ($request->isMethod('post')) {
            case $request->case_infos_case_year && $request->case_infos_case_no:
                $query2 = $query->where('criminal_cases.case_infos_case_year', 'LIKE', "%{$request->case_infos_case_year}%")->where('criminal_cases.case_infos_case_no', 'LIKE', "%{$request->case_infos_case_no}%");
                break;
            case $request->created_case_id:
                $query2 = $query->where('criminal_cases.created_case_id', 'LIKE', "%{$request->created_case_id}%");
                break;
            case $request->case_infos_case_no:
                $query2 = $query->where('criminal_cases.case_infos_case_no', 'LIKE', "%{$request->case_infos_case_no}%");
                break;
            case $request->case_infos_case_year:
                $query2 = $query->where('criminal_cases.case_infos_case_year', 'LIKE', "%{$request->case_infos_case_year}%");
                break;
            case $request->name_of_the_court_id:
                $query2 = $query->where('criminal_cases.name_of_the_court_id', $request->name_of_the_court_id);
                break;
            case $request->case_infos_complainant_informant_name:
                $query2 = $query->where('criminal_cases.case_infos_complainant_informant_name', 'LIKE', "%{$request->case_infos_complainant_informant_name}%");
                break;
            case $request->case_infos_accused_name:
                $query2 = $query->where('criminal_cases.case_infos_accused_name', 'LIKE', "%{$request->case_infos_accused_name}%");
                break;
            case $request->case_type_id:
                $query2 = $query->where('criminal_cases.case_type_id', $request->case_type_id);
                break;
            case $request->matter_id:
                $query2 = $query->where('criminal_cases.matter_id', $request->matter_id);
                break;
            case $request->case_category_id:
                $query2 = $query->where('criminal_cases.case_category_id', $request->case_category_id);
                break;
            case $request->case_subcategory_id:
                $query2 = $query->where('criminal_cases.case_subcategory_id', 'LIKE', "%{$request->case_subcategory_id}%");
                break;
            case $request->client_division_id:
                $query2 = $query->where('criminal_cases.client_division_id', $request->client_division_id);
                break;
            case $request->client_divisoin_write:
                $query2 = $query->where('criminal_cases.client_divisoin_write', 'LIKE', "%{$request->client_divisoin_write}%");
                break;
            case $request->client_district_id:
                $query2 = $query->where('criminal_cases.client_district_id', $request->client_district_id);
                break;
            case $request->client_district_write:
                $query2 = $query->where('criminal_cases.client_district_write', 'LIKE', "%{$request->client_district_write}%");
                break;
            case $request->client_thana_id:
                $query2 = $query->where('criminal_cases.client_thana_id', $request->client_thana_id);
                break;
            case $request->client_thana_write:
                $query2 = $query->where('criminal_cases.client_thana_write', 'LIKE', "%{$request->client_thana_write}%");
                break;
            case $request->client_id:
                $query2 = $query->where('criminal_cases.case_infos_complainant_informant_name', 'LIKE', "%{$request->client_id}%")
                    ->orWhere('criminal_cases.case_infos_accused_name', 'like', "%{$request->client_id}%");
                break;
            case $request->client_name_write:
                $query2 = $query->where('criminal_cases.case_infos_complainant_informant_name', 'LIKE', "%{$request->client_name_write}%")
                    ->orWhere('criminal_cases.case_infos_accused_name', 'like', "%{$request->client_name_write}%");
                break;
            case $request->lawyer_advocate_id:
                $query2 = $query->where('criminal_cases.lawyer_advocate_id', $request->lawyer_advocate_id);
                break;
            case $request->case_status_id:
                $query2 = $query->where('criminal_cases.case_status_id', $request->case_status_id);
                break;
            case $request->next_date_fixed_id:
                $query2 = $query->where('criminal_cases.next_date_fixed_id', $request->next_date_fixed_id);
                break;
            case $request->from_next_date && $request->to_next_date:
                $query2 = $query->where('next_date', '>=', $from_next_date)
                    ->where('next_date', '<=', $to_next_date);
                break;
            case $request->from_next_date:
                $query2 = $query->where('criminal_cases.next_date', $from_next_date);
                break;
            case $request->to_next_date:
                $query2 = $query->where('criminal_cases.next_date', $to_next_date);
                break;
            case $request->client_category_id && $request->client_subcategory_id:
                $query2 = $query->where('criminal_cases.client_category_id', $request->client_category_id)
                    ->where('criminal_cases.client_subcategory_id', $request->client_subcategory_id);
                break;
            case $request->client_category_id:
                $query2 = $query->where('criminal_cases.client_category_id', $request->client_category_id);
                break;
            case $request->client_group_id:
                $query2 = $query->where('criminal_cases.client_group_id', $request->client_group_id);
                break;
            case $request->client_group_write:
                $query2 = $query->where('criminal_cases.client_group_write', 'like', "%{$request->client_group_write}%");
                break;
            default:
                $query2 = $query;
        }


        $data = $query2->select(
            'criminal_cases.*',
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
            'case_infos_title.case_title_name as sub_seq_case_title_name',
            'setup_matters.matter_name'
        )
            ->where('criminal_cases.delete_status', 0)
            ->get();

        $is_search = 'Searched';
        // dd($data);
        return view('litigation_management.litigation_search.cases', compact('group_name', 'client_category', 'is_search', 'next_date_reason', 'case_status', 'external_council', 'data', 'division', 'case_types', 'court', 'case_category', 'complainant', 'matter', 'client', 'client_name', 'request_data'));
    }

    public function search_litigation_calendar_short(Request $request)
    {

        // dd($request->from_date);

        $date = date('F, Y', strtotime($request->from_date));
        // dd($date);


        $search_month = explode('-', $request->from_date);



        // dd($search_month[1]);

        // dd($search_month[0].'-'.$search_month[1]);

        $month = $search_month[0] . '-' . $search_month[1];
        // dd($month);
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
        // dd($end);
        $dates = [];
        while ($start->lte($end)) {
            $dates[] = $start->copy();
            $start->addDay();
        }

        return view('litigation_management.litigation_calender.litigation_calender_short', compact('dates', 'date'));
    }

    public function calendar_short_next_previous(Request $request)
    {

        // dd($request->all());

        // return $request->all();

        $time = strtotime($request->from_date);

        // if ($request->arrow_up) {
        //     $date = date('F, Y',strtotime("+1 month",$time));
        // } else {
        //     $date = date('F, Y',strtotime(' - 1 months',$time));
        // }
        $date = date('F d, Y', strtotime(' - 1 months', $time));

        $search_month = explode('-', $request->from_date);


        $month = $search_month[0] . '-' . ($search_month[1]);
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
        $dates = [];
        while ($start->lte($end)) {
            $dates[] = $start->copy();
            $start->addDay();
        }

        return view('litigation_management.litigation_calender.litigation_calender_short', compact('dates', 'date'));
    }

    public function calendar_short_next(Request $request)
    {

        // dd($request->all());

        $time = strtotime($request->from_date);

        // if ($request->arrow_up) {
        //     $date = date('F, Y',strtotime("+1 month",$time));
        // } else {
        //     $date = date('F, Y',strtotime(' - 1 months',$time));
        // }
        // $date = date('F, Y',strtotime(' - 1 months',$time));
        $date = date('F d, Y', strtotime("+1 month", $time));

        $search_month = explode('-', $request->from_date);

        $month = $search_month[0] . '-' . ($search_month[1]);
        $start = Carbon::parse($month)->startOfMonth();
        $end = Carbon::parse($month)->endOfMonth();
        $dates = [];
        while ($start->lte($end)) {
            $dates[] = $start->copy();
            $start->addDay();
        }

        return view('litigation_management.litigation_calender.litigation_calender_short', compact('dates', 'date'));
    }

    public function litigation_calendar_list_print_preview()
    {
        // dd('adsfsdf');
        // Session::put('from_date', $from_date);
        // Session::put('to_date', $to_date);
        // dd(Session::get('from_date'));
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
        // dd($criminal_cases);
        // dd($data);

        //     $criminal_cases = DB::table('criminal_cases')
        //     ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
        //     ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
        //     ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
        //     ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
        //     ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
        //     ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
        //     ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
        //     ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
        //    ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
        //     ->select('criminal_cases.*',
        //     'setup_case_statuses.case_status_name',
        //     'setup_case_titles.case_title_name',
        //     'setup_next_date_reasons.next_date_reason_name',
        //     'setup_courts.court_name',
        //     'setup_districts.district_name',
        //     'accused_district.district_name as accused_district_name',
        //     'setup_case_types.case_types_name',
        //     'setup_external_councils.first_name',
        //     'setup_external_councils.middle_name',
        //     'setup_external_councils.last_name',
        //     'case_infos_title.case_title_name as sub_seq_case_title_name')
        //     ->orderBy('criminal_cases.received_date','asc')
        //     ->where('criminal_cases.delete_status',0)
        //     ->distinct('criminal_cases.next_date')
        //     ->get();

        //    $criminal_cases = json_decode(json_encode($criminal_cases));
        //    echo "<pre>";print_r($criminal_cases);die();


        return view('litigation_management.litigation_calender.litigation_calendar_list_print_preview', compact('criminal_cases', 'criminal_cases_count'));
    }

    public function litigation_calendar_list_print_preview_search($param1, $param2)
    {
        // dd($param1);
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        // $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
        // dd($criminal_cases);


        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            // ->where('next_date','>=',date('Y-m-d'))
            ->where('next_date', '>=', $param1)
            ->where('next_date', '<=', $param2)->get(['next_date']);

        // dd($data);

        //     $criminal_cases = DB::table('criminal_cases')
        //     ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
        //     ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
        //     ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
        //     ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
        //     ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
        //     ->leftJoin('setup_districts as accused_district', 'criminal_cases.client_district_id', '=', 'accused_district.id')
        //     ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
        //     ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
        //    ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
        //     ->select('criminal_cases.*',
        //     'setup_case_statuses.case_status_name',
        //     'setup_case_titles.case_title_name',
        //     'setup_next_date_reasons.next_date_reason_name',
        //     'setup_courts.court_name',
        //     'setup_districts.district_name',
        //     'accused_district.district_name as accused_district_name',
        //     'setup_case_types.case_types_name',
        //     'setup_external_councils.first_name',
        //     'setup_external_councils.middle_name',
        //     'setup_external_councils.last_name',
        //     'case_infos_title.case_title_name as sub_seq_case_title_name')
        //     ->orderBy('criminal_cases.received_date','asc')
        //     ->where('criminal_cases.delete_status',0)
        //     ->distinct('criminal_cases.next_date')
        //     ->get();

        //    $criminal_cases = json_decode(json_encode($criminal_cases));
        //    echo "<pre>";print_r($criminal_cases);die();


        return view('litigation_management.litigation_calender.litigation_calendar_list_print_preview', compact('criminal_cases', 'criminal_cases_count'));
    }

    // public function calendar_list_arrow_up(Request $request)
    // {
    //     // dd($request->all());


    //     $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
    //     $client_name = SetupClientName::where('delete_status', 0)->get();
    //     $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
    //     $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
    //     $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
    //     $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();
    //     $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->get();
    //     $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
    //     $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
    //     $day_notes = SetupDayNote::where('delete_status', 0)->get();
    //     $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
    //     $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
    //     $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
    //     $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();
    //     $criminal_cases_search_last = DB::table('criminal_cases')
    //         ->distinct()->orderBy('next_date', 'asc')
    //         ->where(['delete_status' => 0])
    //         ->where('next_date', '<', $request->from_date)
    //         ->get(['next_date'])->last();

    //     if ($criminal_cases_search_last != null) {
    //         $criminal_cases_search = DB::table('criminal_cases')
    //             ->distinct()->orderBy('next_date', 'asc')
    //             ->where(['delete_status' => 0])
    //             ->where('next_date', '<', $request->from_date)
    //             ->get(['next_date'])->last()->next_date;
    //     } else {
    //         $criminal_cases_search = DB::table('criminal_cases')
    //             ->distinct()->orderBy('next_date', 'asc')
    //             ->where(['delete_status' => 0])
    //             ->where('next_date', '<=', $request->from_date)
    //             ->get(['next_date'])->last()->next_date;
    //     }


    //     // dd($criminal_cases_search);
    //     $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->orWhere('next_date', $criminal_cases_search)->get(['next_date']);
    //     $from_date = date('Y-m-d');
    //     $to_date = date('Y-m-d');
    //     $is_searched = 'Searched';
    //     return view('litigation_management.litigation_calender.litigation_calender_list', compact('court_proceeding','mode','day_notes','last_court_order','next_date_reason','documents_type','matter','case_status', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date','next_day_presence'));
    // }
    public function calendar_list_arrow_up(Request $request){

        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();
        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
        $day_notes = SetupDayNote::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        // $criminal_cases_search = DB::table('criminal_cases')
        //     ->distinct()->orderBy('next_date', 'asc')
        //     ->where(['delete_status' => 0])
        //     ->where('next_date', '>', $request->to_date)
        //     ->get(['next_date'])->first()->next_date;
        // dd($criminal_cases_search);

        $criminal_cases_search_latest = DB::table('criminal_cases')->distinct()
        ->orderBy('next_date', 'asc')->where(['delete_status' => 0])
        ->where('next_date', '<', $request->from_date)->get(['next_date'])->last();
         //dd($criminal_cases_search_latest);
        if ($criminal_cases_search_latest != null)  {
            // dd('yes');
            $criminal_cases_search = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])->where('next_date', '<', $request->from_date)->get(['next_date'])->last()->next_date;
        } else {
            // dd('no');
            $criminal_cases_search = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])->where('next_date', '=',$request->from_date)->get(['next_date'])->last()->next_date;
        }
      // dd($criminal_cases);
       // $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->orWhere('next_date', $criminal_cases_search)->get(['next_date']);
        $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', $criminal_cases_search)->orWhere('next_date', $criminal_cases_search)->get(['next_date']);
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');
        $is_searched = 'Searched';
        return view('litigation_management.litigation_calender.litigation_calender_list', compact('court_proceeding','mode','day_notes','last_court_order','next_date_reason','documents_type','matter','case_status', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date','next_day_presence'));
    }
    public function calendar_list_arrow_down(Request $request)
    {
        // dd($request->all());
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();
        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
        $day_notes = SetupDayNote::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        // $criminal_cases_search = DB::table('criminal_cases')
        //     ->distinct()->orderBy('next_date', 'asc')
        //     ->where(['delete_status' => 0])
        //     ->where('next_date', '>', $request->to_date)
        //     ->get(['next_date'])->first()->next_date;
        // dd($criminal_cases_search);



        $criminal_cases_search_latest = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>', $request->to_date)->get(['next_date']);
        // dd(count($criminal_cases_search_latest));
        if (count($criminal_cases_search_latest) > 0) {
            // dd('yes');
            $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>', $request->to_date)->get(['next_date']);
        } else {
            // dd('no');
            $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '=', $request->to_date)->get(['next_date']);
        }
        // dd($criminal_cases);
        $from_date = date('Y-m-d');
        $to_date = date('Y-m-d');
        $is_searched = 'Searched';
        return view('litigation_management.litigation_calender.litigation_calender_list', compact('court_proceeding','mode','day_notes','last_court_order','next_date_reason','documents_type','matter','case_status', 'client_name', 'external_council', 'criminal_cases', 'criminal_cases_count', 'is_searched', 'from_date', 'to_date','next_day_presence'));
    }

    // public function send_cause_list_pdf_to_mail(Request $request)
    // {
    //     dd($request->all());
    // }

    public function send_cause_list_pdf_to_mail(Request $request)
    {

        // return $request->all();
        $param1 = $request->param1;
        $param2 = $request->param2;
        // dd($param1);
        $criminal_cases_count = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where('delete_status', 0)->count(['next_date']);
        // $criminal_cases = DB::table('criminal_cases')->distinct()->orderBy('next_date', 'asc')->where(['delete_status' => 0])->where('next_date', '>=', date('Y-m-d'))->get(['next_date']);
        // dd($criminal_cases);

        $criminal_cases = DB::table('criminal_cases')
            ->distinct()->orderBy('next_date', 'asc')
            ->where(['delete_status' => 0])
            // ->where('next_date','>=',date('Y-m-d'))
            ->where('next_date', '>=', $param1)
            ->where('next_date', '<=', $param2)->get(['next_date']);

        if ($request->others_email) {
            $data["email"] = $request->others_email;
        }else{
            $data["email"] = Auth::user()->email;
        }

        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        $data["criminal_cases_count"] = $criminal_cases_count;
        $data["criminal_cases"] = $criminal_cases;


        $pdf = PDF::loadView('emails.myTestMail', $data);

        Mail::send('emails.myTestMail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], "imran.zaimahtech@gmail.com")
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });

        session()->flash('success','Cause List sends to the user successfully.');
        return redirect()->back();

    }

}
