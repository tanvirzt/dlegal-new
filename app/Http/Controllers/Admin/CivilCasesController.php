<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CivilCasesFile;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupClientCategory;
use App\Models\SetupClientSubcategory;
use App\Models\SetupDistrict;
use App\Models\SetupLaw;
use App\Models\SetupSection;
use Illuminate\Http\Request;
use App\Models\CivilCases;
use App\Models\SetupDivision;
use App\Models\SetupPersonTitle;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseCategory;
use App\Models\SetupExternalCouncil;
use App\Models\SetupDesignation;
use App\Models\SetupCourt;
use App\Models\SetupLawSection;
use App\Models\SetupNextDateReason;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupPropertyType;
use App\Models\SetupCaseTypes;
use App\Models\SetupCompany;
use App\Models\SetupRegion;
use App\Models\SetupArea;
use App\Models\SetupInternalCouncil;
use App\Models\SetupExternalCouncilAssociate;
use App\Models\CivilCaseStatusLog;
use App\Models\CaseBilling;

//use DB;
use Illuminate\Support\Facades\DB;

class CivilCasesController extends Controller
{
    //civil cases setup

    public function civil_cases()
    {
//        $data = CivilCases::all();
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where('delete_status', 0)->get();

        $data = DB::table('civil_cases')
            ->select('civil_cases.*')
            ->get();

//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();

        return view('litigation_management.cases.civil_cases.civil_cases', compact('data', 'case_types', 'division', 'court','case_category'));
    }

    public function find_district(Request $request)
    {
        $district = SetupDistrict::where(['division_id' => $request->div_id, 'delete_status' => 0])->get();
        return response()->json($district);
    }

    public function find_associates(Request $request)
    {
        $associates = SetupExternalCouncilAssociate::where('external_council_id', $request->external_council_name_id)->get();
        return response()->json($associates);
    }

    public function add_civil_cases()
    {
        $law = SetupLaw::where('delete_status', 0)->get();
        $court = SetupCourt::where('delete_status', 0)->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where('delete_status', 0)->get();
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

        return view('litigation_management.cases.civil_cases.add_civil_cases', compact('person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'property_type', 'case_types', 'company', 'zone', 'area', 'internal_council', 'client_category','section'));
    }

    public function save_civil_cases(Request $request)
    {
//        dd($request->all());
        $rules = [
            'case_no' => 'required|unique:civil_cases',
        ];

        $validMsg = [
            'case_no.required' => 'Case No. field is required.',
        ];

        $this->validate($request, $rules, $validMsg);

        DB::beginTransaction();

        $data = new CivilCases();
        $data->case_no = $request->case_no;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->date_of_filing = $request->date_of_filing;
        $data->division_id = $request->division_id;
        $data->case_year = $request->case_year;
        $data->district_id = $request->district_id;
        $data->ref_no = $request->ref_no;
        $data->amount = $request->amount;
        $data->location = $request->location;
        $data->case_status_id = $request->case_status_id;
        $data->property_type_id = $request->property_type_id;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->external_council_name_id = $request->external_council_name_id;
        $data->external_council_associates_id = $request->external_council_associates_id;
        $data->relevant_law_id = $request->relevant_law_id;
        $data->relevant_sections_id = $request->relevant_sections_id;
        $data->plaintiff_name = $request->plaintiff_name;
        $data->plaintiff_designaiton_id = $request->plaintiff_designaiton_id;
        $data->next_date = $request->next_date;
        $data->plaintiff_contact_number = $request->plaintiff_contact_number;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->company_id = $request->company_id;
        $data->zone_id = $request->zone_id;
        $data->area_id = $request->area_id;
        $data->subsequent_plaintiff_name = $request->subsequent_plaintiff_name;
        $data->nature_of_suit = $request->nature_of_suit;
        $data->defendant_name = $request->defendant_name;
        $data->defendant_address = $request->defendant_address;
        $data->defendant_company_id = $request->defendant_company_id;
        $data->last_order_court_id = $request->last_order_court_id;
        $data->additional_order = $request->additional_order;
        $data->disbursement_date = $request->disbursement_date;
        $data->date_of_cash_receipt = $request->date_of_cash_receipt;
        $data->case_notes = $request->case_notes;
        $data->date_of_disposed = $request->date_of_disposed;
        $data->total_legal_bill_amount_cost = $request->total_legal_bill_amount_cost;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id;
        $data->notes = $request->notes;
        $data->other_claim = $request->other_claim;
        $data->summary_facts_demands = $request->summary_facts_demands;
        $data->missing_documents_evidence_information = $request->missing_documents_evidence_information;
        $data->comments = $request->comments;
        $data->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $file) {
                $original_name = $file->getClientOriginalName();
                $name = time() . rand(1, 100) . $original_name;
                $file->move(public_path('files/civil_cases'), $name);

                $file = new CivilCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->save();
            }
        }

        DB::commit();

        session()->flash('success', 'Civil Cases Added Successfully');
        //   return redirect()->back();
        return redirect()->route('civil-cases');

    }

    public function edit_civil_cases($id)
    {
        $law = SetupLaw::where('delete_status', 0)->get();
        $court = SetupCourt::where('delete_status', 0)->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where('delete_status', 0)->get();
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
        $data = CivilCases::find($id);
        $existing_district = SetupDistrict::where('division_id', $data->division_id)->get();
        $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_associates_id)->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        $existing_client_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->client_category_id,'delete_status' => 0])->get();
        $existing_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->case_category_id,'delete_status' => 0])->get();
        $section = SetupSection::where('delete_status', 0)->get();

//         dd($existing_client_subcategory);
        return view('litigation_management.cases.civil_cases.edit_civil_cases', compact('data', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'property_type', 'case_types', 'company', 'zone', 'area', 'internal_council', 'existing_district', 'existing_ext_coun_associates','client_category','existing_client_subcategory','existing_case_subcategory','section'));
    }

    public function update_civil_cases(Request $request, $id)
    {
//        dd($request->all());

//        $rules = [
//            'case_no' => 'required|unique:civil_cases',
//        ];
//
//        $validMsg = [
//            'case_no.required' => 'Case No. field is required.',
//        ];
//
//        $this->validate($request, $rules, $validMsg);

        DB::beginTransaction();

        $data = CivilCases::find($id);
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->date_of_filing = $request->date_of_filing;
        $data->division_id = $request->division_id;
        $data->case_year = $request->case_year;
        $data->district_id = $request->district_id;
        $data->ref_no = $request->ref_no;
        $data->amount = $request->amount;
        $data->location = $request->location;
        $data->case_status_id = $request->case_status_id;
        $data->property_type_id = $request->property_type_id;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->external_council_name_id = $request->external_council_name_id;
        $data->external_council_associates_id = $request->external_council_associates_id;
        $data->relevant_law_id = $request->relevant_law_id;
        $data->relevant_sections_id = $request->relevant_sections_id;
        $data->plaintiff_name = $request->plaintiff_name;
        $data->plaintiff_designaiton_id = $request->plaintiff_designaiton_id;
        $data->next_date = $request->next_date;
        $data->plaintiff_contact_number = $request->plaintiff_contact_number;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->company_id = $request->company_id;
        $data->zone_id = $request->zone_id;
        $data->area_id = $request->area_id;
        $data->subsequent_plaintiff_name = $request->subsequent_plaintiff_name;
        $data->nature_of_suit = $request->nature_of_suit;
        $data->defendant_name = $request->defendant_name;
        $data->defendant_address = $request->defendant_address;
        $data->defendant_company_id = $request->defendant_company_id;
        $data->last_order_court_id = $request->last_order_court_id;
        $data->additional_order = $request->additional_order;
        $data->disbursement_date = $request->disbursement_date;
        $data->date_of_cash_receipt = $request->date_of_cash_receipt;
        $data->case_notes = $request->case_notes;
        $data->date_of_disposed = $request->date_of_disposed;
        $data->total_legal_bill_amount_cost = $request->total_legal_bill_amount_cost;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id;
        $data->notes = $request->notes;
        $data->other_claim = $request->other_claim;
        $data->summary_facts_demands = $request->summary_facts_demands;
        $data->missing_documents_evidence_information = $request->missing_documents_evidence_information;
        $data->comments = $request->comments;
        $data->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $file) {
                $original_name = $file->getClientOriginalName();
                $name = time() . rand(1, 100) . $original_name;
                $file->move(public_path('files/civil_cases'), $name);

                $file = new CivilCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->save();
            }
        }

        DB::commit();

        session()->flash('success', 'Civil Cases Updated Successfully');
        return redirect()->route('civil-cases');

    }

    public function delete_civil_cases($id)
    {
        // dd($id);
        $data = CivilCases::find($id);
        if ($data['delete_status'] == 1) {
            $delete_status = 0;
        } else {
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Civil Cases Deleted');
        return redirect()->back();
    }

    public function view_civil_cases($id)
    {
        //   dd($id);

        $data = DB::table('civil_cases')
            ->leftJoin('setup_divisions', 'civil_cases.division_id', '=', 'setup_divisions.id')
            ->leftJoin('setup_districts', 'civil_cases.district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_case_statuses', 'civil_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_property_types', 'civil_cases.property_type_id', '=', 'setup_property_types.id')
            ->leftJoin('setup_case_categories', 'civil_cases.case_category_nature_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_types', 'civil_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_courts', 'civil_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_external_councils', 'civil_cases.external_council_name_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_external_council_associates', 'civil_cases.external_council_associates_id', '=', 'setup_external_council_associates.id')
            ->leftJoin('setup_law_sections', 'civil_cases.relevant_law_sections_id', '=', 'setup_law_sections.id')
            ->leftJoin('setup_designations', 'civil_cases.plaintiff_designaiton_id', '=', 'setup_designations.id')
            ->leftJoin('setup_next_date_reasons', 'civil_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_companies', 'civil_cases.company_id', '=', 'setup_companies.id')
            ->leftJoin('setup_regions', 'civil_cases.zone_id', '=', 'setup_regions.id')
            ->leftJoin('setup_areas', 'civil_cases.area_id', '=', 'setup_areas.id')
            ->leftJoin('setup_companies as def_company', 'civil_cases.defendant_company_id', '=', 'def_company.id')
            ->leftJoin('setup_court_last_orders', 'civil_cases.last_order_court_id', '=', 'setup_court_last_orders.id')
            ->leftJoin('setup_external_councils as panel_lawyer', 'civil_cases.panel_lawyer_id', '=', 'panel_lawyer.id')
            ->leftJoin('setup_internal_councils', 'civil_cases.assigned_lawyer_id', '=', 'setup_internal_councils.id')
            ->select('civil_cases.*', 'setup_divisions.division_name', 'setup_districts.district_name', 'setup_case_statuses.case_status_name', 'setup_property_types.property_type_name', 'setup_case_categories.case_category_name', 'setup_case_types.case_types_name', 'setup_courts.court_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_external_council_associates.first_name as as_first_name', 'setup_external_council_associates.middle_name as as_middle_name', 'setup_external_council_associates.last_name as as_last_name', 'setup_law_sections.law_section_name', 'setup_designations.designation_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_companies.company_name', 'setup_regions.region_name', 'setup_areas.area_name', 'def_company.company_name as def_company_name', 'setup_court_last_orders.court_last_order_name', 'panel_lawyer.first_name as pl_first_name', 'panel_lawyer.middle_name as pl_middle_name', 'panel_lawyer.last_name as pl_last_name', 'setup_internal_councils.first_name as ic_first_name', 'setup_internal_councils.middle_name as ic_middle_name', 'setup_internal_councils.last_name as ic_last_name')
            ->where('civil_cases.id', $id)
            ->first();
        // dd($data);

        $civil_cases_files = CivilCasesFile::where(['case_id' => $id, 'delete_status' => 0])->get();

        $case_logs = DB::table('civil_case_status_logs')
            ->leftJoin('civil_cases', 'civil_case_status_logs.case_id', '=', 'civil_cases.id')
            ->leftJoin('setup_courts', 'civil_case_status_logs.updated_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'civil_case_status_logs.updated_next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_external_councils', 'civil_case_status_logs.updated_panel_lawyer_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_case_statuses', 'civil_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
            ->select('civil_case_status_logs.*', 'civil_cases.case_no', 'setup_courts.court_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_case_statuses.case_status_name')
            ->where('civil_case_status_logs.case_id', $id)
            ->orderBy('civil_case_status_logs.id', 'desc')
            ->get();
        // dd($case_logs);

        $bill_history = DB::table('case_billings')
            ->leftJoin('setup_bill_types', 'case_billings.bill_type_id', '=', 'setup_bill_types.id')
            ->leftJoin('setup_districts', 'case_billings.district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_external_councils', 'case_billings.panel_lawyer_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_banks', 'case_billings.bank_id', '=', 'setup_banks.id')
            ->leftJoin('setup_bank_branches', 'case_billings.branch_id', '=', 'setup_bank_branches.id')
            ->leftJoin('setup_digital_payments', 'case_billings.digital_payment_type_id', '=', 'setup_digital_payments.id')
            ->where(['case_billings.case_type' => "Civil Cases", 'case_billings.case_no' => $data->case_no, 'case_billings.delete_status' => 0])
            ->select('case_billings.*', 'setup_bill_types.bill_type_name', 'setup_districts.district_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_banks.bank_name', 'setup_bank_branches.bank_branch_name', 'setup_digital_payments.digital_payment_type_name')
            ->orderBy('case_billings.id', 'desc')
            ->get();

        // $bill_history = json_decode(json_encode($bill_history));
        // echo "<pre>";print_r($bill_history);die;
        // dd($bill_history);
        return view('litigation_management.cases.civil_cases.view_civil_cases', compact('data', 'civil_cases_files', 'case_logs', 'bill_history'));

    }

    public function download_civil_cases_file($id)
    {
        $files = CivilCasesFile::where('id', $id)->firstOrFail();
        $pathToFile = public_path('/files/civil_cases/' . $files->uploaded_document);
        return response()->download($pathToFile);
    }

    public function update_civil_cases_status(Request $request, $id)
    {
        //   dd($request->all());

        $status = CivilCases::find($id);
        $status->case_status_id = $request->updated_case_status_id;
        $status->save();

        $data = new CivilCaseStatusLog();
        $data->case_id = $id;
        $data->updated_court_id = $request->updated_court_id;
        $data->updated_next_date = $request->updated_next_date;
        $data->updated_next_date_fixed_id = $request->updated_next_date_fixed_id;
        $data->updated_panel_lawyer_id = $request->updated_panel_lawyer_id;
        $data->order_date = $request->order_date;
        $data->updated_case_status_id = $request->updated_case_status_id;
        $data->update_description = $request->update_description;
        $data->case_proceedings = $request->case_proceedings;
        $data->case_notes = $request->case_notes;
        $data->next_date_fixed_reason = $request->next_date_fixed_reason;
        $data->save();

        session()->flash('success', 'Case Status Updated Successfully');
        return redirect()->route('civil-cases');

    }

    public function search_civil_cases(Request $request)
    {

        $query = DB::table('civil_cases');

        if ($request->case_no && $request->date_of_filing && $request->name_of_the_court_id) {
// dd('case no, dof, court name ');

            $query2 = $query->where(['civil_cases.case_no' => $request->case_no, 'civil_cases.date_of_filing' => $request->date_of_filing, 'civil_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no && $request->date_of_filing && $request->name_of_the_court_id == null) {
// dd('case no, dof');

            $query2 = $query->where(['civil_cases.case_no' => $request->case_no, 'civil_cases.date_of_filing' => $request->date_of_filing]);

        } else if ($request->case_no && $request->date_of_filing == null && $request->name_of_the_court_id) {
            // dd('case no, court name ');

            $query2 = $query->where(['civil_cases.case_no' => $request->case_no, 'civil_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no == null && $request->date_of_filing && $request->name_of_the_court_id) {
            // dd('dof, court name');

            $query2 = $query->where(['civil_cases.date_of_filing' => $request->date_of_filing, 'civil_cases.name_of_the_court_id' => $request->name_of_the_court_id]);

        } else if ($request->case_no && $request->date_of_filing == null && $request->name_of_the_court_id == null) {
            // dd('case no');

            $query2 = $query->where(['civil_cases.case_no' => $request->case_no]);

        } else if ($request->case_no == null && $request->date_of_filing && $request->name_of_the_court_id == null) {
            // dd('dof');

            $query2 = $query->where('civil_cases.date_of_filing', $request->date_of_filing);

        } else if ($request->case_no == null && $request->date_of_filing == null && $request->name_of_the_court_id) {

            // dd('court name');
            $query2 = $query->where('civil_cases.name_of_the_court_id', $request->name_of_the_court_id);

        }else if ($request->case_no == null && $request->date_of_filing == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id) {

            // dd('court name');
            $query2 = $query->where(['civil_cases.case_category_id' => $request->case_category_id, 'civil_cases.case_subcategory_id' => $request->case_subcategory_id]);

        }else if ($request->case_no == null && $request->date_of_filing == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id == null) {

            // dd('court name');
            $query2 = $query->where('civil_cases.case_category_id', $request->case_category_id);

        } else {
            $query2 = $query;

        }

        $data = $query2->get();

        return response($data);

    }

}
