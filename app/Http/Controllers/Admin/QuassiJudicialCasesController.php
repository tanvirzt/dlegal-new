<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupClientCategory;
use App\Models\SetupClientSubcategory;
use App\Models\SetupLaw;
use App\Models\SetupSection;
use App\Models\SetupThana;
use Illuminate\Http\Request;
use DB;
use App\Models\QuassiJudicialCase;
use App\Models\SetupLawSection;
use App\Models\SetupCourt;
use App\Models\SetupDesignation;
use App\Models\SetupExternalCouncil;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseStatus;
use App\Models\SetupPropertyType;
use App\Models\SetupPersonTitle;
use App\Models\SetupNextDateReason;
use App\Models\SetupCaseTypes;
use App\Models\SetupCompany;
use App\Models\SetupRegion;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupArea;
use App\Models\SetupInternalCouncil;
use App\Models\SetupBranch;
use App\Models\SetupProgram;
use App\Models\QuassiJudicialCasesFile;
use App\Models\SetupDistrict;
use App\Models\SetupExternalCouncilAssociate;
use App\Models\QuassiJudicialCaseStatusLog;

class QuassiJudicialCasesController extends Controller
{

    public function quassi_judicial_cases()
    {
        $case_category = SetupCaseCategory::where(['case_type' => 'Special Quassi - Judicial Cases', 'delete_status' => 0])->get();

        $data = QuassiJudicialCase::all();
        $court = SetupCourt::where('delete_status', 0)->get();

//        $data = DB::table('quassi_judicial_cases')
//            ->leftJoin('setup_divisions', 'quassi_judicial_cases.division_id', '=', 'setup_divisions.id')
//            ->leftJoin('setup_districts', 'quassi_judicial_cases.district_id', '=', 'setup_districts.id')
//            ->leftJoin('setup_case_statuses', 'quassi_judicial_cases.case_status_id', '=', 'setup_case_statuses.id')
//            ->leftJoin('setup_case_categories', 'quassi_judicial_cases.case_category_nature_id', '=', 'setup_case_categories.id')
//            ->leftJoin('setup_courts', 'quassi_judicial_cases.name_of_the_court_id', '=', 'setup_courts.id')
//            ->leftJoin('setup_companies', 'quassi_judicial_cases.company_id', '=', 'setup_companies.id')
//            ->select('quassi_judicial_cases.*', 'setup_divisions.division_name', 'setup_districts.district_name', 'setup_case_statuses.case_status_name', 'setup_case_categories.case_category_name', 'setup_courts.court_name', 'setup_companies.company_name')
//            ->get();

//         dd($data);

        return view('litigation_management.cases.quassi_judicial_cases.quassi_judicial_cases', compact('data','court','case_category'));
    }

    public function add_quassi_judicial_cases()
    {
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        $law = SetupLaw::where('delete_status', 0)->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $court = SetupCourt::where('delete_status', 0)->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Special Quassi - Judicial Cases', 'delete_status' => 0])->get();
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
        return view('litigation_management.cases.quassi_judicial_cases.add_quassi_judicial_cases', compact('person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'law', 'section','client_category'));
    }

    public function save_quassi_judicial_cases(Request $request)
    {
        //    dd($request->all());

//        $data = json_decode(json_encode($request->all()));
//        echo "<pre>";print_r($data);die();

//        $rules = [
//            'case_no' => 'required|unique:quassi_judicial_cases',
//        ];
//
//        $validMsg = [
//            'case_no.required' => 'Case No. field is required.',
//        ];
//
//        $this->validate($request, $rules, $validMsg);

        DB::beginTransaction();

        $data = new QuassiJudicialCase();
        $data->case_no = $request->case_no;
        $data->case_year = $request->case_year;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->date_of_case_received = $request->date_of_case_received;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->trial_court = $request->trial_court;
        $data->subsequent_case_no = $request->subsequent_case_no;
        $data->zone_id = $request->zone_id;
        $data->area_id = $request->area_id;
        $data->branch_id = $request->branch_id;
        $data->member_no = $request->member_no;
        $data->program_id = $request->program_id;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->date_of_filing = $request->date_of_filing;
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->thana_id = $request->thana_id;
        $data->relevant_laws_id = $request->relevant_laws_id;
        $data->relevant_sections_id = $request->relevant_sections_id;
        $data->alligation = $request->alligation;
        $data->amount = $request->amount;
        $data->name_of_the_complainant = $request->name_of_the_complainant;
        $data->complainant_contact_no = $request->complainant_contact_no;
        $data->complainant_designation_id = $request->complainant_designation_id;
        $data->external_council_name_id = $request->external_council_name_id;
        $data->external_council_associates_id = $request->external_council_associates_id;
        $data->opposite_party_name = $request->opposite_party_name;
        $data->opposite_party_address = $request->opposite_party_address;
        $data->case_status_id = $request->case_status_id;
        $data->last_order_court_id = $request->last_order_court_id;
        $data->accused_name = $request->accused_name;
        $data->accused_company_id = $request->accused_company_id;
        $data->next_date = $request->next_date;
        $data->accused_address = $request->accused_address;
        $data->accused_contact_no = $request->accused_contact_no;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->plaintiff_name = $request->plaintiff_name;
        $data->plaintiff_designaiton_id = $request->plaintiff_designaiton_id;
        $data->plaintiff_contact_number = $request->plaintiff_contact_number;
        $data->company_id = $request->company_id;
        $data->case_notes = $request->case_notes;
        $data->panel_lawyer_id = $request->panel_lawyer_id;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id;
        $data->total_legal_bill_amount = $request->total_legal_bill_amount;
        $data->other_claim = $request->other_claim;
        $data->summary_facts_alligation = $request->summary_facts_alligation;
        $data->prayer_claims_by_psg = $request->prayer_claims_by_psg;
        $data->missing_documents_evidence = $request->missing_documents_evidence;
        $data->comments = $request->comments;
        $data->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $file) {
                $original_name = $file->getClientOriginalName();
                $name = time() . rand(1, 100) . $original_name;
                $file->move(public_path('files/quassi_judicial_cases'), $name);

                $file = new QuassiJudicialCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->save();
            }
        }

        DB::commit();

        session()->flash('success', 'Special Quassi-Judicial Cases Added Successfully');
        return redirect()->route('quassi-judicial-cases');

    }

    public function edit_quassi_judicial_cases($id)
    {
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        $law = SetupLaw::where('delete_status', 0)->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $court = SetupCourt::where('delete_status', 0)->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Special Quassi - Judicial Cases', 'delete_status' => 0])->get();
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
        $data = QuassiJudicialCase::find($id);
        $existing_district = SetupDistrict::where('division_id', $data->division_id)->get();
        $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_name_id)->get();
        $existing_client_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->client_category_id,'delete_status' => 0])->get();
        $existing_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->case_category_id,'delete_status' => 0])->get();
        $existing_thana = SetupThana::where(['district_id' => $data->district_id, 'delete_status' => 0])->get();
//        dd($existing_case_subcategory);
        return view('litigation_management.cases.quassi_judicial_cases.edit_quassi_judicial_cases', compact('data', 'existing_district', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'existing_ext_coun_associates', 'law', 'section','client_category','existing_client_subcategory','existing_case_subcategory','existing_thana'));
    }

    public function update_quassi_judicial_cases(Request $request, $id)
    {
        //    dd($request->all());

        DB::beginTransaction();

        $data = QuassiJudicialCase::find($id);
        $data->case_no = $request->case_no;
        $data->case_year = $request->case_year;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->date_of_case_received = $request->date_of_case_received;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->trial_court = $request->trial_court;
        $data->subsequent_case_no = $request->subsequent_case_no;
        $data->zone_id = $request->zone_id;
        $data->area_id = $request->area_id;
        $data->branch_id = $request->branch_id;
        $data->member_no = $request->member_no;
        $data->program_id = $request->program_id;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->date_of_filing = $request->date_of_filing;
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->thana_id = $request->thana_id;
        $data->relevant_laws_id = $request->relevant_laws_id;
        $data->relevant_sections_id = $request->relevant_sections_id;
        $data->alligation = $request->alligation;
        $data->amount = $request->amount;
        $data->name_of_the_complainant = $request->name_of_the_complainant;
        $data->complainant_contact_no = $request->complainant_contact_no;
        $data->complainant_designation_id = $request->complainant_designation_id;
        $data->external_council_name_id = $request->external_council_name_id;
        $data->external_council_associates_id = $request->external_council_associates_id;
        $data->opposite_party_name = $request->opposite_party_name;
        $data->opposite_party_address = $request->opposite_party_address;
        $data->case_status_id = $request->case_status_id;
        $data->last_order_court_id = $request->last_order_court_id;
        $data->accused_name = $request->accused_name;
        $data->accused_company_id = $request->accused_company_id;
        $data->next_date = $request->next_date;
        $data->accused_address = $request->accused_address;
        $data->accused_contact_no = $request->accused_contact_no;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->plaintiff_name = $request->plaintiff_name;
        $data->plaintiff_designaiton_id = $request->plaintiff_designaiton_id;
        $data->plaintiff_contact_number = $request->plaintiff_contact_number;
        $data->company_id = $request->company_id;
        $data->case_notes = $request->case_notes;
        $data->panel_lawyer_id = $request->panel_lawyer_id;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id;
        $data->total_legal_bill_amount = $request->total_legal_bill_amount;
        $data->other_claim = $request->other_claim;
        $data->summary_facts_alligation = $request->summary_facts_alligation;
        $data->prayer_claims_by_psg = $request->prayer_claims_by_psg;
        $data->missing_documents_evidence = $request->missing_documents_evidence;
        $data->comments = $request->comments;
        $data->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $file) {
                $original_name = $file->getClientOriginalName();
                $name = time() . rand(1, 100) . $original_name;
                $file->move(public_path('files/quassi_judicial_cases'), $name);

                $file = new QuassiJudicialCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->save();
            }
        }

        DB::commit();

        session()->flash('success', 'Special Quassi-Judicial Cases Updated Successfully');
        return redirect()->route('quassi-judicial-cases');

    }

    public function delete_quassi_judicial_cases($id)
    {
        $data = QuassiJudicialCase::find($id);
        if ($data['delete_status'] == 1) {
            $delete_status = 0;
        } else {
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Special Quassi-Judicial Cases Deleted');
        return redirect()->back();
    }

    public function view_quassi_judicial_cases($id)
    {
//        $data = QuassiJudicialCase::find($id);
//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();



        //   dd($id);
        $data = DB::table('quassi_judicial_cases')
            ->leftJoin('setup_client_categories', 'quassi_judicial_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'quassi_judicial_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_case_categories', 'quassi_judicial_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'quassi_judicial_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_types', 'quassi_judicial_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_regions', 'quassi_judicial_cases.zone_id', '=', 'setup_regions.id')
            ->leftJoin('setup_areas', 'quassi_judicial_cases.area_id', '=', 'setup_areas.id')
            ->leftJoin('setup_branches', 'quassi_judicial_cases.branch_id', '=', 'setup_branches.id')
            ->leftJoin('setup_programs', 'quassi_judicial_cases.program_id', '=', 'setup_programs.id')
            ->leftJoin('setup_courts', 'quassi_judicial_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_divisions', 'quassi_judicial_cases.division_id', '=', 'setup_divisions.id')
            ->leftJoin('setup_districts', 'quassi_judicial_cases.district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_thanas', 'quassi_judicial_cases.thana_id', '=', 'setup_thanas.id')
            ->leftJoin('setup_laws', 'quassi_judicial_cases.relevant_laws_id', '=', 'setup_laws.id')
            ->leftJoin('setup_sections', 'quassi_judicial_cases.relevant_sections_id', '=', 'setup_sections.id')
            ->leftJoin('setup_designations', 'quassi_judicial_cases.complainant_designation_id', '=', 'setup_designations.id')
            ->leftJoin('setup_external_councils', 'quassi_judicial_cases.external_council_name_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_external_council_associates', 'quassi_judicial_cases.external_council_associates_id', '=', 'setup_external_council_associates.id')
            ->leftJoin('setup_case_statuses', 'quassi_judicial_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_court_last_orders', 'quassi_judicial_cases.last_order_court_id', '=', 'setup_court_last_orders.id')
            ->leftJoin('setup_companies as accused_company', 'quassi_judicial_cases.accused_company_id', '=', 'accused_company.id')
            ->leftJoin('setup_next_date_reasons', 'quassi_judicial_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_designations as plaintiff_designations', 'quassi_judicial_cases.plaintiff_designaiton_id', '=', 'plaintiff_designations.id')
            ->leftJoin('setup_companies', 'quassi_judicial_cases.company_id', '=', 'setup_companies.id')
            ->leftJoin('setup_external_councils as panel_lawyer', 'quassi_judicial_cases.panel_lawyer_id', '=', 'panel_lawyer.id')
            ->leftJoin('setup_internal_councils as assigned_lawyer', 'quassi_judicial_cases.assigned_lawyer_id', '=', 'assigned_lawyer.id')
            ->select('quassi_judicial_cases.*',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'setup_case_types.case_types_name',
                'setup_regions.region_name',
                'setup_areas.area_name',
                'setup_branches.branch_name',
                'setup_programs.program_name',
                'setup_courts.court_name',
                'setup_divisions.division_name',
                'setup_districts.district_name',
                'setup_thanas.thana_name',
                'setup_laws.law_name',
                'setup_sections.section_name',
                'setup_designations.designation_name',
                'setup_external_councils.first_name',
                'setup_external_councils.middle_name',
                'setup_external_councils.last_name',
                'setup_external_council_associates.first_name as as_first_name',
                'setup_external_council_associates.middle_name as as_middle_name',
                'setup_external_council_associates.middle_name as as_last_name',
                'setup_case_statuses.case_status_name',
                'setup_court_last_orders.court_last_order_name',
                'accused_company.company_name as accused_company_name',
                'setup_next_date_reasons.next_date_reason_name',
                'plaintiff_designations.designation_name as plaintiff_designation_name',
                'setup_companies.company_name',
                'panel_lawyer.first_name as pl_first_name',
                'panel_lawyer.middle_name as pl_middle_name',
                'panel_lawyer.last_name as pl_last_name',
                'assigned_lawyer.first_name as assigned_first_name',
                'assigned_lawyer.middle_name as assigned_middle_name',
                'assigned_lawyer.last_name as assigned_last_name')
            ->where('quassi_judicial_cases.id', $id)
            ->first();

//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();


        // dd($data);
        $quassi_judicial_cases_files = QuassiJudicialCasesFile::where(['case_id' => $id, 'delete_status' => 0])->get();
        // dd($quassi_judicial_cases_files);
        $case_logs = DB::table('quassi_judicial_case_status_logs')
            ->leftJoin('quassi_judicial_cases', 'quassi_judicial_case_status_logs.case_id', '=', 'quassi_judicial_cases.id')
            ->leftJoin('setup_courts', 'quassi_judicial_case_status_logs.updated_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'quassi_judicial_case_status_logs.updated_next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_external_councils', 'quassi_judicial_case_status_logs.updated_panel_lawyer_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_case_statuses', 'quassi_judicial_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
            ->select('quassi_judicial_case_status_logs.*', 'quassi_judicial_cases.case_no', 'setup_courts.court_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_case_statuses.case_status_name')
            ->where('quassi_judicial_case_status_logs.case_id', $id)
            ->get();

        $bill_history = DB::table('case_billings')
            ->leftJoin('setup_bill_types', 'case_billings.bill_type_id', '=', 'setup_bill_types.id')
            ->leftJoin('setup_districts', 'case_billings.district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_external_councils', 'case_billings.panel_lawyer_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_banks', 'case_billings.bank_id', '=', 'setup_banks.id')
            ->leftJoin('setup_bank_branches', 'case_billings.branch_id', '=', 'setup_bank_branches.id')
            ->leftJoin('setup_digital_payments', 'case_billings.digital_payment_type_id', '=', 'setup_digital_payments.id')
            ->where(['case_billings.case_type' => "Special Quassi - Judicial Cases", 'case_billings.case_no' => $data->case_no, 'case_billings.delete_status' => 0])
            ->select('case_billings.*', 'setup_bill_types.bill_type_name', 'setup_districts.district_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_banks.bank_name', 'setup_bank_branches.bank_branch_name', 'setup_digital_payments.digital_payment_type_name')
            ->get();


// dd($bill_history);

        return view('litigation_management.cases.quassi_judicial_cases.view_quassi_judicial_cases', compact('data', 'quassi_judicial_cases_files', 'case_logs', 'bill_history'));


    }


    public function download_quassi_judicial_cases_file($id)
    {
        $files = QuassiJudicialCasesFile::where(['id' => $id, 'delete_status' => 0])->firstOrFail();
        $file_path = public_path('/files/quassi_judicial_cases/' . $files->uploaded_document);
        return response()->download($file_path);
    }

    public function update_quassi_judicial_cases_status(Request $request, $id)
    {
        // dd($request->all());
        $status = QuassiJudicialCase::find($id);
        $status->case_status_id = $request->updated_case_status_id;
        $status->save();

        $data = new QuassiJudicialCaseStatusLog();
        $data->case_id = $id;
        $data->updated_court_id = $request->updated_court_id;
        $data->updated_next_date = $request->updated_next_date;
        $data->updated_next_date_fixed_id = $request->updated_next_date_fixed_id;
        $data->updated_panel_lawyer_id = $request->updated_panel_lawyer_id;
        $data->order_date = $request->order_date;
        $data->updated_case_status_id = $request->updated_case_status_id;
        $data->updated_accused_name = $request->updated_accused_name;
        $data->update_description = $request->update_description;
        $data->case_proceedings = $request->case_proceedings;
        $data->case_notes = $request->case_notes;
        $data->next_date_fixed_reason = $request->next_date_fixed_reason;
        $data->save();

        session()->flash('success', 'Case Status Updated Successfully');
        return redirect()->route('quassi-judicial-cases');

    }

    public function search_quassi_judicial_cases(Request $request)
    {

        $query = DB::table('quassi_judicial_cases');



        if ($request->case_no && $request->date_of_filing && $request->name_of_the_court_id) {
// dd('case no, dof, court name ');

            $query2 = $query->where(['quassi_judicial_cases.case_no' => $request->case_no, 'quassi_judicial_cases.date_of_filing' => $request->date_of_filing, 'quassi_judicial_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no && $request->date_of_filing && $request->name_of_the_court_id == null) {
// dd('case no, dof');

            $query2 = $query->where(['quassi_judicial_cases.case_no' => $request->case_no, 'quassi_judicial_cases.date_of_filing' => $request->date_of_filing]);

        } else if ($request->case_no && $request->date_of_filing == null && $request->name_of_the_court_id) {
            // dd('case no, court name ');

            $query2 = $query->where(['quassi_judicial_cases.case_no' => $request->case_no, 'quassi_judicial_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no == null && $request->date_of_filing && $request->name_of_the_court_id) {
            // dd('dof, court name');

            $query2 = $query->where(['quassi_judicial_cases.date_of_filing' => $request->date_of_filing, 'quassi_judicial_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no && $request->date_of_filing == null && $request->name_of_the_court_id == null) {
            // dd('case no');

            $query2 = $query->where(['quassi_judicial_cases.case_no' => $request->case_no]);

        } else if ($request->case_no == null && $request->date_of_filing && $request->name_of_the_court_id == null) {
            // dd('dof');

            $query2 = $query->where('quassi_judicial_cases.date_of_filing', $request->date_of_filing);

        } else if ($request->case_no == null && $request->date_of_filing == null && $request->name_of_the_court_id) {

            // dd('court name');
            $query2 = $query->where('quassi_judicial_cases.name_of_the_court_id', $request->name_of_the_court_id);

        }else if ($request->case_no == null && $request->date_of_filing == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id) {

            // dd('court name');
            $query2 = $query->where(['quassi_judicial_cases.case_category_id' => $request->case_category_id, 'quassi_judicial_cases.case_subcategory_id' => $request->case_subcategory_id]);

        }else if ($request->case_no == null && $request->date_of_filing == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id == null) {

            // dd('court name');
            $query2 = $query->where('quassi_judicial_cases.case_category_id', $request->case_category_id);

        } else {
            $query2 = $query;

        }

        $data = $query2->get();


        return response()->json([
            'result' => 'quassi_judicial_cases',
            'data' => $data,
        ]);

    }


}
