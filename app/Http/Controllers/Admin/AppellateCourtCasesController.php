<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetupCaseClass;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupLaw;
use App\Models\SetupSection;
use App\Models\SetupThana;
use Illuminate\Http\Request;

use App\Models\AppellateCourtCase;
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
use App\Models\SetupAlligation;
use App\Models\AppellateCourtCasesFile;
use App\Models\SetupDistrict;
use App\Models\SetupExternalCouncilAssociate;
use App\Models\AppellateCourtCaseStatusLog;
use Illuminate\Support\Facades\DB;


class AppellateCourtCasesController extends Controller
{

    public function appellate_court_cases()
    {
        $court = SetupCourt::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Appellate Court Division', 'delete_status' => 0])->get();

        $data = DB::table('appellate_court_cases')
                    ->leftJoin('setup_case_categories','appellate_court_cases.case_category_id','setup_case_categories.id')
                    ->leftJoin('setup_case_subcategories','appellate_court_cases.case_subcategory_id','setup_case_subcategories.id')
                    ->select('appellate_court_cases.*','setup_case_categories.case_category','setup_case_subcategories.case_subcategory')
                    ->get();

//        $data = AppellateCourtCase::all();

//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();

        return view('litigation_management.cases.appellate_court_cases.appellate_court_cases', compact('data', 'court', 'case_category'));
    }

    public function add_appellate_court_cases()
    {

        $law_section = SetupLawSection::where('delete_status', 0)->get();
        $court = SetupCourt::where(['case_type' => 'Appellate Court Division','delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
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
        $case_class = SetupCaseClass::where('delete_status', 0)->get();
        $section = SetupSection::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Appellate Court Division', 'delete_status' => 0])->get();
        $law = SetupLaw::where(['case_type' => 'Appellate Court Division','delete_status' => 0])->get();

//     $supreme_court_category = json_decode(json_encode($supreme_court_category));
//     echo "<pre>";print_r($supreme_court_category);die();

        return view('litigation_management.cases.appellate_court_cases.add_appellate_court_cases', compact('person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law_section', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'case_category','section','case_class','law'));
    }

    public function save_appellate_court_cases(Request $request)
    {
//            dd($request->all());


//        $data = json_decode(json_encode($request->all()));
//        echo "<pre>";print_r($data);die();

//        $rules = [
//            'case_no_acd' => 'required|unique:appellate_court_cases',
//        ];
//
//        $validMsg = [
//            'case_no_acd.required' => 'Case No. field is required.',
//        ];
//
//        $this->validate($request, $rules, $validMsg);

        DB::beginTransaction();

        $data = new AppellateCourtCase();

        if ($request->lower_court == "Lower Court") {
            $data->lower_court = "Yes";
        } else {
            $data->lower_court = "No";
        }

        $data->case_no =  $request->case_no;
        $data->division_id =  $request->division_id;
        $data->district_id =  $request->district_id;
        $data->thana_id =  $request->thana_id;
        $data->case_class_id =  $request->case_class_id;
        $data->case_type_id =  $request->case_type_id;
        $data->law_id =  $request->law_id;
        $data->relevant_law_id =  $request->relevant_law_id;
        $data->relevant_sections_id =  $request->relevant_sections_id;
        $data->section_id =  $request->section_id;
        $data->date_of_filing =  $request->date_of_filing;
        $data->plaintiff_name =  $request->plaintiff_name;
        $data->plaintiff_designaiton_id =  $request->plaintiff_designaiton_id;
        $data->plaintiff_contact_number =  $request->plaintiff_contact_number;
        $data->name_of_the_complainant =  $request->name_of_the_complainant;
        $data->complainant_contact_no =  $request->complainant_contact_no;
        $data->complainant_designation_id =  $request->complainant_designation_id;
        $data->accused_name =  $request->accused_name;
        $data->accused_company_id =  $request->accused_company_id;
        $data->accused_address =  $request->accused_address;
        $data->accused_contact_no =  $request->accused_contact_no;
        $data->other_claim =  $request->other_claim;
        $data->summary_facts_alligation =  $request->summary_facts_alligation;
        $data->trial_court_id =  $request->trial_court_id;
        $data->trial_court_judgement_date =  $request->trial_court_judgement_date;
        $data->trial_grounds_judgement =  $request->trial_grounds_judgement;
        $data->appeal_court_id =  $request->appeal_court_id;
        $data->appeal_court_judgement_date =  $request->appeal_court_judgement_date;
        $data->appeal_grounds_judgement =  $request->appeal_grounds_judgement;
        $data->appeal_court_judgement =  $request->appeal_court_judgement;
        $data->panel_lawyer_id =  $request->panel_lawyer_id;
        $data->total_legal_bill_amount =  $request->total_legal_bill_amount;
        $data->case_received_lawyer_id =  $request->case_received_lawyer_id;
        $data->case_papers_received =  $request->case_papers_received;
        $data->tadbirkar_details =  $request->tadbirkar_details;
        $data->tender_no =  $request->tender_no;
        $data->tender_no_date =  $request->tender_no_date;
        $data->case_category_id =  $request->case_category_id;
        $data->case_subcategory_id =  $request->case_subcategory_id;
        $data->case_no_acd =  $request->case_no_acd;
        $data->date_of_filing_acd =  $request->date_of_filing_acd;
        $data->acd_court_id =  $request->acd_court_id;
        $data->laws_id =  $request->laws_id;
        $data->sections_id =  $request->sections_id;
        $data->order =  $request->order;
        $data->order_date =  $request->order_date;
        $data->order_no_memo =  $request->order_no_memo;
        $data->appellant_petitioner_name =  $request->appellant_petitioner_name;
        $data->appellant_designation_id =  $request->appellant_designation_id;
        $data->appellant_address =  $request->appellant_address;
        $data->opposite_party_name =  $request->opposite_party_name;
        $data->opposite_party_designation_id =  $request->opposite_party_designation_id;
        $data->opposite_party_address =  $request->opposite_party_address;
        $data->party_steps_taken_id =  $request->party_steps_taken_id;
        $data->case_status_id =  $request->case_status_id;
        $data->fixed_hearing_court_id =  $request->fixed_hearing_court_id;
        $data->court_steps_taken_id =  $request->court_steps_taken_id;
        $data->court_next_steps_date =  $request->court_next_steps_date;
        $data->assigned_lawyer_id =  $request->assigned_lawyer_id;
        $data->documents_lawyers_appointment =  $request->documents_lawyers_appointment;
        $data->documents_sent_to_law_chamber =  $request->documents_sent_to_law_chamber;
        $data->documents_received_field_programe =  $request->documents_received_field_programe;
        $data->missing_documents_evidence =  $request->missing_documents_evidence;
        $data->ground_appeal_revision =  $request->ground_appeal_revision;
        $data->recommendations =  $request->recommendations;
        $data->save();

        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $file) {
                $original_name = $file->getClientOriginalName();
                $name = time() . rand(1, 100) . $original_name;
                $file->move(public_path('files/appellate_court_cases'), $name);

                $file = new AppellateCourtCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->save();
            }
        }

        DB::commit();

        session()->flash('success', 'Appellate Court Cases Added Successfully');
        return redirect()->route('appellate-court-cases');

    }

    public function edit_appellate_court_cases($id)
    {
        $law = SetupLaw::where(['case_type' => 'Appellate Court Division', 'delete_status' => 0])->get();
        $court = SetupCourt::where(['case_type' => 'Appellate Court Division', 'delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Appellate Court Division', 'delete_status' => 0])->get();
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
        $data = AppellateCourtCase::find($id);
        $existing_district = SetupDistrict::where('division_id', $data->division_id)->get();
        $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_name_id)->get();
        $existing_thana = SetupThana::where('district_id', $data->district_id)->get();
        $existing_subcat = SetupCaseSubcategory::where('case_category_id', $data->case_category_id)->get();
        $case_class = SetupCaseClass::where('delete_status', 0)->get();
        $section = SetupSection::where('delete_status', 0)->get();

        return view('litigation_management.cases.appellate_court_cases.edit_appellate_court_cases', compact('data', 'existing_district', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'next_date_reason', 'next_date_reason', 'last_court_order', 'zone', 'area', 'branch', 'program', 'property_type', 'case_types', 'company', 'internal_council', 'existing_ext_coun_associates', 'case_category','existing_thana', 'existing_subcat','case_class', 'law', 'section'));
    }

    public function update_appellate_court_cases(Request $request, $id)
    {
        //    dd($request->all());

        DB::beginTransaction();

        $data = AppellateCourtCase::find($id);



        if ($request->lower_court == "Lower Court") {
            $data->lower_court = "Yes";
            $data->case_no =  $request->case_no;
            $data->division_id =  $request->division_id;
            $data->district_id =  $request->district_id;
            $data->thana_id =  $request->thana_id;
            $data->case_class_id =  $request->case_class_id;
            $data->case_type_id =  $request->case_type_id;
            $data->law_id =  $request->law_id;
            $data->relevant_law_id =  $request->relevant_law_id;
            $data->relevant_sections_id =  $request->relevant_sections_id;
            $data->section_id =  $request->section_id;
            $data->date_of_filing =  $request->date_of_filing;
            $data->plaintiff_name =  $request->plaintiff_name;
            $data->plaintiff_designaiton_id =  $request->plaintiff_designaiton_id;
            $data->plaintiff_contact_number =  $request->plaintiff_contact_number;
            $data->name_of_the_complainant =  $request->name_of_the_complainant;
            $data->complainant_contact_no =  $request->complainant_contact_no;
            $data->complainant_designation_id =  $request->complainant_designation_id;
            $data->accused_name =  $request->accused_name;
            $data->accused_company_id =  $request->accused_company_id;
            $data->accused_address =  $request->accused_address;
            $data->accused_contact_no =  $request->accused_contact_no;
            $data->other_claim =  $request->other_claim;
            $data->summary_facts_alligation =  $request->summary_facts_alligation;
            $data->trial_court_id =  $request->trial_court_id;
            $data->trial_court_judgement_date =  $request->trial_court_judgement_date;
            $data->trial_grounds_judgement =  $request->trial_grounds_judgement;
            $data->appeal_court_id =  $request->appeal_court_id;
            $data->appeal_court_judgement_date =  $request->appeal_court_judgement_date;
            $data->appeal_grounds_judgement =  $request->appeal_grounds_judgement;
            $data->appeal_court_judgement =  $request->appeal_court_judgement;
            $data->panel_lawyer_id =  $request->panel_lawyer_id;
            $data->total_legal_bill_amount =  $request->total_legal_bill_amount;

        } else {
            $data->lower_court = "No";
            $data->division_id =  null;
            $data->district_id =  null;
            $data->thana_id =  null;
            $data->case_class_id =  null;
            $data->case_type_id =  null;
            $data->law_id =  null;
            $data->relevant_law_id =  null;
            $data->relevant_sections_id =  null;
            $data->section_id =  null;
            $data->date_of_filing =  null;
            $data->plaintiff_name = null;
            $data->plaintiff_designaiton_id =  null;
            $data->plaintiff_contact_number = null;
            $data->name_of_the_complainant =  null;
            $data->complainant_contact_no =  null;
            $data->complainant_designation_id =  null;
            $data->accused_name =  null;
            $data->accused_company_id =  null;
            $data->accused_address =  null;
            $data->accused_contact_no =  null;
            $data->other_claim =  null;
            $data->summary_facts_alligation =  null;
            $data->trial_court_id =  null;
            $data->trial_court_judgement_date =  null;
            $data->trial_grounds_judgement =  null;
            $data->appeal_court_id =  null;
            $data->appeal_court_judgement_date =  null;
            $data->appeal_grounds_judgement =  null;
            $data->appeal_court_judgement =  null;
            $data->panel_lawyer_id =  null;
            $data->total_legal_bill_amount =  null;
        }

        $data->case_received_lawyer_id =  $request->case_received_lawyer_id;
        $data->case_papers_received =  $request->case_papers_received;
        $data->tadbirkar_details =  $request->tadbirkar_details;
        $data->tender_no =  $request->tender_no;
        $data->tender_no_date =  $request->tender_no_date;
        $data->case_category_id =  $request->case_category_id;
        $data->case_subcategory_id =  $request->case_subcategory_id;
        $data->case_no_acd =  $request->case_no_acd;
        $data->date_of_filing_acd =  $request->date_of_filing_acd;
        $data->acd_court_id =  $request->acd_court_id;
        $data->laws_id =  $request->laws_id;
        $data->sections_id =  $request->sections_id;
        $data->order =  $request->order;
        $data->order_date =  $request->order_date;
        $data->order_no_memo =  $request->order_no_memo;
        $data->appellant_petitioner_name =  $request->appellant_petitioner_name;
        $data->appellant_designation_id =  $request->appellant_designation_id;
        $data->appellant_address =  $request->appellant_address;
        $data->opposite_party_name =  $request->opposite_party_name;
        $data->opposite_party_designation_id =  $request->opposite_party_designation_id;
        $data->opposite_party_address =  $request->opposite_party_address;
        $data->party_steps_taken_id =  $request->party_steps_taken_id;
        $data->case_status_id =  $request->case_status_id;
        $data->fixed_hearing_court_id =  $request->fixed_hearing_court_id;
        $data->court_steps_taken_id =  $request->court_steps_taken_id;
        $data->court_next_steps_date =  $request->court_next_steps_date;
        $data->assigned_lawyer_id =  $request->assigned_lawyer_id;
        $data->documents_lawyers_appointment =  $request->documents_lawyers_appointment;
        $data->documents_sent_to_law_chamber =  $request->documents_sent_to_law_chamber;
        $data->documents_received_field_programe =  $request->documents_received_field_programe;
        $data->missing_documents_evidence =  $request->missing_documents_evidence;
        $data->ground_appeal_revision =  $request->ground_appeal_revision;
        $data->recommendations =  $request->recommendations;
        $data->save();




        if ($request->hasfile('uploaded_document')) {
            foreach ($request->file('uploaded_document') as $file) {
                $original_name = $file->getClientOriginalName();
                $name = time() . rand(1, 100) . $original_name;
                $file->move(public_path('files/appellate_court_cases'), $name);

                $file = new AppellateCourtCasesFile();
                $file->case_id = $data->id;
                $file->uploaded_document = $name;
                $file->save();
            }
        }

        DB::commit();

        session()->flash('success', 'Appellate Court Cases Updated Successfully');
        return redirect()->route('appellate-court-cases');

    }

    public function delete_appellate_court_cases($id)
    {
        $data = AppellateCourtCase::find($id);
        if ($data['delete_status'] == 1) {
            $delete_status = 0;
        } else {
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Appellate Court Cases Deleted');
        return redirect()->back();
    }

    public function view_appellate_court_cases($id)
    {
//           dd($id);

//        $data = AppellateCourtCase::find($id);
//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();


        $data = DB::table('appellate_court_cases')
            ->leftJoin('setup_divisions', 'appellate_court_cases.division_id', 'setup_divisions.id')
            ->leftJoin('setup_districts', 'appellate_court_cases.district_id', 'setup_districts.id')
            ->leftJoin('setup_thanas', 'appellate_court_cases.thana_id', 'setup_thanas.id')
            ->leftJoin('setup_case_classes', 'appellate_court_cases.case_class_id', 'setup_case_classes.id')
            ->leftJoin('setup_case_types', 'appellate_court_cases.case_type_id', 'setup_case_types.id')
            ->leftJoin('setup_laws', 'appellate_court_cases.law_id', 'setup_laws.id')
            ->leftJoin('setup_laws as relevant_law', 'appellate_court_cases.relevant_law_id', 'relevant_law.id')
            ->leftJoin('setup_sections as relevant_section', 'appellate_court_cases.relevant_sections_id', 'relevant_section.id')
            ->leftJoin('setup_sections', 'appellate_court_cases.section_id', 'setup_sections.id')
            ->leftJoin('setup_designations', 'appellate_court_cases.plaintiff_designaiton_id', 'setup_designations.id')
            ->leftJoin('setup_designations as complainant_designations', 'appellate_court_cases.complainant_designation_id', 'complainant_designations.id')
            ->leftJoin('setup_companies', 'appellate_court_cases.accused_company_id', 'setup_companies.id')
            ->leftJoin('setup_courts as trial_court', 'appellate_court_cases.trial_court_id', 'trial_court.id')
            ->leftJoin('setup_courts as appeal_court', 'appellate_court_cases.appeal_court_id', 'appeal_court.id')
            ->leftJoin('setup_external_councils as panel_lawyer', 'appellate_court_cases.panel_lawyer_id', 'panel_lawyer.id')
            ->leftJoin('setup_external_councils as case_received_lawyer', 'appellate_court_cases.case_received_lawyer_id', 'case_received_lawyer.id')
            ->leftJoin('setup_case_categories', 'appellate_court_cases.case_category_id', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'appellate_court_cases.case_subcategory_id', 'setup_case_subcategories.id')
            ->leftJoin('setup_courts as acd_court', 'appellate_court_cases.acd_court_id', 'acd_court.id')
            ->leftJoin('setup_laws as law', 'appellate_court_cases.laws_id', 'law.id')
            ->leftJoin('setup_sections as section', 'appellate_court_cases.sections_id', 'section.id')
            ->leftJoin('setup_designations as appellant_designations', 'appellate_court_cases.appellant_designation_id', 'appellant_designations.id')
            ->leftJoin('setup_designations as opposite_designations', 'appellate_court_cases.opposite_party_designation_id', 'opposite_designations.id')
            ->leftJoin('setup_next_date_reasons as steps_taken', 'appellate_court_cases.party_steps_taken_id', 'steps_taken.id')
            ->leftJoin('setup_case_statuses', 'appellate_court_cases.case_status_id', 'setup_case_statuses.id')
            ->leftJoin('setup_courts as fixed_hearing_court', 'appellate_court_cases.fixed_hearing_court_id', 'fixed_hearing_court.id')
            ->leftJoin('setup_next_date_reasons as party_steps_taken', 'appellate_court_cases.party_steps_taken_id', 'party_steps_taken.id')
            ->leftJoin('setup_next_date_reasons as court_steps_taken', 'appellate_court_cases.court_steps_taken_id', 'court_steps_taken.id')
            ->leftJoin('setup_internal_councils', 'appellate_court_cases.assigned_lawyer_id', 'setup_internal_councils.id')
            ->where('appellate_court_cases.id', $id)
            ->select('appellate_court_cases.*',
                'setup_divisions.division_name',
                'setup_districts.district_name',
                'setup_thanas.thana_name',
                'setup_case_classes.case_class_name',
                'setup_case_types.case_types_name',
                'setup_laws.law_name as laws_name',
                'relevant_law.law_name as relevant_law_name',
                'relevant_section.section_name as relevant_section_name',
                'setup_sections.section_name as sections_name',
                'setup_designations.designation_name as plaintiff_designation_name',
                'complainant_designations.designation_name as complainant_designation_name',
                'setup_companies.company_name',
                'trial_court.court_name as trial_court_name',
                'appeal_court.court_name as appeal_court_name',
                'panel_lawyer.first_name as panel_lawyer_first_name',
                'panel_lawyer.middle_name as panel_lawyer_middle_name',
                'panel_lawyer.last_name as panel_lawyer_last_name',
                'case_received_lawyer.first_name as case_received_lawyer_first_name',
                'case_received_lawyer.middle_name as case_received_lawyer_middle_name',
                'case_received_lawyer.last_name as case_received_lawyer_last_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'acd_court.court_name as acd_court_name',
                'law.law_name',
                'section.section_name',
                'appellant_designations.designation_name as appellant_designation_name',
                'opposite_designations.designation_name as opposite_designation_name',
                'steps_taken.next_date_reason_name as party_steps_taken_name',
                'setup_case_statuses.case_status_name',
                'fixed_hearing_court.court_name as fixed_hearing_court_name',
                'party_steps_taken.next_date_reason_name as party_steps_taken_name',
                'court_steps_taken.next_date_reason_name as court_steps_taken_name',
                'setup_internal_councils.first_name as assigned_lawyer_first_name',
                'setup_internal_councils.middle_name as assigned_lawyer_middle_name',
                'setup_internal_councils.last_name as assigned_lawyer_last_name'
            )
            ->first();

//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();


        //   dd($data);
        $appellate_court_cases_files = AppellateCourtCasesFile::where(['case_id' => $id, 'delete_status' => 0])->get();
        //   dd($appellate_court_cases_files);
        $case_logs = DB::table('appellate_court_case_status_logs')
            ->leftJoin('appellate_court_cases', 'appellate_court_case_status_logs.case_id', '=', 'appellate_court_cases.id')
            ->leftJoin('setup_courts', 'appellate_court_case_status_logs.updated_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'appellate_court_case_status_logs.updated_next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_external_councils', 'appellate_court_case_status_logs.updated_panel_lawyer_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_case_statuses', 'appellate_court_case_status_logs.updated_case_status_id', '=', 'setup_case_statuses.id')
            ->select('appellate_court_case_status_logs.*', 'appellate_court_cases.case_no', 'setup_courts.court_name', 'setup_next_date_reasons.next_date_reason_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_case_statuses.case_status_name')
            ->where('appellate_court_case_status_logs.case_id', $id)
            ->get();

        $bill_history = DB::table('case_billings')
            ->leftJoin('setup_bill_types', 'case_billings.bill_type_id', '=', 'setup_bill_types.id')
            ->leftJoin('setup_districts', 'case_billings.district_id', '=', 'setup_districts.id')
            ->leftJoin('setup_external_councils', 'case_billings.panel_lawyer_id', '=', 'setup_external_councils.id')
            ->leftJoin('setup_banks', 'case_billings.bank_id', '=', 'setup_banks.id')
            ->leftJoin('setup_bank_branches', 'case_billings.branch_id', '=', 'setup_bank_branches.id')
            ->leftJoin('setup_digital_payments', 'case_billings.digital_payment_type_id', '=', 'setup_digital_payments.id')
            ->where(['case_billings.case_type' => "Appellate Court Division", 'case_billings.case_no' => $data->case_no, 'case_billings.delete_status' => 0])
            ->select('case_billings.*', 'setup_bill_types.bill_type_name', 'setup_districts.district_name', 'setup_external_councils.first_name', 'setup_external_councils.middle_name', 'setup_external_councils.last_name', 'setup_banks.bank_name', 'setup_bank_branches.bank_branch_name', 'setup_digital_payments.digital_payment_type_name')
            ->get();

        // dd($bill_history);
        return view('litigation_management.cases.appellate_court_cases.view_appellate_court_cases', compact('data', 'appellate_court_cases_files', 'case_logs', 'bill_history'));


    }


    public function download_appellate_court_cases_file($id)
    {
        $files = AppellateCourtCasesFile::where(['id' => $id, 'delete_status' => 0])->firstOrFail();
        $file_path = public_path('/files/appellate_court_cases/' . $files->uploaded_document);
        return response()->download($file_path);
    }

    public function update_appellate_court_cases_status(Request $request, $id)
    {
        // dd($request->all());
        $status = AppellateCourtCase::find($id);
        $status->case_status_id = $request->updated_case_status_id;
        $status->save();

        $data = new AppellateCourtCaseStatusLog();
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
        return redirect()->route('appellate-court-cases');

    }

    public function search_appellate_court_cases(Request $request)
    {

//        dd($request->all());
        $query = DB::table('appellate_court_cases')
            ->leftJoin('setup_case_categories', 'appellate_court_cases.case_category_id', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'appellate_court_cases.case_subcategory_id', 'setup_case_subcategories.id');

        if ($request->case_no_acd) {

            $query2 = $query->where('appellate_court_cases.case_no_acd', 'like', '%' . $request->case_no_acd . '%');

        } else if ($request->tender_no) {

            $query2 = $query->where('appellate_court_cases.tender_no', $request->tender_no);

        } else if ($request->tender_no_date) {

            $query2 = $query->where('appellate_court_cases.tender_no_date', $request->tender_no_date);

        } else if ($request->case_category_id && $request->case_subcategory_id) {

            $query2 = $query->where(['appellate_court_cases.case_category_id' => $request->case_category_id, 'appellate_court_cases.case_subcategory_id' => $request->case_subcategory_id]);

        } else if ($request->case_category_id) {

            $query2 = $query->where('appellate_court_cases.case_category_id', $request->case_category_id);

        } else {

            $query2 = $query;

        }

        $data = $query2->select('appellate_court_cases.*', 'setup_case_categories.case_category', 'setup_case_subcategories.case_subcategory')
            ->get();

        return response()->json([
            'result' => 'appellate_court_cases',
            'data' => $data,
        ]);

    }


}
