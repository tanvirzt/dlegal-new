<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LabourCase;
use App\Models\LabourCasesFile;
use App\Models\LabourCaseStatusLog;
use App\Models\SetupArea;
use App\Models\SetupBranch;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupCaseTypes;
use App\Models\SetupClientCategory;
use App\Models\SetupClientSubcategory;
use App\Models\SetupCompany;
use App\Models\SetupCourt;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupDesignation;
use App\Models\SetupDistrict;
use App\Models\SetupExternalCouncil;
use App\Models\SetupExternalCouncilAssociate;
use App\Models\SetupInternalCouncil;
use App\Models\SetupLaw;
use App\Models\SetupNextDateReason;
use App\Models\SetupPersonTitle;
use App\Models\SetupProgram;
use App\Models\SetupPropertyType;
use App\Models\SetupRegion;
use App\Models\SetupSection;
use App\Models\SetupThana;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApilabourCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function labour_cases()
    {
        $division = DB::table("setup_divisions")->get();
        $case_types = SetupCaseTypes::where('delete_status', 0)->get();
        $court = SetupCourt::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Labour Cases', 'delete_status' => 0])->get();

        return response()->json([

            "status"=>200,
            "division"=>$division,
            "case_types"=>$case_types,
            "case_category"=>$case_category,

            "message"=> "data added succesfully"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_labour_cases()
    {
        $law = SetupLaw::where(['case_type' => 'Labour Cases','delete_status' => 0])->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_type' => 'Labour Cases','delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Labour Cases', 'delete_status' => 0])->get();
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
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        return response()->json([
            "status"=>200,
            "law"=>$law,
            "section"=>$section,
            "court"=>$court,
            "designation"=>$designation,
            "external_council"=>$external_council,
            "case_category"=>$case_category,
            "case_status"=>$case_status,
            "property_type"=>$property_type,
            "division"=>$division,
            "person_title"=>$person_title,
            "next_date_reason"=>$next_date_reason,
            "case_types"=>$case_types,
            "company"=>$company,
            "zone"=>$zone,
            "last_court_order"=>$last_court_order,
            "area"=>$area,
            "internal_council"=>$internal_council,
            "branch"=>$branch,
            "program"=>$program,
            "client_category"=>$client_category,


            "message"=>"data added successfully"
        ]);
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
    public function edit_labour_cases($id)
    {
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        $law = SetupLaw::where(['case_type' => 'Labour Cases','delete_status' => 0])->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_type' => 'Labour Cases','delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Labour Cases', 'delete_status' => 0])->get();
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
        $data = LabourCase::find($id);
        $existing_district = SetupDistrict::where('division_id', $data->division_id)->get();
        $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_name_id)->get();
        $existing_client_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->client_category_id,'delete_status' => 0])->get();
        $existing_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->case_category_id,'delete_status' => 0])->get();
        $existing_thana = SetupThana::where(['district_id' => $data->district_id, 'delete_status' => 0])->get();

        return response()->json([
            "status"=>200,
            "client_category"=>$client_category,
            "law"=>$law,
            "section"=>$section,
            "court"=>$court,
            "designation"=>$designation,
            "external_council"=>$external_council,
            "case_category"=>$case_category,
            "case_status"=>$case_status,
            "property_type"=>$property_type,
            "division"=>$division,
            "person_title"=>$person_title,
            "next_date_reason"=>$next_date_reason,
            "case_types"=>$case_types,
            "company"=>$company,
            "zone"=>$zone,
            "last_court_order"=>$last_court_order,
            "area"=>$area,
            "internal_council"=>$internal_council,
            "branch"=>$branch,
            "program"=>$program,
            "data"=>$data,
            "existing_district"=>$existing_district,
            "existing_ext_coun_associates"=>$existing_ext_coun_associates,
            "existing_client_subcategory"=>$existing_client_subcategory,
            "existing_case_subcategory"=>$existing_case_subcategory,
            "existing_thana"=>$existing_thana,

            "message"=>"data edited successfully"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_labour_cases(Request $request, $id)
    {
        DB::beginTransaction();

        $data = LabourCase::find($id);
        $data->case_no = $request->case_no;
        $data->case_year = $request->case_year;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->date_of_case_received = $request->date_of_case_received;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->trial_court = $request->trial_court;
        $data->zone_id = $request->zone_id;
        $data->area_id = $request->area_id;
        $data->branch_id = $request->branch_id;
        $data->company_organization_id = $request->company_organization_id;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->date_of_filing = $request->date_of_filing;
        $data->division_id = $request->division_id;
        $data->district_id = $request->district_id;
        $data->thana_id = $request->thana_id;
        $data->relevant_law_id = $request->relevant_law_id;
        $data->relevant_sections_id = $request->relevant_sections_id;
        $data->alligation = $request->alligation;
        $data->amount = $request->amount;
        $data->name_of_the_first_party = $request->name_of_the_first_party;
        $data->first_party_contact_no = $request->first_party_contact_no;
        $data->first_party_designation_id = $request->first_party_designation_id;
        $data->external_council_name_id = $request->external_council_name_id;
        $data->external_council_associates_id = $request->external_council_associates_id;
        $data->second_party_name = $request->second_party_name;
        $data->second_party_address = $request->second_party_address;
        $data->case_status_id = $request->case_status_id;
        $data->last_order_court_id = $request->last_order_court_id;
        $data->next_date = $request->next_date;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->case_notes = $request->case_notes;
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
                $file->move(public_path('files/labour_cases'), $name);

                $file = new LabourCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->save();
               
            }
        }
        DB::commit();
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
    public function destroy($id)
    {
        //
    }
    public function view_labour_cases($id)
    {
        
           
            
                    $data = DB::table('labour_cases')
                        ->leftJoin('setup_client_categories', 'labour_cases.client_category_id', '=', 'setup_client_categories.id')
                        ->leftJoin('setup_client_subcategories', 'labour_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
                        ->leftJoin('setup_case_categories', 'labour_cases.case_category_id', '=', 'setup_case_categories.id')
                        ->leftJoin('setup_case_subcategories', 'labour_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
                        ->leftJoin('setup_case_types', 'labour_cases.case_type_id', '=', 'setup_case_types.id')
                        ->leftJoin('setup_regions', 'labour_cases.zone_id', '=', 'setup_regions.id')
                        ->leftJoin('setup_areas', 'labour_cases.area_id', '=', 'setup_areas.id')
                        ->leftJoin('setup_branches', 'labour_cases.branch_id', '=', 'setup_branches.id')
                        ->leftJoin('setup_companies', 'labour_cases.company_organization_id', '=', 'setup_companies.id')
                        ->leftJoin('setup_courts', 'labour_cases.name_of_the_court_id', '=', 'setup_courts.id')
                        ->leftJoin('setup_divisions', 'labour_cases.division_id', '=', 'setup_divisions.id')
                        ->leftJoin('setup_districts', 'labour_cases.district_id', '=', 'setup_districts.id')
                        ->leftJoin('setup_thanas', 'labour_cases.thana_id', '=', 'setup_thanas.id')
                        ->leftJoin('setup_laws', 'labour_cases.relevant_law_id', '=', 'setup_laws.id')
                        ->leftJoin('setup_sections', 'labour_cases.relevant_sections_id', '=', 'setup_sections.id')
                        ->leftJoin('setup_designations', 'labour_cases.first_party_designation_id', '=', 'setup_designations.id')
                        ->leftJoin('setup_external_councils', 'labour_cases.external_council_name_id', '=', 'setup_external_councils.id')
                        ->leftJoin('setup_external_council_associates', 'labour_cases.external_council_associates_id', '=', 'setup_external_council_associates.id')
                        ->leftJoin('setup_case_statuses', 'labour_cases.case_status_id', '=', 'setup_case_statuses.id')
                        ->leftJoin('setup_court_last_orders', 'labour_cases.last_order_court_id', '=', 'setup_court_last_orders.id')
                        ->leftJoin('setup_next_date_reasons', 'labour_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
                        ->leftJoin('setup_internal_councils as assigned_lawyer', 'labour_cases.assigned_lawyer_id', '=', 'assigned_lawyer.id')
                        ->select('labour_cases.*',
                            'setup_client_categories.client_category_name',
                            'setup_client_subcategories.client_subcategory_name',
                            'setup_case_categories.case_category',
                            'setup_case_subcategories.case_subcategory',
                            'setup_case_types.case_types_name',
                            'setup_regions.region_name',
                            'setup_areas.area_name',
                            'setup_branches.branch_name',
                            'setup_companies.company_name',
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
                            'setup_next_date_reasons.next_date_reason_name',
                            'assigned_lawyer.first_name as assigned_first_name',
                            'assigned_lawyer.middle_name as assigned_middle_name',
                            'assigned_lawyer.last_name as assigned_last_name')
                        ->where('labour_cases.id', $id)
                        ->first();
                   
            
                    $labour_cases_files = LabourCasesFile::where(['case_id' => $id, 'delete_status' => 0])->get();
            
                    $case_logs = DB::table('labour_case_status_logs')
                        ->leftJoin('labour_cases', 'labour_case_status_logs.case_id', '=', 'labour_cases.id')
                        ->leftJoin('setup_courts', 'labour_case_status_logs.updated_court_id', '=', 'setup_courts.id')
                        ->leftJoin('setup_next_date_reasons', 'labour_case_status_logs.updated_next_date_fixed_id', '=', 'setup_next_date_reasons.id')
                        ->leftJoin('setup_external_councils', 'labour_case_status_logs.updated_panel_lawyer_id', '=', 'setup_external_councils.id')
                        ->leftJoin('setup_case_statuses', 'labour_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
                        ->select('labour_case_status_logs.*', 'labour_cases.case_no', 'setup_courts.court_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_case_statuses.case_status_name')
                        ->where('labour_case_status_logs.case_id', $id)
                        ->get();
            
                    $bill_history = DB::table('case_billings')
                        ->leftJoin('setup_bill_types', 'case_billings.bill_type_id', '=', 'setup_bill_types.id')
                        ->leftJoin('setup_districts', 'case_billings.district_id', '=', 'setup_districts.id')
                        ->leftJoin('setup_external_councils', 'case_billings.panel_lawyer_id', '=', 'setup_external_councils.id')
                        ->leftJoin('setup_banks', 'case_billings.bank_id', '=', 'setup_banks.id')
                        ->leftJoin('setup_bank_branches', 'case_billings.branch_id', '=', 'setup_bank_branches.id')
                        ->leftJoin('setup_digital_payments', 'case_billings.digital_payment_type_id', '=', 'setup_digital_payments.id')
                        ->where(['case_billings.case_type' => "Labour Cases", 'case_billings.case_no' => $data->case_no, 'case_billings.delete_status' => 0])
                        ->select('case_billings.*', 'setup_bill_types.bill_type_name', 'setup_districts.district_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_banks.bank_name', 'setup_bank_branches.bank_branch_name', 'setup_digital_payments.digital_payment_type_name')
                        ->get();


                        return response()->json([
                            "status"=>200,
                            "data"=>$data,
                            "bill_history"=>$bill_history,
                            "case_logs"=>$case_logs,
                            "labour_cases_files"=>$labour_cases_files,

                            "message"=>"data viewed successfully"
                        ]);
    }
    public function update_labour_cases_status(Request $request, $id)
    {
        
        $status = LabourCase::find($id);
        $status->case_status_id = $request->updated_case_status_id;
        $status->save();

        $data = new LabourCaseStatusLog();
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
        return response()->json([
            "status"=>200,
            "data"=>$data,
            "message"=>"data updated successfully"
        ]);
}
}