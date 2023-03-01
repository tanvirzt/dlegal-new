<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;

use App\Models\SetupAccused;
use App\Models\SetupAllegation;
use App\Models\SetupCaseTitle;
use App\Models\SetupClient;
use App\Models\SetupClientCategory;
use App\Models\SetupComplainant;
use App\Models\SetupCoordinator;
use App\Models\SetupDocument;
use App\Models\SetupInFavourOf;
use App\Models\SetupLaw;
use App\Models\SetupCourt;
use App\Models\SetupDesignation;
use App\Models\SetupExternalCouncil;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseStatus;
use App\Models\SetupLegalIssue;
use App\Models\SetupLegalService;
use App\Models\SetupMatter;
use App\Models\SetupMode;
use App\Models\SetupNextDayPresence;
use App\Models\SetupOpposition;
use App\Models\SetupParty;
use App\Models\SetupPersonTitle;
use App\Models\SetupNextDateReason;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupProfession;
use App\Models\SetupReferrer;
use App\Models\SetupRegion;
use App\Models\SetupArea;
use App\Models\SetupBranch;
use App\Models\SetupProgram;
use App\Models\SetupPropertyType;
use App\Models\SetupCaseTypes;
use App\Models\SetupCompany;
use App\Models\SetupInternalCouncil;
use App\Models\SetupSection;
use App\Models\SetupDocumentsType;
use DB;
use App\Models\SetupCabinet;
use App\Models\SetupParticulars;
use App\Models\Counsel;
use App\Models\DeliveredTo;
use App\Models\Dispute;
use App\Models\LegalServiceCategory;
use App\Models\LegalServiceSteps;
use App\Models\ReceivedBy;
use App\Models\ReceivedFrom;
use App\Models\ReceivedMode;
use App\Models\ServiceMatter;
use App\Models\ServiceStatus;
use App\Models\SetupGroup;
use App\Models\LegalService;
use Auth;
use App\Models\SetupClientName;
use App\Models\User;
use App\Models\CriminalCasesDocumentsReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class LegalServiceController extends Controller
{
    public function index()
    {
        $legal_service=LegalService::all();
        // return view('legal_service.list',compact('legal_service'));
        $user = User::all();
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->get();
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $matter = SetupMatter::where('delete_status', 0)->orderBy('matter_name', 'asc')->get();
        $client_name = SetupClientName::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->orderBy('client_category_name', 'asc')->get();
        $group_name = SetupGroup::get();
        $case_cat = 'all';

        $query = DB::table('criminal_cases')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', 'setup_case_statuses.id')
            ->leftJoin('setup_case_titles', 'criminal_cases.case_infos_case_title_id', 'setup_case_titles.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_districts', 'criminal_cases.client_district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_districts as accused_district', 'criminal_cases.opposition_district_id', '=', 'accused_district.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            // ->join('criminal_cases_case_steps','criminal_cases.id','criminal_cases_case_steps.criminal_case_id')
            ->leftJoin('setup_thanas','criminal_cases.case_infos_thana_id', '=', 'setup_thanas.id')
            ->leftJoin('setup_laws','criminal_cases.law_id', '=', 'setup_laws.id')
            ->where('criminal_cases.case_type', 'District')
            ->where('criminal_cases.delete_status', 0)
            ->orderBy('criminal_cases.created_at', 'desc');

        if (Auth::user()->is_companies_superadmin == '1' || Auth::user()->is_owner_admin == '1') {

            $query2 = $query;

        } else if (Auth::user()->is_companies_admin == '1') {

            $query2 = $query->whereIn('criminal_cases.created_by', companies_all_users());

        }
        else {

            $query2 = $query->where(['criminal_cases.created_by' => auth_id()]);

        }
       
         $user= User::permission('internal-counsel-add')->get();
     //  dd($user);
        $data = $query2->select('criminal_cases.*',
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
            'setup_matters.matter_name',
            'setup_thanas.thana_name',
            'setup_laws.law_name')
            ->get();


      //dd($data);
        return view('legal_service.list', compact('user', 'group_name', 'client_category', 'client_name', 'next_date_reason', 'case_status', 'external_council', 'data', 'division', 'case_types', 'court', 'case_category', 'matter', 'case_cat'));
    }
    public function legal_service()
    {
        //new variable
        $legal_service=SetupLegalService::where(['delete_status' => 0])->get();
        $legal_service_category=LegalServiceCategory::where(['delete_status' => 0])->get();
        $legal_service_type=LegalServiceCategory::where(['delete_status' => 0])->get();
        $service_matter=ServiceMatter::where(['delete_status' => 0])->get();
        $dispute=Dispute::where(['delete_status' => 0])->get();
        $service_status=ServiceStatus::where(['delete_status' => 0])->get();
        $received_mode=ReceivedMode::where(['delete_status' => 0])->get();
        $received_by=ReceivedBy::where(['delete_status' => 0])->get();
        $received_from=ReceivedFrom::where(['delete_status' => 0])->get();
        $delivered_to=DeliveredTo::where(['delete_status' => 0])->get();
        //old variable
        $law = SetupLaw::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->orderBy('law_name', 'asc')->get();
        $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->orderBy('court_name', 'asc')->get();
        $designation = SetupDesignation::where('delete_status', 0)->orderBy('designation_name', 'asc')->get();
        $external_council = SetupExternalCouncil::where('is_associate', '!=', 'on')->where(['delete_status' => 0])->orderBy('first_name', 'asc')->get();
        // dd($external_council);
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
        $opponent = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
        $profession = SetupProfession::where('delete_status', 0)->orderBy('profession_name', 'asc')->get();
        $opposition = SetupOpposition::where('delete_status', 0)->orderBy('opposition_name', 'asc')->get();
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name', 'asc')->get();
        $case_title = SetupCaseTitle::where(['case_type' => 'Criminal', 'delete_status' => 0])->orderBy('case_title_name', 'asc')->get();
        $user = Admin::orderBy('name', 'asc')->get();
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $accused = SetupAccused::where('delete_status', 0)->orderBy('accused_name', 'asc')->get();
        $court_short = SetupCourt::where('delete_status', 0)->orderBy('court_short_name', 'asc')->get();
        $cabinet = SetupCabinet::where('delete_status', 0)->orderBy('cabinet_name', 'asc')->get();
        $particulars = SetupParticulars::where('delete_status', 0)->orderBy('particulars_name', 'asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();
        $group_name = SetupGroup::get();

        $chamber = DB::table('counsels')->where('counsel_type','Internal')->get();
        $leadLaywer = Counsel::where('counsel_type','Internal')->get();
        $assignedlaywer = Counsel::get();

// dd($court);
        return view('legal_service.index', compact('opponent','legal_service','delivered_to','received_from','received_by','received_mode','service_status','dispute','legal_service_category','legal_service_type','service_matter','chamber','leadLaywer','assignedlaywer','group_name', 'documents_type', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'client_category', 'section', 'section', 'next_day_presence', 'legal_issue', 'legal_service', 'matter', 'coordinator', 'allegation', 'in_favour_of', 'mode', 'referrer', 'party', 'client', 'profession', 'opposition', 'documents', 'case_title', 'user', 'complainant', 'accused', 'court_short', 'cabinet', 'particulars'));

    }
    public function show_legal_service()
    {
        return view('legal_service.show');
    }
    // public function store_legal_service(Request $request){
    //        dd($request);
    //     $data = new LegalService();
    //     $data->district_id = $request->client_district_id;
    //     $data->service_matter_id = $request->service_matter_id;
    //     $data->thana_id = $request->client_thana_id;
    //     $data->dispute_id = $request->dispute_id;
    //     $data->claim_amount = $request->claim_amount;
    //     $data->service_description = $request->service_description;
    //     $data->received_date = $request->received_date;
    //     $data->received_from_id = $request->received_from_id;
    //     $data->received_mode_id = $request->received_mode_id;
    //     $data->received_by_id = $request->received_by_id;
    //     $data->legal_service_id = $request->legal_service_id;
    //     $data->previouse_dispute = $request->previous_dispute;
    //     $data->section_id = $request->section_id;
    //     $data->summary_of_facts = $request->summary_of_fact;
    //     $data->special_note = $request->special_note;
    //     $data->reference_case_info = $request->reference_case;
        
      
      
    //     $data->client_id = $request->client_id;
    //     $data->previous_legal_dispute= $request->previous_legal_dispute;
    //     $data->special_note_for_opponent= $request->special_note_for_opponent;
    //     $data->lawyer_advocate_id= $request->lawyer_advocate_id;
    //     $data->lead_laywer_id= $request->lead_laywer_id;
    //     $data->para_legal_id= $request->para_legal_id;
    //     $data->lawyers_remarks = $request->special_note_for_lawyer;
    //     $data->opposition_advocate_firm = $request->opposition_advocate_firm;
    //     $data->opposition_concerned_lawyer = $request->opposition_concerned_lawyer;
    //     $data->opposition_lawyer_contact_details = $request->opposition_lawyer_contact_details;
    //     $data->opposition_para_legal_contact_details = $request->opposition_para_legal_contact_details;
      
    //     // $data->case_event_date = $request->case_event_date;
    //     // $data->case_event_title = $request->case_event_title;
    //     // $data->case_event_evidence = $request->case_event_evidence;
    //     // $data->steps_application_filed = $request->steps_application_filed;
    //     // $data->steps_date = $request->steps_date;
    //     // $data->steps_note = $request->steps_note;
    //     // $data->next_stage = $request->next_stage;
    //     // $data->steps_evidence = $request->steps_evidence;
    //     $data->save();

      
      
      
    //     // $datum = new CriminalCasesDocumentsReceived();
    //     // $datum->case_id = $data->id;
    //     // $datum->received_documents_id = $request->received_documents_id[$key];
    //     // $datum->received_documents = $request->received_documents[$key];
    //     // $datum->received_documents_date = $request->received_documents_date[$key];
    //     // $datum->received_documents_type_id = $request->received_documents_type_id[$key];
    //     // $datum->save();
    // //   return redirect('legal-service');
    //   return redirect()->route('legal-service');
    // }
    public function save_legal_service(Request $request)
    {
      //dd($request);

        $data = new LegalService();
        $data->district_id = $request->client_district_id;
        $data->service_matter_id = $request->service_matter_id;
        $data->thana_id = $request->client_thana_id;
        $data->dispute_id = $request->dispute_id;
        $data->claim_amount = $request->claim_amount;
        $data->service_description = $request->service_description;
        $data->received_date = $request->received_date;
        $data->received_from_id = $request->received_from_id;
        $data->received_mode_id = $request->received_mode_id;
        $data->received_by_id = $request->received_by_id;
        $data->legal_service_id = $request->legal_service_id;
        $data->previouse_dispute = $request->previous_dispute;
        $data->section_id = $request->section_id;
        $data->summary_of_facts = $request->summary_of_fact;
        $data->special_note = $request->special_note;
        $data->reference_case_info = $request->reference_case;
        
      
      
        $data->client_id = $request->client_id;
        $data->previous_legal_dispute= $request->previous_legal_dispute;
        $data->special_note_for_opponent= $request->special_note_for_opponent;
        $data->lawyer_advocate_id= $request->lawyer_advocate_id;
        $data->lead_laywer_id= $request->lead_laywer_id;
        $data->para_legal_id= $request->para_legal_id;
        $data->lawyers_remarks = $request->special_note_for_lawyer;
        $data->opposition_advocate_firm = $request->opposition_advocate_firm;
        $data->opposition_concerned_lawyer = $request->opposition_concerned_lawyer;
        $data->opposition_lawyer_contact_details = $request->opposition_lawyer_contact_details;
        $data->opposition_para_legal_contact_details = $request->opposition_para_legal_contact_details;
      
        // $data->case_event_date = $request->case_event_date;
        // $data->case_event_title = $request->case_event_title;
        // $data->case_event_evidence = $request->case_event_evidence;
        // $data->steps_application_filed = $request->steps_application_filed;
        // $data->steps_date = $request->steps_date;
        // $data->steps_note = $request->steps_note;
        // $data->next_stage = $request->next_stage;
        // $data->steps_evidence = $request->steps_evidence;
        $data->save();

      
      
      
        // $datum = new CriminalCasesDocumentsReceived();
        // $datum->case_id = $data->id;
        // $datum->received_documents_id = $request->received_documents_id[$key];
        // $datum->received_documents = $request->received_documents[$key];
        // $datum->received_documents_date = $request->received_documents_date[$key];
        // $datum->received_documents_type_id = $request->received_documents_type_id[$key];
        // $datum->save();
    //   return redirect('legal-service');
      return redirect()->route('legal.service');
    }
}
