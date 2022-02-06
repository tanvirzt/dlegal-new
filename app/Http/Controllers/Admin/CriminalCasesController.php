<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CriminalCase;
use App\Models\SetupLawSection;
use App\Models\SetupCourt;
use App\Models\SetupDesignation;
use App\Models\SetupExternalCouncil;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseStatus;
use App\Models\SetupPersonTitle;
use App\Models\SetupNextDateReason;
use App\Models\SetupCourtLastOrder;
use DB;
use Illuminate\Http\Request;

class CriminalCasesController extends Controller
{
    //


  public function criminal_cases()
  {
      $data = CriminalCase::all();
// dd($data);
        //  $data = DB::table('civil_cases')
        //         ->join('setup_divisions','civil_cases.division_id', '=', 'setup_divisions.id')
        //         ->join('setup_districts','civil_cases.district_id','=','setup_districts.id')
        //         ->join('setup_case_statuses','civil_cases.case_status_id','=','setup_case_statuses.id')
        //         ->join('setup_case_categories','civil_cases.case_category_nature_id','=','setup_case_categories.id')
        //         ->join('setup_external_councils','civil_cases.external_council_name_id','=','setup_external_councils.id')
        //         ->select('civil_cases.*','setup_divisions.division_name','setup_districts.district_name','setup_case_statuses.case_status_name','setup_case_categories.case_category_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name')
        //         ->get();
        // dd($data);

      return view('litigation_management.cases.criminal_cases.criminal_cases',compact('data'));
  }

//   public function append_district(Request $request){
//       $div_id = $request->div_id;
//       $district = SetupDistrict::where('id',$div_id)
//           ->get();
//       return response()->json([
//           'district' => $district
//       ]);
//   }

  public function add_criminal_cases()
  {
     $law_section = SetupLawSection::where('delete_status',0)->get();
     $court = SetupCourt::where('delete_status',0)->get();
     $designation = SetupDesignation::where('delete_status',0)->get();
     $external_council = SetupExternalCouncil::where('delete_status',0)->get();
     $case_category = SetupCaseCategory::where('delete_status',0)->get();
     $case_status = SetupCaseStatus::where('delete_status',0)->get();
//     $division = SetupDivision::where('delete_status',0)->get();
     $division = DB::table("setup_divisions")->get();
     $person_title = SetupPersonTitle::where('delete_status',0)->get();
     $next_date_reason = SetupNextDateReason::where('delete_status',0)->get();
    //  $next_date_reason = DB::table('setup_next_date_reasons')->get();
     $last_court_order = SetupCourtLastOrder::where('delete_status',0)->get();
     return view('litigation_management.cases.criminal_cases.add_criminal_cases',compact('person_title','division','case_status','case_category','external_council','designation','court','law_section','next_date_reason','next_date_reason','last_court_order'));
  }

  public function save_criminal_cases(Request $request)
  {
     $rules = [
         'case_no' => 'required',
         'division_id' => 'required',
         'district_id' => 'required',
         'amount' => 'required',
         'case_category_nature_id' => 'required',
         'plaintiff_name' => 'required',
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
         'plaintiff_name.required' => 'Plaintiff Name field is required',
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
    $division = SetupDivision::where('delete_status',0)->get();
    $person_title = SetupPersonTitle::where('delete_status',0)->get();
    $data = CivilCases::find($id);
    $civil_cases_files = CivilCasesFile::where('case_id',$id)->get();
    $existing_district = SetupDistrict::where('division_id',$data->division_id)->get();
    $next_date_reason = DB::table('setup_next_date_reasons')->get();
    // dd($data);
    return view('litigation_management.cases.civil_cases.edit_civil_cases',compact('data','person_title','division','case_status','case_category','external_council','designation','court','law_section','civil_cases_files','existing_district','next_date_reason'));
  }

  public function update_civil_cases(Request $request, $id)
  {
    $rules = [
        'case_no' => 'required',
        'division_id' => 'required',
        'district_id' => 'required',
        'amount' => 'required',
        'case_category_nature_id' => 'required',
        'plaintiff_name' => 'required',
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
        'plaintiff_name.required' => 'Plaintiff Name field is required',
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
    
          $data = CivilCases::find($id);
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
