<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\BillSchedule;
use App\Models\Counsel;
use App\Models\CriminalCase;
use App\Models\CriminalCasesBilling;
use App\Models\CriminalCasesCaseFileLocation;
use App\Models\CriminalCasesCaseSteps;
use App\Models\CriminalCasesDocumentsReceived;
use App\Models\CriminalCasesDocumentsRequired;
use App\Models\CriminalCasesFile;
use App\Models\CriminalCasesLetterNotice;
use App\Models\CriminalCasesOppsitionLawyer;
use App\Models\CriminalCasesSwitchRecord;
use App\Models\CriminalCaseStatusLog;
use App\Models\PaymentMode;
use App\Models\SetupAccused;
use App\Models\SetupAllegation;
use App\Models\SetupArea;
use App\Models\SetupBillParticular;
use App\Models\SetupBillType;
use App\Models\SetupBranch;
use App\Models\SetupCabinet;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupCaseTitle;
use App\Models\SetupCaseTypes;
use App\Models\SetupClient;
use App\Models\SetupClientCategory;
use App\Models\SetupClientName;
use App\Models\SetupClientSubcategory;
use App\Models\SetupCompany;
use App\Models\SetupComplainant;
use App\Models\SetupCoordinator;
use App\Models\SetupCourt;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupCourtProceeding;
use App\Models\SetupDayNote;
use App\Models\SetupDesignation;
use App\Models\SetupDistrict;
use App\Models\SetupDocument;
use App\Models\SetupDocumentsType;
use App\Models\SetupExternalCouncil;
use App\Models\SetupExternalCouncilAssociate;
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
use App\Models\SetupThana;
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
        $profession = SetupProfession::where('delete_status', 0)->orderBy('profession_name', 'asc')->get();
       
        $opposition = SetupOpposition::where('delete_status', 0)->orderBy('opposition_name', 'asc')->get();
      
        $documents = SetupDocument::where('delete_status', 0)->orderBy('documents_name', 'asc')->get();
       
        $case_title = SetupCaseTitle::where(['case_type' => 'Criminal', 'delete_status' => 0])->orderBy('case_title_name', 'asc')->get();
       
        $client = SetupClient::where('delete_status', 0)->orderBy('client_name', 'asc')->get();
     
        $complainant = SetupComplainant::where('delete_status', 0)->orderBy('complainant_name', 'asc')->get();
        $accused = SetupAccused::where('delete_status', 0)->orderBy('accused_name', 'asc')->get();
        $court_short = SetupCourt::where('delete_status', 0)->orderBy('court_short_name', 'asc')->get();
       
        $cabinet = SetupCabinet::where('delete_status', 0)->orderBy('cabinet_name', 'asc')->get();

        $district = SetupDistrict::where('delete_status', 0)->orderBy('district_name', 'asc')->get();
        $thana = SetupThana::where('delete_status', 0)->orderBy('thana_name', 'asc')->get();

        $documents_type = SetupDocumentsType::where('delete_status', 0)->orderBy('documents_type_name', 'asc')->get();
       
        $group_name = SetupGroup::get();
        
       
        $chamber = Counsel::where('counsel_category','Chamber')->get();
       
        $leadLaywer = Counsel::where('counsel_type','Internal')->get();
       
        $assignedlaywer = Counsel::get();
        
        return response()->json([
            "status"=>200,
            "case_info"=>
                        [
                        "law"=>$law,
                        "court"=>$court,
                        "case_title"=>$case_title,
                        "designation"=>$designation,
                        "case_category"=>$case_category,
                        "case_status"=>$case_status,
                        "branch"=>$branch,
                        "section"=>$section,
                        "zone"=>$zone,
                        "area"=>$area,
                        "division"=>$division,
                        "matter"=>$matter,
                        "allegation"=>$allegation,
                        "court_short"=>$court_short,
                        "case_types"=>$case_types,
                        "thana"=>$thana,
                        "district"=>$district
                        
                        
                        
                     ],

         "case_events"=>    
                     ["documents_type"=>$documents_type,
                     "documents"=>$documents
                    ],
        "case_steps"=>[
                        "documents_type"=>$documents_type
                     ],
        "documents_received"=>[
                            "documents"=>$documents,
                            "documents_type"=>$documents_type
                             ],
        "documents_required"=>[
                                "documents"=>$documents,
                                "documents_type"=>$documents_type
                              ],
        "case_file_location"=>[
                                "cabinet"=>$cabinet
                              ],
        "documents_upload"=>[
                                "documentstypeArry"=>$documents_type
                            ],

        "client_info"=>[
                        "in_favour_of"=>$in_favour_of,
                         "client"=>$client,
                         "profession"=>$profession,
                         "division"=>$division,
                         "areaArry"=>$area,
                         "group_name"=>$group_name,
                         "branch"=>$branch,
                         "coordinator"=>$coordinator,
                         "client_category"=>$client_category
             ],
       "opposition_info"=>[
                            "opposition"=>$opposition,
                            "profession"=>$profession,
                            "division"=>$division,
                            "area"=>$area,
                            "branch"=>$branch,
                            "coordinator"=>$coordinator,
                            "group_name"=>$group_name,
                            "client_category"=>$client_category,
                            "in_favour_of"=>$in_favour_of,
            
            ],

            "lawyear_information"=>[
                            "chamber"=>$chamber,
                            "assignedlaywer"=>$assignedlaywer,
                            "leadLaywer"=>$leadLaywer
                            

            ],
           
            
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
//     $latest = CriminalCase::latest()->first();
// //    dd($latest);

//     if ($latest != null) {
//         $latest_no = explode('-', $latest->created_case_id);
//         $sl = $latest_no[1] + 1;
//     } else {
//         $sl = +1;
//     }

//     $created_case_id = 'LCR-000' . $sl;
       
        $data = new CriminalCase();
        // $data->created_case_id = $request->created_case_id;
        $data->case_infos_division_id = $request->case_infos_division_id;
        $data->case_infos_district_id = $request->case_infos_district_id;
        $data->case_infos_thana_id = $request->case_infos_thana_id;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        
        
       
        $data->matter_id = $request->matter_id;
        $data->matter_write = $request->matter_write;
        $data->case_infos_case_title_id=$request->name_of_the_court_id;
        
        $data->case_infos_case_no = $request->case_infos_case_no;
        $data->case_infos_case_year = $request->case_infos_case_year;
        $data->case_infos_court_id = $request->case_infos_court_id;
        $data->case_infos_court_short_id = $request->case_infos_court_short_id;
        $data->court_short_write= $request->court_short_write;
        $data->case_infos_sub_seq_case_title_id = $request->case_infos_sub_seq_case_title_id;
        $data->case_infos_sub_seq_case_no= $request->case_infos_sub_seq_case_no;
        $data->case_infos_sub_seq_case_year = $request->case_infos_sub_seq_case_year;
        $data->case_infos_sub_seq_court_id = $request->case_infos_sub_seq_court_id;
        $data->case_infos_sub_seq_court_short_id= $request->case_infos_sub_seq_court_short_id;
        $data->sub_seq_court_short_write=$request->sub_seq_court_short_write;
        $data->law_id = $request->law_id;
        $data->law_write = $request->law_write;
        $data->section_id = $request->section_id;
        $data->section_write= $request->section_write;
        $data->date_of_filing= $request->date_of_filing;
        $data->case_status_id =$request->case_status_id;
        $data->case_infos_complainant_informant_name = $request->case_infos_complainant_informant_name;
        $data->complainant_informant_representative = $request->complainant_informant_representative;
        $data->case_infos_accused_name = $request->case_infos_accused_name;
        $data->case_infos_accused_representative = $request->case_infos_accused_representative;
        $data->prosecution_witness = $request->prosecution_witness;
        $data->defense_witness = $request->defense_witness;
        $data->received_documents_id = $request->received_documents_id;
        $data->client_party_id = $request->client_party_id;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->client_id = $request->client_id;
        $data->client_name_write = $request->client_name_write;
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
        $data->lawyer_advocate_id = $request->lawyer_advocate_id;
        $data->lawyer_advocate_write = $request->lawyer_advocate_write;
        $data->lead_laywer_name = $request->lead_laywer_name;
        $data->lead_laywer_name_extra = $request->lead_laywer_name_extra;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id;
        $data->assigned_lawyer_extra = $request->assigned_lawyer_extra;
        $data->lawyers_remarks = $request->lawyers_remarks;
        $data->opposition_party_id = $request->opposition_party_id;
        $data->opposition_category_id = $request->opposition_category_id;
        $data->opposition_subcategory_id = $request->opposition_subcategory_id;
        $data->opposition_id = $request->opposition_id;
        $data->opposition_write = $request->opposition_write;
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


        $steps = new CriminalCasesCaseSteps();
        $steps->case_prayer_id=$request->case_prayer_id;
        $steps->case_nature_id = $request->case_nature_id;
        $steps->case_nature_write = $request->case_nature_write;
        $steps->case_infos_case_titel_sort_id = $request->case_infos_case_titel_sort_id;
        $steps->case_infos_sub_seq_case_title_sort_id = $request->case_infos_sub_seq_case_title_sort_id;
        $steps->case_infos_allegation_claim_id = $request->case_infos_allegation_claim_id;
        $steps->case_infos_allegation_claim_write = $request->case_infos_allegation_claim_write;
        $steps->amount_of_money = $request->amount_of_money;
        $steps->another_claim = $request->another_claim;
        $steps->recovery_seizure_articles = $request->recovery_seizure_articles;
        $steps->summary_facts = $request->summary_facts;
        $steps->case_info_remarks = $request->case_info_remarks;
        $steps->case_steps_filing = $request->case_steps_filing;
        $steps->case_steps_filing_note = $request->case_steps_filing_note;
        $steps->case_steps_filing_type_id = $request->case_steps_filing_type_id;
        $steps->case_steps_servicr_return = $request->case_steps_servicr_return;
        $steps->case_steps_servicr_return_note = $request->case_steps_servicr_return_note;
        $steps->case_steps_servicr_return_type_id = $request->case_steps_servicr_return_type_id;
        $steps->case_steps_sr_completed = $request->case_steps_sr_completed;
        $steps->case_steps_sr_completed_note = $request->case_steps_sr_completed_note;
        $steps->case_steps_sr_completed_type_id = $request->case_steps_sr_completed_type_id;
        $steps->case_steps_set_off = $request->case_steps_set_off;
        $steps->case_steps_set_off_note = $request->case_steps_set_off_note;
        $steps->case_steps_set_off_type_id = $request->case_steps_set_off_type_id;
        $steps->case_steps_issue_frame = $request->case_steps_issue_frame;
        $steps->case_steps_issue_frame_note = $request->case_steps_issue_frame_note;
        $steps->case_steps_issue_frame_type_id = $request->case_steps_issue_frame_type_id;
        $steps->case_steps_ph = $request->case_steps_ph;
        $steps->case_steps_ph_note = $request->case_steps_ph_note;
        $steps->case_steps_ph_type_id = $request->case_steps_ph_type_id;
        $steps->case_steps_fph = $request->case_steps_fph;
        $steps->case_steps_fph_note = $request->case_steps_fph_note;
        $steps->case_steps_fph_type_id = $request->case_steps_fph_type_id;
        $steps->taking_cognizance = $request->taking_cognizance;
        $steps->taking_cognizance_note = $request->taking_cognizance_note;
        $steps->taking_cognizance_type_id = $request->taking_cognizance_type_id;
        $steps->arrest_surrender_cw = $request->arrest_surrender_cw;
        $steps->arrest_surrender_cw_note = $request->arrest_surrender_cw_note;
        $steps->arrest_surrender_cw_type_id = $request->arrest_surrender_cw_type_id;
        $steps->case_steps_bail = $request->case_steps_bail;
        $steps->case_steps_bail_note = $request->case_steps_bail_note;
        $steps->case_steps_bail_type_id = $request->case_steps_bail_type_id;
        $steps->case_steps_court_transfer = $request->case_steps_court_transfer;
        $steps->case_steps_court_transfer_note = $request->case_steps_court_transfer_note;
        $steps->case_steps_court_transfer_type_id = $request->case_steps_court_transfer_type_id;
        $steps->case_steps_charge_framed = $request->case_steps_charge_framed;
        $steps->case_steps_charge_framed_note = $request->case_steps_charge_framed_note;
        $steps->case_steps_charge_framed_type_id = $request->case_steps_charge_framed_type_id;
        $steps->case_steps_witness_from = $request->case_steps_witness_from;
        $steps->case_steps_witness_from_note = $request->case_steps_witness_from_note;
        $steps->case_steps_witness_from_type_id = $request->case_steps_witness_from_type_id;
        $steps->case_steps_witness_to = $request->case_steps_witness_to;
        $steps->case_steps_witness_to_note = $request->case_steps_witness_to_note;
        $steps->case_steps_witness_to_type_id = $request->case_steps_witness_to_type_id;
        $steps->case_steps_argument = $request->case_steps_argument;
        $steps->case_steps_argument_note = $request->case_steps_argument_note;
        $steps->case_steps_argument_type_id = $request->case_steps_argument_type_id;
        $steps->case_steps_subsequent_status = $request->case_steps_subsequent_status;
        $steps->case_steps_subsequent_status_note = $request->case_steps_subsequent_status_note;
        $steps->case_steps_subsequent_status_type_id = $request->case_steps_subsequent_status_type_id;
        $steps->case_steps_summary_of_cases_note = $request->case_steps_summary_of_cases_note;
        $steps->case_steps_remarks = $request->case_steps_remarks;
        $steps->save();
       
        $oopLawyer = new CriminalCasesOppsitionLawyer();
        $oopLawyer->criminal_case_id=$data->id;
        $oopLawyer->opp_lawyer_advocate_write = $request->opp_lawyer_advocate_write;
        $oopLawyer->opp_lawyer_assigned_lawyer= $request->opp_lawyer_assigned_lawyer;
        $oopLawyer->opp_lawyer_contact= $request->opp_lawyer_contact;
        $oopLawyer->opp_lawyers_note= $request->opp_lawyers_note;
        $oopLawyer->save();
        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);
        

        foreach (array_filter($received_documents_sections) as $key => $value) {
            $datum = new CriminalCasesDocumentsReceived();
            // $datum->case_id = $data->id;
            $datum->received_documents_id = $value['received_documents_id'];
            $datum->received_documents = $value['received_documents'];
            // $datum->received_documents_date = $value['received_documents_date'];
            // $datum->received_documents_type_id = $value['received_documents_type_id'];
            $datum->save();
        }
          
        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);
       
        foreach (array_filter($request->required_wanting_documents_sections) as $key => $value) {
            $required = new CriminalCasesDocumentsRequired();
            // $required->case_id = $data->id;
            $datum->required_wanting_documents_id = $value['required_wanting_documents_id'];
            $required->required_wanting_documents = $value['required_wanting_documents'];
            // $required->required_wanting_documents_date = $value['required_wanting_documents_date'];
            // $required->required_wanting_documents_type_id = $value['required_wanting_documents_type_id'];
            $required->save();
        }

        
        $case_file_location_new_sections = $request->case_file_location_new_sections;
        $remove = array_pop($case_file_location_new_sections);

        foreach (array_filter($request->case_file_location_new_sections) as $key => $value) {
            $required = new CriminalCasesCaseFileLocation();
        // //     // $required->case_id = $data->id;
            $required->case_file_location_new_id = $value['case_file_location_new_id'];
            $required->case_file_location_new_office = $value['case_file_location_new_office'];
        //     // $required->case_file_location_new_almirah = $value['case_file_location_new_almirah'];
        //     // $required->case_file_location_new_self = $value['case_file_location_new_self'];
        //     $required->save();
        }

        

        

       

        

       return response()->json([
        "status"=>200,
        "data"=>$data,
        "steps"=>$steps,
        // "created_case_id"=>$created_case_id,
        "oopLawyer"=>$oopLawyer,
      
        
        
       
     
        "message"=>"data added successfully"
       ]);

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_criminal_cases($id)
    {
        $data = CriminalCase::find($id);
        $steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();
        $documents = CriminalCasesLetterNotice::where('case_id', $id)->first();
        $required_documents = CriminalCasesDocumentsRequired::where('case_id', $id)->first();
        $oop_lawyer = CriminalCasesOppsitionLawyer::where('criminal_case_id', $id)->first();
        $file_location = CriminalCasesCaseFileLocation::where('case_id', $id)->first();

        return response()->json([
            "status"=>200,
            "data"=>$data,
            "steps"=>$steps,
            "documents"=>$documents,
            "required_documents"=>$required_documents,
            "oop_lawyer"=>$oop_lawyer,
            "file_location"=>$file_location,
            "message"=>"data get successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_criminal_cases(Request $request, $id)
    {
        $data = CriminalCase::find($id);
        $data->case_type = $request->case_type;
        $data->case_infos_division_id = $request->case_infos_division_id;
        $data->case_infos_district_id = $request->case_infos_district_id;
        $data->case_infos_thana_id = $request->case_infos_thana_id;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->matter_id = $request->matter_id;
        $data->matter_write = $request->matter_write;
        $data->case_infos_case_title_id=$request->name_of_the_court_id;
        $data->case_infos_case_no = $request->case_infos_case_no;
        $data->case_infos_case_year = $request->case_infos_case_year;
        $data->case_infos_court_id = $request->case_infos_court_id;
        $data->case_infos_court_short_id = $request->case_infos_court_short_id;
        $data->court_short_write= $request->court_short_write;
        $data->case_infos_sub_seq_case_title_id = $request->case_infos_sub_seq_case_title_id;
        $data->case_infos_sub_seq_case_no= $request->case_infos_sub_seq_case_no;
        $data->case_infos_sub_seq_case_year = $request->case_infos_sub_seq_case_year;
        $data->case_infos_sub_seq_court_id = $request->case_infos_sub_seq_court_id;
        $data->case_infos_sub_seq_court_short_id= $request->case_infos_sub_seq_court_short_id;
        $data->sub_seq_court_short_write=$request->sub_seq_court_short_write;
        $data->law_id = $request->law_id;
        $data->law_write = $request->law_write;
        $data->section_id = $request->section_id;
        $data->section_write= $request->section_write;
        $data->date_of_filing= $request->date_of_filing;
        $data->case_status_id =$request->case_status_id;
        $data->case_infos_complainant_informant_name = $request->case_infos_complainant_informant_name;
        $data->complainant_informant_representative = $request->complainant_informant_representative;
        $data->case_infos_accused_name = $request->case_infos_accused_name;
        $data->case_infos_accused_representative = $request->case_infos_accused_representative;
        $data->prosecution_witness = $request->prosecution_witness;
        $data->defense_witness = $request->defense_witness;
        $data->received_documents_id = $request->received_documents_id;
        $data->client_party_id = $request->client_party_id;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->client_id = $request->client_id;
        $data->client_name_write = $request->client_name_write;
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
        $data->lawyer_advocate_id = $request->lawyer_advocate_id;
        $data->lawyer_advocate_write = $request->lawyer_advocate_write;
        $data->lead_laywer_name = $request->lead_laywer_name;
        $data->lead_laywer_name_extra = $request->lead_laywer_name_extra;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id;
        $data->assigned_lawyer_extra = $request->assigned_lawyer_extra;
        $data->lawyers_remarks = $request->lawyers_remarks;
        $data->opposition_party_id = $request->opposition_party_id;
        $data->opposition_category_id = $request->opposition_category_id;
        $data->opposition_subcategory_id = $request->opposition_subcategory_id;
        $data->opposition_id = $request->opposition_id;
        $data->opposition_write = $request->opposition_write;
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
        $data->update();

        $steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();
        $steps->case_prayer_id=$request->case_prayer_id;
        $steps->case_nature_id = $request->case_nature_id;
        $steps->case_nature_write = $request->case_nature_write;
        $steps->case_infos_case_titel_sort_id = $request->case_infos_case_titel_sort_id;
        $steps->case_infos_sub_seq_case_title_sort_id = $request->case_infos_sub_seq_case_title_sort_id;
        $steps->case_infos_allegation_claim_id = $request->case_infos_allegation_claim_id;
        $steps->case_infos_allegation_claim_write = $request->case_infos_allegation_claim_write;
        $steps->amount_of_money = $request->amount_of_money;
        $steps->another_claim = $request->another_claim;
        $steps->recovery_seizure_articles = $request->recovery_seizure_articles;
        $steps->summary_facts = $request->summary_facts;
        $steps->case_info_remarks = $request->case_info_remarks;
        $steps->case_steps_filing = $request->case_steps_filing;
        $steps->case_steps_filing_note = $request->case_steps_filing_note;
        $steps->case_steps_filing_type_id = $request->case_steps_filing_type_id;
        $steps->case_steps_servicr_return = $request->case_steps_servicr_return;
        $steps->case_steps_servicr_return_note = $request->case_steps_servicr_return_note;
        $steps->case_steps_servicr_return_type_id = $request->case_steps_servicr_return_type_id;
        $steps->case_steps_sr_completed = $request->case_steps_sr_completed;
        $steps->case_steps_sr_completed_note = $request->case_steps_sr_completed_note;
        $steps->case_steps_sr_completed_type_id = $request->case_steps_sr_completed_type_id;
        $steps->case_steps_set_off = $request->case_steps_set_off;
        $steps->case_steps_set_off_note = $request->case_steps_set_off_note;
        $steps->case_steps_set_off_type_id = $request->case_steps_set_off_type_id;
        $steps->case_steps_issue_frame = $request->case_steps_issue_frame;
        $steps->case_steps_issue_frame_note = $request->case_steps_issue_frame_note;
        $steps->case_steps_issue_frame_type_id = $request->case_steps_issue_frame_type_id;
        $steps->case_steps_ph = $request->case_steps_ph;
        $steps->case_steps_ph_note = $request->case_steps_ph_note;
        $steps->case_steps_ph_type_id = $request->case_steps_ph_type_id;
        $steps->case_steps_fph = $request->case_steps_fph;
        $steps->case_steps_fph_note = $request->case_steps_fph_note;
        $steps->case_steps_fph_type_id = $request->case_steps_fph_type_id;
        $steps->taking_cognizance = $request->taking_cognizance;
        $steps->taking_cognizance_note = $request->taking_cognizance_note;
        $steps->taking_cognizance_type_id = $request->taking_cognizance_type_id;
        $steps->arrest_surrender_cw = $request->arrest_surrender_cw;
        $steps->arrest_surrender_cw_note = $request->arrest_surrender_cw_note;
        $steps->arrest_surrender_cw_type_id = $request->arrest_surrender_cw_type_id;
        $steps->case_steps_bail = $request->case_steps_bail;
        $steps->case_steps_bail_note = $request->case_steps_bail_note;
        $steps->case_steps_bail_type_id = $request->case_steps_bail_type_id;
        $steps->case_steps_court_transfer = $request->case_steps_court_transfer;
        $steps->case_steps_court_transfer_note = $request->case_steps_court_transfer_note;
        $steps->case_steps_court_transfer_type_id = $request->case_steps_court_transfer_type_id;
        $steps->case_steps_charge_framed = $request->case_steps_charge_framed;
        $steps->case_steps_charge_framed_note = $request->case_steps_charge_framed_note;
        $steps->case_steps_charge_framed_type_id = $request->case_steps_charge_framed_type_id;
        $steps->case_steps_witness_from = $request->case_steps_witness_from;
        $steps->case_steps_witness_from_note = $request->case_steps_witness_from_note;
        $steps->case_steps_witness_from_type_id = $request->case_steps_witness_from_type_id;
        $steps->case_steps_witness_to = $request->case_steps_witness_to;
        $steps->case_steps_witness_to_note = $request->case_steps_witness_to_note;
        $steps->case_steps_witness_to_type_id = $request->case_steps_witness_to_type_id;
        $steps->case_steps_argument = $request->case_steps_argument;
        $steps->case_steps_argument_note = $request->case_steps_argument_note;
        $steps->case_steps_argument_type_id = $request->case_steps_argument_type_id;
        $steps->case_steps_subsequent_status = $request->case_steps_subsequent_status;
        $steps->case_steps_subsequent_status_note = $request->case_steps_subsequent_status_note;
        $steps->case_steps_subsequent_status_type_id = $request->case_steps_subsequent_status_type_id;
        $steps->case_steps_summary_of_cases_note = $request->case_steps_summary_of_cases_note;
        $steps->case_steps_remarks = $request->case_steps_remarks;
        $steps->update();

        $oopLawyer = CriminalCasesOppsitionLawyer::where('criminal_case_id',$id)->first();
        $oopLawyer->criminal_case_id=$data->id;
        $oopLawyer->opp_lawyer_advocate_write = $request->opp_lawyer_advocate_write;
        $oopLawyer->opp_lawyer_assigned_lawyer= $request->opp_lawyer_assigned_lawyer;
        $oopLawyer->opp_lawyer_contact= $request->opp_lawyer_contact;
        $oopLawyer->opp_lawyers_note= $request->opp_lawyers_note;
        $oopLawyer->update();

        

        $received_documents_sections = $request->received_documents_sections;
        $remove = array_pop($received_documents_sections);
        

        foreach (array_filter($received_documents_sections) as $key => $value) {
            $datum = CriminalCasesDocumentsReceived ::where('case_id', $id)->first();
            // $datum->case_id = $data->id;
            $datum->received_documents_id = $value['received_documents_id'];
            $datum->received_documents = $value['received_documents'];
            // $datum->received_documents_date = $value['received_documents_date'];
            // $datum->received_documents_type_id = $value['received_documents_type_id'];
            $datum->update();
        }
          
        $required_wanting_documents_sections = $request->required_wanting_documents_sections;
        $remove = array_pop($required_wanting_documents_sections);
       
        foreach (array_filter($request->required_wanting_documents_sections) as $key => $value) {
            $required =  CriminalCasesDocumentsRequired ::where('case_id', $id)->first();
            // $required->case_id = $data->id;
            $datum->required_wanting_documents_id = $value['required_wanting_documents_id'];
            $required->required_wanting_documents = $value['required_wanting_documents'];
            // $required->required_wanting_documents_date = $value['required_wanting_documents_date'];
            // $required->required_wanting_documents_type_id = $value['required_wanting_documents_type_id'];
            $required->update();

             
        $case_file_location_new_sections = $request->case_file_location_new_sections;
        $remove = array_pop($case_file_location_new_sections);

        foreach (array_filter($request->case_file_location_new_sections) as $key => $value) {
            $required =  CriminalCasesCaseFileLocation ::where('case_id', $id)->first();
        // //     // $required->case_id = $data->id;
            $required->case_file_location_new_id = $value['case_file_location_new_id'];
            $required->case_file_location_new_office = $value['case_file_location_new_office'];
        //     // $required->case_file_location_new_almirah = $value['case_file_location_new_almirah'];
        //     // $required->case_file_location_new_self = $value['case_file_location_new_self'];
        //     $required->save();
        }
        }

        return response()->json([
        
            "status"=>200,
            "data"=>$data,
            "steps"=>$steps,
            "oopLawyer"=>$oopLawyer,
            "message"=>"data updated successfully"

        ]);

       
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
public function find_district($id)
{
    $data= SetupDistrict::where("division_id","like", "%". $id. "%")->get();
    return response()->json([
    "status"=>200,
    "data"=>$data,
    "message"=>"data get successfully"
]);

}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
     public function view_criminal_cases($id)
     {
 
         $query = DB::table('criminal_cases');
         if (Auth::user()->is_companies_superadmin == '1' || Auth::user()->is_owner_admin == '1') {
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
         $find_case_category = CriminalCase::where('criminal_cases.id', $id)->select('case_category_id')->first();
 
         $case_status = SetupCaseStatus::where('case_category', $find_case_category->case_category_id)->where('delete_status', 0)->orderBy('case_status_name', 'asc')->get();
         $court_proceeding = SetupCourtProceeding::where('delete_status', 0)->get();
         $next_date_reason = SetupNextDateReason::where('delete_status', 0)->get();
         $last_court_order = SetupCourtLastOrder::where('delete_status', 0)->get();
         $day_notes = SetupDayNote::where('delete_status', 0)->get();
         $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
         $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
         $mode = SetupMode::where('delete_status', 0)->orderBy('mode_name', 'asc')->get();
         $edit_case_steps = CriminalCasesCaseSteps::where('criminal_case_id', $id)->first();
         $law = SetupLaw::where(['case_type' => 'Criminal', 'delete_status' => 0])->orderBy('law_name', 'asc')->get();
         $court = SetupCourt::where(['case_class_id' => 'Criminal', 'delete_status' => 0])->orderBy('court_name', 'asc')->get();
         $designation = SetupDesignation::where('delete_status', 0)->orderBy('designation_name', 'asc')->get();
         $external_council = SetupExternalCouncil::where('delete_status', 0)->orderBy('first_name', 'asc')->get();
         $case_category = SetupCaseCategory::where(['case_type' => 'Criminal', 'delete_status' => 0])->orderBy('case_category', 'asc')->get();
 
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
         
 
         if (!empty($exist_case_inofs_district)) {
             $exist_court_short = SetupCourt::where('applicable_district_id', 'like', "%{$exist_case_inofs_district->district_name}%")->where('delete_status', 0)->orderBy('court_name', 'asc')->get();
         } else {
             $exist_court_short = [];
         }

         $existing_district = SetupDistrict::where('division_id', $data->client_division_id)->orderBy('district_name', 'asc')->get();
        //  $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_id)->orderBy('first_name','asc')->get();
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
 
     
 
         $exist_engaged_advocate = SetupExternalCouncil::where('id', $data->lawyer_advocate_id)->get();
         $exist_engaged_advocate_associates = SetupExternalCouncilAssociate::where(['external_council_id' => $data->lawyer_advocate_id, 'delete_status' => 0])->get();
         $edit_case_steps = DB::table('criminal_cases_case_steps')
             ->leftJoin('setup_allegations', 'criminal_cases_case_steps.case_infos_allegation_claim_id', 'setup_allegations.id')
             ->where('criminal_case_id', $id)
             ->first();
        
         $previous_activity = CriminalCaseStatusLog::latest()->where(['case_id' => $id, 'delete_status' => 0])->first();
 
         $bill_type = SetupBillType::where('delete_status', 0)->get();
         $bill_particulars = SetupBillParticular::where('delete_status', 0)->get();
         $bill_schedule = BillSchedule::where('delete_status', 0)->get();
         $payment_mode = PaymentMode::where('delete_status', 0)->get();
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
             
             ->get();
        
 
         $latest = DB::table('criminal_case_status_logs')
             ->leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
             ->leftJoin('setup_next_date_reasons', 'criminal_case_status_logs.updated_fixed_for_id', '=', 'setup_next_date_reasons.id')
             ->leftJoin('setup_next_date_reasons as index_fixed_for', 'criminal_case_status_logs.updated_index_fixed_for_id', '=', 'index_fixed_for.id')
            
             ->select('criminal_case_status_logs.*', 'setup_case_statuses.case_status_name', 'setup_next_date_reasons.next_date_reason_name', 'index_fixed_for.next_date_reason_name as index_fixed_for_reason_name')
             ->where('criminal_case_status_logs.case_id', $id)
             ->where('criminal_case_status_logs.delete_status',0)
             ->latest()->first();
 
         $previouDate = CriminalCaseStatusLog::where('case_id',$id)->with('case')
         ->orderBy('id', 'desc')->where('delete_status',0)->take(2)->get();
 
         $caseFileLocation = CriminalCasesCaseFileLocation::where('case_id',$id)->with('cabinate')->get()->toArray();
         $caseFileLocationView = CriminalCasesCaseFileLocation::where('case_id',$id)->with('cabinate')->get();
 
         $oppLawyer = CriminalCasesOppsitionLawyer::where('criminal_case_id',$id)->first();
 
        
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
             ->leftJoin('setup_documents_types as servicr_return', 'criminal_cases_case_steps.case_steps_servicr_return_type_id', 'servicr_return.id')
             ->leftJoin('setup_documents_types as sr_completed', 'criminal_cases_case_steps.case_steps_sr_completed_type_id', 'sr_completed.id')
 
             ->leftJoin('setup_documents_types as case_steps_set_off', 'criminal_cases_case_steps.case_steps_set_off_type_id', 'case_steps_set_off.id')
             ->leftJoin('setup_documents_types as case_steps_issue_frame', 'criminal_cases_case_steps.case_steps_issue_frame_type_id', 'case_steps_issue_frame.id')
             ->leftJoin('setup_documents_types as case_steps_ph', 'criminal_cases_case_steps.case_steps_ph_type_id', 'case_steps_ph.id')
             ->leftJoin('setup_documents_types as case_steps_fph', 'criminal_cases_case_steps.case_steps_fph_type_id', 'case_steps_fph.id')
             ->leftJoin('setup_documents_types as case_steps_subsequent_status', 'criminal_cases_case_steps.case_steps_subsequent_status_type_id', 'case_steps_subsequent_status.id')
 
 
 
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
             ->select('criminal_cases_case_steps.*',
             'setup_documents_types.documents_type_name as case_steps_filing_type_name',
             'servicr_return.documents_type_name as servicr_return_type_name',
             'sr_completed.documents_type_name as sr_completed_type_name',
 
             'case_steps_set_off.documents_type_name as case_steps_set_off_type_name',
             'case_steps_issue_frame.documents_type_name as case_steps_issue_frame_type_name',
             'case_steps_ph.documents_type_name as case_steps_ph_type_name',
             'case_steps_fph.documents_type_name as case_steps_fph_type_name',
             'case_steps_subsequent_status.documents_type_name as case_steps_subsequent_status_type_name',
 
 
             'taking_cognizance.documents_type_name as taking_cognizance_type_name',
             'arrest_surrender_cw.documents_type_name as arrest_surrender_cw_type_name',
              'case_steps_bail.documents_type_name as case_steps_bail_type_name', 'court_transfer.documents_type_name as court_transfer_type_name', 'charge_framed.documents_type_name as charge_framed_type_name', 'witness_from.documents_type_name as witness_from_type_name', 'witness_to.documents_type_name as witness_to_type_name', 'argument.documents_type_name as argument_type_name', 'judgement_order.documents_type_name as judgement_order_type_name', 'summary_of_cases.documents_type_name as summary_of_cases_type_name')
             ->first();
 
         $switch_records = CriminalCasesSwitchRecord::where('case_id', $id)->get();
         $billing_log_new = DB::table('case_billings')
                             ->leftJoin('setup_bill_types','case_billings.bill_type_id','=','setup_bill_types.id')
                             ->leftJoin('setup_districts','case_billings.district_id','=','setup_districts.id')
                             ->leftJoin('setup_external_councils','case_billings.panel_lawyer_id','=','setup_external_councils.id')
                             ->leftJoin('setup_banks','case_billings.bank_id','=','setup_banks.id')
                             ->leftJoin('setup_bank_branches','case_billings.branch_id','=','setup_bank_branches.id')
                             ->leftJoin('setup_digital_payments','case_billings.digital_payment_type_id','=','setup_digital_payments.id')
                             ->where(['case_billings.delete_status' => 0, 'case_billings.class_of_cases' => 'District Court', 'case_no' => $id])
                             ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                             ->get();
         $ledger = DB::table('ledger_entries')
                     ->leftJoin('case_billings', 'ledger_entries.bill_id', 'case_billings.id')
                     ->where(['case_billings.class_of_cases' => 'District Court', 'case_billings.case_no' => $id])
                     ->select('ledger_entries.*', 'case_billings.class_of_cases', 'case_billings.case_no')
                     ->get();
 
                     $chamber = Counsel::where('counsel_category','Chamber')->get();
                     $leadLaywer = Counsel::where('counsel_type','Internal')->get();
                     $assignedlaywer = Counsel::get();


                     return response()->json([

                        "status"=>200,
                        "find_case_category"=>$find_case_category,
                        "assignedlaywer"=>$assignedlaywer,
                        "leadLaywer"=>$leadLaywer,
                        "chamber"=>$chamber,
                        "switch_records"=>$switch_records,
                        "group_name"=>$group_name,
                        "case_steps"=>$case_steps,
                        "documents_type"=>$documents_type,
                        "letter_notice"=>$letter_notice,
                        "oppLawyer"=>$oppLawyer,
                        "required_wanting_documents"=>$required_wanting_documents,
                        "case_category"=>$case_category,
                        "received_documents"=>$received_documents,
                        "particulars"=>$particulars,
                        "required_wanting_documents_explode"=>$required_wanting_documents_explode,
                        "exist_court_short"=>$exist_court_short,
                        "data"=>$data,
                        "criminal_cases_files"=>$criminal_cases_files,
                        "caseFileLocation"=>$caseFileLocation,
                        "caseFileLocationView"=>$caseFileLocationView,
                        "bill_history"=>$bill_history,
                        "previouDate"=>$previouDate,
                        "case_activity_log"=>$case_activity_log,
                        "latest"=>$latest,
                        "court_proceeding"=>$court_proceeding,
                        "next_date_reason"=>$next_date_reason,
                        "last_court_order"=>$last_court_order,
                        "day_notes"=>$day_notes,
                        "external_council"=>$external_council,
                        "next_day_presence"=>$next_day_presence,
                        "case_status"=>$case_status,
                        "mode"=>$mode,
                        "edit_case_steps"=>$edit_case_steps,
                        "existing_district"=>$existing_district,
                        "person_title"=>$person_title,
                        "division"=>$division,
                    //    "existing_ext_coun_associates"=>$existing_ext_coun_associates,
                        "case_category"=>$case_category,
                        "external_council"=>$external_council,
                        "designation"=>$designation,
                        "court"=>$court,
                        "law"=>$law,
                        "next_date_reason"=>$next_date_reason,
                        "last_court_order"=>$last_court_order,
                        "zone"=>$zone,
                        "area"=>$area,
                        "branch"=>$branch,
                        "program"=>$program,
                        "property_type"=>$property_type,
                        "case_types"=>$case_types,
                        "company"=>$company,
                        "internal_council"=>$internal_council,
                        "section"=>$section,
                        "client_category"=>$client_category,
                        "existing_client_subcategory"=>$existing_client_subcategory,
                        "existing_case_subcategory"=>$existing_case_subcategory,
                        "existing_district"=>$existing_district,
                        "existing_thana"=>$existing_thana,
                        "existing_assignend_external_council"=>$existing_assignend_external_council,
                        "assigned_lawyer_explode"=>$assigned_lawyer_explode,
                        "next_day_presence"=>$next_day_presence,
                        "legal_issue"=>$legal_issue,
                        "legal_service"=>$legal_service,
                        "matter"=>$matter,
                        "coordinator"=>$coordinator,
                        "allegation"=>$allegation,
                        "case_infos_existing_district"=>$case_infos_existing_district,
                        "case_infos_existing_thana"=>$case_infos_existing_thana,
                        "mode"=>$mode,
                        "court_proceeding"=>$court_proceeding,
                        "day_notes"=>$day_notes,
                        "in_favour_of"=>$in_favour_of,
                        "referrer"=>$referrer,
                        "party"=>$party,
                        "client"=>$client,
                        "profession"=>$profession,
                        "opposition"=>$opposition,
                        "documents"=>$documents,
                        "case_title"=>$case_title,
                        "existing_opposition_subcategory"=>$existing_opposition_subcategory,
                        "client_explode"=>$client_explode,
                        "court_explode"=>$court_explode,
                        "law_explode"=>$law_explode,
                        "section_explode"=>$section_explode,
                        "opposition_explode"=>$opposition_explode,
                        "sub_seq_court_explode"=>$sub_seq_court_explode,
                        // "user"=>$user,
                        "complainant"=>$complainant,
                        "accused"=>$accused,
                        "court_short"=>$court_short,
                        "edit-case-steps"=>$edit_case_steps,
                        "exist_engaged_advocate"=>$exist_engaged_advocate,
                        "exist_engaged_advocate_associates"=>$exist_engaged_advocate_associates,
                        "court_short_explode"=>$court_short_explode,
                        "sub_seq_court_short_explode"=>$sub_seq_court_short_explode,
                        "edit_case_steps"=>$edit_case_steps,
                        "exist_engaged_advocate"=>$exist_engaged_advocate,
                        "exist_engaged_advocate_associates"=>$exist_engaged_advocate_associates,
                        "court_short_explode"=>$court_short_explode,
                        "sub_seq_court_short_explode"=>$sub_seq_court_short_explode,
                        "received_documents_explode"=>$received_documents_explode,
                        "required_documents_explode"=>$required_documents_explode,
                        "previous_activity"=>$previous_activity,
                        "payment_mode"=>$payment_mode,
                        "bill_schedule"=>$bill_schedule,
                        "bill_particulars"=>$bill_particulars,
                        "bill_type"=>$bill_type,
                        "bill_amount"=>$bill_amount,
                        "payment_amount"=>$payment_amount,
                        "due_amount"=>$due_amount,
                        "cabinet"=>$cabinet,
                        "exist_case_type"=>$exist_case_type,
                        "letter_notice_explode"=>$letter_notice_explode,
                        "criminal_cases_working_docs"=>$criminal_cases_working_docs,
                        "billing_log_new"=>$billing_log_new,
                        "ledger"=>$ledger,

                        "message"=>"data viwed successfully"
                     ]);
                        

        }
}