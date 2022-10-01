<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalCasesSwitchRecord;
use App\Models\CriminalCasesWorkingDoc;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Admin;
use App\Models\CriminalCase;
use App\Models\CriminalCaseActivityLog;
use App\Models\CriminalCasesCaseSteps;
use App\Models\SetupAccused;
use App\Models\SetupAllegation;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupCaseTitle;
use App\Models\SetupClient;
use App\Models\SetupClientCategory;
use App\Models\SetupClientSubcategory;
use App\Models\SetupComplainant;
use App\Models\SetupCoordinator;
use App\Models\SetupCourtProceeding;
use App\Models\SetupCourtShort;
use App\Models\SetupDayNote;
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
use App\Models\SetupAlligation;
use App\Models\CriminalCasesFile;
use App\Models\SetupPropertyType;
use App\Models\SetupCaseTypes;
use App\Models\SetupCompany;
use App\Models\SetupInternalCouncil;
use App\Models\SetupDivision;
use App\Models\SetupDistrict;
use App\Models\SetupExternalCouncilAssociate;
use App\Models\CriminalCaseStatusLog;
use App\Models\SetupSection;
use App\Models\SetupThana;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CivilCases;
use App\Models\SetupBillType;
use App\Models\SetupBillParticular;
use App\Models\BillSchedule;
use App\Models\PaymentMode;
use App\Models\CriminalCasesBilling;
use Mail;
use App\Mail\CaseForwardedMail;
use App\Models\CasesNotifications;
use App\Models\SetupCabinet;
use App\Models\SetupClientName;
use App\Models\CriminalCasesDocumentsReceived;
use App\Models\CriminalCasesDocumentsRequired;
use App\Models\SetupParticulars;
use App\Models\CriminalCasesLetterNotice;
use App\Models\CriminalCasesSendMessage;
use App\Mail\SendMessage;
use App\Models\SetupDocumentsType;
use App\Models\SetupGroup;
use Str;

class CriminalCasesController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('permission:criminal-cases-list|criminal-cases-create|criminal-cases-edit|criminal-cases-delete|criminal-cases-view', ['only' => ['criminal_cases']]);
        $this->middleware('permission:criminal-cases-create', ['only' => ['add_criminal_cases', 'save_criminal_cases']]);
        $this->middleware('permission:criminal-cases-edit', ['only' => ['edit_criminal_cases', 'update_criminal_cases']]);
        $this->middleware('permission:criminal-cases-delete', ['only' => ['delete_criminal_cases']]);
        $this->middleware('permission:criminal-cases-view', ['only' => ['view_criminal_cases']]);
    }

    public function criminal_cases()
    {
        //   $data = CriminalCase::all();
// dd($data);
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
            ->where('criminal_cases.delete_status', 0)
            ->orderBy('criminal_cases.created_at', 'desc');

        if (Auth::user()->is_companies_superadmin == '1' || Auth::user()->is_owner_admin == '1') {

            $query2 = $query;

        } else if (Auth::user()->is_companies_admin == '1') {

            $query2 = $query->whereIn('criminal_cases.created_by', companies_all_users());

        } else {

            $query2 = $query->where(['criminal_cases.created_by' => auth_id()]);

        }

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
            'setup_matters.matter_name')
            ->get();

        return view('litigation_management.cases.criminal_cases.criminal_cases', compact('user', 'group_name', 'client_category', 'client_name', 'next_date_reason', 'case_status', 'external_council', 'data', 'division', 'case_types', 'court', 'case_category', 'matter'));
    }

    public function add_criminal_cases()
    {
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

// dd($court);
        return view('litigation_management.cases.criminal_cases.add_criminal_cases', compact('group_name', 'documents_type', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'client_category', 'section', 'section', 'next_day_presence', 'legal_issue', 'legal_service', 'matter', 'coordinator', 'allegation', 'in_favour_of', 'mode', 'referrer', 'party', 'client', 'profession', 'opposition', 'documents', 'case_title', 'user', 'complainant', 'accused', 'court_short', 'cabinet', 'particulars'));
    }

    public function save_criminal_cases(Request $request)
    {
        // $element = $request->case_infos_complainant_informant_name;
        // $key = array_key_last(($request->case_infos_complainant_informant_name));
        // $element[$key-1];

//request_array($request->all());

        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);

        $letter_notice_sections = $request->letter_notice_sections;
        $remove = array_pop($letter_notice_sections);

// dd($letter_notice_sections);

//        $rules = [
//            'case_no' => 'required|unique:criminal_cases',
//        ];
//
//        $validMsg = [
//            'case_no.required' => 'Case No. field is required.',
//        ];
//
//        $this->validate($request, $rules, $validMsg);


// dd($letter_notice_particulars_id_explode);


        $latest = CriminalCase::latest()->first();

        if ($latest != null) {
            $latest_no = explode('-', $latest->created_case_id);
            $sl = $latest_no[1] + 1;
        } else {
            $sl = +1;
        }
        $created_case_id = 'LCR-000' . $sl;

        if ($request->received_date != 'dd-mm-yyyy') {
            $received_date_explode = explode('-', $request->received_date);
            $received_date_implode = implode('-', $received_date_explode);
            $received_date = date('Y-m-d', strtotime($received_date_implode));
        } else {
            $received_date = date('Y-m-d');
        }

        if ($request->next_date != 'dd-mm-yyyy') {
            $next_date_explode = explode('-', $request->next_date);
            $next_date_implode = implode('-', $next_date_explode);
            $next_date = date('Y-m-d', strtotime($next_date_implode));
        } else {
            $next_date = '';
        }

        $complainant = $request->case_infos_complainant_informant_name ? implode(', ', $request->case_infos_complainant_informant_name) : null;
        $accused = $request->case_infos_accused_name ? implode(', ', $request->case_infos_accused_name) : null;
        $client = $request->client_name_write ? implode(', ', $request->client_name_write) : null;
        $opposition = $request->opposition_write ? implode(', ', $request->opposition_write) : null;

        $received_documents_id = $request->received_documents_id ? implode(', ', $request->received_documents_id) : null;
        $received_documents = $request->received_documents ? implode(', ', $request->received_documents) : null;
        $received_documents_date = $request->received_documents_date ? implode(', ', $request->received_documents_date) : null;
        $required_wanting_documents_id = $request->required_wanting_documents_id ? implode(', ', $request->required_wanting_documents_id) : null;
        $required_wanting_documents = $request->required_wanting_documents ? implode(', ', $request->required_wanting_documents) : null;
        $required_wanting_documents_date = $request->required_wanting_documents_date ? implode(', ', $request->required_wanting_documents_date) : null;

        $court_short_write = $request->court_short_write ? implode(', ', $request->court_short_write) : null;
        $case_infos_sub_seq_case_no = $request->case_infos_sub_seq_case_no ? implode(', ', $request->case_infos_sub_seq_case_no) : null;
        $case_infos_sub_seq_case_year = $request->case_infos_sub_seq_case_year ? implode(', ', $request->case_infos_sub_seq_case_year) : null;
        $sub_seq_court_short_write = $request->sub_seq_court_short_write ? implode(', ', $request->sub_seq_court_short_write) : null;
        $law_write = $request->law_write ? implode(', ', $request->law_write) : null;
        $section_write = $request->section_write ? implode(', ', $request->section_write) : null;
        $complainant_informant_representative = $request->complainant_informant_representative ? implode(', ', $request->complainant_informant_representative) : null;
        $case_infos_accused_representative = $request->case_infos_accused_representative ? implode(', ', $request->case_infos_accused_representative) : null;

        $case_infos_sub_seq_court_short_id = $request->case_infos_sub_seq_court_short_id ? implode(', ', $request->case_infos_sub_seq_court_short_id) : null;

        DB::beginTransaction();

        $data = new CriminalCase();
        $data->created_case_id = $created_case_id;
        $data->client = $request->client;
        $data->legal_issue_id = $request->legal_issue_id;
        $data->legal_issue_write = $request->legal_issue_write;
        $data->legal_service_id = $request->legal_service_id;
        $data->legal_service_write = $request->legal_service_write;
        $data->complainant_informant_id = $request->complainant_informant_id;
        $data->complainant_informant_write = $request->complainant_informant_write;
        $data->accused_id = $request->accused_id;
        $data->accused_write = $request->accused_write;
        $data->in_favour_of_id = $request->in_favour_of_id;
        $data->case_no = $request->case_no;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->next_date = $next_date;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->received_date = $received_date;
        $data->mode_of_receipt_id = $request->mode_of_receipt_id;
        $data->referrer_id = $request->referrer_id;
        $data->referrer_write = $request->referrer_write;
        $data->referrer_details = $request->referrer_details;
        $data->received_by_id = $request->received_by_id;
        $data->received_by_write = $request->received_by_write;
        $data->cabinet_id = $request->cabinet_id;
        $data->self_number = $request->self_number;
        $data->client_party_id = $request->client_party_id;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->client_id = $request->client_id ? implode(', ', $request->client_id) : null;
        $data->client_business_name = $request->client_business_name;
        $data->client_group_id = $request->client_group_id;
        $data->client_group_write = $request->client_group_write;
        $data->client_name_write = rtrim($client, ', ');
        $data->client_address = $request->client_address;
        $data->client_mobile = $request->client_mobile;
        $data->client_email = $request->client_email;
        $data->client_profession_id = $request->client_profession_id;
        $data->client_profession_write = $request->client_profession_write;
        $data->client_division_id = $request->client_division_id;
        $data->client_divisoin_write = $request->client_divisoin_write;
        $data->client_district_id = $request->client_district_id;
        $data->client_district_write = $request->client_district_write;
        $data->client_thana_id = $request->client_thana_id;
        $data->client_thana_write = $request->client_thana_write;
        $data->client_representative_name = $request->client_representative_name;
        $data->client_representative_details = $request->client_representative_details;
        $data->client_coordinator_tadbirkar_id = $request->client_coordinator_tadbirkar_id;
        $data->coordinator_tadbirkar_write = $request->coordinator_tadbirkar_write;
        $data->client_coordinator_details = $request->client_coordinator_details;
        $data->opposition_party_id = $request->opposition_party_id;
        $data->opposition_category_id = $request->opposition_category_id;
        $data->opposition_subcategory_id = $request->opposition_subcategory_id;
        $data->opposition_id = $request->opposition_id ? implode(', ', $request->opposition_id) : null;
        $data->opposition_write = rtrim($opposition, ', ');
        $data->opposition_group_id = $request->opposition_group_id;
        $data->opposition_group_write = $request->opposition_group_write;
        $data->opposition_address = $request->opposition_address;
        $data->opposition_mobile = $request->opposition_mobile;
        $data->opposition_email = $request->opposition_email;
        $data->opposition_profession_id = $request->opposition_profession_id;
        $data->opposition_profession_write = $request->opposition_profession_write;
        $data->opposition_division_id = $request->opposition_division_id;
        $data->opposition_divisoin_write = $request->opposition_divisoin_write;
        $data->opposition_district_id = $request->opposition_district_id;
        $data->opposition_district_write = $request->opposition_district_write;
        $data->opposition_thana_id = $request->opposition_thana_id;
        $data->opposition_thana_write = $request->opposition_thana_write;
        $data->opposition_representative_name = $request->opposition_representative_name;
        $data->opposition_representative_details = $request->opposition_representative_details;
        $data->opposition_coordinator_tadbirkar_id = $request->opposition_coordinator_tadbirkar_id;
        $data->opposition_coordinator_tadbirkar_write = $request->opposition_coordinator_tadbirkar_write;
        $data->opposition_coordinator_details = $request->opposition_coordinator_details;
        $data->lawyer_advocate_id = $request->lawyer_advocate_id;
        $data->lawyer_advocate_write = $request->lawyer_advocate_write;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id ? implode(', ', $request->assigned_lawyer_id) : null;
        $data->lawyers_remarks = $request->lawyers_remarks;


        // $data->received_documents_id = rtrim($received_documents_id,', ');
        // $data->received_documents = $received_documents;
        // $data->received_documents_date = rtrim($received_documents_date,', ');
        // $data->required_wanting_documents_id = rtrim($required_wanting_documents_id,', ');
        // $data->required_wanting_documents = $required_wanting_documents;
        // $data->required_wanting_documents_date = rtrim($required_wanting_documents_date,', ');

        $data->case_infos_division_id = $request->case_infos_division_id;
        $data->case_infos_district_id = $request->case_infos_district_id;
        $data->case_infos_thana_id = $request->case_infos_thana_id;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_infos_case_title_id = $request->case_infos_case_title_id;
        $data->case_infos_case_no = $request->case_infos_case_no;
        $data->case_infos_case_year = $request->case_infos_case_year;
        $data->case_infos_court_id = $request->case_infos_court_id ? implode(', ', $request->case_infos_court_id) : null;
        $data->case_infos_court_short_id = $request->case_infos_court_short_id ? implode(', ', $request->case_infos_court_short_id) : null;
        $data->court_short_write = rtrim($court_short_write, ', ');
        $data->case_infos_sub_seq_case_title_id = $request->case_infos_sub_seq_case_title_id;
        $data->case_infos_sub_seq_case_no = rtrim($case_infos_sub_seq_case_no, ', ');
        $data->case_infos_sub_seq_case_year = rtrim($case_infos_sub_seq_case_year, ', ');
        $data->case_infos_sub_seq_court_id = $request->case_infos_sub_seq_court_id ? implode(', ', $request->case_infos_sub_seq_court_id) : null;
        $data->case_infos_sub_seq_court_short_id = rtrim($case_infos_sub_seq_court_short_id, ', ');
        $data->sub_seq_court_short_write = rtrim($sub_seq_court_short_write, ', ');
        $data->law_id = $request->law_id ? implode('/ ', $request->law_id) : null;
        $data->law_write = rtrim($law_write, ', ');
        $data->section_id = $request->section_id ? implode(', ', $request->section_id) : null;
        $data->section_write = rtrim($section_write, ', ');
        $data->date_of_filing = $request->date_of_filing == 'dd-mm-yyyy' || $request->date_of_filing == 'NaN-NaN-NaN' ? null : $request->date_of_filing;
        $data->case_status_id = $request->case_status_id;
        $data->matter_id = $request->matter_id;
        $data->matter_write = $request->matter_write;
        $data->case_type_id = $request->case_type_id;
        $data->case_infos_complainant_informant_name = rtrim($complainant, ', ');
        $data->complainant_informant_representative = rtrim($complainant_informant_representative, ', ');
        $data->case_infos_accused_name = rtrim($accused, ', ');
        $data->case_infos_accused_representative = rtrim($case_infos_accused_representative, ', ');
        $data->prosecution_witness = $request->prosecution_witness;
        $data->defense_witness = $request->defense_witness;
        $data->created_by = auth_id();
        $data->save();

        $steps = new CriminalCasesCaseSteps();
        $steps->criminal_case_id = $data->id;
        $steps->case_infos_allegation_claim_id = $request->case_infos_allegation_claim_id;
        $steps->case_infos_allegation_claim_write = $request->case_infos_allegation_claim_write;
        $steps->amount_of_money = $request->amount_of_money;
        $steps->another_claim = $request->another_claim;
        $steps->recovery_seizure_articles = $request->recovery_seizure_articles;
        $steps->summary_facts = $request->summary_facts;
        $steps->case_info_remarks = $request->case_info_remarks;

        //    $data = json_decode(json_encode($request->all()));
        //    echo "<pre>";print_r($data);die();


        $steps->case_steps_filing = $request->case_steps_filing == 'dd-mm-yyyy' || $request->case_steps_filing == 'NaN-NaN-NaN' ? null : $request->case_steps_filing;
        $steps->case_steps_filing_note = $request->case_steps_filing_note;
        $steps->case_steps_filing_type_id = $request->case_steps_filing_type_id;
        $steps->taking_cognizance = $request->taking_cognizance == 'dd-mm-yyyy' || $request->taking_cognizance == 'NaN-NaN-NaN' ? null : $request->taking_cognizance;
        $steps->taking_cognizance_note = $request->taking_cognizance_note;
        $steps->taking_cognizance_type_id = $request->taking_cognizance_type_id;
        $steps->arrest_surrender_cw = $request->arrest_surrender_cw == 'dd-mm-yyyy' || $request->arrest_surrender_cw == 'NaN-NaN-NaN' ? null : $request->arrest_surrender_cw;
        $steps->arrest_surrender_cw_note = $request->arrest_surrender_cw_note;
        $steps->arrest_surrender_cw_type_id = $request->arrest_surrender_cw_type_id;
        $steps->case_steps_bail = $request->case_steps_bail == 'dd-mm-yyyy' || $request->case_steps_bail == 'NaN-NaN-NaN' ? null : $request->case_steps_bail;
        $steps->case_steps_bail_note = $request->case_steps_bail_note;
        $steps->case_steps_bail_type_id = $request->case_steps_bail_type_id;
        $steps->case_steps_court_transfer = $request->case_steps_court_transfer == 'dd-mm-yyyy' || $request->case_steps_court_transfer == 'NaN-NaN-NaN' ? null : $request->case_steps_court_transfer;
        $steps->case_steps_court_transfer_note = $request->case_steps_court_transfer_note;
        $steps->case_steps_court_transfer_type_id = $request->case_steps_court_transfer_type_id;
        $steps->case_steps_charge_framed = $request->case_steps_charge_framed == 'dd-mm-yyyy' || $request->case_steps_charge_framed == 'NaN-NaN-NaN' ? null : $request->case_steps_charge_framed;
        $steps->case_steps_charge_framed_note = $request->case_steps_charge_framed_note;
        $steps->case_steps_charge_framed_type_id = $request->case_steps_charge_framed_type_id;
        $steps->case_steps_witness_from = $request->case_steps_witness_from == 'dd-mm-yyyy' || $request->case_steps_witness_from == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_from;
        $steps->case_steps_witness_from_note = $request->case_steps_witness_from_note;
        $steps->case_steps_witness_from_type_id = $request->case_steps_witness_from_type_id;
        $steps->case_steps_witness_to = $request->case_steps_witness_to == 'dd-mm-yyyy' || $request->case_steps_witness_to == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_to;
        $steps->case_steps_witness_to_note = $request->case_steps_witness_to_note;
        $steps->case_steps_witness_to_type_id = $request->case_steps_witness_to_type_id;
        $steps->case_steps_argument = $request->case_steps_argument == 'dd-mm-yyyy' || $request->case_steps_argument == 'NaN-NaN-NaN' ? null : $request->case_steps_argument;
        $steps->case_steps_argument_note = $request->case_steps_argument_note;
        $steps->case_steps_argument_type_id = $request->case_steps_argument_type_id;
        $steps->case_steps_judgement_order = $request->case_steps_judgement_order == 'dd-mm-yyyy' || $request->case_steps_judgement_order == 'NaN-NaN-NaN' ? null : $request->case_steps_judgement_order;
        $steps->case_steps_judgement_order_note = $request->case_steps_judgement_order_note;
        $steps->case_steps_judgement_order_type_id = $request->case_steps_judgement_order_type_id;
        $steps->case_steps_summary_of_cases = $request->case_steps_summary_of_cases == 'dd-mm-yyyy' || $request->case_steps_summary_of_cases == 'NaN-NaN-NaN' ? null : $request->case_steps_summary_of_cases;
        $steps->case_steps_summary_of_cases_note = $request->case_steps_summary_of_cases_note;
        $steps->case_steps_summary_of_cases_type_id = $request->case_steps_summary_of_cases_type_id;
        $steps->case_steps_remarks = $request->case_steps_remarks;

        // $steps->case_steps_filing = $request->case_steps_filing == 'dd-mm-yyyy' || $request->case_steps_filing == 'NaN-NaN-NaN' ? null : $request->case_steps_filing;
        // $steps->case_steps_filing_copy = $request->case_steps_filing_copy;
        // $steps->case_steps_filing_yes_no = $request->case_steps_filing_yes_no ? 'Yes' : 'No';
        // $steps->taking_cognizance = $request->taking_cognizance == 'dd-mm-yyyy' || $request->taking_cognizance == 'NaN-NaN-NaN' ? null : $request->taking_cognizance;
        // $steps->taking_cognizance_copy = $request->taking_cognizance_copy;
        // $steps->taking_cognizance_yes_no = $request->taking_cognizance_yes_no ? 'Yes' : 'No';
        // $steps->arrest_surrender_cw = $request->arrest_surrender_cw == 'dd-mm-yyyy' || $request->arrest_surrender_cw == 'NaN-NaN-NaN' ? null : $request->arrest_surrender_cw;
        // $steps->arrest_surrender_cw_copy = $request->arrest_surrender_cw_copy;
        // $steps->arrest_surrender_cw_yes_no = $request->arrest_surrender_cw_yes_no ? 'Yes' : 'No';
        // $steps->case_steps_bail = $request->case_steps_bail == 'dd-mm-yyyy' || $request->case_steps_bail == 'NaN-NaN-NaN' ? null : $request->case_steps_bail;
        // $steps->case_steps_bail_copy = $request->case_steps_bail_copy;
        // $steps->case_steps_bail_yes_no = $request->case_steps_bail_yes_no ? 'Yes' : 'No';
        // $steps->case_steps_court_transfer = $request->case_steps_court_transfer == 'dd-mm-yyyy' || $request->case_steps_court_transfer == 'NaN-NaN-NaN' ? null : $request->case_steps_court_transfer;
        // $steps->case_steps_court_transfer_copy = $request->case_steps_court_transfer_copy;
        // $steps->case_steps_court_transfer_yes_no = $request->case_steps_court_transfer_yes_no ? 'Yes' : 'No';
        // $steps->case_steps_charge_framed = $request->case_steps_charge_framed == 'dd-mm-yyyy' || $request->case_steps_charge_framed == 'NaN-NaN-NaN' ? null : $request->case_steps_charge_framed;
        // $steps->case_steps_charge_framed_copy = $request->case_steps_charge_framed_copy;
        // $steps->case_steps_charge_framed_yes_no = $request->case_steps_charge_framed_yes_no ? 'Yes' : 'No';
        // $steps->case_steps_witness_from = $request->case_steps_witness_from == 'dd-mm-yyyy' || $request->case_steps_witness_from == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_from;
        // $steps->case_steps_witness_from_copy = $request->case_steps_witness_from_copy;
        // $steps->case_steps_witness_from_yes_no = $request->case_steps_witness_from_yes_no ? 'Yes' : 'No';
        // $steps->case_steps_witness_to = $request->case_steps_witness_to == 'dd-mm-yyyy' || $request->case_steps_witness_to == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_to;
        // $steps->case_steps_witness_to_copy = $request->case_steps_witness_to_copy;
        // $steps->case_steps_witness_to_yes_no = $request->case_steps_witness_to_yes_no ? 'Yes' : 'No';
        // $steps->case_steps_argument = $request->case_steps_argument == 'dd-mm-yyyy' || $request->case_steps_argument == 'NaN-NaN-NaN' ? null : $request->case_steps_argument;
        // $steps->case_steps_argument_copy = $request->case_steps_argument_copy;
        // $steps->case_steps_argument_yes_no = $request->case_steps_argument_yes_no ? 'Yes' : 'No';
        // $steps->case_steps_judgement_order = $request->case_steps_judgement_order == 'dd-mm-yyyy' || $request->case_steps_judgement_order == 'NaN-NaN-NaN'  ? null : $request->case_steps_judgement_order;
        // $steps->case_steps_judgement_order_copy = $request->case_steps_judgement_order_copy;
        // $steps->case_steps_judgement_order_yes_no = $request->case_steps_judgement_order_yes_no ? 'Yes' : 'No';

        // $steps->case_steps_summary_of_cases = $request->case_steps_summary_of_cases == 'dd-mm-yyyy' || $request->case_steps_summary_of_cases == 'NaN-NaN-NaN'  ? null : $request->case_steps_summary_of_cases;
        // $steps->case_steps_summary_of_cases_copy = $request->case_steps_summary_of_cases_copy;
        // $steps->case_steps_summary_of_cases_yes_no = $request->case_steps_summary_of_cases_yes_no ? 'Yes' : 'No';
        // $steps->case_steps_remarks = $request->case_steps_remarks;

        $steps->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $key => $file) {

                $original_name = $file->getClientOriginalName();
                $explode = explode('.', $original_name);
                array_pop($explode);
                $implode = implode('-', $explode);
                $original_extension = $file->getClientOriginalExtension();
                $name = Str::slug($implode) . '.' . $original_extension;
                $file->move(public_path('files/criminal_cases'), $name);

                $files = new CriminalCasesFile();
                $files->case_id = $data->id;
                $files->uploaded_date = $request->uploaded_date[$key];
                $files->documents_type_id = $request->documents_type_id[$key];
                $files->uploaded_document = $name;
                $files->created_by = Auth::guard('admin')->user()->email;
                $files->save();

            }
        }

        foreach (array_filter($received_documents_sections) as $key => $value) {
            $datum = new CriminalCasesDocumentsReceived();
            $datum->case_id = $data->id;
            $datum->received_documents_id = $request->received_documents_id[$key];
            $datum->received_documents = $request->received_documents[$key];
            $datum->received_documents_date = $request->received_documents_date[$key];
            $datum->received_documents_type_id = $request->received_documents_type_id[$key];
            $datum->save();
        }


        foreach (array_filter($required_wanting_documents_sections) as $key => $value) {
            $required = new CriminalCasesDocumentsRequired();
            $required->case_id = $data->id;
            $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
            $required->required_wanting_documents = $request->required_wanting_documents[$key];
            $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
            $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
            $required->save();
        }

        foreach (array_filter($letter_notice_sections) as $key => $value) {
            $required = new CriminalCasesLetterNotice();
            $required->case_id = $data->id;
            $required->letter_notice_date = $request->letter_notice_date[$key];
            $required->letter_notice_documents_id = $request->letter_notice_documents_id[$key];
            $required->letter_notice_documents_write = $request->letter_notice_documents_write[$key];
            $required->letter_notice_particulars_write = $request->letter_notice_particulars_write[$key];
            $required->letter_notice_type_id = $request->letter_notice_type_id[$key];
            $required->save();
        }

        DB::commit();

        session()->flash('success', 'Criminal Cases Added Successfully');
        return redirect()->route('criminal-cases');

    }

    public function edit_criminal_cases($id)
    {

        $query = DB::table('criminal_cases');
        if (Auth::user()->is_companies_superadmin == '1') {
            $query2 = $query;
        } else if (Auth::user()->is_companies_admin == '1') {
            $query2 = $query->whereIn('criminal_cases.created_by', companies_all_users());
        } else {
            $query2 = $query->where(['criminal_cases.created_by' => auth_id()]);
        }

        $permissions_data = $query2->where('id', $id)->count();

        if ($permissions_data == 1) {
            $data = CriminalCase::find($id);
        } else {
            return view('errors.403');
        }

        $law = SetupLaw::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->orderBy('law_name', 'asc')->get();
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
        $case_title = SetupCaseTitle::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->orderBy('case_title_name', 'asc')->get();
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $accused = SetupAccused::where('delete_status', 0)->orderBy('accused_name', 'asc')->get();
        $court_short = SetupCourt::where('delete_status', 0)->orderBy('court_short_name', 'asc')->get();
        $cabinet = SetupCabinet::where('delete_status', 0)->orderBy('cabinet_name', 'asc')->get();

        $existing_district = SetupDistrict::where('division_id', $data->client_division_id)->orderBy('district_name', 'asc')->get();
        $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_name_id)->orderBy('first_name', 'asc')->get();
        $existing_client_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->client_category_id, 'delete_status' => 0])->orderBy('client_subcategory_name', 'asc')->get();
        $existing_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->case_category_id, 'delete_status' => 0])->orderBy('case_subcategory', 'asc')->get();
        $existing_thana = SetupThana::where(['district_id' => $data->client_district_id, 'delete_status' => 0])->orderBy('thana_name', 'asc')->get();
        $assigned_lawyer_explode = explode(', ', $data->assigned_lawyer_id);
        $case_infos_existing_district = SetupDistrict::where('division_id', $data->case_infos_division_id)->orderBy('district_name', 'asc')->get();
        $case_infos_existing_thana = SetupThana::where(['district_id' => $data->case_infos_district_id, 'delete_status' => 0])->orderBy('thana_name', 'asc')->get();

        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->orderBy('court_proceeding_name', 'asc')->get();
        $day_notes = SetupDayNote::where('delete_status', 0)->orderBy('day_notes_name', 'asc')->get();
        $existing_opposition_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->opposition_category_id, 'delete_status' => 0])->orderBy('client_subcategory_name', 'asc')->get();
        $opposition_existing_district = SetupDistrict::where('division_id', $data->opposition_division_id)->orderBy('district_name', 'asc')->get();
        $opposition_existing_thana = SetupThana::where(['district_id' => $data->opposition_district_id, 'delete_status' => 0])->orderBy('thana_name', 'asc')->get();
        $existing_assignend_external_council = SetupExternalCouncilAssociate::where(['external_council_id' => $data->lawyer_advocate_id, 'delete_status' => 0])->orderBy('first_name', 'asc')->get();
        // dd($data);

        $exist_case_inofs_district = SetupDistrict::where('id', $data->case_infos_district_id)->first();
// dd($exist_case_inofs_district);
        if (!empty($exist_case_inofs_district)) {
            $exist_court_short = SetupCourt::where('applicable_district_id', 'like', "%{$exist_case_inofs_district->district_name}%")->where('delete_status', 0)->orderBy('court_name', 'asc')->get();
        } else {
            $exist_court_short = [];
        }

// dd($exist_court_short);

        $client_explode = explode(', ', $data->client_id);
        $court_explode = explode(', ', $data->case_infos_court_id);
        $law_explode = explode('/ ', $data->law_id);
        // dd($law_explode);
        $section_explode = explode(', ', $data->section_id);
        $opposition_explode = explode(', ', $data->opposition_id);
        $sub_seq_court_explode = explode(', ', $data->case_infos_sub_seq_court_id);
        $received_documents_explode = explode(', ', $data->received_documents_id);
        $received_documents_write_explode = explode(', ', $data->received_documents);
        $received_documents_date_explode = explode(', ', $data->received_documents_date);
        $required_documents_explode = explode(', ', $data->required_wanting_documents_id);

        $court_short_explode = explode(', ', $data->case_infos_court_short_id);
        $sub_seq_court_short_explode = explode(', ', $data->case_infos_sub_seq_court_short_id);
// dd($sub_seq_court_short_explode);
        $user = Admin::orderBy('name', 'asc')->get();

        $exist_case_type = SetupCaseTypes::where('case_category_id', $data->case_category_id)->get();
        $exist_engaged_advocate = SetupExternalCouncil::where('id', $data->lawyer_advocate_id)->get();
        $exist_engaged_advocate_associates = SetupExternalCouncilAssociate::where(['delete_status' => 0])->get();
        $edit_case_steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();
        // dd($edit_case_steps);
        $previous_activity = CriminalCaseStatusLog::latest()->where(['case_id' => $id, 'delete_status' => 0])->first();
        $particulars = SetupParticulars::where('delete_status', 0)->orderBy('particulars_name', 'asc')->get();
        $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();
        $group_name = SetupGroup::get();

        // dd($previous_activity);
//        dd($assigned_lawyer_explode);


        $case_no_data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_cabinets', 'criminal_cases.cabinet_id', '=', 'setup_cabinets.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'setup_complainants.complainant_name',
                'setup_accuseds.accused_name',
                'setup_in_favour_ofs.in_favour_of_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_modes.mode_name',
                'setup_referrers.referrer_name',
                'client_party.in_favour_of_name as client_party_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_allegations.allegation_name',
                'admins.name',
                'setup_cabinets.cabinet_name',
                'case_infos_title.case_title_name as sub_seq_case_title_name')
            ->where('criminal_cases.id', $id)
            ->first();

        $received_documents_explode = CriminalCasesDocumentsReceived::where('case_id', $id)->get()->toArray();
        $required_wanting_documents_explode = CriminalCasesDocumentsRequired::where('case_id', $id)->get()->toArray();
        $letter_notice_explode = CriminalCasesLetterNotice::where('case_id', $id)->get()->toArray();

        // dd($received_documents_explode);

        return view('litigation_management.cases.criminal_cases.edit_criminal_cases', compact('group_name', 'documents_type', 'required_wanting_documents_explode', 'received_documents_date_explode', 'received_documents_write_explode', 'exist_court_short', 'data', 'existing_district', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'existing_ext_coun_associates', 'section', 'client_category', 'existing_client_subcategory', 'existing_case_subcategory', 'existing_district', 'existing_thana', 'existing_assignend_external_council', 'assigned_lawyer_explode', 'next_day_presence', 'legal_issue', 'legal_service', 'matter', 'coordinator', 'allegation', 'case_infos_existing_district', 'case_infos_existing_thana', 'mode', 'court_proceeding', 'day_notes', 'in_favour_of', 'referrer', 'party', 'client', 'profession', 'opposition', 'documents', 'case_title', 'existing_opposition_subcategory', 'client_explode', 'court_explode', 'law_explode', 'section_explode', 'opposition_explode', 'sub_seq_court_explode', 'received_documents_explode', 'required_documents_explode', 'user', 'complainant', 'accused', 'court_short', 'edit_case_steps', 'exist_engaged_advocate', 'exist_engaged_advocate_associates', 'court_short_explode', 'sub_seq_court_short_explode', 'previous_activity', 'opposition_existing_district', 'opposition_existing_thana', 'cabinet', 'case_no_data', 'exist_case_type', 'particulars', 'letter_notice_explode'));
    }

    public function update_criminal_cases(Request $request, $id)
    {

// dd($request->all());

        $received_documents_sections = $request->received_documents_sections;
        $remove = !empty($received_documents_sections) ? array_pop($received_documents_sections) : '';

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = !empty($required_wanting_documents_sections) ? array_pop($required_wanting_documents_sections) : '';

        $letter_notice_sections = $request->letter_notice_sections;
        $remove = !empty($letter_notice_sections) ? array_pop($letter_notice_sections) : '';

        if ($request->received_date != 'dd-mm-yyyy') {
            $received_date_explode = explode('-', $request->received_date);
            $received_date_implode = implode('-', $received_date_explode);
            $received_date = date('Y-m-d', strtotime($received_date_implode));
        } else {
            $received_date = date('Y-m-d');
        }

        if ($request->next_date != 'dd-mm-yyyy') {
            $next_date_explode = explode('-', $request->next_date);
            $next_date_implode = implode('-', $next_date_explode);
            $next_date = date('Y-m-d', strtotime($next_date_implode));
        } else {
            $next_date = null;
        }

        $complainant = $request->case_infos_complainant_informant_name ? implode(', ', $request->case_infos_complainant_informant_name) : null;
        $accused = $request->case_infos_accused_name ? implode(', ', $request->case_infos_accused_name) : null;
        $client = $request->client_name_write ? implode(', ', $request->client_name_write) : null;
        $opposition = $request->opposition_write ? implode(', ', $request->opposition_write) : null;

        $received_documents_id = $request->received_documents_id ? implode(', ', $request->received_documents_id) : null;
        $received_documents = $request->received_documents ? implode(', ', $request->received_documents) : null;
        $received_documents_date = $request->received_documents_date ? implode(', ', $request->received_documents_date) : null;
        $required_wanting_documents_id = $request->required_wanting_documents_id ? implode(', ', $request->required_wanting_documents_id) : null;
        $required_wanting_documents = $request->required_wanting_documents ? implode(', ', $request->required_wanting_documents) : null;
        $required_wanting_documents_date = $request->required_wanting_documents_date ? implode(', ', $request->required_wanting_documents_date) : null;

        $court_short_write = $request->court_short_write ? implode(', ', $request->court_short_write) : null;
        $case_infos_sub_seq_case_no = $request->case_infos_sub_seq_case_no ? implode(', ', $request->case_infos_sub_seq_case_no) : null;
        $case_infos_sub_seq_case_year = $request->case_infos_sub_seq_case_year ? implode(', ', $request->case_infos_sub_seq_case_year) : null;
        $sub_seq_court_short_write = $request->sub_seq_court_short_write ? implode(', ', $request->sub_seq_court_short_write) : null;
        $law_write = $request->law_write ? implode(', ', $request->law_write) : null;
        $section_write = $request->section_write ? implode(', ', $request->section_write) : null;
        $complainant_informant_representative = $request->complainant_informant_representative ? implode(', ', $request->complainant_informant_representative) : null;
        $case_infos_accused_representative = $request->case_infos_accused_representative ? implode(', ', $request->case_infos_accused_representative) : null;


        DB::beginTransaction();

        $data = CriminalCase::find($id);

        if ($request->client && $request->client_party_id) {
            $data->client = $request->client;
            $data->legal_issue_id = $request->legal_issue_id;
            $data->legal_issue_write = $request->legal_issue_write;
            $data->legal_service_id = $request->legal_service_id;
            $data->legal_service_write = $request->legal_service_write;
            $data->complainant_informant_id = $request->complainant_informant_id;
            $data->complainant_informant_write = $request->complainant_informant_write;
            $data->accused_id = $request->accused_id;
            $data->accused_write = $request->accused_write;
            $data->in_favour_of_id = $request->in_favour_of_id;
            $data->case_no = $request->case_no;
            $data->name_of_the_court_id = $request->name_of_the_court_id;

            $data->next_date = $next_date;
            $data->next_date_fixed_id = $request->next_date_fixed_id;
            $data->received_date = $received_date;
            $data->mode_of_receipt_id = $request->mode_of_receipt_id;
            $data->referrer_id = $request->referrer_id;
            $data->referrer_write = $request->referrer_write;
            $data->referrer_details = $request->referrer_details;
            $data->received_by_id = $request->received_by_id;
            $data->received_by_write = $request->received_by_write;
            $data->cabinet_id = $request->cabinet_id;
            $data->self_number = $request->self_number;
            $data->client_party_id = $request->client_party_id;
            $data->client_category_id = $request->client_category_id;
            $data->client_subcategory_id = $request->client_subcategory_id;
            $data->client_id = $request->client_id ? implode(', ', $request->client_id) : null;
            $data->client_name_write = rtrim($client, ', ');
            $data->client_business_name = $request->client_business_name;
            $data->client_group_id = $request->client_group_id;
            $data->client_group_write = $request->client_group_write;
            $data->client_address = $request->client_address;
            $data->client_mobile = $request->client_mobile;
            $data->client_email = $request->client_email;
            $data->client_profession_id = $request->client_profession_id;
            $data->client_profession_write = $request->client_profession_write;
            $data->client_division_id = $request->client_division_id;
            $data->client_divisoin_write = $request->client_divisoin_write;
            $data->client_district_id = $request->client_district_id;
            $data->client_district_write = $request->client_district_write;
            $data->client_thana_id = $request->client_thana_id;
            $data->client_thana_write = $request->client_thana_write;
            $data->client_representative_name = $request->client_representative_name;
            $data->client_representative_details = $request->client_representative_details;
            $data->client_coordinator_tadbirkar_id = $request->client_coordinator_tadbirkar_id;
            $data->coordinator_tadbirkar_write = $request->coordinator_tadbirkar_write;
            $data->client_coordinator_details = $request->client_coordinator_details;
            $data->opposition_party_id = $request->opposition_party_id;
            $data->opposition_category_id = $request->opposition_category_id;
            $data->opposition_subcategory_id = $request->opposition_subcategory_id;
            $data->opposition_id = $request->opposition_id ? implode(', ', $request->opposition_id) : null;
            $data->opposition_write = rtrim($opposition, ', ');
            $data->opposition_business_name = $request->opposition_business_name;
            $data->opposition_group_id = $request->opposition_group_id;
            $data->opposition_group_write = $request->opposition_group_write;
            $data->opposition_address = $request->opposition_address;
            $data->opposition_mobile = $request->opposition_mobile;
            $data->opposition_email = $request->opposition_email;
            $data->opposition_profession_id = $request->opposition_profession_id;
            $data->opposition_profession_write = $request->opposition_profession_write;
            $data->opposition_division_id = $request->opposition_division_id;
            $data->opposition_divisoin_write = $request->opposition_divisoin_write;
            $data->opposition_district_id = $request->opposition_district_id;
            $data->opposition_district_write = $request->opposition_district_write;
            $data->opposition_thana_id = $request->opposition_thana_id;
            $data->opposition_thana_write = $request->opposition_thana_write;
            $data->opposition_representative_name = $request->opposition_representative_name;
            $data->opposition_representative_details = $request->opposition_representative_details;
            $data->opposition_coordinator_tadbirkar_id = $request->opposition_coordinator_tadbirkar_id;
            $data->opposition_coordinator_tadbirkar_write = $request->opposition_coordinator_tadbirkar_write;
            $data->opposition_coordinator_details = $request->opposition_coordinator_details;
            $data->lawyer_advocate_id = $request->lawyer_advocate_id;
            $data->lawyer_advocate_write = $request->lawyer_advocate_write;
            $data->assigned_lawyer_id = $request->assigned_lawyer_id ? implode(', ', $request->assigned_lawyer_id) : null;
            $data->lawyers_remarks = $request->lawyers_remarks;

            // $data->received_documents_id = rtrim($received_documents_id,', ');
            // $data->received_documents = $received_documents;
            // $data->received_documents_date = rtrim($received_documents_date,', ');
            // $data->required_wanting_documents_id = rtrim($required_wanting_documents_id,', ');
            // $data->required_wanting_documents = $required_wanting_documents;
            // $data->required_wanting_documents_date = rtrim($required_wanting_documents_date,', ');

            $data->case_infos_division_id = $request->case_infos_division_id;
            $data->case_infos_district_id = $request->case_infos_district_id;
            $data->case_infos_thana_id = $request->case_infos_thana_id;
            $data->case_category_id = $request->case_category_id;
            $data->case_subcategory_id = $request->case_subcategory_id;
            $data->case_infos_case_title_id = $request->case_infos_case_title_id;
            $data->case_infos_case_no = $request->case_infos_case_no;
            $data->case_infos_case_year = $request->case_infos_case_year;
            $data->case_infos_court_id = $request->case_infos_court_id ? implode(', ', $request->case_infos_court_id) : null;
            $data->case_infos_court_short_id = $request->case_infos_court_short_id ? implode(', ', $request->case_infos_court_short_id) : null;
            $data->court_short_write = rtrim($court_short_write, ', ');
            $data->case_infos_sub_seq_case_title_id = $request->case_infos_sub_seq_case_title_id;
            $data->case_infos_sub_seq_case_no = rtrim($case_infos_sub_seq_case_no, ', ');
            $data->case_infos_sub_seq_case_year = rtrim($case_infos_sub_seq_case_year, ', ');
            $data->case_infos_sub_seq_court_id = $request->case_infos_sub_seq_court_id ? implode(', ', $request->case_infos_sub_seq_court_id) : null;
            $data->case_infos_sub_seq_court_short_id = $request->case_infos_sub_seq_court_short_id ? implode(', ', $request->case_infos_sub_seq_court_short_id) : null;
            $data->sub_seq_court_short_write = rtrim($sub_seq_court_short_write, ', ');
            $data->law_id = $request->law_id ? implode('/ ', $request->law_id) : null;
            $data->law_write = rtrim($law_write, ', ');
            $data->section_id = $request->section_id ? implode(', ', $request->section_id) : null;
            $data->section_write = rtrim($section_write, ', ');
            $data->date_of_filing = $request->date_of_filing == 'dd-mm-yyyy' || $request->date_of_filing == 'NaN-NaN-NaN' ? null : $request->date_of_filing;
            $data->case_status_id = $request->case_status_id;
            $data->matter_id = $request->matter_id;
            $data->matter_write = $request->matter_write;
            $data->case_type_id = $request->case_type_id;
            $data->case_infos_complainant_informant_name = rtrim($complainant, ', ');
            $data->complainant_informant_representative = rtrim($complainant_informant_representative, ', ');
            $data->case_infos_accused_name = rtrim($accused, ', ');
            $data->case_infos_accused_representative = rtrim($case_infos_accused_representative, ', ');
            $data->prosecution_witness = $request->prosecution_witness;
            $data->defense_witness = $request->defense_witness;
            $data->update();


            $steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();
            $steps->case_infos_allegation_claim_id = $request->case_infos_allegation_claim_id;
            $steps->case_infos_allegation_claim_write = $request->case_infos_allegation_claim_write;
            $steps->amount_of_money = $request->amount_of_money;
            $steps->another_claim = $request->another_claim;
            $steps->recovery_seizure_articles = $request->recovery_seizure_articles;
            $steps->summary_facts = $request->summary_facts;
            $steps->case_info_remarks = $request->case_info_remarks;


            $steps->case_steps_filing = $request->case_steps_filing == 'dd-mm-yyyy' || $request->case_steps_filing == 'NaN-NaN-NaN' ? null : $request->case_steps_filing;
            $steps->case_steps_filing_note = $request->case_steps_filing_note;
            $steps->case_steps_filing_type_id = $request->case_steps_filing_type_id;
            $steps->taking_cognizance = $request->taking_cognizance == 'dd-mm-yyyy' || $request->taking_cognizance == 'NaN-NaN-NaN' ? null : $request->taking_cognizance;
            $steps->taking_cognizance_note = $request->taking_cognizance_note;
            $steps->taking_cognizance_type_id = $request->taking_cognizance_type_id;
            $steps->arrest_surrender_cw = $request->arrest_surrender_cw == 'dd-mm-yyyy' || $request->arrest_surrender_cw == 'NaN-NaN-NaN' ? null : $request->arrest_surrender_cw;
            $steps->arrest_surrender_cw_note = $request->arrest_surrender_cw_note;
            $steps->arrest_surrender_cw_type_id = $request->arrest_surrender_cw_type_id;
            $steps->case_steps_bail = $request->case_steps_bail == 'dd-mm-yyyy' || $request->case_steps_bail == 'NaN-NaN-NaN' ? null : $request->case_steps_bail;
            $steps->case_steps_bail_note = $request->case_steps_bail_note;
            $steps->case_steps_bail_type_id = $request->case_steps_bail_type_id;
            $steps->case_steps_court_transfer = $request->case_steps_court_transfer == 'dd-mm-yyyy' || $request->case_steps_court_transfer == 'NaN-NaN-NaN' ? null : $request->case_steps_court_transfer;
            $steps->case_steps_court_transfer_note = $request->case_steps_court_transfer_note;
            $steps->case_steps_court_transfer_type_id = $request->case_steps_court_transfer_type_id;
            $steps->case_steps_charge_framed = $request->case_steps_charge_framed == 'dd-mm-yyyy' || $request->case_steps_charge_framed == 'NaN-NaN-NaN' ? null : $request->case_steps_charge_framed;
            $steps->case_steps_charge_framed_note = $request->case_steps_charge_framed_note;
            $steps->case_steps_charge_framed_type_id = $request->case_steps_charge_framed_type_id;
            $steps->case_steps_witness_from = $request->case_steps_witness_from == 'dd-mm-yyyy' || $request->case_steps_witness_from == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_from;
            $steps->case_steps_witness_from_note = $request->case_steps_witness_from_note;
            $steps->case_steps_witness_from_type_id = $request->case_steps_witness_from_type_id;
            $steps->case_steps_witness_to = $request->case_steps_witness_to == 'dd-mm-yyyy' || $request->case_steps_witness_to == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_to;
            $steps->case_steps_witness_to_note = $request->case_steps_witness_to_note;
            $steps->case_steps_witness_to_type_id = $request->case_steps_witness_to_type_id;
            $steps->case_steps_argument = $request->case_steps_argument == 'dd-mm-yyyy' || $request->case_steps_argument == 'NaN-NaN-NaN' ? null : $request->case_steps_argument;
            $steps->case_steps_argument_note = $request->case_steps_argument_note;
            $steps->case_steps_argument_type_id = $request->case_steps_argument_type_id;
            $steps->case_steps_judgement_order = $request->case_steps_judgement_order == 'dd-mm-yyyy' || $request->case_steps_judgement_order == 'NaN-NaN-NaN' ? null : $request->case_steps_judgement_order;
            $steps->case_steps_judgement_order_note = $request->case_steps_judgement_order_note;
            $steps->case_steps_judgement_order_type_id = $request->case_steps_judgement_order_type_id;
            $steps->case_steps_summary_of_cases = $request->case_steps_summary_of_cases == 'dd-mm-yyyy' || $request->case_steps_summary_of_cases == 'NaN-NaN-NaN' ? null : $request->case_steps_summary_of_cases;
            $steps->case_steps_summary_of_cases_note = $request->case_steps_summary_of_cases_note;
            $steps->case_steps_summary_of_cases_type_id = $request->case_steps_summary_of_cases_type_id;
            $steps->case_steps_remarks = $request->case_steps_remarks;

            $steps->save();

            if ($request->hasfile('uploaded_document')) {
                foreach ($request->file('uploaded_document') as $key => $file) {

                    $original_name = $file->getClientOriginalName();
                    $explode = explode('.', $original_name);
                    array_pop($explode);
                    $implode = implode('-', $explode);
                    $original_extension = $file->getClientOriginalExtension();
                    $name = Str::slug($implode) . '.' . $original_extension;
                    $file->move(public_path('files/criminal_cases'), $name);

                    $files = new CriminalCasesFile();
                    $files->case_id = $data->id;
                    $files->uploaded_date = $request->uploaded_date[$key];
                    $files->documents_type_id = $request->documents_type_id[$key];
                    $files->uploaded_document = $name;
                    $files->created_by = Auth::guard('admin')->user()->email;
                    $files->save();

                }
            }


            $received_documents = CriminalCasesDocumentsReceived::where('case_id', $id)->delete();
            // dd($received_documents);

            foreach (array_filter($received_documents_sections) as $key => $value) {
                $datum = new CriminalCasesDocumentsReceived();
                $datum->case_id = $data->id;
                $datum->received_documents_id = $request->received_documents_id[$key];
                $datum->received_documents = $request->received_documents[$key];
                $datum->received_documents_date = $request->received_documents_date[$key];
                $datum->received_documents_type_id = $request->received_documents_type_id[$key];
                $datum->save();
            }

            $required_wanting_documents = CriminalCasesDocumentsRequired::where('case_id', $id)->delete();

            foreach (array_filter($required_wanting_documents_sections) as $key => $value) {
                $required = new CriminalCasesDocumentsRequired();
                $required->case_id = $data->id;
                $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
                $required->required_wanting_documents = $request->required_wanting_documents[$key];
                $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
                $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
                $required->save();
            }

            $letter_notice = CriminalCasesLetterNotice::where('case_id', $id)->delete();

            foreach (array_filter($letter_notice_sections) as $key => $value) {
                $required = new CriminalCasesLetterNotice();
                $required->case_id = $data->id;
                $required->letter_notice_date = $request->letter_notice_date[$key];
                $required->letter_notice_documents_id = $request->letter_notice_documents_id[$key];
                $required->letter_notice_documents_write = $request->letter_notice_documents_write[$key];
                $required->letter_notice_particulars_write = $request->letter_notice_particulars_write[$key];
                $required->letter_notice_type_id = $request->letter_notice_type_id[$key];
                $required->save();
            }
        } else if ($request->basic_information) {
// dd('basic_information');
            $data->client = $request->client;
            $data->legal_issue_id = $request->legal_issue_id;
            $data->legal_issue_write = $request->legal_issue_write;
            $data->legal_service_id = $request->legal_service_id;
            $data->legal_service_write = $request->legal_service_write;
            $data->complainant_informant_id = $request->complainant_informant_id;
            $data->complainant_informant_write = $request->complainant_informant_write;
            $data->accused_id = $request->accused_id;
            $data->accused_write = $request->accused_write;
            $data->in_favour_of_id = $request->in_favour_of_id;
            $data->case_no = $request->case_no;
            $data->name_of_the_court_id = $request->name_of_the_court_id;
            $data->next_date = $next_date;
            $data->next_date_fixed_id = $request->next_date_fixed_id;
            $data->received_date = $received_date;
            $data->mode_of_receipt_id = $request->mode_of_receipt_id;
            $data->referrer_id = $request->referrer_id;
            $data->referrer_write = $request->referrer_write;
            $data->referrer_details = $request->referrer_details;
            $data->received_by_id = $request->received_by_id;
            $data->received_by_write = $request->received_by_write;
            $data->cabinet_id = $request->cabinet_id;
            $data->self_number = $request->self_number;
            $data->save();

        } else if ($request->client_information) {

            $data->client_party_id = $request->client_party_id;
            $data->client_category_id = $request->client_category_id;
            $data->client_subcategory_id = $request->client_subcategory_id;
            $data->client_id = $request->client_id ? implode(', ', $request->client_id) : null;
            $data->client_name_write = rtrim($client, ', ');
            $data->client_business_name = $request->client_business_name;
            $data->client_group_id = $request->client_group_id;
            $data->client_group_write = $request->client_group_write;
            $data->client_address = $request->client_address;
            $data->client_mobile = $request->client_mobile;
            $data->client_email = $request->client_email;
            $data->client_profession_id = $request->client_profession_id;
            $data->client_profession_write = $request->client_profession_write;
            $data->client_division_id = $request->client_division_id;
            $data->client_divisoin_write = $request->client_divisoin_write;
            $data->client_district_id = $request->client_district_id;
            $data->client_district_write = $request->client_district_write;
            $data->client_thana_id = $request->client_thana_id;
            $data->client_thana_write = $request->client_thana_write;
            $data->client_representative_name = $request->client_representative_name;
            $data->client_representative_details = $request->client_representative_details;
            $data->client_coordinator_tadbirkar_id = $request->client_coordinator_tadbirkar_id;
            $data->coordinator_tadbirkar_write = $request->coordinator_tadbirkar_write;
            $data->client_coordinator_details = $request->client_coordinator_details;
            $data->save();

        } else if ($request->opposite_party_information) {

            $data->opposition_party_id = $request->opposition_party_id;
            $data->opposition_category_id = $request->opposition_category_id;
            $data->opposition_subcategory_id = $request->opposition_subcategory_id;
            $data->opposition_id = $request->opposition_id ? implode(', ', $request->opposition_id) : null;
            $data->opposition_write = rtrim($opposition, ', ');
            $data->opposition_business_name = $request->opposition_business_name;
            $data->opposition_group_id = $request->opposition_group_id;
            $data->opposition_group_write = $request->opposition_group_write;
            $data->opposition_address = $request->opposition_address;
            $data->opposition_mobile = $request->opposition_mobile;
            $data->opposition_email = $request->opposition_email;
            $data->opposition_profession_id = $request->opposition_profession_id;
            $data->opposition_profession_write = $request->opposition_profession_write;
            $data->opposition_division_id = $request->opposition_division_id;
            $data->opposition_divisoin_write = $request->opposition_divisoin_write;
            $data->opposition_district_id = $request->opposition_district_id;
            $data->opposition_district_write = $request->opposition_district_write;
            $data->opposition_thana_id = $request->opposition_thana_id;
            $data->opposition_thana_write = $request->opposition_thana_write;
            $data->opposition_representative_name = $request->opposition_representative_name;
            $data->opposition_representative_details = $request->opposition_representative_details;
            $data->opposition_coordinator_tadbirkar_id = $request->opposition_coordinator_tadbirkar_id;
            $data->opposition_coordinator_tadbirkar_write = $request->opposition_coordinator_tadbirkar_write;
            $data->opposition_coordinator_details = $request->opposition_coordinator_details;
            $data->save();

        } else if ($request->lawyers_information) {

            $data->lawyer_advocate_id = $request->lawyer_advocate_id;
            $data->lawyer_advocate_write = $request->lawyer_advocate_write;
            $data->assigned_lawyer_id = $request->assigned_lawyer_id ? implode(', ', $request->assigned_lawyer_id) : null;
            $data->lawyers_remarks = $request->lawyers_remarks;
            $data->save();

        } else if ($request->documents_information) {

            $received_documents = CriminalCasesDocumentsReceived::where('case_id', $id)->delete();
            // dd($received_documents);

            foreach (array_filter($received_documents_sections) as $key => $value) {
                $datum = new CriminalCasesDocumentsReceived();
                $datum->case_id = $data->id;
                $datum->received_documents_id = $request->received_documents_id[$key];
                $datum->received_documents = $request->received_documents[$key];
                $datum->received_documents_date = $request->received_documents_date[$key];
                $datum->received_documents_type_id = $request->received_documents_type_id[$key];
                $datum->save();
            }

            $required_wanting_documents = CriminalCasesDocumentsRequired::where('case_id', $id)->delete();

            foreach (array_filter($required_wanting_documents_sections) as $key => $value) {
                $required = new CriminalCasesDocumentsRequired();
                $required->case_id = $data->id;
                $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
                $required->required_wanting_documents = $request->required_wanting_documents[$key];
                $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
                $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
                $required->save();
            }

        } else if ($request->letter_notice_date) {

            $letter_notice = CriminalCasesLetterNotice::where('case_id', $id)->delete();
            foreach (array_filter($letter_notice_sections) as $key => $value) {
                $required = new CriminalCasesLetterNotice();
                $required->case_id = $data->id;
                $required->letter_notice_date = $request->letter_notice_date[$key];
                $required->letter_notice_documents_id = $request->letter_notice_documents_id[$key];
                $required->letter_notice_documents_write = $request->letter_notice_documents_write[$key];
                $required->letter_notice_particulars_write = $request->letter_notice_particulars_write[$key];
                $required->letter_notice_type_id = $request->letter_notice_type_id[$key];
                $required->save();
            }
        } else if ($request->case_information) {
            // dd($request->all());
            $data->case_infos_division_id = $request->case_infos_division_id;
            $data->case_infos_district_id = $request->case_infos_district_id;
            $data->case_infos_thana_id = $request->case_infos_thana_id;
            $data->case_category_id = $request->case_category_id;
            $data->case_subcategory_id = $request->case_subcategory_id;
            $data->case_infos_case_title_id = $request->case_infos_case_title_id;
            $data->case_infos_case_no = $request->case_infos_case_no;
            $data->case_infos_case_year = $request->case_infos_case_year;
            $data->case_infos_court_id = $request->case_infos_court_id ? implode(', ', $request->case_infos_court_id) : null;
            $data->case_infos_court_short_id = $request->case_infos_court_short_id ? implode(', ', $request->case_infos_court_short_id) : null;
            $data->court_short_write = rtrim($court_short_write, ', ');
            $data->case_infos_sub_seq_case_title_id = $request->case_infos_sub_seq_case_title_id;
            $data->case_infos_sub_seq_case_no = rtrim($case_infos_sub_seq_case_no, ', ');
            $data->case_infos_sub_seq_case_year = rtrim($case_infos_sub_seq_case_year, ', ');
            $data->case_infos_sub_seq_court_id = $request->case_infos_sub_seq_court_id ? implode(', ', $request->case_infos_sub_seq_court_id) : null;
            $data->case_infos_sub_seq_court_short_id = $request->case_infos_sub_seq_court_short_id ? implode(', ', $request->case_infos_sub_seq_court_short_id) : null;
            $data->sub_seq_court_short_write = rtrim($sub_seq_court_short_write, ', ');
            $data->law_id = $request->law_id ? implode('/ ', $request->law_id) : null;
            $data->law_write = rtrim($law_write, ', ');
            $data->section_id = $request->section_id ? implode(', ', $request->section_id) : null;
            $data->section_write = rtrim($section_write, ', ');
            $data->date_of_filing = $request->date_of_filing == 'dd-mm-yyyy' || $request->date_of_filing == 'NaN-NaN-NaN' ? null : $request->date_of_filing;
            $data->case_status_id = $request->case_status_id;
            $data->matter_id = $request->matter_id;
            $data->matter_write = $request->matter_write;
            $data->case_type_id = $request->case_type_id;
            $data->case_infos_complainant_informant_name = rtrim($complainant, ', ');
            $data->complainant_informant_representative = rtrim($complainant_informant_representative, ', ');
            $data->case_infos_accused_name = rtrim($accused, ', ');
            $data->case_infos_accused_representative = rtrim($case_infos_accused_representative, ', ');
            $data->prosecution_witness = $request->prosecution_witness;
            $data->defense_witness = $request->defense_witness;
            $data->save();

// dd('asdfadf');
            $steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();
            $steps->case_infos_allegation_claim_id = $request->case_infos_allegation_claim_id;
            $steps->case_infos_allegation_claim_write = $request->case_infos_allegation_claim_write;
            $steps->amount_of_money = $request->amount_of_money;
            $steps->another_claim = $request->another_claim;
            $steps->recovery_seizure_articles = $request->recovery_seizure_articles;
            $steps->summary_facts = $request->summary_facts;
            $steps->case_info_remarks = $request->case_info_remarks;
            $steps->case_steps_filing = $request->date_of_filing == 'dd-mm-yyyy' || $request->date_of_filing == 'NaN-NaN-NaN' ? null : $request->date_of_filing;
            $steps->save();

// dd('asdfadf');

        } else if ($request->case_steps) {

            $steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();

            $steps->case_steps_filing = $request->case_steps_filing == 'dd-mm-yyyy' || $request->case_steps_filing == 'NaN-NaN-NaN' ? null : $request->case_steps_filing;
            $steps->case_steps_filing_note = $request->case_steps_filing_note;
            $steps->case_steps_filing_type_id = $request->case_steps_filing_type_id;
            $steps->taking_cognizance = $request->taking_cognizance == 'dd-mm-yyyy' || $request->taking_cognizance == 'NaN-NaN-NaN' ? null : $request->taking_cognizance;
            $steps->taking_cognizance_note = $request->taking_cognizance_note;
            $steps->taking_cognizance_type_id = $request->taking_cognizance_type_id;
            $steps->arrest_surrender_cw = $request->arrest_surrender_cw == 'dd-mm-yyyy' || $request->arrest_surrender_cw == 'NaN-NaN-NaN' ? null : $request->arrest_surrender_cw;
            $steps->arrest_surrender_cw_note = $request->arrest_surrender_cw_note;
            $steps->arrest_surrender_cw_type_id = $request->arrest_surrender_cw_type_id;
            $steps->case_steps_bail = $request->case_steps_bail == 'dd-mm-yyyy' || $request->case_steps_bail == 'NaN-NaN-NaN' ? null : $request->case_steps_bail;
            $steps->case_steps_bail_note = $request->case_steps_bail_note;
            $steps->case_steps_bail_type_id = $request->case_steps_bail_type_id;
            $steps->case_steps_court_transfer = $request->case_steps_court_transfer == 'dd-mm-yyyy' || $request->case_steps_court_transfer == 'NaN-NaN-NaN' ? null : $request->case_steps_court_transfer;
            $steps->case_steps_court_transfer_note = $request->case_steps_court_transfer_note;
            $steps->case_steps_court_transfer_type_id = $request->case_steps_court_transfer_type_id;
            $steps->case_steps_charge_framed = $request->case_steps_charge_framed == 'dd-mm-yyyy' || $request->case_steps_charge_framed == 'NaN-NaN-NaN' ? null : $request->case_steps_charge_framed;
            $steps->case_steps_charge_framed_note = $request->case_steps_charge_framed_note;
            $steps->case_steps_charge_framed_type_id = $request->case_steps_charge_framed_type_id;
            $steps->case_steps_witness_from = $request->case_steps_witness_from == 'dd-mm-yyyy' || $request->case_steps_witness_from == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_from;
            $steps->case_steps_witness_from_note = $request->case_steps_witness_from_note;
            $steps->case_steps_witness_from_type_id = $request->case_steps_witness_from_type_id;
            $steps->case_steps_witness_to = $request->case_steps_witness_to == 'dd-mm-yyyy' || $request->case_steps_witness_to == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_to;
            $steps->case_steps_witness_to_note = $request->case_steps_witness_to_note;
            $steps->case_steps_witness_to_type_id = $request->case_steps_witness_to_type_id;
            $steps->case_steps_argument = $request->case_steps_argument == 'dd-mm-yyyy' || $request->case_steps_argument == 'NaN-NaN-NaN' ? null : $request->case_steps_argument;
            $steps->case_steps_argument_note = $request->case_steps_argument_note;
            $steps->case_steps_argument_type_id = $request->case_steps_argument_type_id;
            $steps->case_steps_judgement_order = $request->case_steps_judgement_order == 'dd-mm-yyyy' || $request->case_steps_judgement_order == 'NaN-NaN-NaN' ? null : $request->case_steps_judgement_order;
            $steps->case_steps_judgement_order_note = $request->case_steps_judgement_order_note;
            $steps->case_steps_judgement_order_type_id = $request->case_steps_judgement_order_type_id;
            $steps->case_steps_summary_of_cases = $request->case_steps_summary_of_cases == 'dd-mm-yyyy' || $request->case_steps_summary_of_cases == 'NaN-NaN-NaN' ? null : $request->case_steps_summary_of_cases;
            $steps->case_steps_summary_of_cases_note = $request->case_steps_summary_of_cases_note;
            $steps->case_steps_summary_of_cases_type_id = $request->case_steps_summary_of_cases_type_id;
            $steps->case_steps_remarks = $request->case_steps_remarks;
            $steps->save();

        }

        DB::commit();

        session()->flash('success', 'Criminal Cases Updated Successfully.');
        return redirect()->back();

    }


    public function update_criminal_case(Request $request, $id)
    {

        // $data = json_decode(json_encode($request->all()));
        // echo "<pre>";print_r($data);die;

        // $letter_notice->letter_notice_date = $value;
        // $letter_notice->letter_notice_documents_id = $request->letter_notice_documents_id[$key];
        // $letter_notice->letter_notice_particulars_id = $request->letter_notice_particulars_id[$key];
        // $letter_notice->letter_notice_org = $request->letter_notice_org[$key];
        // $letter_notice->letter_notice_pht


// $letter_notice_date =  array_filter($request->letter_notice_date);
// $letter_notice_documents_id =  array_filter($request->letter_notice_documents_id);
// $letter_notice_particulars_id =  array_filter($request->letter_notice_particulars_id);
// $letter_notice_org =  array_filter($request->letter_notice_org);
// $letter_notice_pht =  array_filter($request->letter_notice_pht);

        $received_documents_sections = $request->received_documents_sections;
        $remove = $received_documents_sections ? array_pop($received_documents_sections) : '';

        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = $required_wanting_documents_sections ? array_pop($required_wanting_documents_sections) : '';

        $letter_notice_sections = $request->letter_notice_sections;
        $remove = $letter_notice_sections ? array_pop($letter_notice_sections) : '';

// dd($required_wanting_documents_sections);

        $letter_notice_date_implode = $request->letter_notice_date ? implode(', ', array_filter($request->letter_notice_date)) : null;
        $letter_notice_date = rtrim($letter_notice_date_implode, ', ');
        $letter_notice_date_explode = explode(', ', $letter_notice_date);

        $letter_notice_documents_id_implode = $request->letter_notice_documents_id ? implode(', ', array_filter($request->letter_notice_documents_id)) : null;
        $letter_notice_documents_id = rtrim($letter_notice_documents_id_implode, ', ');
        $letter_notice_documents_id_explode = explode(', ', $letter_notice_documents_id);

        $letter_notice_documents_write_implode = $request->letter_notice_documents_write ? implode(', ', array_filter($request->letter_notice_documents_write)) : null;
        $letter_notice_documents_write = rtrim($letter_notice_documents_write_implode, ', ');
        $letter_notice_documents_write_explode = explode(', ', $letter_notice_documents_write);

        $letter_notice_particulars_id_implode = $request->letter_notice_particulars_id ? implode(', ', array_filter($request->letter_notice_particulars_id)) : null;
        $letter_notice_particulars_id = rtrim($letter_notice_particulars_id_implode, ', ');
        $letter_notice_particulars_id_explode = explode(', ', $letter_notice_particulars_id);

        $letter_notice_particulars_write_implode = $request->letter_notice_particulars_write ? implode(', ', array_filter($request->letter_notice_particulars_write)) : null;
        $letter_notice_particulars_write = rtrim($letter_notice_particulars_write_implode, ', ');
        $letter_notice_particulars_write_explode = explode(', ', $letter_notice_particulars_write);

        $letter_notice_org_implode = $request->letter_notice_org ? implode(', ', array_filter($request->letter_notice_org)) : implode(', ', $request->letter_notice_date);
        $letter_notice_org = rtrim($letter_notice_org_implode, ', ');
        $letter_notice_org_explode = explode(', ', $letter_notice_org);

        $letter_notice_pht_implode = $request->letter_notice_pht ? implode(', ', array_filter($request->letter_notice_pht)) : implode(', ', $request->letter_notice_date);
        $letter_notice_pht = rtrim($letter_notice_pht_implode, ', ');
        $letter_notice_pht_explode = explode(', ', $letter_notice_pht);


// dd($letter_notice_documents_write_explode);

        if ($request->received_date != 'dd-mm-yyyy') {
            $received_date_explode = explode('-', $request->received_date);
            $received_date_implode = implode('-', $received_date_explode);
            $received_date = date('Y-m-d', strtotime($received_date_implode));
        } else {
            $received_date = date('Y-m-d');
        }

        if ($request->next_date != 'dd-mm-yyyy') {
            $next_date_explode = explode('-', $request->next_date);
            $next_date_implode = implode('-', $next_date_explode);
            $next_date = date('Y-m-d', strtotime($next_date_implode));
        } else {
            $next_date = null;
        }

// dd($request->all());
        $complainant = $request->case_infos_complainant_informant_name ? implode(', ', $request->case_infos_complainant_informant_name) : null;
        $accused = $request->case_infos_accused_name ? implode(', ', $request->case_infos_accused_name) : null;
        $client = $request->client_name_write ? implode(', ', $request->client_name_write) : null;
        $opposition = $request->opposition_write ? implode(', ', $request->opposition_write) : null;
        $received_documents_id = $request->received_documents_id ? implode(', ', $request->received_documents_id) : null;
        $received_documents = $request->received_documents ? implode(', ', $request->received_documents) : null;
        $received_documents_date = $request->received_documents_date ? implode(', ', $request->received_documents_date) : null;
        $required_wanting_documents_id = $request->required_wanting_documents_id ? implode(', ', $request->required_wanting_documents_id) : null;
        $required_wanting_documents = $request->required_wanting_documents ? implode(', ', $request->required_wanting_documents) : null;
        $required_wanting_documents_date = $request->required_wanting_documents_date ? implode(', ', $request->required_wanting_documents_date) : null;

        $court_short_write = $request->court_short_write ? implode(', ', $request->court_short_write) : null;
        $case_infos_sub_seq_case_no = $request->case_infos_sub_seq_case_no ? implode(', ', $request->case_infos_sub_seq_case_no) : null;
        $case_infos_sub_seq_case_year = $request->case_infos_sub_seq_case_year ? implode(', ', $request->case_infos_sub_seq_case_year) : null;
        $sub_seq_court_short_write = $request->sub_seq_court_short_write ? implode(', ', $request->sub_seq_court_short_write) : null;
        $law_write = $request->law_write ? implode(', ', $request->law_write) : null;
        $section_write = $request->section_write ? implode(', ', $request->section_write) : null;
        $complainant_informant_representative = $request->complainant_informant_representative ? implode(', ', $request->complainant_informant_representative) : null;
        $case_infos_accused_representative = $request->case_infos_accused_representative ? implode(', ', $request->case_infos_accused_representative) : null;


        DB::beginTransaction();

        $data = CriminalCase::find($id);

        $data->client = $request->client;
        $data->legal_issue_id = $request->legal_issue_id;
        $data->legal_issue_write = $request->legal_issue_write;
        $data->legal_service_id = $request->legal_service_id;
        $data->legal_service_write = $request->legal_service_write;
        $data->complainant_informant_id = $request->complainant_informant_id;
        $data->complainant_informant_write = $request->complainant_informant_write;
        $data->accused_id = $request->accused_id;
        $data->accused_write = $request->accused_write;
        $data->in_favour_of_id = $request->in_favour_of_id;
        $data->case_no = $request->case_no;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->case_infos_court_short_id = $request->case_infos_court_short_id ? implode(', ', $request->case_infos_court_short_id) : null;
        $data->court_short_write = rtrim($court_short_write, ', ');
        $data->next_date = $next_date;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->received_date = $received_date;
        $data->mode_of_receipt_id = $request->mode_of_receipt_id;
        $data->referrer_id = $request->referrer_id;
        $data->referrer_write = $request->referrer_write;
        $data->referrer_details = $request->referrer_details;
        $data->received_by_id = $request->received_by_id;
        $data->received_by_write = $request->received_by_write;
        $data->cabinet_id = $request->cabinet_id;
        $data->self_number = $request->self_number;
        $data->client_party_id = $request->client_party_id;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->client_id = $request->client_id ? implode(', ', $request->client_id) : null;
        $data->client_name_write = rtrim($client, ', ');
        $data->client_business_name = $request->client_business_name;
        $data->client_group_id = $request->client_group_id;
        $data->client_group_write = $request->client_group_write;
        $data->client_address = $request->client_address;
        $data->client_mobile = $request->client_mobile;
        $data->client_email = $request->client_email;
        $data->client_profession_id = $request->client_profession_id;
        $data->client_profession_write = $request->client_profession_write;
        $data->client_division_id = $request->client_division_id;
        $data->client_divisoin_write = $request->client_divisoin_write;
        $data->client_district_id = $request->client_district_id;
        $data->client_district_write = $request->client_district_write;
        $data->client_thana_id = $request->client_thana_id;
        $data->client_thana_write = $request->client_thana_write;
        $data->client_representative_name = $request->client_representative_name;
        $data->client_representative_details = $request->client_representative_details;
        $data->client_coordinator_tadbirkar_id = $request->client_coordinator_tadbirkar_id;
        $data->coordinator_tadbirkar_write = $request->coordinator_tadbirkar_write;
        $data->client_coordinator_details = $request->client_coordinator_details;
        $data->opposition_party_id = $request->opposition_party_id;
        $data->opposition_category_id = $request->opposition_category_id;
        $data->opposition_subcategory_id = $request->opposition_subcategory_id;
        $data->opposition_id = $request->opposition_id ? implode(', ', $request->opposition_id) : null;
        $data->opposition_write = rtrim($opposition, ', ');
        $data->opposition_business_name = $request->opposition_business_name;
        $data->opposition_group_id = $request->opposition_group_id;
        $data->opposition_group_write = $request->opposition_group_write;
        $data->opposition_address = $request->opposition_address;
        $data->opposition_mobile = $request->opposition_mobile;
        $data->opposition_email = $request->opposition_email;
        $data->opposition_profession_id = $request->opposition_profession_id;
        $data->opposition_profession_write = $request->opposition_profession_write;
        $data->opposition_division_id = $request->opposition_division_id;
        $data->opposition_divisoin_write = $request->opposition_divisoin_write;
        $data->opposition_district_id = $request->opposition_district_id;
        $data->opposition_district_write = $request->opposition_district_write;
        $data->opposition_thana_id = $request->opposition_thana_id;
        $data->opposition_thana_write = $request->opposition_thana_write;
        $data->opposition_representative_name = $request->opposition_representative_name;
        $data->opposition_representative_details = $request->opposition_representative_details;
        $data->opposition_coordinator_tadbirkar_id = $request->opposition_coordinator_tadbirkar_id;
        $data->opposition_coordinator_tadbirkar_write = $request->opposition_coordinator_tadbirkar_write;
        $data->opposition_coordinator_details = $request->opposition_coordinator_details;
        $data->lawyer_advocate_id = $request->lawyer_advocate_id;
        $data->lawyer_advocate_write = $request->lawyer_advocate_write;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id ? implode(', ', $request->assigned_lawyer_id) : null;
        $data->lawyers_remarks = $request->lawyers_remarks;

        // $data->received_documents_id = rtrim($received_documents_id,', ');
        // $data->received_documents = $received_documents;
        // $data->received_documents_date = rtrim($received_documents_date,', ');
        // $data->required_wanting_documents_id = rtrim($required_wanting_documents_id,', ');
        // $data->required_wanting_documents = $required_wanting_documents;
        // $data->required_wanting_documents_date = rtrim($required_wanting_documents_date,', ');

        $data->case_infos_division_id = $request->case_infos_division_id;
        $data->case_infos_district_id = $request->case_infos_district_id;
        $data->case_infos_thana_id = $request->case_infos_thana_id;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_infos_case_title_id = $request->case_infos_case_title_id;
        $data->case_infos_case_no = $request->case_infos_case_no;
        $data->case_infos_case_year = $request->case_infos_case_year;
        $data->case_infos_court_id = $request->case_infos_court_id ? implode(', ', $request->case_infos_court_id) : null;
        $data->case_infos_court_short_id = $request->case_infos_court_short_id ? implode(', ', $request->case_infos_court_short_id) : null;
        $data->court_short_write = rtrim($court_short_write, ', ');
        $data->case_infos_sub_seq_case_title_id = $request->case_infos_sub_seq_case_title_id;
        $data->case_infos_sub_seq_case_no = rtrim($case_infos_sub_seq_case_no, ', ');
        $data->case_infos_sub_seq_case_year = rtrim($case_infos_sub_seq_case_year, ', ');
        $data->case_infos_sub_seq_court_id = $request->case_infos_sub_seq_court_id ? implode(', ', $request->case_infos_sub_seq_court_id) : null;
        $data->case_infos_sub_seq_court_short_id = $request->case_infos_sub_seq_court_short_id ? implode(', ', $request->case_infos_sub_seq_court_short_id) : null;
        $data->sub_seq_court_short_write = rtrim($sub_seq_court_short_write, ', ');
        $data->law_id = $request->law_id ? implode('/ ', $request->law_id) : null;
        $data->law_write = rtrim($law_write, ', ');
        $data->section_id = $request->section_id ? implode(', ', $request->section_id) : null;
        $data->section_write = rtrim($section_write, ', ');
        $data->date_of_filing = $request->date_of_filing == 'dd-mm-yyyy' || $request->date_of_filing == 'NaN-NaN-NaN' ? null : $request->date_of_filing;
        $data->case_status_id = $request->case_status_id;
        $data->matter_id = $request->matter_id;
        $data->matter_write = $request->matter_write;
        $data->case_type_id = $request->case_type_id;
        $data->case_infos_complainant_informant_name = rtrim($complainant, ', ');
        $data->complainant_informant_representative = rtrim($complainant_informant_representative, ', ');
        $data->case_infos_accused_name = rtrim($accused, ', ');
        $data->case_infos_accused_representative = rtrim($case_infos_accused_representative, ', ');
        $data->prosecution_witness = $request->prosecution_witness;
        $data->defense_witness = $request->defense_witness;
        $data->update();


        $steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();
        $steps->case_infos_allegation_claim_id = $request->case_infos_allegation_claim_id;
        $steps->case_infos_allegation_claim_write = $request->case_infos_allegation_claim_write;
        $steps->amount_of_money = $request->amount_of_money;
        $steps->another_claim = $request->another_claim;
        $steps->recovery_seizure_articles = $request->recovery_seizure_articles;
        $steps->summary_facts = $request->summary_facts;
        $steps->case_info_remarks = $request->case_info_remarks;

        $steps->case_steps_filing = $request->case_steps_filing == 'dd-mm-yyyy' || $request->case_steps_filing == 'NaN-NaN-NaN' ? null : $request->case_steps_filing;
        $steps->case_steps_filing_note = $request->case_steps_filing_note;
        $steps->case_steps_filing_type_id = $request->case_steps_filing_type_id;
        $steps->taking_cognizance = $request->taking_cognizance == 'dd-mm-yyyy' || $request->taking_cognizance == 'NaN-NaN-NaN' ? null : $request->taking_cognizance;
        $steps->taking_cognizance_note = $request->taking_cognizance_note;
        $steps->taking_cognizance_type_id = $request->taking_cognizance_type_id;
        $steps->arrest_surrender_cw = $request->arrest_surrender_cw == 'dd-mm-yyyy' || $request->arrest_surrender_cw == 'NaN-NaN-NaN' ? null : $request->arrest_surrender_cw;
        $steps->arrest_surrender_cw_note = $request->arrest_surrender_cw_note;
        $steps->arrest_surrender_cw_type_id = $request->arrest_surrender_cw_type_id;
        $steps->case_steps_bail = $request->case_steps_bail == 'dd-mm-yyyy' || $request->case_steps_bail == 'NaN-NaN-NaN' ? null : $request->case_steps_bail;
        $steps->case_steps_bail_note = $request->case_steps_bail_note;
        $steps->case_steps_bail_type_id = $request->case_steps_bail_type_id;
        $steps->case_steps_court_transfer = $request->case_steps_court_transfer == 'dd-mm-yyyy' || $request->case_steps_court_transfer == 'NaN-NaN-NaN' ? null : $request->case_steps_court_transfer;
        $steps->case_steps_court_transfer_note = $request->case_steps_court_transfer_note;
        $steps->case_steps_court_transfer_type_id = $request->case_steps_court_transfer_type_id;
        $steps->case_steps_charge_framed = $request->case_steps_charge_framed == 'dd-mm-yyyy' || $request->case_steps_charge_framed == 'NaN-NaN-NaN' ? null : $request->case_steps_charge_framed;
        $steps->case_steps_charge_framed_note = $request->case_steps_charge_framed_note;
        $steps->case_steps_charge_framed_type_id = $request->case_steps_charge_framed_type_id;
        $steps->case_steps_witness_from = $request->case_steps_witness_from == 'dd-mm-yyyy' || $request->case_steps_witness_from == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_from;
        $steps->case_steps_witness_from_note = $request->case_steps_witness_from_note;
        $steps->case_steps_witness_from_type_id = $request->case_steps_witness_from_type_id;
        $steps->case_steps_witness_to = $request->case_steps_witness_to == 'dd-mm-yyyy' || $request->case_steps_witness_to == 'NaN-NaN-NaN' ? null : $request->case_steps_witness_to;
        $steps->case_steps_witness_to_note = $request->case_steps_witness_to_note;
        $steps->case_steps_witness_to_type_id = $request->case_steps_witness_to_type_id;
        $steps->case_steps_argument = $request->case_steps_argument == 'dd-mm-yyyy' || $request->case_steps_argument == 'NaN-NaN-NaN' ? null : $request->case_steps_argument;
        $steps->case_steps_argument_note = $request->case_steps_argument_note;
        $steps->case_steps_argument_type_id = $request->case_steps_argument_type_id;
        $steps->case_steps_judgement_order = $request->case_steps_judgement_order == 'dd-mm-yyyy' || $request->case_steps_judgement_order == 'NaN-NaN-NaN' ? null : $request->case_steps_judgement_order;
        $steps->case_steps_judgement_order_note = $request->case_steps_judgement_order_note;
        $steps->case_steps_judgement_order_type_id = $request->case_steps_judgement_order_type_id;
        $steps->case_steps_summary_of_cases = $request->case_steps_summary_of_cases == 'dd-mm-yyyy' || $request->case_steps_summary_of_cases == 'NaN-NaN-NaN' ? null : $request->case_steps_summary_of_cases;
        $steps->case_steps_summary_of_cases_note = $request->case_steps_summary_of_cases_note;
        $steps->case_steps_summary_of_cases_type_id = $request->case_steps_summary_of_cases_type_id;
        $steps->case_steps_remarks = $request->case_steps_remarks;

        $steps->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $key => $file) {
                $original_name = $file->getClientOriginalName();
                $explode = explode('.', $original_name);
                array_pop($explode);
                $implode = implode('-', $explode);
                $original_extension = $file->getClientOriginalExtension();
                $name = Str::slug($implode) . '.' . $original_extension;
                $file->move(public_path('files/criminal_cases'), $name);

                $files = new CriminalCasesFile();
                $files->case_id = $data->id;
                $files->uploaded_date = $request->uploaded_date[$key];
                $files->documents_type_id = $request->documents_type_id[$key];
                $files->uploaded_document = $name;
                $files->created_by = Auth::guard('admin')->user()->email;
                $files->save();
            }
        }

        $received_documents = CriminalCasesDocumentsReceived::where('case_id', $id)->delete();
// dd($received_documents);

        foreach (array_filter($received_documents_sections) as $key => $value) {
            $datum = new CriminalCasesDocumentsReceived();
            $datum->case_id = $data->id;
            $datum->received_documents_id = $request->received_documents_id[$key];
            $datum->received_documents = $request->received_documents[$key];
            $datum->received_documents_date = $request->received_documents_date[$key];
            $datum->received_documents_type_id = $request->received_documents_type_id[$key];
            $datum->save();
        }

        $required_wanting_documents = CriminalCasesDocumentsRequired::where('case_id', $id)->delete();

        foreach (array_filter($required_wanting_documents_sections) as $key => $value) {
            $required = new CriminalCasesDocumentsRequired();
            $required->case_id = $data->id;
            $required->required_wanting_documents_id = $request->required_wanting_documents_id[$key];
            $required->required_wanting_documents = $request->required_wanting_documents[$key];
            $required->required_wanting_documents_date = $request->required_wanting_documents_date[$key];
            $required->required_wanting_documents_type_id = $request->required_wanting_documents_type_id[$key];
            $required->save();
        }

        $letter_notice = CriminalCasesLetterNotice::where('case_id', $id)->delete();

        // foreach ( array_filter($request->letter_notice_date) as $key => $value ){
        //     $letter_noticed = new CriminalCasesLetterNotice();
        //     $letter_noticed->case_id = $data->id;
        //     $letter_noticed->letter_notice_date = $value;
        //     $letter_noticed->letter_notice_documents_id = $request->letter_notice_documents_id[$key];
        //     $letter_noticed->letter_notice_particulars_id = $request->letter_notice_particulars_id[$key];
        //     $letter_noticed->letter_notice_org = isset($request->letter_notice_org[$key]) == '1' ? '1' : '0';
        //     $letter_noticed->letter_notice_pht = isset($request->letter_notice_pht[$key]) == '1' ? '1' : '0';
        //     $letter_noticed->save();
        // }

        foreach (array_filter($letter_notice_sections) as $key => $value) {
            $required = new CriminalCasesLetterNotice();
            $required->case_id = $data->id;
            $required->letter_notice_date = $request->letter_notice_date[$key];
            $required->letter_notice_documents_id = $request->letter_notice_documents_id[$key];
            $required->letter_notice_documents_write = $request->letter_notice_documents_write[$key];
            $required->letter_notice_particulars_write = $request->letter_notice_particulars_write[$key];
            $required->letter_notice_type_id = $request->letter_notice_type_id[$key];
            $required->save();
        }

        DB::commit();

        session()->flash('success', 'Criminal Cases Updated Successfully.');
        return redirect()->back();

    }

    public function delete_criminal_cases($id)
    {
        $data = CriminalCase::find($id);
        if ($data['delete_status'] == 1) {
            $delete_status = 0;
        } else {
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Criminal Cases Deleted');
        return redirect()->back();
    }

    public function delete_criminal_cases_latest($id)
    {
        $data = CriminalCase::find($id);
        if ($data['delete_status'] == 1) {
            $delete_status = 0;
        } else {
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Criminal Cases Deleted');
        return redirect()->back();
    }   

    public function view_criminal_cases($id)
    {

        $query = DB::table('criminal_cases');
        if (Auth::user()->is_companies_superadmin == '1') {
            $query2 = $query;
        } else if (Auth::user()->is_companies_admin == '1') {
            $query2 = $query->whereIn('criminal_cases.created_by', companies_all_users());
        } else {
            $query2 = $query->where(['criminal_cases.created_by' => auth_id()]);
        }

        $permissions_data = $query2->where('id', $id)->count();

        if ($permissions_data == 1) {
//            $data = CriminalCase::find($id);
        } else {
            return view('errors.403');
        }


        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
        $day_notes = SetupDayNote::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();
        $edit_case_steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();


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


        $data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_cabinets', 'criminal_cases.cabinet_id', '=', 'setup_cabinets.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->leftJoin('setup_groups as client_group', 'criminal_cases.client_group_id', '=', 'client_group.id')
            ->leftJoin('setup_groups as opposition_group', 'criminal_cases.opposition_group_id', '=', 'opposition_group.id')
            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'setup_complainants.complainant_name',
                'setup_accuseds.accused_name',
                'setup_in_favour_ofs.in_favour_of_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_modes.mode_name',
                'setup_referrers.referrer_name',
                'client_party.in_favour_of_name as client_party_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_allegations.allegation_name',
                'admins.name',
                'setup_cabinets.cabinet_name',
                'case_infos_title.case_title_name as sub_seq_case_title_name',
                'client_group.group_name as client_group_name',
                'opposition_group.group_name as opposition_group_name')
            ->where('criminal_cases.id', $id)
            ->first();

        $exist_case_inofs_district = SetupDistrict::where('id', $data->case_infos_district_id)->first();
        // dd($data);

        if (!empty($exist_case_inofs_district)) {
            $exist_court_short = SetupCourt::where('applicable_district_id', 'like', "%{$exist_case_inofs_district->district_name}%")->where('delete_status', 0)->orderBy('court_name', 'asc')->get();
        } else {
            $exist_court_short = [];
        }


// dd($data);

        $existing_district = SetupDistrict::where('division_id', $data->client_division_id)->orderBy('district_name', 'asc')->get();
//        $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_name_id)->orderBy('first_name','asc')->get();
        $existing_client_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->client_category_id, 'delete_status' => 0])->orderBy('client_subcategory_name', 'asc')->get();
        $existing_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->case_category_id, 'delete_status' => 0])->orderBy('case_subcategory', 'asc')->get();
        $existing_thana = SetupThana::where(['district_id' => $data->client_district_id, 'delete_status' => 0])->orderBy('thana_name', 'asc')->get();
        $assigned_lawyer_explode = explode(', ', $data->assigned_lawyer_id);
        $case_infos_existing_district = SetupDistrict::where('division_id', $data->case_infos_division_id)->orderBy('district_name', 'asc')->get();
        $case_infos_existing_thana = SetupThana::where(['district_id' => $data->case_infos_district_id, 'delete_status' => 0])->orderBy('thana_name', 'asc')->get();
        $exist_case_type = SetupCaseTypes::where('case_category_id', $data->case_category_id)->get();

        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->orderBy('court_proceeding_name', 'asc')->get();
        $day_notes = SetupDayNote::where('delete_status', 0)->orderBy('day_notes_name', 'asc')->get();
        $existing_opposition_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->opposition_category_id, 'delete_status' => 0])->orderBy('client_subcategory_name', 'asc')->get();
        $existing_assignend_external_council = SetupExternalCouncilAssociate::where('external_council_id', $data->lawyer_advocate_id)->orderBy('first_name', 'asc')->get();
        $client_explode = explode(', ', $data->client_id);
        $court_explode = explode(', ', $data->case_infos_court_id);
        $law_explode = explode('/ ', $data->law_id);
        $section_explode = explode(', ', $data->section_id);
        $opposition_explode = explode(', ', $data->opposition_id);
        $sub_seq_court_explode = explode(', ', $data->case_infos_sub_seq_court_id);
        $court_short_explode = explode(', ', $data->case_infos_court_short_id);
        $sub_seq_court_short_explode = explode(', ', $data->case_infos_sub_seq_court_short_id);
        $received_documents_explode = explode(', ', $data->received_documents_id);
        $required_documents_explode = explode(', ', $data->required_wanting_documents_id);

        $user = Admin::orderBy('name', 'asc')->get();

        $exist_engaged_advocate = SetupExternalCouncil::where('id', $data->lawyer_advocate_id)->get();
        $exist_engaged_advocate_associates = SetupExternalCouncilAssociate::where(['external_council_id' => $data->lawyer_advocate_id, 'delete_status' => 0])->get();
        $edit_case_steps = DB::table('criminal_cases_case_steps')
            ->leftJoin('setup_allegations', 'criminal_cases_case_steps.case_infos_allegation_claim_id', 'setup_allegations.id')
            ->where('criminal_case_id', $id)
            ->first();
        // dd($edit_case_steps);
        $previous_activity = CriminalCaseStatusLog::latest()->where(['case_id' => $id, 'delete_status' => 0])->first();

        $bill_type = SetupBillType::where('delete_status', 0)->get();
        $bill_particulars = SetupBillParticular::where('delete_status', 0)->get();
        $bill_schedule = BillSchedule::where('delete_status', 0)->get();
        $payment_mode = PaymentMode::where('delete_status', 0)->get();

        //    $edit_case_steps = json_decode(json_encode($edit_case_steps));
        //    echo "<pre>";print_r($edit_case_steps);die();
        //   dd($data);
        $criminal_cases_files = DB::table('criminal_cases_files')
            ->leftJoin('setup_documents_types', 'criminal_cases_files.documents_type_id', 'setup_documents_types.id')
            ->where(['criminal_cases_files.case_id' => $id, 'criminal_cases_files.delete_status' => 0])
            ->select('criminal_cases_files.*', 'setup_documents_types.documents_type_name')
            ->get();

        $criminal_cases_working_docs = DB::table('criminal_cases_working_docs')
            ->leftJoin('setup_documents_types', 'criminal_cases_working_docs.documents_type_id', 'setup_documents_types.id')
            ->where(['criminal_cases_working_docs.case_id' => $id])
            ->whereNull('criminal_cases_working_docs.deleted_at')
            ->select('criminal_cases_working_docs.*', 'setup_documents_types.documents_type_name')
            ->get();

//         dd($criminal_cases_working_docs);
        // CriminalCasesFile::where(['case_id' => $id, 'delete_status' => 0])->get();

        $case_logs = DB::table('criminal_case_status_logs')
            ->leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_case_status_logs.updated_fixed_for_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_court_proceedings', 'criminal_case_status_logs.court_proceedings_id', '=', 'setup_court_proceedings.id')
            ->leftJoin('setup_court_last_orders', 'criminal_case_status_logs.updated_court_order_id', '=', 'setup_court_last_orders.id')
            ->leftJoin('setup_day_notes', 'criminal_case_status_logs.updated_day_notes_id', '=', 'setup_day_notes.id')
            ->leftJoin('setup_next_date_reasons as index_reason', 'criminal_case_status_logs.updated_index_fixed_for_id', '=', 'index_reason.id')
            ->leftJoin('setup_external_council_associates', 'criminal_case_status_logs.updated_engaged_advocate_id', '=', 'setup_external_council_associates.id')
            ->leftJoin('setup_next_day_presences', 'criminal_case_status_logs.updated_next_day_presence_id', '=', 'setup_next_day_presences.id')
            ->select('criminal_case_status_logs.*', 'setup_case_statuses.case_status_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_court_proceedings.court_proceeding_name', 'setup_court_last_orders.court_last_order_name', 'setup_day_notes.day_notes_name', 'setup_external_council_associates.first_name', 'setup_external_council_associates.middle_name', 'setup_external_council_associates.last_name', 'setup_next_day_presences.next_day_presence_name', 'index_reason.next_date_reason_name as index_next_date_reason_name')
            ->where(['criminal_case_status_logs.case_id' => $id, 'criminal_case_status_logs.delete_status' => 0])
            ->orderBy('criminal_case_status_logs.updated_order_date', 'desc')
            // ->orderByRaw("DATE_FORMAT('Y-m-d',criminal_case_status_logs.updated_order_date), 'desc'")
            ->get();
        // dd($case_logs);
        //    dd($case_logs[0]->updated_next_date);

        $latest = DB::table('criminal_case_status_logs')
            ->leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_case_status_logs.updated_fixed_for_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_next_date_reasons as index_fixed_for', 'criminal_case_status_logs.updated_index_fixed_for_id', '=', 'index_fixed_for.id')
//            ->orderBy('created_at','desc')
            ->select('criminal_case_status_logs.*', 'setup_case_statuses.case_status_name', 'setup_next_date_reasons.next_date_reason_name', 'index_fixed_for.next_date_reason_name as index_fixed_for_reason_name')
            ->where('criminal_case_status_logs.case_id', $id)
            ->latest()->first();

        $bill_history = DB::table('criminal_cases_billings')
            ->leftJoin('setup_bill_types', 'criminal_cases_billings.bill_type_id', 'setup_bill_types.id')
            ->leftJoin('bill_schedules', 'criminal_cases_billings.bill_schedule_id', 'bill_schedules.id')
            ->leftJoin('payment_modes', 'criminal_cases_billings.payment_mode_id', 'payment_modes.id')
            ->select('criminal_cases_billings.*', 'setup_bill_types.bill_type_name', 'bill_schedules.bill_schedule_name', 'payment_modes.payment_mode_name')
            ->where(['criminal_cases_billings.delete_status' => 0, 'case_id' => $id])
            ->get();

        $bill_amount = CriminalCasesBilling::where(['delete_status' => 0, 'case_id' => $id])->sum('bill_amount');
        $payment_amount = CriminalCasesBilling::where(['delete_status' => 0, 'case_id' => $id])->sum('payment_amount');
        $due_amount = CriminalCasesBilling::where(['delete_status' => 0, 'case_id' => $id])->sum('due_amount');

        $case_activity_log = DB::table('criminal_case_activity_logs')
            ->leftJoin('setup_modes', 'criminal_case_activity_logs.activity_mode_id', 'setup_modes.id')
            ->leftJoin('setup_external_councils as activity_engaged', 'criminal_case_activity_logs.activity_engaged_id', 'activity_engaged.id')
            ->leftJoin('setup_external_councils as activity_forwarded', 'criminal_case_activity_logs.activity_forwarded_to_id', 'activity_forwarded.id')
            ->where(['criminal_case_activity_logs.case_id' => $id, 'criminal_case_activity_logs.delete_status' => 0])
            ->select('criminal_case_activity_logs.*', 'setup_modes.mode_name', 'activity_engaged.first_name', 'activity_engaged.middle_name', 'activity_engaged.last_name', 'activity_forwarded.first_name as forwarded_first_name', 'activity_forwarded.middle_name as forwarded_middle_name', 'activity_forwarded.last_name as forwarded_last_name')
            ->orderBy('criminal_case_activity_logs.activity_date', 'desc')
            ->get();

        $received_documents_explode = CriminalCasesDocumentsReceived::where('case_id', $id)->get()->toArray();
        $required_wanting_documents_explode = CriminalCasesDocumentsRequired::where('case_id', $id)->get()->toArray();
        $letter_notice_explode = CriminalCasesLetterNotice::where('case_id', $id)->get()->toArray();

        $received_documents = DB::table('criminal_cases_documents_receiveds')
            ->leftJoin('setup_documents', 'criminal_cases_documents_receiveds.received_documents_id', 'setup_documents.id')
            ->leftJoin('setup_documents_types', 'criminal_cases_documents_receiveds.received_documents_type_id', 'setup_documents_types.id')
            ->where('case_id', $id)
            ->select('criminal_cases_documents_receiveds.*', 'setup_documents.documents_name', 'setup_documents_types.documents_type_name')
            ->get();

        $required_wanting_documents = DB::table('criminal_cases_documents_requireds')
            ->leftJoin('setup_documents', 'criminal_cases_documents_requireds.required_wanting_documents_id', 'setup_documents.id')
            ->leftJoin('setup_documents_types', 'criminal_cases_documents_requireds.required_wanting_documents_type_id', 'setup_documents_types.id')
            ->where('case_id', $id)
            ->select('criminal_cases_documents_requireds.*', 'setup_documents.documents_name', 'setup_documents_types.documents_type_name')
            ->get();

        $letter_notice = DB::table('criminal_cases_letter_notices')
            ->leftJoin('setup_documents', 'criminal_cases_letter_notices.letter_notice_documents_id', 'setup_documents.id')
            ->leftJoin('setup_documents_types', 'criminal_cases_letter_notices.letter_notice_type_id', 'setup_documents_types.id')
            ->where('case_id', $id)
            ->select('criminal_cases_letter_notices.*', 'setup_documents.documents_name', 'setup_documents_types.documents_type_name')
            ->get();

        $case_steps = DB::table('criminal_cases_case_steps')
            ->leftJoin('setup_documents_types', 'criminal_cases_case_steps.case_steps_filing_type_id', 'setup_documents_types.id')
            ->leftJoin('setup_documents_types as taking_cognizance', 'criminal_cases_case_steps.taking_cognizance_type_id', 'taking_cognizance.id')
            ->leftJoin('setup_documents_types as arrest_surrender_cw', 'criminal_cases_case_steps.arrest_surrender_cw_type_id', 'arrest_surrender_cw.id')
            ->leftJoin('setup_documents_types as case_steps_bail', 'criminal_cases_case_steps.case_steps_bail_type_id', 'case_steps_bail.id')
            ->leftJoin('setup_documents_types as court_transfer', 'criminal_cases_case_steps.case_steps_court_transfer_type_id', 'court_transfer.id')
            ->leftJoin('setup_documents_types as charge_framed', 'criminal_cases_case_steps.case_steps_charge_framed_type_id', 'charge_framed.id')
            ->leftJoin('setup_documents_types as witness_from', 'criminal_cases_case_steps.case_steps_witness_from_type_id', 'witness_from.id')
            ->leftJoin('setup_documents_types as witness_to', 'criminal_cases_case_steps.case_steps_witness_to_type_id', 'witness_to.id')
            ->leftJoin('setup_documents_types as argument', 'criminal_cases_case_steps.case_steps_argument_type_id', 'argument.id')
            ->leftJoin('setup_documents_types as judgement_order', 'criminal_cases_case_steps.case_steps_judgement_order_type_id', 'judgement_order.id')
            ->leftJoin('setup_documents_types as summary_of_cases', 'criminal_cases_case_steps.case_steps_summary_of_cases_type_id', 'summary_of_cases.id')
            ->where('criminal_case_id', $id)
            ->select('criminal_cases_case_steps.*', 'setup_documents_types.documents_type_name as case_steps_filing_type_name', 'taking_cognizance.documents_type_name as taking_cognizance_type_name', 'taking_cognizance.documents_type_name as taking_cognizance_type_name', 'arrest_surrender_cw.documents_type_name as arrest_surrender_cw_type_name', 'case_steps_bail.documents_type_name as case_steps_bail_type_name', 'court_transfer.documents_type_name as court_transfer_type_name', 'charge_framed.documents_type_name as charge_framed_type_name', 'witness_from.documents_type_name as witness_from_type_name', 'witness_to.documents_type_name as witness_to_type_name', 'argument.documents_type_name as argument_type_name', 'judgement_order.documents_type_name as judgement_order_type_name', 'summary_of_cases.documents_type_name as summary_of_cases_type_name')
            ->first();

        $switch_records = CriminalCasesSwitchRecord::where('case_id', $id)->get();

        //    request_array($switch_records);

        return view('litigation_management.cases.criminal_cases.view_criminal_cases', compact('switch_records', 'group_name', 'case_steps', 'documents_type', 'letter_notice', 'required_wanting_documents', 'received_documents', 'particulars', 'required_wanting_documents_explode', 'exist_court_short', 'data', 'criminal_cases_files', 'case_logs', 'bill_history', 'case_activity_log', 'latest', 'court_proceeding', 'next_date_reason', 'last_court_order', 'day_notes', 'external_council', 'next_day_presence', 'case_status', 'mode', 'edit_case_steps', 'existing_district', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'section', 'client_category', 'existing_client_subcategory', 'existing_case_subcategory', 'existing_district', 'existing_thana', 'existing_assignend_external_council', 'assigned_lawyer_explode', 'next_day_presence', 'legal_issue', 'legal_service', 'matter', 'coordinator', 'allegation', 'case_infos_existing_district', 'case_infos_existing_thana', 'mode', 'court_proceeding', 'day_notes', 'in_favour_of', 'referrer', 'party', 'client', 'profession', 'opposition', 'documents', 'case_title', 'existing_opposition_subcategory', 'client_explode', 'court_explode', 'law_explode', 'section_explode', 'opposition_explode', 'sub_seq_court_explode', 'user', 'complainant', 'accused', 'court_short', 'edit_case_steps', 'exist_engaged_advocate', 'exist_engaged_advocate_associates', 'court_short_explode', 'sub_seq_court_short_explode', 'received_documents_explode', 'required_documents_explode', 'previous_activity', 'payment_mode', 'bill_schedule', 'bill_particulars', 'bill_type', 'bill_amount', 'payment_amount', 'due_amount', 'cabinet', 'exist_case_type', 'letter_notice_explode', 'criminal_cases_working_docs'));
    }

    public function download_criminal_cases_file($id)
    {
        $file = CriminalCasesFile::where('id', $id)->firstOrFail();
        $file_path = public_path('/files/criminal_cases/' . $file->uploaded_document);
        return response()->download($file_path);
    }

    public function download_criminal_cases_working_doc($id)
    {
        $file = CriminalCasesWorkingDoc::where('id', $id)->firstOrFail();
        $file_path = public_path('/files/criminal_cases/' . $file->uploaded_document);
        return response()->download($file_path);
    }

    public function view_criminal_cases_file($id)
    {
        $file = CriminalCasesFile::where('id', $id)->firstOrFail();
        $doc_explode = explode('.', $file->uploaded_document);
        return view('litigation_management.cases.criminal_cases.view_criminal_cases_files', compact('file', 'doc_explode'));
    }

    public function view_criminal_cases_working_docs($id)
    {
        $file = CriminalCasesWorkingDoc::where('id', $id)->firstOrFail();
        $doc_explode = explode('.', $file->uploaded_document);
        return view('litigation_management.cases.criminal_cases.view_criminal_cases_working_doc', compact('file', 'doc_explode'));
    }

    public function update_criminal_cases_status(Request $request, $id)
    {
        // dd($request->all());

        //    $data = json_decode(json_encode($request->all()));
        //    echo "<pre>";print_r($data);die();

// dd(date('Y-m-d'));


        if ($request->updated_order_date != 'dd-mm-yyyy') {
            $order_date_explode = explode('/', $request->updated_order_date);
            $order_date_implode = implode('-', $order_date_explode);
            $order_date = date('Y-m-d', strtotime($order_date_implode));
        } else {
            $order_date = date('Y-m-d');
        }

        if ($request->updated_next_date == 'dd-mm-yyyy' || $request->updated_next_date == 'NaN-NaN-NaN') {
            $next_date = null;
        } else {
            $next_date_explode = explode('-', $request->updated_next_date);
            $next_date_implode = implode('-', $next_date_explode);
            $next_date = date('Y-m-d', strtotime($next_date_implode));
        }

        // dd($order_date);

        $updated_day_notes_id = $request->updated_day_notes_id ? implode(', ', $request->updated_day_notes_id) : null;
        $status = CriminalCase::find($id);
        $status->next_date = $next_date;
        $status->updated_fixed_for_id = $request->updated_fixed_for_id;
        $status->next_date_fixed_id = $request->updated_index_fixed_for_id;
        $status->updated_day_notes_id = $updated_day_notes_id . ', ' . $request->updated_day_notes_write;
        $status->updated_remarks_or_steps_taken = $request->updated_remarks;
        $status->save();


        $data = new CriminalCaseStatusLog();

        $data->case_id = $id;
        $data->updated_case_status_id = $request->updated_case_status_id;
        $data->updated_case_status_write = $request->updated_case_status_write;
        $data->updated_order_date = $order_date;
        $data->updated_fixed_for_id = $request->updated_fixed_for_id;
        $data->updated_fixed_for_write = $request->updated_fixed_for_write;
        $data->court_proceedings_id = $request->court_proceedings_id ? implode(', ', $request->court_proceedings_id) : null;
        $data->court_proceedings_write = $request->court_proceedings_write;
        $data->updated_court_order_id = $request->updated_court_order_id ? implode(', ', $request->updated_court_order_id) : null;
        $data->updated_court_order_write = $request->updated_court_order_write;
        $data->updated_next_date = $next_date;
        $data->updated_index_fixed_for_id = $request->updated_index_fixed_for_id;
        $data->updated_index_fixed_for_write = $request->updated_index_fixed_for_write;
        $data->updated_day_notes_id = $request->updated_day_notes_id ? implode(', ', $request->updated_day_notes_id) : null;
        $data->updated_day_notes_write = $request->updated_day_notes_write;
        $data->updated_engaged_advocate_id = $request->updated_engaged_advocate_id ? implode(', ', $request->updated_engaged_advocate_id) : null;
        $data->updated_engaged_advocate_write = $request->updated_engaged_advocate_write;
        $data->updated_next_day_presence_id = $request->updated_next_day_presence_id;
        $data->updated_remarks = $request->updated_remarks;
        $data->save();

        session()->flash('success', 'Case Status Updated Successfully');
        return redirect()->back();

    }

    public function search_criminal_cases(Request $request)
    {

        $received_date_explode = explode('-', $request->received_date);
        $received_date_implode = implode('-', $received_date_explode);
        $received_date = date('Y-m-d', strtotime($received_date_implode));

//         dd($request->all());
        $query = DB::table('criminal_cases')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id');
        // ->leftJoin('setup_allegations', 'criminal_cases.case_infos_allegation_claim_id', '=', 'setup_allegations.id');

        if ($request->case_infos_case_no && $request->received_date && $request->name_of_the_court_id) {
// dd('case no, dof, court name ');

            $query2 = $query->where(['criminal_cases.case_infos_case_no' => $request->case_infos_case_no, 'criminal_cases.received_date' => $received_date, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_infos_case_no && $request->received_date && $request->name_of_the_court_id == null) {
// dd('case no, dof');

            $query2 = $query->where(['criminal_cases.case_infos_case_no' => $request->case_infos_case_no, 'criminal_cases.received_date' => $received_date]);

        } else if ($request->case_infos_case_no && $request->received_date == null && $request->name_of_the_court_id) {
            // dd('case no, court name ');

            $query2 = $query->where(['criminal_cases.case_infos_case_no' => $request->case_infos_case_no, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_infos_case_no == null && $request->received_date && $request->name_of_the_court_id) {
            // dd('dof, court name');

            $query2 = $query->where(['criminal_cases.received_date' => $received_date, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_infos_case_no && $request->received_date == null && $request->name_of_the_court_id == null) {
            // dd('case no');

            $query2 = $query->where(['criminal_cases.case_infos_case_no' => $request->case_infos_case_no]);

        } else if ($request->case_infos_case_no == null && $received_date && $request->name_of_the_court_id == null) {
            // dd('dof');

            $query2 = $query->where('criminal_cases.received_date', $request->received_date);

        } else if ($request->case_infos_case_no == null && $received_date == null && $request->name_of_the_court_id) {

            // dd('court name');
            $query2 = $query->where('criminal_cases.name_of_the_court_id', $request->name_of_the_court_id);

        } else if ($request->case_infos_case_no == null && $received_date == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id) {

            // dd('court name');
            $query2 = $query->where(['criminal_cases.case_category_id' => $request->case_category_id, 'criminal_cases.case_subcategory_id' => $request->case_subcategory_id]);

        } else if ($request->case_infos_case_no == null && $received_date == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id == null) {

            // dd('court name');
            $query2 = $query->where('criminal_cases.case_category_id', $request->case_category_id);

        } else {
            $query2 = $query;

        }

        $data = $query2->select('criminal_cases.*', 'setup_next_date_reasons.next_date_reason_name', 'setup_courts.court_name', 'setup_districts.district_name', 'setup_case_types.case_types_name')
            ->get();

        return response()->json([
            'result' => 'criminal_cases',
            'data' => $data,
        ]);

    }

    public function update_criminal_cases_activity(Request $request, $id)
    {
        // dd($request->all());

        //    $data = json_decode(json_encode($request->all()));
        //    echo "<pre>";print_r($data);die();

// dd($id);

// return $arr = array('Hello','World!','Beautiful','Day!');
// return implode(" ",$arr);

        // dd($external_council);
        // dd('asdfasdf');

        //    $forwarded = SetupExternalCouncil::whereIn('id', $request->activity_forwarded_to_id)->select(DB::raw("CONCAT(first_name,' ',last_name) AS name"))->pluck('name')->toArray();
// // dd($forwarded);

//        $implode = implode(', ', $forwarded);
// dd($implode);

        //    StudentModel::getStudentList()->pluck('Student_name')->toArray();


        if ($request->activity_date != 'dd-mm-yyyy') {
            $activity_date_explode = explode('-', $request->activity_date);
            $activity_date_implode = implode('-', $activity_date_explode);
            $activity_date = date('Y-m-d', strtotime($activity_date_implode));
        } else {
            $activity_date = date('Y-m-d');
        }

        $data = new CriminalCaseActivityLog();
        $data->case_id = $id;
        $data->activity_date = $activity_date;
        $data->activity_action = $request->activity_action;
        $data->activity_progress = $request->activity_progress;
        $data->activity_mode_id = $request->activity_mode_id;
        $data->activity_mode_write = $request->activity_mode_write;
        $data->start_time = $request->start_time;
        $data->end_time = $request->end_time;
        $data->total_time = $request->setup_hours;
        $data->time_spend_manual = $request->time_spend_manual;
        $data->activity_engaged_id = $request->activity_engaged_id ? implode(', ', $request->activity_engaged_id) : null;
        $data->activity_engaged_write = $request->activity_engaged_write;
        $data->activity_forwarded_to_id = $request->activity_forwarded_to_id ? implode(', ', $request->activity_forwarded_to_id) : null;
        $data->activity_forwarded_to_write = $request->activity_forwarded_to_write;
        $data->activity_remarks = $request->activity_remarks;
        $data->activity_requirements = $request->activity_requirements;
        $data->save();

        if ($request->activity_forwarded_to_id != null) {

            $external_council = SetupExternalCouncil::whereIn('id', $request->activity_forwarded_to_id)->get();

            foreach ($external_council as $key => $value) {

                $notifications = new CasesNotifications();
                $notifications->case_id = $id;
                $notifications->case_type = "Criminal Cases";
                $notifications->case_no = $request->case_no;
                $notifications->send_by = Auth::user()->email;
                $notifications->received_by = $value->email;
                $notifications->save();

                $details = [
                    'name' => $value->first_name . ' ' . $value->last_name,
                    'case_id' => 'Criminal Cases No: ' . $request->case_no,
                    'messages' => Auth::user()->name . ' has sent this case to you.',
                ];

                Mail::to($value->email)->send(new CaseForwardedMail($details));

            }


        }

        session()->flash('success', 'Case Status Updated Successfully.');
        return redirect()->back();

    }

    public function delete_criminal_cases_file(Request $request, $id)
    {
        $file = CriminalCasesFile::findOrFail($id);
        unlink(public_path('/files/criminal_cases/' . $file->uploaded_document));
        $file->delete();

        session()->flash('success', 'Documents Deleted Successfully.');
        return redirect()->back();
    }

    public function delete_criminal_cases_working_docs(Request $request, $id)
    {
        $file = CriminalCasesWorkingDoc::findOrFail($id);
        // unlink(public_path('/files/criminal_cases/' . $file->uploaded_document));
        $file->delete();

        session()->flash('success', 'Documents Deleted Successfully.');
        return redirect()->back();
    }

    public function delete_criminal_cases_status($id)
    {
        $data = CriminalCaseStatusLog::find($id);
        if ($data['delete_status'] == 1) {
            $delete_status = 0;
        } else {
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Criminal Cases Status Deleted.');
        return redirect()->back();
    }

    public function delete_criminal_cases_activity($id)
    {
        $data = CriminalCaseActivityLog::find($id);
        if ($data['delete_status'] == 1) {
            $delete_status = 0;
        } else {
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Criminal Cases Activity Deleted.');
        return redirect()->back();
    }


    public function edit_criminal_cases_status($id)
    {
        $data = CriminalCaseStatusLog::find($id);
        $case_no = CriminalCase::find($data->case_id);
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->orderBy('next_date_reason_name', 'asc')->get();
        $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->orderBy('court_proceeding_name', 'asc')->get();
        $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->orderBy('court_last_order_name', 'asc')->get();
        $day_notes = SetupDayNote::where('delete_status', 0)->orderBy('day_notes_name', 'asc')->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $exist_engaged_advocate_associates = SetupExternalCouncilAssociate::where(['external_council_id' => $case_no->lawyer_advocate_id, 'delete_status' => 0])->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->orderBy('next_day_presence_name', 'asc')->get();

        $court_proceeding_explode = explode(', ', $data->court_proceedings_id);
        $updated_court_order_explode = explode(', ', $data->updated_court_order_id);
        $updated_day_notes_explode = explode(', ', $data->updated_day_notes_id);
        $updated_engaged_advocate = explode(', ', $data->updated_engaged_advocate_id);
// dd($data);
        return view('litigation_management.cases.criminal_cases.criminal_cases_status_update', compact('external_council', 'data', 'case_status', 'next_date_reason', 'court_proceeding', 'last_court_order', 'day_notes', 'exist_engaged_advocate_associates', 'next_day_presence', 'court_proceeding_explode', 'updated_court_order_explode', 'updated_day_notes_explode', 'updated_engaged_advocate'));
    }

    public function update_criminal_cases_status_logs(Request $request, $id)
    {

        if ($request->updated_order_date != 'dd-mm-yyyy') {
            $order_date_explode = explode('/', $request->updated_order_date);
            $order_date_implode = implode('-', $order_date_explode);
            $order_date = date('Y-m-d', strtotime($order_date_implode));
        } else {
            $order_date = date('Y-m-d');
        }

        if ($request->updated_next_date == 'dd-mm-yyyy' || $request->updated_next_date == 'NaN-NaN-NaN') {
            $next_date = null;
        } else {
            $next_date_explode = explode('-', $request->updated_next_date);
            $next_date_implode = implode('-', $next_date_explode);
            $next_date = date('Y-m-d', strtotime($next_date_implode));
        }

        $case_id = CriminalCaseStatusLog::find($id);

        $updated_day_notes_id = $request->updated_day_notes_id ? implode(', ', $request->updated_day_notes_id) : null;
        $status = CriminalCase::find($case_id->case_id);
        $status->next_date = $next_date;
        $status->next_date_fixed_id = $request->updated_index_fixed_for_id;
        $status->updated_day_notes_id = $updated_day_notes_id . ', ' . $request->updated_day_notes_write;
        $status->updated_remarks_or_steps_taken = $request->updated_remarks;
        $status->save();


        $data = CriminalCaseStatusLog::find($id);

        $data->updated_case_status_id = $request->updated_case_status_id;
        $data->updated_case_status_write = $request->updated_case_status_write;
        $data->updated_order_date = $order_date;
        $data->updated_fixed_for_id = $request->updated_fixed_for_id;
        $data->updated_fixed_for_write = $request->updated_fixed_for_write;
        $data->court_proceedings_id = $request->court_proceedings_id ? implode(', ', $request->court_proceedings_id) : null;
        $data->court_proceedings_write = $request->court_proceedings_write;
        $data->updated_court_order_id = $request->updated_court_order_id ? implode(', ', $request->updated_court_order_id) : null;
        $data->updated_court_order_write = $request->updated_court_order_write;
        $data->updated_next_date = $next_date;
        $data->updated_index_fixed_for_id = $request->updated_index_fixed_for_id;
        $data->updated_index_fixed_for_write = $request->updated_index_fixed_for_write;
        $data->updated_day_notes_id = $request->updated_day_notes_id ? implode(', ', $request->updated_day_notes_id) : null;
        $data->updated_day_notes_write = $request->updated_day_notes_write;
        $data->updated_engaged_advocate_id = $request->updated_engaged_advocate_id ? implode(', ', $request->updated_engaged_advocate_id) : null;
        $data->updated_engaged_advocate_write = $request->updated_engaged_advocate_write;
        $data->updated_next_day_presence_id = $request->updated_next_day_presence_id;
        $data->updated_remarks = $request->updated_remarks;
        $data->save();

        session()->flash('success', 'Case Status Updated Successfully');
        return redirect()->route('view-criminal-cases', $case_id->case_id);
    }

    public function edit_criminal_cases_activity($id)
    {
        $data = CriminalCaseActivityLog::find($id);
        $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();
        $exist_engaged_advocate_associates = SetupExternalCouncilAssociate::where(['delete_status' => 0])->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->orderBy('first_name', 'asc')->get();
        $exist_engaged_advocate_associates_explode = explode(', ', $data->activity_engaged_id);
        $exist_activity_forwarded_explode = explode(', ', $data->activity_forwarded_to_id);
        // dd($data);

        $activity_data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'setup_complainants.complainant_name',
                'setup_accuseds.accused_name',
                'setup_in_favour_ofs.in_favour_of_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_modes.mode_name',
                'setup_referrers.referrer_name',
                'client_party.in_favour_of_name as client_party_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_allegations.allegation_name',
                'admins.name',
                'case_infos_title.case_title_name as sub_seq_case_title_name')
            ->where('criminal_cases.id', $data->case_id)
            ->first();

        return view('litigation_management.cases.criminal_cases.criminal_cases_activity_update', compact('exist_activity_forwarded_explode', 'data', 'mode', 'exist_engaged_advocate_associates', 'external_council', 'exist_engaged_advocate_associates_explode', 'activity_data'));
    }

    public function view_criminal_cases_activity($id)
    {
        // dd($id);
        // $data = CriminalCaseActivityLog::find($id);
        //  dd($data);
        $activity_log = DB::table('criminal_case_activity_logs')
            ->leftJoin('setup_modes', 'criminal_case_activity_logs.activity_mode_id', 'setup_modes.id')
            ->leftJoin('setup_external_councils as activity_engaged', 'criminal_case_activity_logs.activity_engaged_id', 'activity_engaged.id')
            ->leftJoin('setup_external_councils as activity_forwarded', 'criminal_case_activity_logs.activity_forwarded_to_id', 'activity_forwarded.id')
            ->where(['criminal_case_activity_logs.id' => $id, 'criminal_case_activity_logs.delete_status' => 0])
            ->select('criminal_case_activity_logs.*', 'setup_modes.mode_name', 'activity_engaged.first_name', 'activity_engaged.middle_name', 'activity_engaged.last_name', 'activity_forwarded.first_name as forwarded_first_name', 'activity_forwarded.middle_name as forwarded_middle_name', 'activity_forwarded.last_name as forwarded_last_name')
            ->orderBy('criminal_case_activity_logs.created_at', 'asc')
            ->first();
        //  dd($activity_log);
        return view('litigation_management.cases.criminal_cases.view_criminal_cases_activity', compact('activity_log'));
    }

    public function update_criminal_cases_activity_logs(Request $request, $id)
    {
// dd($request->all());

        if ($request->activity_date != 'dd-mm-yyyy') {
            $activity_date_explode = explode('-', $request->activity_date);
            $activity_date_implode = implode('-', $activity_date_explode);
            $activity_date = date('Y-m-d', strtotime($activity_date_implode));
        } else {
            $activity_date = date('Y-m-d');
        }

        $case_id = CriminalCaseActivityLog::find($id);

        DB::beginTransaction();

        $data = CriminalCaseActivityLog::find($id);
        $data->activity_date = $activity_date;
        $data->activity_action = $request->activity_action;
        $data->activity_progress = $request->activity_progress;
        $data->activity_mode_id = $request->activity_mode_id;
        $data->activity_mode_write = $request->activity_mode_write;
        $data->start_time = $request->start_time;
        $data->end_time = $request->end_time;
        $data->total_time = $request->setup_hours;
        $data->time_spend_manual = $request->time_spend_manual;
        $data->activity_engaged_id = $request->activity_engaged_id ? implode(', ', $request->activity_engaged_id) : null;
        $data->activity_engaged_write = $request->activity_engaged_write;
        $data->activity_forwarded_to_id = $request->activity_forwarded_to_id ? implode(', ', $request->activity_forwarded_to_id) : null;
        $data->activity_forwarded_to_write = $request->activity_forwarded_to_write;
        $data->activity_remarks = $request->activity_remarks;
        $data->activity_requirements = $request->activity_requirements;
        $data->save();
// dd('test astesrt asdf asdf asdf');
        if ($request->activity_forwarded_to_id != null) {

            $external_council = SetupExternalCouncil::whereIn('id', $request->activity_forwarded_to_id)->get();
            // dd($external_council);

            foreach ($external_council as $key => $value) {

                $notifications = new CasesNotifications();
                $notifications->case_id = $id;
                $notifications->case_type = "Criminal Cases";
                $notifications->case_no = $request->case_no;
                $notifications->send_by = Auth::guard('admin')->user()->email;
                $notifications->received_by = $value->email;
                $notifications->save();

                $details = [
                    'name' => $value->first_name . ' ' . $value->last_name,
                    'case_id' => 'Criminal Cases No: ' . $request->case_no,
                    'messages' => Auth::guard('admin')->user()->name . ' has sent this case to you.',
                ];

                Mail::to($value->email)->send(new CaseForwardedMail($details));

            }


        }
        DB::commit();
        session()->flash('success', 'Case Activity Updated Successfully');
        return redirect()->route('view-criminal-cases', $case_id->case_id);
    }

    public function upload_criminal_cases_files(Request $request, $id)
    {
        // dd($request->all());
        if ($request->hasfile('uploaded_document')) {
            $file = $request->file('uploaded_document');

            $original_name = $file->getClientOriginalName();
            $explode = explode('.', $original_name);
            array_pop($explode);
            $implode = implode('-', $explode);
            $original_extension = $file->getClientOriginalExtension();
            $name = Str::slug($implode) . '.' . $original_extension;
            $file->move(public_path('files/criminal_cases'), $name);

            $file = new CriminalCasesFile();
            $file->case_id = $id;
            $file->uploaded_date = $request->uploaded_date == 'dd-mm-yyyy' || $request->uploaded_date == 'NaN-NaN-NaN' ? null : $request->uploaded_date;
            $file->documents_type_id = $request->documents_type_id;
            $file->uploaded_document = $name;
            $file->created_by = Auth::user()->email;
            $file->save();
        } else {
            session()->flash('warning', 'There is no documents to upload.');
            return redirect()->back();
        }

        session()->flash('success', 'Documents Added Successfully.');
        return redirect()->back();

    }

    public function update_criminal_cases_files(Request $request, $id)
    {

        $data = CriminalCasesFile::find($id);

        $image_path = 'files/criminal_cases/' . $data['uploaded_document'];
        if ($request->uploaded_document && file_exists($image_path)) {
            unlink($image_path);
        }

        if (!empty($request->uploaded_document)) {
            $file = $request->file('uploaded_document');
            $original_name = $file->getClientOriginalName();
            $explode = explode('.', $original_name);
            array_pop($explode);
            $implode = implode('-', $explode);
            $original_extension = $file->getClientOriginalExtension();
            $name = Str::slug($implode) . '.' . $original_extension;
            $file->move(public_path('files/criminal_cases'), $name);
        }

        $file = CriminalCasesFile::find($id);
        $file->case_id = $data->case_id;
        $file->uploaded_date = $request->uploaded_date == 'dd-mm-yyyy' || $request->uploaded_date == 'NaN-NaN-NaN' ? null : $request->uploaded_date;
        $file->documents_type_id = $request->documents_type_id;
        $file->uploaded_document = $request->uploaded_document ? $name : $data['uploaded_document'];
        $file->created_by = Auth::guard('admin')->user()->email;
        $file->save();

        session()->flash('success', 'Documents Updated Successfully.');
        return redirect()->route('view-criminal-cases', $data->case_id);
    }

    public function update_criminal_cases_working_doc(Request $request, $id)
    {

        $data = CriminalCasesWorkingDoc::find($id);

        $image_path = 'files/criminal_cases/' . $data['uploaded_document'];
        if ($request->uploaded_document && file_exists($image_path)) {
            unlink($image_path);
        }
        if (!empty($request->uploaded_document)) {
            $file = $request->file('uploaded_document');
            $original_name = $file->getClientOriginalName();
            $explode = explode('.', $original_name);
            array_pop($explode);
            $implode = implode('-', $explode);
            $original_extension = $file->getClientOriginalExtension();
            $name = Str::slug($implode) . '.' . $original_extension;
            $file->move(public_path('files/criminal_cases'), $name);
        }
        $file = CriminalCasesWorkingDoc::find($id);
        $file->case_id = $data->case_id;
        $file->uploaded_date = $request->uploaded_date == 'dd-mm-yyyy' || $request->uploaded_date == 'NaN-NaN-NaN' ? null : $request->uploaded_date;
        $file->documents_type_id = $request->documents_type_id;
        $file->doc_version = $request->doc_version;
        $file->uploaded_document = $request->uploaded_document ? $name : $data['uploaded_document'];
        $file->created_by = Auth::user()->email;
        $file->save();

        session()->flash('success', 'Documents Updated Successfully.');
        return redirect()->route('view-criminal-cases', $data->case_id);
    }

    public function case_porceedings_print_preview($id)
    {
        // dd($id);

        $data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'setup_complainants.complainant_name',
                'setup_accuseds.accused_name',
                'setup_in_favour_ofs.in_favour_of_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_modes.mode_name',
                'setup_referrers.referrer_name',
                'client_party.in_favour_of_name as client_party_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_allegations.allegation_name',
                'admins.name',
                'case_infos_title.case_title_name as sub_seq_case_title_name')
            ->where('criminal_cases.id', $id)
            ->first();

        $case_logs = DB::table('criminal_case_status_logs')
            ->leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_case_status_logs.updated_fixed_for_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_court_proceedings', 'criminal_case_status_logs.court_proceedings_id', '=', 'setup_court_proceedings.id')
            ->leftJoin('setup_court_last_orders', 'criminal_case_status_logs.updated_court_order_id', '=', 'setup_court_last_orders.id')
            ->leftJoin('setup_day_notes', 'criminal_case_status_logs.updated_day_notes_id', '=', 'setup_day_notes.id')
            ->leftJoin('setup_next_date_reasons as index_reason', 'criminal_case_status_logs.updated_index_fixed_for_id', '=', 'index_reason.id')
            ->leftJoin('setup_external_council_associates', 'criminal_case_status_logs.updated_engaged_advocate_id', '=', 'setup_external_council_associates.id')
            ->leftJoin('setup_next_day_presences', 'criminal_case_status_logs.updated_next_day_presence_id', '=', 'setup_next_day_presences.id')
            ->select('criminal_case_status_logs.*', 'setup_case_statuses.case_status_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_court_proceedings.court_proceeding_name', 'setup_court_last_orders.court_last_order_name', 'setup_day_notes.day_notes_name', 'setup_external_council_associates.first_name', 'setup_external_council_associates.middle_name', 'setup_external_council_associates.last_name', 'setup_next_day_presences.next_day_presence_name', 'index_reason.next_date_reason_name as index_next_date_reason_name')
            ->where(['criminal_case_status_logs.case_id' => $id, 'criminal_case_status_logs.delete_status' => 0])
            ->orderBy('criminal_case_status_logs.created_at', 'asc')
            // ->orderByRaw("DATE_FORMAT('d-m-Y',criminal_case_status_logs.updated_order_date), 'ASC'")
            ->get();
// dd($case_logs);
        return view('litigation_management.cases.criminal_cases.print_preview_criminal_case_proceedings', compact('case_logs', 'data'));
    }

    public function billings_log_print_preview($id)
    {
        $data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'setup_complainants.complainant_name',
                'setup_accuseds.accused_name',
                'setup_in_favour_ofs.in_favour_of_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_modes.mode_name',
                'setup_referrers.referrer_name',
                'client_party.in_favour_of_name as client_party_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_allegations.allegation_name',
                'admins.name',
                'case_infos_title.case_title_name as sub_seq_case_title_name')
            ->where('criminal_cases.id', $id)
            ->first();

        $bill_history = DB::table('criminal_cases_billings')
            ->leftJoin('setup_bill_types', 'criminal_cases_billings.bill_type_id', 'setup_bill_types.id')
            ->leftJoin('bill_schedules', 'criminal_cases_billings.bill_schedule_id', 'bill_schedules.id')
            ->leftJoin('payment_modes', 'criminal_cases_billings.payment_mode_id', 'payment_modes.id')
            ->select('criminal_cases_billings.*', 'setup_bill_types.bill_type_name', 'bill_schedules.bill_schedule_name', 'payment_modes.payment_mode_name')
            ->where(['criminal_cases_billings.delete_status' => 0, 'case_id' => $id])
            ->get();
        $bill_amount = CriminalCasesBilling::where(['delete_status' => 0, 'case_id' => $id])->sum('bill_amount');
        $payment_amount = CriminalCasesBilling::where(['delete_status' => 0, 'case_id' => $id])->sum('payment_amount');
        $due_amount = CriminalCasesBilling::where(['delete_status' => 0, 'case_id' => $id])->sum('due_amount');
        // dd($case_logs);
        return view('litigation_management.cases.criminal_cases.print_preview_criminal_case_billing', compact('bill_history', 'bill_amount', 'payment_amount', 'due_amount', 'data'));
    }

    public function switch_log_print_preview($id)
    {
        $data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'setup_complainants.complainant_name',
                'setup_accuseds.accused_name',
                'setup_in_favour_ofs.in_favour_of_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_modes.mode_name',
                'setup_referrers.referrer_name',
                'client_party.in_favour_of_name as client_party_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_allegations.allegation_name',
                'admins.name',
                'case_infos_title.case_title_name as sub_seq_case_title_name')
            ->where('criminal_cases.id', $id)
            ->first();


        $switch_records = CriminalCasesSwitchRecord::where('case_id', $id)->get();


        return view('litigation_management.cases.criminal_cases.print_preview_criminal_case_switch', compact('switch_records', 'data'));
    }

    public function criminal_case_print_preview($id)
    {
        $data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_complainants', 'criminal_cases.complainant_informant_id', '=', 'setup_complainants.id')
            ->leftJoin('setup_accuseds', 'criminal_cases.accused_id', '=', 'setup_accuseds.id')
            ->leftJoin('setup_in_favour_ofs', 'criminal_cases.in_favour_of_id', '=', 'setup_in_favour_ofs.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_modes', 'criminal_cases.mode_of_receipt_id', '=', 'setup_modes.id')
            ->leftJoin('setup_referrers', 'criminal_cases.referrer_id', '=', 'setup_referrers.id')
            ->leftJoin('setup_in_favour_ofs as client_party', 'criminal_cases.client_party_id', '=', 'client_party.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_clients', 'criminal_cases.client_id', '=', 'setup_clients.id')
            ->leftJoin('setup_professions', 'criminal_cases.client_profession_id', '=', 'setup_professions.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators', 'criminal_cases.client_coordinator_tadbirkar_id', '=', 'setup_coordinators.id')
            ->leftJoin('setup_in_favour_ofs as opposition_party', 'criminal_cases.opposition_party_id', '=', 'opposition_party.id')
            ->leftJoin('setup_client_categories as opposition_category', 'criminal_cases.opposition_category_id', '=', 'opposition_category.id')
            ->leftJoin('setup_client_subcategories as opposition_subcategory', 'criminal_cases.opposition_subcategory_id', '=', 'opposition_subcategory.id')
            ->leftJoin('setup_clients as opposition', 'criminal_cases.opposition_id', '=', 'opposition.id')
            ->leftJoin('setup_professions as opposition_profession', 'criminal_cases.opposition_profession_id', '=', 'opposition_profession.id')
            ->leftJoin('setup_divisions as opposition_division', 'criminal_cases.opposition_division_id', '=', 'opposition_division.id')
            ->leftJoin('setup_districts as opposition_district', 'criminal_cases.opposition_district_id', '=', 'opposition_district.id')
            ->leftJoin('setup_thanas as opposition_thana', 'criminal_cases.opposition_thana_id', '=', 'opposition_thana.id')
            ->leftJoin('setup_coordinators as opposition_coordinator', 'criminal_cases.opposition_coordinator_tadbirkar_id', '=', 'opposition_coordinator.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_titles as case_infos_case_title', 'criminal_cases.case_infos_case_title_id', '=', 'case_infos_case_title.id')
            ->leftJoin('setup_case_titles as sub_seq_case_infos_case_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'sub_seq_case_infos_case_title.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_case_statuses', 'criminal_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'setup_allegations.id')
            ->leftJoin('admins', 'criminal_cases.received_by_id', '=', 'admins.id')
            ->leftJoin('setup_cabinets', 'criminal_cases.cabinet_id', '=', 'setup_cabinets.id')
            ->leftJoin('setup_case_titles as case_infos_title', 'criminal_cases.case_infos_sub_seq_case_title_id', '=', 'case_infos_title.id')
            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'setup_complainants.complainant_name',
                'setup_accuseds.accused_name',
                'setup_in_favour_ofs.in_favour_of_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_modes.mode_name',
                'setup_referrers.referrer_name',
                'client_party.in_favour_of_name as client_party_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_clients.client_name',
                'setup_professions.profession_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'opposition_party.in_favour_of_name as oppsition_party_name',
                'opposition_category.client_category_name as opposition_category_name',
                'opposition_subcategory.client_subcategory_name as opposition_subcategory_name',
                'opposition.client_name as opposition_name',
                'opposition_profession.profession_name as opposition_profession_name',
                'opposition_division.division_name as opposition_division_name',
                'opposition_district.district_name as opposition_district_name',
                'opposition_thana.thana_name as opposition_thana_name',
                'opposition_coordinator.coordinator_name as opposition_coordinator_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_categories.case_type',
                'setup_case_subcategories.case_subcategory',
                'case_infos_case_title.case_title_name as case_infos_case_title_name',
                'sub_seq_case_infos_case_title.case_title_name as sub_seq_case_infos_case_title_name',
                'setup_matters.matter_name',
                'setup_case_statuses.case_status_name',
                'setup_case_types.case_types_name',
                'setup_allegations.allegation_name',
                'admins.name',
                'setup_cabinets.cabinet_name',
                'case_infos_title.case_title_name as sub_seq_case_title_name')
            ->where('criminal_cases.id', $id)
            ->first();
        $edit_case_steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();

        return view('litigation_management.cases.criminal_cases.print_preview_criminal_case_info', compact('data', 'edit_case_steps'));

    }

    public function advanced_search_criminal_cases(Request $request)
    {
        //    dd($request->all());
        $user = User::all();
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
            'setup_matters.matter_name')
            ->where('criminal_cases.delete_status', 0)
            ->get();
        $is_search = 'Searched';

// dd($data);
        return view('litigation_management.cases.criminal_cases.criminal_cases', compact('user', 'group_name', 'client_category', 'is_search', 'client_name', 'next_date_reason', 'case_status', 'external_council', 'data', 'division', 'case_types', 'court', 'case_category', 'complainant', 'matter'));
    }

    public function update_criminal_cases_status_column(Request $request, $id)
    {
// dd($request->all());
        $main_case = CriminalCase::find($id);
        $main_case->case_status_id = $request->updated_case_status_id;
        $main_case->save();

        $data = CriminalCaseStatusLog::where('case_id', $id)->latest()->first();

        if (!empty($data)) {
            $data->updated_case_status_id = $request->updated_case_status_id;
            $data->save();
        }

        session()->flash('success', 'Case of the Status Updated Successfully.');
        return redirect()->back();

    }

    public function view_criminal_cases_read_notifications($id)
    {
        // dd($id);

        $notifications = CasesNotifications::find($id);
        $notifications->is_read = 'Yes';
        $notifications->save();

        return redirect()->route('view-criminal-cases', $notifications->case_id);

    }

    public function send_messages_for_criminal_cases(Request $request, $id)
    {

        // $data = json_decode(json_encode($request->all()));
        // echo "<pre>";print_r($data);die;

        $data = new CriminalCasesSendMessage();
        $data->case_id = $id;
        $data->case_no = $request->case_no;
        $data->client_name = $request->client_name;
        $data->send_sms = $request->send_sms == 'on' ? '1' : '0';
        $data->send_mail = $request->send_mail == 'on' ? '1' : '0';
        $data->client_mobile = $request->client_mobile;
        $data->client_email = $request->client_email;
        $data->messages = $request->messages;
        $data->save();

        $details = [
            'name' => $request->client_name,
            'case_id' => 'Criminal Cases No: ' . $request->case_no,
            'messages' => $request->messages,
        ];


        if ($request->send_sms == 'on' && $request->send_mail == 'on') {

            Http::post('https://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=fauziaali2000@gmail.com&password=80f50e35f83130f022e78a2862aab390&MsgType=TEXT&receiver=' . $request->client_mobile . '&message=' . $request->messages);

            Mail::to($request->client_email)->send(new SendMessage($details));

        } else if ($request->send_sms == 'on') {

            Http::post('https://api.boom-cast.com/boomcast/WebFramework/boomCastWebService/externalApiSendTextMessage.php?masking=NOMASK&userName=fauziaali2000@gmail.com&password=80f50e35f83130f022e78a2862aab390&MsgType=TEXT&receiver=' . $request->client_mobile . '&message=' . $request->messages);

        } else {

            Mail::to($request->client_email)->send(new SendMessage($details));

        }

        return redirect()->back();


    }

    public function edit_criminal_cases_files($id)
    {
        $data = CriminalCasesFile::find($id);
        $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();

        // dd($data);
        return view('litigation_management.cases.criminal_cases.criminal_cases_files_update', compact('data', 'documents_type'));

    }

    public function edit_criminal_cases_working_docs($id)
    {
        $data = CriminalCasesWorkingDoc::find($id);
        $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();

        // dd($data);
        return view('litigation_management.cases.criminal_cases.edit_criminal_cases_working_docs', compact('data', 'documents_type'));

    }

    public function view_criminal_cases_proceedings($id)
    {
        // dd($id);
        $case_logs = DB::table('criminal_case_status_logs')
            ->leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_case_status_logs.updated_fixed_for_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_court_proceedings', 'criminal_case_status_logs.court_proceedings_id', '=', 'setup_court_proceedings.id')
            ->leftJoin('setup_court_last_orders', 'criminal_case_status_logs.updated_court_order_id', '=', 'setup_court_last_orders.id')
            ->leftJoin('setup_day_notes', 'criminal_case_status_logs.updated_day_notes_id', '=', 'setup_day_notes.id')
            ->leftJoin('setup_next_date_reasons as index_reason', 'criminal_case_status_logs.updated_index_fixed_for_id', '=', 'index_reason.id')
            ->leftJoin('setup_external_council_associates', 'criminal_case_status_logs.updated_engaged_advocate_id', '=', 'setup_external_council_associates.id')
            ->leftJoin('setup_next_day_presences', 'criminal_case_status_logs.updated_next_day_presence_id', '=', 'setup_next_day_presences.id')
            ->select('criminal_case_status_logs.*', 'setup_case_statuses.case_status_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_court_proceedings.court_proceeding_name', 'setup_court_last_orders.court_last_order_name', 'setup_day_notes.day_notes_name', 'setup_external_council_associates.first_name', 'setup_external_council_associates.middle_name', 'setup_external_council_associates.last_name', 'setup_next_day_presences.next_day_presence_name', 'index_reason.next_date_reason_name as index_next_date_reason_name')
            ->where(['criminal_case_status_logs.id' => $id, 'criminal_case_status_logs.delete_status' => 0])
            ->orderBy('criminal_case_status_logs.updated_order_date', 'desc')
            ->first();
        // dd($case_logs);
        return view('litigation_management.cases.criminal_cases.view_criminal_cases_proceedings', compact('case_logs'));

    }

    public function find_case_subcategory(Request $request)
    {
        return $request->all();
        $data = SetupCaseSubcategory::where(['case_category_id' => $request->case_category_id, 'delete_status' => 0])->get();
        return response()->json($data);
    }

    public function upload_criminal_cases_working_doc_files(Request $request, $id)
    {
        // dd($request->all());
        if ($request->hasfile('uploaded_document')) {
            $file = $request->file('uploaded_document');

            $original_name = $file->getClientOriginalName();
            $explode = explode('.', $original_name);
            array_pop($explode);
            $implode = implode('-', $explode);
            $original_extension = $file->getClientOriginalExtension();
            $name = Str::slug($implode) . '.' . $original_extension;
            $file->move(public_path('files/criminal_cases'), $name);

            $file = new CriminalCasesWorkingDoc();
            $file->case_id = $id;
            $file->uploaded_date = $request->uploaded_date == 'dd-mm-yyyy' || $request->uploaded_date == 'NaN-NaN-NaN' ? null : $request->uploaded_date;
            $file->doc_version = $request->doc_version;
            $file->documents_type_id = $request->documents_type_id;
            $file->uploaded_document = $name;
            $file->created_by = Auth::user()->email;
            $file->save();
        } else {
            session()->flash('warning', 'There is no documents to upload.');
            return redirect()->back();
        }

        session()->flash('success', 'Documents Added Successfully.');
        return redirect()->back();

    }

    public function criminal_cases_switch(Request $request)
    {

        if ($request->id != "" && $request->user_id != "") {
            CriminalCase::whereIn('id', $request->id)->update(['created_by' => $request->user_id]);
            foreach ($request->id as $key => $value) {
                $data = new CriminalCasesSwitchRecord();
                $data->case_id = $value;
                $data->switched_by_id = Auth::user()->id;
                $data->switched_to_id = $request->user_id;
                $data->save();
            }
            session()->flash('success', 'Case transferred successfully.');
            return redirect()->back();

        } else {
            session()->flash('error', 'Please, Select a case to transfer.');
            return redirect()->back();
        }

    }

}
