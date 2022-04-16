<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalCase;
use App\Models\CriminalCaseActivityLog;
use App\Models\SetupAllegation;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupClientCategory;
use App\Models\SetupClientSubcategory;
use App\Models\SetupCoordinator;
use App\Models\SetupCourtProceeding;
use App\Models\SetupDayNote;
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
use App\Models\SetupPersonTitle;
use App\Models\SetupNextDateReason;
use App\Models\SetupCourtLastOrder;
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

class CriminalCasesController extends Controller
{
    //

    public function criminal_cases()
    {
//           $data = CriminalCase::all();
// dd($data);
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->get();

        $data = DB::table('criminal_cases')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->select('criminal_cases.*', 'setup_next_date_reasons.next_date_reason_name', 'setup_courts.court_name', 'setup_districts.district_name', 'setup_case_types.case_types_name')
            ->get();

//         dd($data);

        return view('litigation_management.cases.criminal_cases.criminal_cases', compact('data', 'division', 'case_types', 'court','case_category'));
    }

    public function add_criminal_cases()
    {
        $law = SetupLaw::where(['case_type' => 'Criminal Cases','delete_status' => 0])->get();
        $court = SetupCourt::where(['case_type' => 'Criminal Cases','delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->get();
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
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        $branch = SetupBranch::where('delete_status', 0)->get();
        $program = SetupProgram::where('delete_status', 0)->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $legal_issue = SetupLegalIssue::where('delete_status',0)->get();
        $legal_service = SetupLegalService::where('delete_status',0)->get();
        $matter = SetupMatter::where('delete_status',0)->get();
        $coordinator = SetupCoordinator::where('delete_status',0)->get();
        $allegation = SetupAllegation::where('delete_status',0)->get();

        return view('litigation_management.cases.criminal_cases.add_criminal_cases', compact('person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council','client_category','section','section','next_day_presence','legal_issue','legal_service','matter','coordinator','allegation'));
    }

    public function save_criminal_cases(Request $request)
    {
        dd($request->all());

//        $data = json_decode(json_encode($request->all()));
//        echo "<pre>";print_r($data);die();

//        $rules = [
//            'case_no' => 'required|unique:criminal_cases',
//        ];
//
//        $validMsg = [
//            'case_no.required' => 'Case No. field is required.',
//        ];
//
//        $this->validate($request, $rules, $validMsg);

        DB::beginTransaction();

        $data = new CriminalCase();
        $data->client = $request->client;
        $data->legal_issue_id = $request->legal_issue_id;
        $data->legal_service_id = $request->legal_service_id;
        $data->complainant_informant_name = $request->complainant_informant_name;
        $data->accused_name = $request->accused_name;
        $data->in_favour_of = $request->in_favour_of;
        $data->case_no = $request->case_no;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->next_date = $request->next_date;
        $data->next_date_fixed_id = $request->next_date_fixed_id;

        if ($request->received_date){
            $data->received_date = $request->received_date;
        }else{
            $data->received_date = date('Y-m-d');
        }

        $data->mode_of_receipt = $request->mode_of_receipt;
        $data->contact_person_name = $request->contact_person_name;
        $data->contact_person_details = $request->contact_person_details;
        $data->received_by = $request->received_by;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->client_name = $request->client_name;
        $data->client_address = $request->client_address;
        $data->client_mobile = $request->client_mobile;
        $data->client_email = $request->client_email;
        $data->client_division_id = $request->client_division_id;
        $data->client_district_id = $request->client_district_id;
        $data->client_thana_id = $request->client_thana_id;
        $data->coordinator_tadbirkar_id = $request->coordinator_tadbirkar_id;
        $data->coordinator_tadbirkar_name = $request->coordinator_tadbirkar_name;
        $data->coordinator_details = $request->coordinator_details;
        $data->received_documents = $request->received_documents;
        $data->required_wanting_documents = $request->required_wanting_documents;
        $data->lawyer_advocate_id = $request->lawyer_advocate_id;
        $data->assigned_lawyer = $request->assigned_lawyer ? implode(', ', $request->assigned_lawyer) : '';
        $data->lawyers_remarks = $request->lawyers_remarks;
        $data->case_status_id = $request->case_status_id;
        $data->status_next_date = $request->status_next_date;
        $data->status_next_date_fixed_id = $request->status_next_date_fixed_id;
        $data->status_remarks = $request->status_remarks;
        $data->case_infos_division_id = $request->case_infos_division_id;
        $data->case_infos_district_id = $request->case_infos_district_id;
        $data->case_infos_thana_id = $request->case_infos_thana_id;
        $data->name_of_the_court = implode(', ', $request->name_of_the_court);
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->case_infos_case_no = implode(', ', $request->case_infos_case_no);
        $data->case_infos_case_year = implode(', ', $request->case_infos_case_year);
        $data->law = implode(', ', $request->law);
        $data->section = implode(', ', $request->section);
        $data->date_of_filing = $request->date_of_filing;
        $data->matter_id = $request->matter_id;
        $data->case_infos_complainant_informant_name = implode(', ', $request->case_infos_complainant_informant_name);
        $data->complainant_informant_representative = implode(', ', $request->complainant_informant_representative);
        $data->case_infos_accused_name = implode(', ', $request->case_infos_accused_name);
        $data->case_infos_accused_representative = implode(', ', $request->case_infos_accused_representative);
        $data->case_infos_allegation_claim_id = $request->case_infos_allegation_claim_id;
        $data->case_infos_allegation_claim = $request->case_infos_allegation_claim;
        $data->amount_of_money = $request->amount_of_money;
        $data->another_claim = $request->another_claim;
        $data->summary_facts = $request->summary_facts;
        $data->date_of_arrest = $request->date_of_arrest;
        $data->date_of_bill = $request->date_of_bill;
        $data->case_info_remarks = $request->case_info_remarks;
        $data->judgement_date_of_filing = $request->judgement_date_of_filing;
        $data->date_of_cognizance = $request->date_of_cognizance;
        $data->date_of_court_transfer = $request->date_of_court_transfer;
        $data->date_of_charge_framed = $request->date_of_charge_framed;
        $data->date_of_witness_from = $request->date_of_witness_from;
        $data->date_of_witness_to = $request->date_of_witness_to;
        $data->date_of_argument = $request->date_of_argument;
        $data->date_of_judgement_order = $request->date_of_judgement_order;
        $data->summary_judgement_order = $request->summary_judgement_order;
        $data->judgement_remarks = $request->judgement_remarks;
        $data->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $file) {
                $original_name = $file->getClientOriginalName();
                $name = time() . rand(1, 100) . $original_name;
                $file->move(public_path('files/criminal_cases'), $name);

                $file = new CriminalCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->created_by = Auth::guard('admin')->user()->email;
                $file->save();
            }
        }

        DB::commit();

        session()->flash('success', 'Criminal Cases Added Successfully');
        return redirect()->route('criminal-cases');

    }

    public function edit_criminal_cases($id)
    {
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $legal_issue = SetupLegalIssue::where('delete_status',0)->get();
        $legal_service = SetupLegalService::where('delete_status',0)->get();
        $matter = SetupMatter::where('delete_status',0)->get();
        $coordinator = SetupCoordinator::where('delete_status',0)->get();
        $allegation = SetupAllegation::where('delete_status',0)->get();
        $law = SetupLaw::where(['case_type' => 'Criminal Cases','delete_status' => 0])->get();
        $court = SetupCourt::where(['case_type' => 'Criminal Cases','delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Criminal Cases', 'delete_status' => 0])->get();
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
        $data = CriminalCase::find($id);
        $existing_district = SetupDistrict::where('division_id', $data->client_division_id)->get();
        $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_name_id)->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        $existing_client_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->client_category_id,'delete_status' => 0])->get();
        $existing_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->case_category_id,'delete_status' => 0])->get();
        $existing_thana = SetupThana::where(['district_id' => $data->client_district_id, 'delete_status' => 0])->get();
        $assigned_lawyer = explode(', ', $data->assigned_lawyer);
        $case_infos_existing_district = SetupDistrict::where('division_id', $data->case_infos_division_id)->get();
        $case_infos_existing_thana = SetupThana::where(['district_id' => $data->case_infos_district_id, 'delete_status' => 0])->get();

        $mode = SetupMode::where('delete_status',0)->get();
        $court_proceeding = SetupCourtProceeding::where('delete_status',0)->get();
        $day_notes = SetupDayNote::where('delete_status',0)->get();
        //dd($data);
        return view('litigation_management.cases.criminal_cases.edit_criminal_cases', compact('data', 'existing_district', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'existing_ext_coun_associates','section','client_category','existing_client_subcategory','existing_case_subcategory','existing_district','existing_thana','assigned_lawyer','next_day_presence','legal_issue','legal_service','matter','coordinator','allegation','case_infos_existing_district','case_infos_existing_thana', 'mode', 'court_proceeding', 'day_notes'));
    }

    public function update_criminal_cases(Request $request, $id)
    {

        DB::beginTransaction();

        $data = CriminalCase::find($id);
        $data->client = $request->client;
        $data->legal_issue_id = $request->legal_issue_id;
        $data->legal_service_id = $request->legal_service_id;
        $data->complainant_informant_name = $request->complainant_informant_name;
        $data->accused_name = $request->accused_name;
        $data->in_favour_of = $request->in_favour_of;
        $data->case_no = $request->case_no;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->next_date = $request->next_date;
        $data->next_date_fixed_id = $request->next_date_fixed_id;

        if ($request->received_date){
            $data->received_date = $request->received_date;
        }else{
            $data->received_date = date('Y-m-d');
        }

        $data->mode_of_receipt = $request->mode_of_receipt;
        $data->contact_person_name = $request->contact_person_name;
        $data->contact_person_details = $request->contact_person_details;
        $data->received_by = $request->received_by;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->client_name = $request->client_name;
        $data->client_address = $request->client_address;
        $data->client_mobile = $request->client_mobile;
        $data->client_email = $request->client_email;
        $data->client_division_id = $request->client_division_id;
        $data->client_district_id = $request->client_district_id;
        $data->client_thana_id = $request->client_thana_id;
        $data->coordinator_tadbirkar_id = $request->coordinator_tadbirkar_id;
        $data->coordinator_tadbirkar_name = $request->coordinator_tadbirkar_name;
        $data->coordinator_details = $request->coordinator_details;
        $data->received_documents = $request->received_documents;
        $data->required_wanting_documents = $request->required_wanting_documents;
        $data->lawyer_advocate_id = $request->lawyer_advocate_id;
        $data->assigned_lawyer = $request->assigned_lawyer ? implode(', ', $request->assigned_lawyer) : '';
        $data->lawyers_remarks = $request->lawyers_remarks;
        $data->case_status_id = $request->case_status_id;
        $data->status_next_date = $request->status_next_date;
        $data->status_next_date_fixed_id = $request->status_next_date_fixed_id;
        $data->status_remarks = $request->status_remarks;
        $data->case_infos_division_id = $request->case_infos_division_id;
        $data->case_infos_district_id = $request->case_infos_district_id;
        $data->case_infos_thana_id = $request->case_infos_thana_id;
        $data->name_of_the_court = implode(', ', $request->name_of_the_court);
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->case_infos_case_no = implode(', ', $request->case_infos_case_no);
        $data->case_infos_case_year = implode(', ', $request->case_infos_case_year);
        $data->law = implode(', ', $request->law);
        $data->section = implode(', ', $request->section);
        $data->date_of_filing = $request->date_of_filing;
        $data->matter_id = $request->matter_id;
        $data->case_infos_complainant_informant_name = implode(', ', $request->case_infos_complainant_informant_name);
        $data->complainant_informant_representative = implode(', ', $request->complainant_informant_representative);
        $data->case_infos_accused_name = implode(', ', $request->case_infos_accused_name);
        $data->case_infos_accused_representative = implode(', ', $request->case_infos_accused_representative);
        $data->case_infos_allegation_claim_id = $request->case_infos_allegation_claim_id;
        $data->case_infos_allegation_claim = $request->case_infos_allegation_claim;
        $data->amount_of_money = $request->amount_of_money;
        $data->another_claim = $request->another_claim;
        $data->summary_facts = $request->summary_facts;
        $data->date_of_arrest = $request->date_of_arrest;
        $data->date_of_bill = $request->date_of_bill;
        $data->case_info_remarks = $request->case_info_remarks;
        $data->judgement_date_of_filing = $request->judgement_date_of_filing;
        $data->date_of_cognizance = $request->date_of_cognizance;
        $data->date_of_court_transfer = $request->date_of_court_transfer;
        $data->date_of_charge_framed = $request->date_of_charge_framed;
        $data->date_of_witness_from = $request->date_of_witness_from;
        $data->date_of_witness_to = $request->date_of_witness_to;
        $data->date_of_argument = $request->date_of_argument;
        $data->date_of_judgement_order = $request->date_of_judgement_order;
        $data->summary_judgement_order = $request->summary_judgement_order;
        $data->judgement_remarks = $request->judgement_remarks;
        $data->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $file) {
                $original_name = $file->getClientOriginalName();
                $name = time() . rand(1, 100) . $original_name;
                $file->move(public_path('files/criminal_cases'), $name);

                $file = new CriminalCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->created_by = Auth::guard('admin')->user()->email;
                $file->save();
            }
        }

        DB::commit();

        session()->flash('success', 'Criminal Cases Updated Successfully');
        return redirect()->route('criminal-cases');


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

    public function view_criminal_cases($id)
    {
        $data = CriminalCase::find($id);

//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();


        $data = DB::table('criminal_cases')
            ->leftJoin('setup_legal_issues', 'criminal_cases.legal_issue_id', '=', 'setup_legal_issues.id')
            ->leftJoin('setup_legal_services', 'criminal_cases.legal_service_id', '=', 'setup_legal_services.id')
            ->leftJoin('setup_internal_councils as in_favour_of', 'criminal_cases.in_favour_of', '=', 'in_favour_of.id')
            ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_client_categories', 'criminal_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'criminal_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_divisions as client_division', 'criminal_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'criminal_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'criminal_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_coordinators','criminal_cases.coordinator_tadbirkar_id','=','setup_coordinators.id')
            ->leftJoin('setup_case_statuses','criminal_cases.case_status_id','=','setup_case_statuses.id')
            ->leftJoin('setup_next_date_reasons as status_next_date_reason', 'criminal_cases.status_next_date_fixed_id', '=', 'status_next_date_reason.id')
            ->leftJoin('setup_divisions as case_infos_division', 'criminal_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'criminal_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'criminal_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_categories', 'criminal_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'criminal_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_matters', 'criminal_cases.matter_id', '=', 'setup_matters.id')
            ->leftJoin('setup_allegations', 'criminal_cases.case_infos_allegation_claim_id', '=', 'setup_allegations.id')
            ->leftJoin('setup_external_councils', 'criminal_cases.lawyer_advocate_id', '=', 'setup_external_councils.id')

            ->select('criminal_cases.*',
                'setup_legal_issues.legal_issue_name',
                'setup_legal_services.legal_service_name',
                'in_favour_of.first_name as in_favour_of_first_name',
                'in_favour_of.middle_name as in_favour_of_middle_name',
                'in_favour_of.last_name as in_favour_of_last_name',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_coordinators.coordinator_name',
                'setup_case_statuses.case_status_name',
                'status_next_date_reason.next_date_reason_name as status_next_date_reason_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'setup_case_types.case_types_name',
                'setup_matters.matter_name',
                'setup_allegations.allegation_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name')
            ->where('criminal_cases.id', $id)
            ->first();

//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();


        //   dd($data);
        $criminal_cases_files = CriminalCasesFile::where(['case_id' => $id, 'delete_status' => 0])->get();

        $case_logs = DB::table('criminal_case_status_logs')
            ->leftJoin('setup_case_statuses', 'criminal_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_court_proceedings', 'criminal_case_status_logs.court_proceedings_id', '=', 'setup_court_proceedings.id')
            ->leftJoin('setup_court_last_orders', 'criminal_case_status_logs.updated_court_order_id', '=', 'setup_court_last_orders.id')
            ->leftJoin('setup_external_councils', 'criminal_case_status_logs.updated_engaged_advocate_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_next_day_presences', 'criminal_case_status_logs.updated_next_day_presence_id', '=', 'setup_next_day_presences.id')
            ->leftJoin('setup_day_notes', 'criminal_case_status_logs.updated_day_notes_id', '=', 'setup_day_notes.id')
            ->select('criminal_case_status_logs.*', 'setup_case_statuses.case_status_name', 'setup_court_proceedings.court_proceeding_name','setup_court_last_orders.court_last_order_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name', 'setup_next_day_presences.next_day_presence_name','setup_day_notes.day_notes_name')
            ->where('criminal_case_status_logs.case_id', $id)
            ->get();

//        $case_logs = json_decode(json_encode($case_logs));
//        echo "<pre>";print_r($case_logs);die();

        $bill_history = DB::table('case_billings')
            ->leftJoin('setup_bill_types', 'case_billings.bill_type_id', '=', 'setup_bill_types.id')
            ->leftJoin('setup_districts', 'case_billings.district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_external_councils', 'case_billings.panel_lawyer_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_banks', 'case_billings.bank_id', '=', 'setup_banks.id')
            ->leftJoin('setup_bank_branches', 'case_billings.branch_id', '=', 'setup_bank_branches.id')
            ->leftJoin('setup_digital_payments', 'case_billings.digital_payment_type_id', '=', 'setup_digital_payments.id')
            ->where(['case_billings.case_type' => "Criminal Cases", 'case_billings.case_no' => $data->case_no, 'case_billings.delete_status' => 0])
            ->select('case_billings.*', 'setup_bill_types.bill_type_name', 'setup_districts.district_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_banks.bank_name', 'setup_bank_branches.bank_branch_name', 'setup_digital_payments.digital_payment_type_name')
            ->get();

        $case_activity_log = DB::table('criminal_case_activity_logs')
                            ->leftJoin('setup_external_councils','criminal_case_activity_logs.activity_forwarded_to_id','setup_external_councils.id')
                            ->where('criminal_case_activity_logs.case_id', $id)
                            ->select('criminal_case_activity_logs.*','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name')
                            ->get();

//         dd($case_activity_log);
        return view('litigation_management.cases.criminal_cases.view_criminal_cases', compact('data', 'criminal_cases_files', 'case_logs', 'bill_history', 'case_activity_log'));
    }

    public function download_criminal_cases_file($id)
    {
        $file = CriminalCasesFile::where('id', $id)->firstOrFail();
        $file_path = public_path('/files/criminal_cases/' . $file->uploaded_document);
        return response()->download($file_path);
    }

    public function update_criminal_cases_status(Request $request, $id)
    {
//         dd($request->all());

//        $data = json_decode(json_encode($request->all()));
//        echo "<pre>";print_r($data);die();

        $data = new CriminalCaseStatusLog();

        $data->case_id = $id;
        $data->updated_case_status_id = $request->updated_case_status_id;
        $data->updated_order_date = $request->updated_order_date;
        $data->updated_fixed_for = $request->updated_fixed_for;
        $data->court_proceedings_id = $request->court_proceedings_id;
        $data->court_proceedings = $request->court_proceedings;
        $data->updated_court_order_id = $request->updated_court_order_id;
        $data->updated_court_order = $request->updated_court_order;
        $data->updated_day_notes_id = $request->updated_day_notes_id;
        $data->updated_day_notes = $request->updated_day_notes;
        $data->updated_engaged_advocate_id = $request->updated_engaged_advocate_id;
        $data->updated_next_day_presence_id = $request->updated_next_day_presence_id;
        $data->save();

        session()->flash('success', 'Case Status Updated Successfully');
        return redirect()->route('criminal-cases');

    }

    public function search_criminal_cases(Request $request)
    {
//         dd($request->all());
        $query = DB::table('criminal_cases')
                ->leftJoin('setup_next_date_reasons', 'criminal_cases.next_date_fixed_id', 'setup_next_date_reasons.id')
                ->leftJoin('setup_courts', 'criminal_cases.name_of_the_court_id', '=', 'setup_courts.id')
                ->leftJoin('setup_districts', 'criminal_cases.case_infos_district_id', '=', 'setup_districts.id')
                ->leftJoin('setup_case_types', 'criminal_cases.case_type_id', '=', 'setup_case_types.id');

        if ($request->case_no && $request->received_date && $request->name_of_the_court_id) {
// dd('case no, dof, court name ');

            $query2 = $query->where(['criminal_cases.case_no' => $request->case_no, 'criminal_cases.received_date' => $request->received_date, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no && $request->received_date && $request->name_of_the_court_id == null) {
// dd('case no, dof');

            $query2 = $query->where(['criminal_cases.case_no' => $request->case_no, 'criminal_cases.received_date' => $request->received_date]);

        } else if ($request->case_no && $request->received_date == null && $request->name_of_the_court_id) {
            // dd('case no, court name ');

            $query2 = $query->where(['criminal_cases.case_no' => $request->case_no, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no == null && $request->received_date && $request->name_of_the_court_id) {
            // dd('dof, court name');

            $query2 = $query->where(['criminal_cases.received_date' => $request->received_date, 'criminal_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no && $request->received_date == null && $request->name_of_the_court_id == null) {
            // dd('case no');

            $query2 = $query->where(['criminal_cases.case_no' => $request->case_no]);

        } else if ($request->case_no == null && $request->received_date && $request->name_of_the_court_id == null) {
            // dd('dof');

            $query2 = $query->where('criminal_cases.received_date', $request->received_date);

        } else if ($request->case_no == null && $request->received_date == null && $request->name_of_the_court_id) {

            // dd('court name');
            $query2 = $query->where('criminal_cases.name_of_the_court_id', $request->name_of_the_court_id);

        }else if ($request->case_no == null && $request->received_date == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id) {

            // dd('court name');
            $query2 = $query->where(['criminal_cases.case_category_id' => $request->case_category_id, 'criminal_cases.case_subcategory_id' => $request->case_subcategory_id]);

        }else if ($request->case_no == null && $request->received_date == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id == null) {

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
//         dd($request->all());

//        $data = json_decode(json_encode($request->all()));
//        echo "<pre>";print_r($data);die();

        $data = new CriminalCaseActivityLog();
        $data->case_id = $id;
        $data->activity_date = $request->activity_date;
        $data->activity_action = $request->activity_action;
        $data->activity_progress = $request->activity_progress;
        $data->activity_mode = implode(', ', $request->activity_mode);
        $data->activity_time_spent = $request->activity_time_spent;
        $data->activity_engaged = $request->activity_engaged ? implode(', ', $request->activity_engaged) : '';
        $data->activity_forwarded_to_id = $request->activity_forwarded_to_id;
        $data->save();

        session()->flash('success', 'Case Status Updated Successfully');
        return redirect()->route('criminal-cases');

    }

    public function delete_criminal_cases_file($id)
    {
        $file = CriminalCasesFile::findOrFail($id);

        unlink(public_path('/files/criminal_cases/' . $file->uploaded_document));

        $file->delete();

        return redirect()->back();
    }

}
