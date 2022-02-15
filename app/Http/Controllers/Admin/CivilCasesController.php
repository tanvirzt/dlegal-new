<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CivilCasesFile;
use App\Models\SetupDistrict;
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
use DB;
class CivilCasesController extends Controller
{
    //civil cases setup

  public function civil_cases()
  {
    //   $data = CivilCases::all();

         $data = DB::table('civil_cases')
                ->leftJoin('setup_divisions','civil_cases.division_id', '=', 'setup_divisions.id')
                ->leftJoin('setup_districts','civil_cases.district_id','=','setup_districts.id')
                ->leftJoin('setup_case_statuses','civil_cases.case_status_id','=','setup_case_statuses.id')
                ->leftJoin('setup_case_categories','civil_cases.case_category_nature_id','=','setup_case_categories.id')
                ->leftJoin('setup_courts','civil_cases.name_of_the_court_id','=','setup_courts.id')
                ->leftJoin('setup_companies','civil_cases.company_id','=','setup_companies.id')
                ->select('civil_cases.*','setup_divisions.division_name','setup_districts.district_name','setup_case_statuses.case_status_name','setup_case_categories.case_category_name','setup_courts.court_name','setup_companies.company_name')
                ->get();
        // dd($data);

      return view('litigation_management.cases.civil_cases.civil_cases',compact('data'));
  }

//   public function append_district(Request $request){
//       $div_id = $request->div_id;
//       $district = SetupDistrict::where('id',$div_id)
//           ->get();
//       return response()->json([
//           'district' => $district
//       ]);
//   }

    public function find_district(Request $request)
    {
        $district = SetupDistrict::where('division_id',$request->div_id)->get();
        return response()->json($district);
    }
    
    public function find_associates(Request $request)
    {
        $associates = SetupExternalCouncilAssociate::where('external_council_id',$request->external_council_name_id)->get();
        return response()->json($associates);
    }

  public function add_civil_cases()
  {
     $law_section = SetupLawSection::where('delete_status',0)->get();
     $court = SetupCourt::where('delete_status',0)->get();
     $designation = SetupDesignation::where('delete_status',0)->get();
     $external_council = SetupExternalCouncil::where('delete_status',0)->get();
     $case_category = SetupCaseCategory::where('delete_status',0)->get();
     $case_status = SetupCaseStatus::where('delete_status',0)->get();
     $property_type = SetupPropertyType::where('delete_status',0)->get();
     $division = DB::table("setup_divisions")->get();
     $person_title = SetupPersonTitle::where('delete_status',0)->get();
     $next_date_reason = SetupNextDateReason::where('delete_status',0)->get();
     $case_types = SetupCaseTypes::where('delete_status',0)->get();
    //  $next_date_reason = DB::table('setup_next_date_reasons')->get();
     $company = SetupCompany::where('delete_status',0)->get();
     $zone = SetupRegion::where('delete_status',0)->get();
     $last_court_order = SetupCourtLastOrder::where('delete_status',0)->get();
     $area = SetupArea::where('delete_status',0)->get();
     $internal_council = SetupInternalCouncil::where('delete_status',0)->get();
     return view('litigation_management.cases.civil_cases.add_civil_cases',compact('person_title','division','case_status','case_category','external_council','designation','court','law_section','next_date_reason','next_date_reason','last_court_order','property_type','case_types','company','zone','area','internal_council'));
  }

  public function save_civil_cases(Request $request)
  {
    //   dd($request->all());
     $rules = [
         'case_no' => 'required',
         'date_of_filing' => 'required',
         'district_id' => 'required',
         'case_year' => 'required',
         'ref_no' => 'required',
         'amount' => 'required',
         'location' => 'required',
         'case_status_id' => 'required',
         'property_type_id' => 'required',
         'case_category_nature_id' => 'required',
         'case_type_id' => 'required',
         'name_of_the_court_id' => 'required',
         'external_council_name_id' => 'required',
         'external_council_associates_id' => 'required',
         'relevant_law_sections_id' => 'required',
         'plaintiff_name' => 'required',
         'contact_number' => 'required',
         'plaintiff_designaiton_id' => 'required',
         'next_date' => 'required',
         'plaintiff_contact_number' => 'required',
         'next_date_fixed_id' => 'required',
     ];

     $validMsg = [
         'case_no.required' => 'Case No. field is required',
         'date_of_filing.required' => 'Date of Filing field is required',
         'district_id.required' => 'District field is required',
         'case_year.required' => 'Case Year field is required',
         'ref_no.required' => 'Ref No. Name field is required',
         'amount.required' => 'Amount field is required',
         'location.required' => 'Location field is required',
         'case_status_id.required' => 'Case Status field is required',
         'property_type_id.required' => 'Property Type field is required',
         'case_category_nature_id.required' => 'Case Category Nature field is required',
         'case_type_id.required' => 'Case Type field is required',
         'name_of_the_court_id.required' => 'Name of the Court field is required',
         'external_council_name_id.required' => 'External Council Name field is required',
         'defendent_address.required' => 'Defendent Address field is required',
         'external_council_associates_id.required' => 'External Council Associates field is required',
         'relevant_law_sections_id.required' => 'Relevant Law Sections field is required',
         'plaintiff_name.required' => 'Plaintiff Name field is required',
         'contact_number.required' => 'Contact Number field is required',
         'plaintiff_designaiton_id.required' => 'Plaintiff Designation field is required',
         'next_date.required' => 'Next Date field is required',
         'plaintiff_contact_number.required' => 'Plaintiff Contact Number field is required',
         'next_date_fixed_id.required' => 'Next Date Fixed field is required',
     ];

     $this->validate($request, $rules, $validMsg);

      $data = new CivilCases();
      $data->case_no = $request->case_no;
      $data->date_of_filing = $request->date_of_filing;
      $data->division_id = $request->division_id;
      $data->case_year = $request->case_year;
      $data->district_id = $request->district_id;
      $data->ref_no = $request->ref_no;
      $data->amount = $request->amount;
      $data->location = $request->location;
      $data->case_status_id = $request->case_status_id;
      $data->property_type_id = $request->property_type_id;
      $data->case_category_nature_id = $request->case_category_nature_id;
      $data->case_type_id = $request->case_type_id;
      $data->name_of_the_court_id = $request->name_of_the_court_id;
      $data->external_council_name_id = $request->external_council_name_id;
      $data->external_council_associates_id = $request->external_council_associates_id;
      $data->relevant_law_sections_id = $request->relevant_law_sections_id;
      $data->plaintiff_name = $request->plaintiff_name;
      $data->contact_number = $request->contact_number;
      $data->plaintiff_designaiton_id = $request->plaintiff_designaiton_id;
      $data->next_date = $request->next_date;
      $data->plaintiff_contact_number = $request->plaintiff_contact_number;
      $data->next_date_fixed_id = $request->next_date_fixed_id;
      $data->company_id = $request->company_id;
      $data->zone_id = $request->zone_id;
      $data->area_id = $request->area_id;
      $data->subsequent_plaintiff_name = $request->subsequent_plaintiff_name;
      $data->name_of_suit = $request->name_of_suit;
      $data->defendent_name = $request->defendent_name;
      $data->defendent_address = $request->defendent_address;
      $data->defendent_company_id = $request->defendent_company_id;
      $data->last_order_court_id = $request->last_order_court_id;
      $data->date_of_incident = $request->date_of_incident;
      $data->date_of_incident_to = $request->date_of_incident_to;
      $data->additional_order = $request->additional_order;
      $data->first_identification_person = $request->first_identification_person;
      $data->disbursement_date = $request->disbursement_date;
      $data->date_of_identification = $request->date_of_identification;
      $data->date_of_cash_receipt = $request->date_of_cash_receipt;
      $data->case_notes = $request->case_notes;
      $data->date_of_disposed = $request->date_of_disposed;
      $data->power_of_attorny = $request->power_of_attorny;
      $data->total_legal_bill_amount_cost = $request->total_legal_bill_amount_cost;
      $data->panel_lawyer_id = $request->panel_lawyer_id;
      $data->assigned_lawyer_id = $request->assigned_lawyer_id;
      $data->notes = $request->notes;
      $data->other_claim = $request->other_claim;
      $data->summary_facts_alligation = $request->summary_facts_alligation;
      $data->missing_documents_evidence_information = $request->missing_documents_evidence_information;
      $data->comments = $request->comments;
      $data->save();

      if($request->hasfile('uploaded_document'))
      {
          foreach($request->file('uploaded_document') as $file)
          {
              $original_name = $file->getClientOriginalName();
              $name = time().rand(1,100).$original_name;
              $file->move(public_path('files/civil_cases'), $name);

              $file= new CivilCasesFile();
              $file->case_id = $data->id;
              $file->uploaded_document = $name;
              $file->save();
          }
      }

      session()->flash('success','Civil Cases Added Successfully');
      return redirect()->back();

  }

  public function edit_civil_cases($id)
  {
    $law_section = SetupLawSection::where('delete_status',0)->get();
    $court = SetupCourt::where('delete_status',0)->get();
    $designation = SetupDesignation::where('delete_status',0)->get();
    $external_council = SetupExternalCouncil::where('delete_status',0)->get();
    $case_category = SetupCaseCategory::where('delete_status',0)->get();
    $case_status = SetupCaseStatus::where('delete_status',0)->get();
    $property_type = SetupPropertyType::where('delete_status',0)->get();
    $division = DB::table("setup_divisions")->get();
    $person_title = SetupPersonTitle::where('delete_status',0)->get();
    $next_date_reason = SetupNextDateReason::where('delete_status',0)->get();
    $case_types = SetupCaseTypes::where('delete_status',0)->get();
    $company = SetupCompany::where('delete_status',0)->get();
    $zone = SetupRegion::where('delete_status',0)->get();
    $last_court_order = SetupCourtLastOrder::where('delete_status',0)->get();
    $area = SetupArea::where('delete_status',0)->get();
    $internal_council = SetupInternalCouncil::where('delete_status',0)->get();
    $data = CivilCases::find($id);
    $existing_district = SetupDistrict::where('division_id', $data->division_id)->get();
    $existing_ext_coun_associates = SetupExternalCouncilAssociate::where('id', $data->external_council_associates_id)->get();
    // dd($existing_district);
    return view('litigation_management.cases.civil_cases.edit_civil_cases',compact('data','person_title','division','case_status','case_category','external_council','designation','court','law_section','next_date_reason','next_date_reason','last_court_order','property_type','case_types','company','zone','area','internal_council','existing_district','existing_ext_coun_associates'));
  }

  public function update_civil_cases(Request $request, $id)
  {
    $rules = [
        'case_no' => 'required',
        'date_of_filing' => 'required',
        'district_id' => 'required',
        'case_year' => 'required',
        'ref_no' => 'required',
        'amount' => 'required',
        'location' => 'required',
        'case_status_id' => 'required',
        'property_type_id' => 'required',
        'case_category_nature_id' => 'required',
        'case_type_id' => 'required',
        'name_of_the_court_id' => 'required',
        'external_council_name_id' => 'required',
        'external_council_associates_id' => 'required',
        'relevant_law_sections_id' => 'required',
        'plaintiff_name' => 'required',
        'contact_number' => 'required',
        'plaintiff_designaiton_id' => 'required',
        'next_date' => 'required',
        'plaintiff_contact_number' => 'required',
        'next_date_fixed_id' => 'required',
    ];

    $validMsg = [
        'case_no.required' => 'Case No. field is required',
        'date_of_filing.required' => 'Date of Filing field is required',
        'district_id.required' => 'District field is required',
        'case_year.required' => 'Case Year field is required',
        'ref_no.required' => 'Ref No. Name field is required',
        'amount.required' => 'Amount field is required',
        'location.required' => 'Location field is required',
        'case_status_id.required' => 'Case Status field is required',
        'property_type_id.required' => 'Property Type field is required',
        'case_category_nature_id.required' => 'Case Category Nature field is required',
        'case_type_id.required' => 'Case Type field is required',
        'name_of_the_court_id.required' => 'Name of the Court field is required',
        'external_council_name_id.required' => 'External Council Name field is required',
        'defendent_address.required' => 'Defendent Address field is required',
        'external_council_associates_id.required' => 'External Council Associates field is required',
        'relevant_law_sections_id.required' => 'Relevant Law Sections field is required',
        'plaintiff_name.required' => 'Plaintiff Name field is required',
        'contact_number.required' => 'Contact Number field is required',
        'plaintiff_designaiton_id.required' => 'Plaintiff Designation field is required',
        'next_date.required' => 'Next Date field is required',
        'plaintiff_contact_number.required' => 'Plaintiff Contact Number field is required',
        'next_date_fixed_id.required' => 'Next Date Fixed field is required',
    ];

    $this->validate($request, $rules, $validMsg);

    
          $data = CivilCases::find($id);
          $data->case_no = $request->case_no;
        $data->date_of_filing = $request->date_of_filing;
        $data->division_id = $request->division_id;
        $data->case_year = $request->case_year;
        $data->district_id = $request->district_id;
        $data->ref_no = $request->ref_no;
        $data->amount = $request->amount;
        $data->location = $request->location;
        $data->case_status_id = $request->case_status_id;
        $data->property_type_id = $request->property_type_id;
        $data->case_category_nature_id = $request->case_category_nature_id;
        $data->case_type_id = $request->case_type_id;
        $data->name_of_the_court_id = $request->name_of_the_court_id;
        $data->external_council_name_id = $request->external_council_name_id;
        $data->external_council_associates_id = $request->external_council_associates_id;
        $data->relevant_law_sections_id = $request->relevant_law_sections_id;
        $data->plaintiff_name = $request->plaintiff_name;
        $data->contact_number = $request->contact_number;
        $data->plaintiff_designaiton_id = $request->plaintiff_designaiton_id;
        $data->next_date = $request->next_date;
        $data->plaintiff_contact_number = $request->plaintiff_contact_number;
        $data->next_date_fixed_id = $request->next_date_fixed_id;
        $data->company_id = $request->company_id;
        $data->zone_id = $request->zone_id;
        $data->area_id = $request->area_id;
        $data->subsequent_plaintiff_name = $request->subsequent_plaintiff_name;
        $data->name_of_suit = $request->name_of_suit;
        $data->defendent_name = $request->defendent_name;
        $data->defendent_address = $request->defendent_address;
        $data->defendent_company_id = $request->defendent_company_id;
        $data->last_order_court_id = $request->last_order_court_id;
        $data->date_of_incident = $request->date_of_incident;
        $data->date_of_incident_to = $request->date_of_incident_to;
        $data->additional_order = $request->additional_order;
        $data->first_identification_person = $request->first_identification_person;
        $data->disbursement_date = $request->disbursement_date;
        $data->date_of_identification = $request->date_of_identification;
        $data->date_of_cash_receipt = $request->date_of_cash_receipt;
        $data->case_notes = $request->case_notes;
        $data->date_of_disposed = $request->date_of_disposed;
        $data->power_of_attorny = $request->power_of_attorny;
        $data->total_legal_bill_amount_cost = $request->total_legal_bill_amount_cost;
        $data->panel_lawyer_id = $request->panel_lawyer_id;
        $data->assigned_lawyer_id = $request->assigned_lawyer_id;
        $data->notes = $request->notes;
        $data->other_claim = $request->other_claim;
        $data->summary_facts_alligation = $request->summary_facts_alligation;
        $data->missing_documents_evidence_information = $request->missing_documents_evidence_information;
        $data->comments = $request->comments;
          $data->save();
    
          if($request->hasfile('uploaded_document'))
          {
              foreach($request->file('uploaded_document') as $file)
              {
                  $original_name = $file->getClientOriginalName();
                  $name = time().rand(1,100).$original_name;
                  $file->move(public_path('files/civil_cases'), $name);
    
                  $file= new CivilCasesFile();
                  $file->case_id = $data->id;
                  $file->uploaded_document = $name;
                  $file->save();
              }
          }
    
          session()->flash('success','Civil Cases Updated Successfully');
          return redirect()->back();
    
      }

  public function delete_civil_cases($id)
  {
      $data = CivilCases::find($id);
      if ($data['delete_status'] == 1){
          $delete_status = 0;
      }else{
          $delete_status = 1;
      }
      $data->delete_status = $delete_status;
      $data->save();

      session()->flash('success', 'External Council Deleted');
      return redirect()->back();
  }

}
