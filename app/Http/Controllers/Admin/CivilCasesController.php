<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

class CivilCasesController extends Controller
{
    //civil cases setup

  public function civil_cases()
  {
      $data = CivilCases::all();
      return view('litigation_management.cases.civil_cases.civil_cases',compact('data'));
  }
 
  public function add_civil_cases()
  {
     $law_section = SetupLawSection::where('delete_status',0)->get();
     $court = SetupCourt::where('delete_status',0)->get();
     $designation = SetupDesignation::where('delete_status',0)->get();
     $external_council = SetupExternalCouncil::where('delete_status',0)->get();
     $case_category = SetupCaseCategory::where('delete_status',0)->get();
     $case_status = SetupCaseStatus::where('delete_status',0)->get();
     $division = SetupDivision::where('delete_status',0)->get();    
     $person_title = SetupPersonTitle::where('delete_status',0)->get();
     return view('litigation_management.cases.civil_cases.add_civil_cases',compact('person_title','division','case_status','case_category','external_council','designation','court','law_section'));
  }
 
  public function save_civil_cases(Request $request)
  {
      
      $rules = [
          'case_no' => 'required',
          'division_id' => 'required',
          'district_id' => 'required',
          'amount' => 'required',
          'case_status_id' => 'required',
          'case_category_nature_id' => 'required',
          'plaintiff_name' => 'required',
          'plaintiff_designaiton_id' => 'required',
          'plaintiff_contact_number' => 'required',
          'subsequent_plaintiff_name' => 'required',
          'last_order_court' => 'required',
          'additional_order' => 'required',
          'disbursement_date' => 'required',
          'last_date_of_cash_receipt' => 'required',
          'date_of_disposed' => 'required',
          'date_of_filing' => 'required',
          'defendent_name' => 'required',
          'defendent_address' => 'required'
      ];
 
      $validMsg = [
          'case_no.required' => 'Case No. field is required',
          'division_id.required' => 'Division field is required',
          'district_id.required' => 'District field is required',
          'amount.required' => 'Amount field is required',
          'case_status_id.required' => 'Case Status field is required',
          'case_category_nature_id.required' => 'Case Category Nature field is required',
          'plaintiff_name.required' => 'Plaintiff Name field is required',
          'plaintiff_designaiton_id.required' => 'Plaintiff Designation field is required',
          'plaintiff_contact_number.required' => 'Plaintiff Contact No. field is required',
          'subsequent_plaintiff_name.required' => 'Subsequent Plaintiff Name field is required',
          'last_order_court.required' => 'Last Order Court field is required',
          'disbursement_date.required' => 'Disbursement Date field is required',
          'last_date_of_cash_receipt.required' => 'Last date of cash receipt field is required',
          'date_of_disposed.required' => 'Date of disposed field is required',
          'date_of_filing.required' => 'Date of filing field is required',
          'defendent_name.required' => 'Defendent Name field is required',
          'defendent_address.required' => 'Defendent Address field is required',
      ];
 
      $this->validate($request, $rules, $validMsg);
 
      
      $data = new CivilCases();
 
      if ($files = $request->file('file')) {
         $names = $files->getClientOriginalName();
         $name = rand(111, 99999).$names;
         $files->move('images/civil_cases/', $name);
        } else {
            $name = "";
        }
 
      $data->case_no = $request->case_no;
      $data->division_id = $request->division_id;
      $data->district_id = $request->district_id;
      $data->amount = $request->amount;
      $data->case_status_id = $request->case_status_id;
      $data->case_category_nature_id = $request->case_category_nature_id;
      $data->external_council_name_id = $request->external_council_name_id;
      $data->plaintiff_name = $request->plaintiff_name;
      $data->plaintiff_designaiton_id = $request->plaintiff_designaiton_id;
      $data->plaintiff_contact_number = $request->plaintiff_contact_number;
      $data->subsequent_plaintiff_name = $request->subsequent_plaintiff_name;
      $data->last_order_court = $request->last_order_court;
      $data->additional_order = $request->additional_order;
      $data->disbursement_date = $request->disbursement_date;
      $data->last_date_of_cash_receipt = $request->last_date_of_cash_receipt;
      $data->date_of_disposed = $request->date_of_disposed;
      $data->date_of_filing = $request->date_of_filing;
      $data->defendent_name = $request->defendent_name;
      $data->defendent_address = $request->defendent_address;
      $data->defendent_contact_no = $request->defendent_contact_no;
      $data->date_of_cash_received = $request->date_of_cash_received;
      $data->case_year = $request->case_year;
      $data->ref_no = $request->ref_no;
      $data->location = $request->location;
      $data->property_type = $request->property_type;
      $data->name_of_the_court_id = $request->name_of_the_court_id;
      $data->relevant_law_sections_id = $request->relevant_law_sections_id;
      $data->contact_no = $request->contact_no;
      $data->next_date = $request->next_date;
      $data->next_date_fixed_id = $request->next_date_fixed_id;
      $data->name_of_suit = $request->name_of_suit;
      $data->date_of_incident = $request->date_of_incident;
      $data->date_of_incident_to = $request->date_of_incident_to;
      $data->first_identification_person = $request->first_identification_person;
      $data->date_of_identification = $request->date_of_identification;
      $data->case_notes = $request->case_notes;
      $data->document_upload = $name;
      $data->save();
 
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
    $division = SetupDivision::where('delete_status',0)->get();    
    $person_title = SetupPersonTitle::where('delete_status',0)->get();  
      $data = CivilCases::find($id);
      return view('litigation_management.cases.civil_cases.edit_civil_cases',compact('person_title','division','case_status','case_category','external_council','designation','court','law_section'));
  }
 
  public function update_civil_cases(Request $request, $id)
  {
     $rules = [
          'title_id' => 'required',
          'first_name' => 'required',
          'middle_name' => 'required',
          'last_name' => 'required',
          'email' => 'required',
          'work_phone' => 'required'
      ];
 
      $validMsg = [
          'title_id.required' => 'Title field is required',
          'first_name.required' => 'First Name field is required',
          'middle_name.required' => 'Middle Name field is required',
          'last_name.required' => 'Last Name field is required',
          'email.required' => 'Email field is required',
          'work_phone.required' => 'Work Phone field is required',
      ];
 
      $this->validate($request, $rules, $validMsg);
 
      $data = CivilCases::find($id);
      $data->title_id = $request->title_id;
      $data->first_name = $request->first_name;
      $data->middle_name = $request->middle_name;
      $data->last_name = $request->last_name;
      $data->email = $request->email;
      $data->work_phone = $request->work_phone;
      $data->home_phone = $request->home_phone;
      $data->mobile_phone = $request->mobile_phone;
      $data->emergency_contact = $request->emergency_contact;
      $data->save();
 
      session()->flash('success','External Council Updated Successfully');
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
