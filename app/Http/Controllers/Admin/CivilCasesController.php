<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CivilCasesFile;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupClientCategory;
use App\Models\SetupClientSubcategory;
use App\Models\SetupDistrict;
use App\Models\SetupLaw;
use App\Models\SetupNextDayPresence;
use App\Models\SetupSection;
use App\Models\SetupThana;
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
        $case_category = SetupCaseCategory::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();

        $data = DB::table('civil_cases')
            ->select('civil_cases.*')
            ->get();

//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();

        return view('litigation_management.cases.civil_cases.civil_cases', compact('data', 'case_types', 'division', 'court', 'case_category'));
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
        $law = SetupLaw::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
        $court = SetupCourt::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
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
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();

        return view('litigation_management.cases.civil_cases.add_civil_cases', compact('person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'property_type', 'case_types', 'company', 'zone', 'area', 'internal_council', 'client_category', 'section', 'next_day_presence'));
    }

    public function save_civil_cases(Request $request)
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


//        $data = json_decode(json_encode($request->all()));
//        echo "<pre>";print_r($data);die();


        DB::beginTransaction();

        $data = new CivilCases();

        $data->appeal_case = $request->appeal_case;
        $data->revision_case = $request->revision_case;
        $data->client = $request->client;
        $data->case_no = $request->case_no;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->next_date = $request->next_date;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->in_favour_of = $request->in_favour_of;
        $data->received_date = $request->received_date;
        $data->received_from = $request->received_from;
        $data->mode_of_receipt = $request->mode_of_receipt;
        $data->receiver_contact_details = $request->receiver_contact_details;
        $data->received_by = $request->received_by;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->client_name = $request->client_name;
        $data->client_address = $request->client_address;
        $data->client_division_id = $request->client_division_id;
        $data->client_district_id = $request->client_district_id;
        $data->client_thana_id = $request->client_thana_id;
        $data->received_documents = $request->received_documents;
        $data->required_missing_documents = $request->required_missing_documents;
        $data->update_case_status_id = $request->update_case_status_id;
        $data->update_next_date = $request->update_next_date;
        $data->update_next_date_fixed_id = $request->update_next_date_fixed_id;
        $data->case_proceedings = $request->case_proceedings;
        $data->update_case_notes = $request->update_case_notes;
        $data->next_day_presence_id = $request->next_day_presence_id;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->case_infos_case_no = $request->case_infos_case_no;
        $data->name_of_the_court = $request->name_of_the_court;
        $data->date_of_filing = $request->date_of_filing;
        $data->law = $request->law;
        $data->section = $request->section;
        $data->case_infos_division_id = $request->case_infos_division_id;
        $data->case_infos_district_id = $request->case_infos_district_id;
        $data->case_infos_thana_id = $request->case_infos_thana_id;
        $data->allegation_claim = $request->allegation_claim;
        $data->amount_of_money = $request->amount_of_money;
        $data->another_claim = $request->another_claim;
        $data->summary_facts = $request->summary_facts;
        $data->plaintiff_name = $request->plaintiff_name;
        $data->representative_name = $request->representative_name;
        $data->representative_details = $request->representative_details;
        $data->defendant_name = $request->defendant_name;
        $data->defendant_representative_name = $request->defendant_representative_name;
        $data->defendant_representative_details = $request->defendant_representative_details;
        $data->advocate_name = $request->advocate_name;
        $data->assigned_lawyer = $request->assigned_lawyer;
        $data->case_status_id = $request->case_status_id;
        $data->status_next_date = $request->status_next_date;
        $data->status_next_date_fixed_id = $request->status_next_date_fixed_id;
        $data->comments = $request->comments;
        $data->appeal_original_case_no = $request->appeal_original_case_no;
        $data->appeal_subsequent_case_no = $request->appeal_subsequent_case_no;
        $data->appeal_date_of_judgement_order = $request->appeal_date_of_judgement_order;
        $data->appeal_summary_of_judgement_order = $request->appeal_summary_of_judgement_order;
        $data->appeal_case_category_id = $request->appeal_case_category_id;
        $data->appeal_case_subcategory_id = $request->appeal_case_subcategory_id;
        $data->appeal_case_type_id = $request->appeal_case_type_id;
        $data->appeal_case_no = $request->appeal_case_no;
        $data->appellate_filing_court = $request->appellate_filing_court;
        $data->appeal_date_of_filing = $request->appeal_date_of_filing;
        $data->appeal_law = $request->appeal_law;
        $data->appeal_section = $request->appeal_section;
        $data->appeal_allegation_claim = $request->appeal_allegation_claim;
        $data->appeal_amount_of_money = $request->appeal_amount_of_money;
        $data->appeal_another_claim = $request->appeal_another_claim;
        $data->appeal_summary_facts = $request->appeal_summary_facts;
        $data->appeal_name_of_the_appellant = $request->appeal_name_of_the_appellant;
        $data->appeal_representative = $request->appeal_representative;
        $data->appeal_representative_details = $request->appeal_representative_details;
        $data->appeal_respondent_opposite_party = $request->appeal_respondent_opposite_party;
        $data->appeal_opposite_representative = $request->appeal_opposite_representative;
        $data->appeal_opposite_representative_details = $request->appeal_opposite_representative_details;
        $data->revision_original_case_no = $request->revision_original_case_no;
        $data->revision_subsequent_case_no = $request->revision_subsequent_case_no;
        $data->revision_date_of_judgement_order = $request->revision_date_of_judgement_order;
        $data->revision_summary_of_judgement_order = $request->revision_summary_of_judgement_order;
        $data->revision_appeal_case_category_id = $request->revision_appeal_case_category_id;
        $data->revision_case_subcategory_id = $request->revision_case_subcategory_id;
        $data->revision_case_type_id = $request->revision_case_type_id;
        $data->revision_case_no = $request->revision_case_no;
        $data->revision_filing_court = $request->revision_filing_court;
        $data->revision_date_of_filing = $request->revision_date_of_filing;
        $data->revision_law = $request->revision_law;
        $data->revision_section = $request->revision_section;
        $data->revision_allegation_claim = $request->revision_allegation_claim;
        $data->revision_amount_of_money = $request->revision_amount_of_money;
        $data->revision_another_claim = $request->revision_another_claim;
        $data->revision_summary_facts = $request->revision_summary_facts;
        $data->revision_name_of_the_appellant = $request->revision_name_of_the_appellant;
        $data->revision_representative = $request->revision_representative;
        $data->revision_representative_details = $request->revision_representative_details;
        $data->revision_respondent_opposite_party = $request->revision_respondent_opposite_party;
        $data->revision_opposite_representative = $request->revision_opposite_representative;
        $data->revision_opposite_representative_details = $request->revision_opposite_representative_details;

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
        $law = SetupLaw::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
        $court = SetupCourt::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
        $designation = SetupDesignation::where('delete_status', 0)->get();
        $external_council = SetupExternalCouncil::where('delete_status', 0)->get();
        $case_category = SetupCaseCategory::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->get();
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
        $existing_client_district = SetupDistrict::where('division_id', $data->client_division_id)->get();
        $existing_client_thana = SetupThana::where('district_id', $data->client_district_id)->get();
        $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('external_council_id', $data->external_council_associates_id)->get();
        $client_category = SetupClientCategory::where('delete_status', 0)->get();
        $existing_client_subcategory = SetupClientSubcategory::where(['client_category_id' => $data->client_category_id, 'delete_status' => 0])->get();
        $existing_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->case_category_id, 'delete_status' => 0])->get();
        $section = SetupSection::where('delete_status', 0)->get();

        $existing_case_info_district = SetupDistrict::where('division_id', $data->case_infos_division_id)->get();
        $existing_case_info_client_thana = SetupThana::where('district_id', $data->case_infos_district_id)->get();
        $next_day_presence = SetupNextDayPresence::where('delete_status', 0)->get();
        $existing_appeal_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->appeal_case_category_id, 'delete_status' => 0])->get();
        $existing_revision_case_subcategory = SetupCaseSubcategory::where(['case_category_id' => $data->revision_appeal_case_category_id, 'delete_status' => 0])->get();

//         dd($data);

        return view('litigation_management.cases.civil_cases.edit_civil_cases', compact('data', 'person_title', 'division', 'case_status', 'case_category', 'external_council', 'designation', 'court', 'law', 'next_date_reason', 'next_date_reason', 'last_court_order', 'property_type', 'case_types', 'company', 'zone', 'area', 'internal_council', 'existing_client_district', 'existing_ext_coun_associates', 'client_category', 'existing_client_subcategory', 'existing_case_subcategory', 'section', 'existing_client_thana', 'existing_case_info_district', 'existing_case_info_client_thana', 'next_day_presence', 'existing_appeal_case_subcategory', 'existing_revision_case_subcategory'));
    }

    public function update_civil_cases(Request $request, $id)
    {
//        dd($request->all());

        DB::beginTransaction();

        $data = CivilCases::find($id);

        $data->appeal_case = $request->appeal_case;
        $data->revision_case = $request->revision_case;
        $data->client = $request->client;
        $data->case_no = $request->case_no;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->next_date = $request->next_date;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->in_favour_of = $request->in_favour_of;
        $data->received_date = $request->received_date;
        $data->received_from = $request->received_from;
        $data->mode_of_receipt = $request->mode_of_receipt;
        $data->receiver_contact_details = $request->receiver_contact_details;
        $data->received_by = $request->received_by;
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_id = $request->client_subcategory_id;
        $data->client_name = $request->client_name;
        $data->client_address = $request->client_address;
        $data->client_division_id = $request->client_division_id;
        $data->client_district_id = $request->client_district_id;
        $data->client_thana_id = $request->client_thana_id;
        $data->received_documents = $request->received_documents;
        $data->required_missing_documents = $request->required_missing_documents;
        $data->update_case_status_id = $request->update_case_status_id;
        $data->update_next_date = $request->update_next_date;
        $data->update_next_date_fixed_id = $request->update_next_date_fixed_id;
        $data->case_proceedings = $request->case_proceedings;
        $data->update_case_notes = $request->update_case_notes;
        $data->next_day_presence_id = $request->next_day_presence_id;
        $data->case_category_id = $request->case_category_id;
        $data->case_subcategory_id = $request->case_subcategory_id;
        $data->case_type_id = $request->case_type_id;
        $data->case_infos_case_no = $request->case_infos_case_no;
        $data->name_of_the_court = $request->name_of_the_court;
        $data->date_of_filing = $request->date_of_filing;
        $data->law = $request->law;
        $data->section = $request->section;
        $data->case_infos_division_id = $request->case_infos_division_id;
        $data->case_infos_district_id = $request->case_infos_district_id;
        $data->case_infos_thana_id = $request->case_infos_thana_id;
        $data->allegation_claim = $request->allegation_claim;
        $data->amount_of_money = $request->amount_of_money;
        $data->another_claim = $request->another_claim;
        $data->summary_facts = $request->summary_facts;
        $data->plaintiff_name = $request->plaintiff_name;
        $data->representative_name = $request->representative_name;
        $data->representative_details = $request->representative_details;
        $data->defendant_name = $request->defendant_name;
        $data->defendant_representative_name = $request->defendant_representative_name;
        $data->defendant_representative_details = $request->defendant_representative_details;
        $data->advocate_name = $request->advocate_name;
        $data->assigned_lawyer = $request->assigned_lawyer;
        $data->case_status_id = $request->case_status_id;
        $data->status_next_date = $request->status_next_date;
        $data->status_next_date_fixed_id = $request->status_next_date_fixed_id;
        $data->comments = $request->comments;

        if ($request->appeal_case && $request->revision_case) {

            $data->appeal_original_case_no = $request->appeal_original_case_no;
            $data->appeal_subsequent_case_no = $request->appeal_subsequent_case_no;
            $data->appeal_date_of_judgement_order = $request->appeal_date_of_judgement_order;
            $data->appeal_summary_of_judgement_order = $request->appeal_summary_of_judgement_order;
            $data->appeal_case_category_id = $request->appeal_case_category_id;
            $data->appeal_case_subcategory_id = $request->appeal_case_subcategory_id;
            $data->appeal_case_type_id = $request->appeal_case_type_id;
            $data->appeal_case_no = $request->appeal_case_no;
            $data->appellate_filing_court = $request->appellate_filing_court;
            $data->appeal_date_of_filing = $request->appeal_date_of_filing;
            $data->appeal_law = $request->appeal_law;
            $data->appeal_section = $request->appeal_section;
            $data->appeal_allegation_claim = $request->appeal_allegation_claim;
            $data->appeal_amount_of_money = $request->appeal_amount_of_money;
            $data->appeal_another_claim = $request->appeal_another_claim;
            $data->appeal_summary_facts = $request->appeal_summary_facts;
            $data->appeal_name_of_the_appellant = $request->appeal_name_of_the_appellant;
            $data->appeal_representative = $request->appeal_representative;
            $data->appeal_representative_details = $request->appeal_representative_details;
            $data->appeal_respondent_opposite_party = $request->appeal_respondent_opposite_party;
            $data->appeal_opposite_representative = $request->appeal_opposite_representative;
            $data->appeal_opposite_representative_details = $request->appeal_opposite_representative_details;

            $data->revision_original_case_no = $request->revision_original_case_no;
            $data->revision_subsequent_case_no = $request->revision_subsequent_case_no;
            $data->revision_date_of_judgement_order = $request->revision_date_of_judgement_order;
            $data->revision_summary_of_judgement_order = $request->revision_summary_of_judgement_order;
            $data->revision_appeal_case_category_id = $request->revision_appeal_case_category_id;
            $data->revision_case_subcategory_id = $request->revision_case_subcategory_id;
            $data->revision_case_type_id = $request->revision_case_type_id;
            $data->revision_case_no = $request->revision_case_no;
            $data->revision_filing_court = $request->revision_filing_court;
            $data->revision_date_of_filing = $request->revision_date_of_filing;
            $data->revision_law = $request->revision_law;
            $data->revision_section = $request->revision_section;
            $data->revision_allegation_claim = $request->revision_allegation_claim;
            $data->revision_amount_of_money = $request->revision_amount_of_money;
            $data->revision_another_claim = $request->revision_another_claim;
            $data->revision_summary_facts = $request->revision_summary_facts;
            $data->revision_name_of_the_appellant = $request->revision_name_of_the_appellant;
            $data->revision_representative = $request->revision_representative;
            $data->revision_representative_details = $request->revision_representative_details;
            $data->revision_respondent_opposite_party = $request->revision_respondent_opposite_party;
            $data->revision_opposite_representative = $request->revision_opposite_representative;
            $data->revision_opposite_representative_details = $request->revision_opposite_representative_details;

        }elseif ($request->appeal_case) {

            $data->appeal_original_case_no = $request->appeal_original_case_no;
            $data->appeal_subsequent_case_no = $request->appeal_subsequent_case_no;
            $data->appeal_date_of_judgement_order = $request->appeal_date_of_judgement_order;
            $data->appeal_summary_of_judgement_order = $request->appeal_summary_of_judgement_order;
            $data->appeal_case_category_id = $request->appeal_case_category_id;
            $data->appeal_case_subcategory_id = $request->appeal_case_subcategory_id;
            $data->appeal_case_type_id = $request->appeal_case_type_id;
            $data->appeal_case_no = $request->appeal_case_no;
            $data->appellate_filing_court = $request->appellate_filing_court;
            $data->appeal_date_of_filing = $request->appeal_date_of_filing;
            $data->appeal_law = $request->appeal_law;
            $data->appeal_section = $request->appeal_section;
            $data->appeal_allegation_claim = $request->appeal_allegation_claim;
            $data->appeal_amount_of_money = $request->appeal_amount_of_money;
            $data->appeal_another_claim = $request->appeal_another_claim;
            $data->appeal_summary_facts = $request->appeal_summary_facts;
            $data->appeal_name_of_the_appellant = $request->appeal_name_of_the_appellant;
            $data->appeal_representative = $request->appeal_representative;
            $data->appeal_representative_details = $request->appeal_representative_details;
            $data->appeal_respondent_opposite_party = $request->appeal_respondent_opposite_party;
            $data->appeal_opposite_representative = $request->appeal_opposite_representative;
            $data->appeal_opposite_representative_details = $request->appeal_opposite_representative_details;

            $data->revision_original_case_no = null;
            $data->revision_subsequent_case_no = null;
            $data->revision_date_of_judgement_order = null;
            $data->revision_summary_of_judgement_order = null;
            $data->revision_appeal_case_category_id = null;
            $data->revision_case_subcategory_id = null;
            $data->revision_case_type_id = null;
            $data->revision_case_no = null;
            $data->revision_filing_court = null;
            $data->revision_date_of_filing = null;
            $data->revision_law = null;
            $data->revision_section = null;
            $data->revision_allegation_claim = null;
            $data->revision_amount_of_money = null;
            $data->revision_another_claim = null;
            $data->revision_summary_facts = null;
            $data->revision_name_of_the_appellant = null;
            $data->revision_representative = null;
            $data->revision_representative_details = null;
            $data->revision_respondent_opposite_party = null;
            $data->revision_opposite_representative = null;
            $data->revision_opposite_representative_details = null;

        } elseif ($request->revision_case) {

            $data->appeal_original_case_no = null;
            $data->appeal_subsequent_case_no = null;
            $data->appeal_date_of_judgement_order = null;
            $data->appeal_summary_of_judgement_order = null;
            $data->appeal_case_category_id = null;
            $data->appeal_case_subcategory_id = null;
            $data->appeal_case_type_id = null;
            $data->appeal_case_no = null;
            $data->appellate_filing_court = null;
            $data->appeal_date_of_filing = null;
            $data->appeal_law = null;
            $data->appeal_section = null;
            $data->appeal_allegation_claim = null;
            $data->appeal_amount_of_money = null;
            $data->appeal_another_claim = null;
            $data->appeal_summary_facts = null;
            $data->appeal_name_of_the_appellant = null;
            $data->appeal_representative = null;
            $data->appeal_representative_details = null;
            $data->appeal_respondent_opposite_party = null;
            $data->appeal_opposite_representative = null;
            $data->appeal_opposite_representative_details = null;

            $data->revision_original_case_no = $request->revision_original_case_no;
            $data->revision_subsequent_case_no = $request->revision_subsequent_case_no;
            $data->revision_date_of_judgement_order = $request->revision_date_of_judgement_order;
            $data->revision_summary_of_judgement_order = $request->revision_summary_of_judgement_order;
            $data->revision_appeal_case_category_id = $request->revision_appeal_case_category_id;
            $data->revision_case_subcategory_id = $request->revision_case_subcategory_id;
            $data->revision_case_type_id = $request->revision_case_type_id;
            $data->revision_case_no = $request->revision_case_no;
            $data->revision_filing_court = $request->revision_filing_court;
            $data->revision_date_of_filing = $request->revision_date_of_filing;
            $data->revision_law = $request->revision_law;
            $data->revision_section = $request->revision_section;
            $data->revision_allegation_claim = $request->revision_allegation_claim;
            $data->revision_amount_of_money = $request->revision_amount_of_money;
            $data->revision_another_claim = $request->revision_another_claim;
            $data->revision_summary_facts = $request->revision_summary_facts;
            $data->revision_name_of_the_appellant = $request->revision_name_of_the_appellant;
            $data->revision_representative = $request->revision_representative;
            $data->revision_representative_details = $request->revision_representative_details;
            $data->revision_respondent_opposite_party = $request->revision_respondent_opposite_party;
            $data->revision_opposite_representative = $request->revision_opposite_representative;
            $data->revision_opposite_representative_details = $request->revision_opposite_representative_details;

        }else{

            $data->appeal_original_case_no = null;
            $data->appeal_subsequent_case_no = null;
            $data->appeal_date_of_judgement_order = null;
            $data->appeal_summary_of_judgement_order = null;
            $data->appeal_case_category_id = null;
            $data->appeal_case_subcategory_id = null;
            $data->appeal_case_type_id = null;
            $data->appeal_case_no = null;
            $data->appellate_filing_court = null;
            $data->appeal_date_of_filing = null;
            $data->appeal_law = null;
            $data->appeal_section = null;
            $data->appeal_allegation_claim = null;
            $data->appeal_amount_of_money = null;
            $data->appeal_another_claim = null;
            $data->appeal_summary_facts = null;
            $data->appeal_name_of_the_appellant = null;
            $data->appeal_representative = null;
            $data->appeal_representative_details = null;
            $data->appeal_respondent_opposite_party = null;
            $data->appeal_opposite_representative = null;
            $data->appeal_opposite_representative_details = null;

            $data->revision_original_case_no = null;
            $data->revision_subsequent_case_no = null;
            $data->revision_date_of_judgement_order = null;
            $data->revision_summary_of_judgement_order = null;
            $data->revision_appeal_case_category_id = null;
            $data->revision_case_subcategory_id = null;
            $data->revision_case_type_id = null;
            $data->revision_case_no = null;
            $data->revision_filing_court = null;
            $data->revision_date_of_filing = null;
            $data->revision_law = null;
            $data->revision_section = null;
            $data->revision_allegation_claim = null;
            $data->revision_amount_of_money = null;
            $data->revision_another_claim = null;
            $data->revision_summary_facts = null;
            $data->revision_name_of_the_appellant = null;
            $data->revision_representative = null;
            $data->revision_representative_details = null;
            $data->revision_respondent_opposite_party = null;
            $data->revision_opposite_representative = null;
            $data->revision_opposite_representative_details = null;
        }


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

//        $data = CivilCases::find($id);
//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();

        $data = DB::table('civil_cases')
            ->leftJoin('setup_courts', 'civil_cases.name_of_the_court_id', '=', 'setup_courts.id')
            ->leftJoin('setup_next_date_reasons', 'civil_cases.next_date_fixed_id', '=', 'setup_next_date_reasons.id')
            ->leftJoin('setup_internal_councils', 'civil_cases.in_favour_of', '=', 'setup_internal_councils.id')
            ->leftJoin('setup_client_categories', 'civil_cases.client_category_id', '=', 'setup_client_categories.id')
            ->leftJoin('setup_client_subcategories', 'civil_cases.client_subcategory_id', '=', 'setup_client_subcategories.id')
            ->leftJoin('setup_divisions as client_division', 'civil_cases.client_division_id', '=', 'client_division.id')
            ->leftJoin('setup_districts as client_district', 'civil_cases.client_district_id', '=', 'client_district.id')
            ->leftJoin('setup_thanas as client_thana', 'civil_cases.client_thana_id', '=', 'client_thana.id')
            ->leftJoin('setup_case_categories', 'civil_cases.case_category_id', '=', 'setup_case_categories.id')
            ->leftJoin('setup_case_subcategories', 'civil_cases.case_subcategory_id', '=', 'setup_case_subcategories.id')
            ->leftJoin('setup_case_types', 'civil_cases.case_type_id', '=', 'setup_case_types.id')
            ->leftJoin('setup_divisions as case_infos_division', 'civil_cases.case_infos_division_id', '=', 'case_infos_division.id')
            ->leftJoin('setup_districts as case_infos_district', 'civil_cases.case_infos_district_id', '=', 'case_infos_district.id')
            ->leftJoin('setup_thanas as case_infos_thana', 'civil_cases.case_infos_thana_id', '=', 'case_infos_thana.id')
            ->leftJoin('setup_case_statuses', 'civil_cases.case_status_id', '=', 'setup_case_statuses.id')
            ->leftJoin('setup_next_date_reasons as status_next_date_reasons', 'civil_cases.status_next_date_fixed_id', '=', 'status_next_date_reasons.id')
            ->leftJoin('setup_case_statuses as update_case_status', 'civil_cases.update_case_status_id', '=', 'update_case_status.id')
            ->leftJoin('setup_next_date_reasons as update_next_date_reasons', 'civil_cases.update_next_date_fixed_id', '=', 'update_next_date_reasons.id')
            ->leftJoin('setup_next_day_presences', 'civil_cases.next_day_presence_id', '=', 'setup_next_day_presences.id')
            ->select('civil_cases.*',
                'setup_courts.court_name',
                'setup_next_date_reasons.next_date_reason_name',
                'setup_internal_councils.first_name as ic_first_name',
                'setup_internal_councils.middle_name as ic_middle_name',
                'setup_internal_councils.last_name as ic_last_name',
                'setup_client_categories.client_category_name',
                'setup_client_subcategories.client_subcategory_name',
                'client_division.division_name as client_division_name',
                'client_district.district_name as client_district_name',
                'client_thana.thana_name as client_thana_name',
                'setup_case_categories.case_category',
                'setup_case_subcategories.case_subcategory',
                'setup_case_types.case_types_name',
                'case_infos_division.division_name as case_infos_division_name',
                'case_infos_district.district_name as case_infos_district_name',
                'case_infos_thana.thana_name as case_infos_thana_name',
                'setup_case_statuses.case_status_name',
                'status_next_date_reasons.next_date_reason_name as status_next_date_reason_name',
                'update_case_status.case_status_name as update_case_status_name',
                'update_next_date_reasons.next_date_reason_name as update_next_date_reason_name',
                'setup_next_day_presences.next_day_presence_name')
            ->where('civil_cases.id', $id)
            ->first();
        // dd($data);

//        $data = json_decode(json_encode($data));
//        echo "<pre>";print_r($data);die();

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
//dd($request->all());
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

        } else if ($request->case_no == null && $request->date_of_filing == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id) {

            // dd('court name');
            $query2 = $query->where(['civil_cases.case_category_id' => $request->case_category_id, 'civil_cases.case_subcategory_id' => $request->case_subcategory_id]);

        } else if ($request->case_no == null && $request->date_of_filing == null && $request->name_of_the_court_id == null && $request->case_category_id && $request->case_subcategory_id == null) {

            // dd('court name');
            $query2 = $query->where('civil_cases.case_category_id', $request->case_category_id);

        } else {
            $query2 = $query;

        }

        $data = $query2->get();

        return response($data);

    }

}
