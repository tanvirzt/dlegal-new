<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\Counsel;
use App\Models\CriminalCase;
use App\Models\CriminalCasesCaseFileLocation;
use App\Models\CriminalCasesCaseSteps;
use App\Models\CriminalCasesDocumentsReceived;
use App\Models\CriminalCasesDocumentsRequired;
use App\Models\CriminalCasesFile;
use App\Models\CriminalCasesLetterNotice;
use App\Models\CriminalCasesOppsitionLawyer;
use App\Models\CriminalCaseStatusLog;
use App\Models\SetupAccused;
use App\Models\SetupAllegation;
use App\Models\SetupArea;
use App\Models\SetupBranch;
use App\Models\SetupCabinet;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseTitle;
use App\Models\SetupCaseTypes;
use App\Models\SetupClient;
use App\Models\SetupClientCategory;
use App\Models\SetupClientName;
use App\Models\SetupCompany;
use App\Models\SetupComplainant;
use App\Models\SetupCoordinator;
use App\Models\SetupCourt;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupDesignation;
use App\Models\SetupDocument;
use App\Models\SetupDocumentsType;
use App\Models\SetupExternalCouncil;
use App\Models\SetupGroup;
use App\Models\SetupInFavourOf;
use App\Models\SetupInternalCouncil;
use App\Models\SetupLaw;
use App\Models\SetupLegalIssue;
use App\Models\SetupLegalService;
use App\Models\SetupMatter;
use App\Models\SetupMode;
use App\Models\SetupNextDateReason;
use App\Models\SetupNextDayPresence;
use App\Models\SetupOpposition;
use App\Models\SetupParticulars;
use App\Models\SetupParty;
use App\Models\SetupPersonTitle;
use App\Models\SetupProfession;
use App\Models\SetupProgram;
use App\Models\SetupPropertyType;
use App\Models\SetupReferrer;
use App\Models\SetupRegion;
use App\Models\SetupSection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Str;
class ApiCriminalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
        public function all_cases()
        {
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
            ->where('criminal_cases.delete_status', 0)
            ->orderBy('criminal_cases.created_at', 'desc')->get();

        // if (Auth::user()->is_companies_superadmin == '1' || Auth::user()->is_owner_admin == '1') {

        //     $query2 = $query;

        // } else if (Auth::user()->is_companies_admin == '1') {

        //     $query2 = $query->whereIn('criminal_cases.created_by', companies_all_users());

        // } else {

        //     $query2 = $query->where(['criminal_cases.created_by' => auth_id()]);

        // }

        // $data = $query2->select('criminal_cases.*',
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
        //     'case_infos_title.case_title_name as sub_seq_case_title_name',
        //     'setup_matters.matter_name')
            
                return response()->json([
                    "status"=>200,
                    "user"=>$user,
                    "group_name"=>$group_name,
                    "client_category"=>$client_category,
                    "client_name"=>$client_name,
                    "next_date_reason"=>$next_date_reason,
                    "case_status"=>$case_status,
                    "external_council"=>$external_council,
                    "data"=>$external_council,
                    "case_cat"=>$case_cat,
                    "matter"=>$matter,
                    "case_types"=>$case_types,
                    "division"=>$division,
                    "court"=>$court,
                    "case_category"=>$case_category,

                    "message"=>"data get successfully"
                ]);

                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  add_criminal_cases()
    {
       
       
       
       
        $law = SetupLaw::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->orderBy('law_name', 'asc')->get();
        $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->orderBy('court_name', 'asc')->get();
        $designation = SetupDesignation::where('delete_status', 0)->orderBy('designation_name', 'asc')->get();
       
       
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->orderBy('case_category', 'asc')->get();
        $case_status = SetupCaseStatus::where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
       
        $division = DB::table("setup_divisions")->orderBy('division_name', 'asc')->get();
        $person_title = SetupPersonTitle::where('delete_status', 0)->orderBy('person_title_name', 'asc')->get();
        $next_date_reason = SetupNextDateReason::where('delete_status', 0)->orderBy('next_date_reason_name', 'asc')->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->orderBy('case_types_name', 'asc')->get();
      
        $zone = SetupRegion::where('delete_status', 0)->orderBy('region_name', 'asc')->get();
        
        $area = SetupArea::where('delete_status', 0)->orderBy('area_name', 'asc')->get();
        $internal_council = SetupInternalCouncil::where('delete_status', 0)->orderBy('first_name', 'asc')->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->orderBy('client_category_name', 'asc')->get();
        $branch = SetupBranch::where('delete_status', 0)->orderBy('branch_name', 'asc')->get();
        $program = SetupProgram::where('delete_status', 0)->orderBy('program_name', 'asc')->get();
        $section = SetupSection::where('delete_status', 0)->orderBy('section_name', 'asc')->get();
        
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
        return response()->json([
            "status"=>200,
            "law"=>$law,
            "court"=>$court,
            "designation"=>$designation,
            "case_category"=>$case_category,
            "case_status"=>$case_status,
            "property_type"=>$zone,
            "area"=>$area,
            "division"=>$division,
            "person_title"=>$person_title,
            "next_date_reason"=>$next_date_reason,
            "legal_issue"=>$legal_issue,
            "legal_service"=>$legal_service,
            "matter"=>$matter,
            "coordinator"=>$coordinator,
            "allegation"=>$allegation,
            "in_favour_of"=>$in_favour_of,
            "mode"=>$mode,
            "referrer"=>$referrer,
            "party"=>$party,
            "client"=>$client,
            "profession"=>$profession,
            "opposition"=>$opposition,
            "documents"=>$documents,
            "case_title"=>$case_title,
            "complainant"=>$complainant,
            "accused"=>$accused,
            "court_short"=>$court_short,
            "cabinet"=>$cabinet,
            "particulars"=>$particulars,
            "documents_type"=>$documents_type,
            "group_name"=>$group_name,
            "chamber"=>$chamber,
            "leadLaywer"=>$leadLaywer,
            "assignedlaywer"=>$assignedlaywer,
            "case_types"=>$case_types,
            "internal_council"=>$internal_council,
            "client_category"=>$client_category,
            "branch"=>$branch,
            "program"=>$program,
            "section"=>$section,
            

            "message"=>"data added successfully"
        ]);
            

       
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_criminal_cases(Request $request)
    {  
       

        
        
        $data = new CriminalCase();
        $data->created_case_id = $request->created_case_id;
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
        $data->next_date = $request->next_date;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->received_date = $request->received_date;
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


        

        $data->case_type = $request->case_type;
        $data->lead_laywer_name = $request->lead_laywer_name;
        $data->lead_laywer_name_extra = $request->lead_laywer_name_extra;
        $data->assigned_lawyer_extra = $request->assigned_lawyer_extra;



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
        $data->court_short_write = rtrim($request->court_short_write, ', ');
        $data->case_infos_sub_seq_case_title_id = $request->case_infos_sub_seq_case_title_id;
        $data->case_infos_sub_seq_case_no = rtrim($request->case_infos_sub_seq_case_no, ', ');
        $data->case_infos_sub_seq_case_year = rtrim($request->case_infos_sub_seq_case_year, ', ');
        $data->case_infos_sub_seq_court_id = $request->case_infos_sub_seq_court_id ? implode(', ', $request->case_infos_sub_seq_court_id) : null;
        $data->case_infos_sub_seq_court_short_id = rtrim($request->case_infos_sub_seq_court_short_id, ', ');
        $data->sub_seq_court_short_write = rtrim($request->sub_seq_court_short_write, ', ');
        $data->law_id = $request->law_id ? implode('/ ', $request->law_id) : null;
        $data->law_write = rtrim($request->law_write, ', ');
        $data->section_id = $request->section_id ? implode(', ', $request->section_id) : null;
        $data->section_write = rtrim($request->section_write, ', ');
       
        $data->case_status_id = 'Running';
        $data->case_status_id = 'Running';
        $data->matter_id = $request->matter_id;
        $data->matter_write = $request->matter_write;
        $data->case_type_id = $request->case_type_id;
        $data->case_infos_complainant_informant_name = rtrim($request->complainant, ', ');
        $data->complainant_informant_representative = rtrim($request->complainant_informant_representative, ', ');
        $data->case_infos_accused_name = rtrim($request->accused, ', ');
        $data->case_infos_accused_representative = rtrim($request->case_infos_accused_representative, ', ');
        $data->prosecution_witness = $request->prosecution_witness;
        $data->defense_witness = $request->defense_witness;
       
        $data->save();

        

       return response()->json([
        "status"=>200,
        "data"=>$data,
     
        "message"=>"data added successfully"
       ]);

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
