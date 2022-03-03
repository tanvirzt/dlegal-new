<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseTypes;
use App\Models\SetupComplianceCategory;
use App\Models\SetupDesignation;
use App\Models\SetupPropertyType;
use Illuminate\Http\Request;
use App\Models\SetupPersonTitle;
use App\Models\SetupExternalCouncil;
use App\Models\SetupCourt;
use App\Models\SetupComplianceType;
use App\Models\CivilCases;
use App\Models\SetupDivision;
use App\Models\SetupDistrict;
use App\Models\SetupLawSection;
use App\Models\SetupNextDateReason;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupExternalCouncilFile;
use App\Models\SetupRegion;
use App\Models\SetupArea;
use App\Models\SetupBranch;
use App\Models\SetupProgram;
use App\Models\SetupAlligation;
use App\Models\SetupCompanyType;
use App\Models\SetupCompany;
use App\Models\SetupInternalCouncil;
use App\Models\SetupInternalCouncilFiles;
use App\Models\SetupExternalCouncilAssociate;
use App\Models\SetupExternalCouncilAssociatesFile;
use App\Models\SetupBillType;
use App\Models\SetupBank;
use App\Models\SetupBankBranch;
use App\Models\SetupDigitalPayment;
use App\Models\SetupThana;
use App\Models\SetupSellerBuyer;
use Illuminate\Support\Facades\DB;


class AdminSetupController extends Controller
{
    //
    public function designation()
    {
        $data = SetupDesignation::all();
        return view('setup.designation.designation',compact('data'));
    }

    public function add_designation()
    {
        return view('setup.designation.add_designation');
    }

    public function save_designation(Request $request)
    {
        $rules = [
            'designation_name' => 'required'
        ];

        $validMsg = [
            'designation_name.required' => 'Designation Name field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $designation = new SetupDesignation();
        $designation->designation_name = $request->designation_name;
        $designation->save();

        session()->flash('success','Designation Added Successfully.');
        return redirect()->back();
    }

    public function edit_designation($id)
    {
        $data = SetupDesignation::find($id);
        return view('setup.designation.edit_designation',compact('data'));
    }

    public function update_designation(Request $request, $id)
    {
        $rules = [
            'designation_name' => 'required'
        ];

        $validMsg = [
            'designaiton_name.required' => 'Designation Name field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $designation = SetupDesignation::find($id);
        $designation->designation_name = $request->designation_name;
        $designation->save();

        session()->flash('success', 'Designation Updated Successfully.');

        return redirect()->back();
    }

    public function delete_designation($id)
    {
        $data = SetupDesignation::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Designation Deleted Successfully');
        return redirect()->back();
    }

    public function case_category()
    {
        $data = SetupCaseCategory::all();
        return view('setup.case_category.case_category',compact('data'));
    }

    public function add_case_category()
    {
        return view('setup.case_category.add_case_category');
    }

    public function save_case_category(Request $request)
    {
        $rules = [
              'case_category_name' => 'required'
        ];

        $validMsg = [
            'case_category_name.required' => 'Case Category name field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupCaseCategory();
        $data->case_category_name = $request->case_category_name;
        $data->save();

        session()->flash('success','Case Category Added Successfully');
        return redirect()->back();

    }

    public function edit_case_category($id)
    {
        $data = SetupCaseCategory::find($id);
        return view('setup.case_category.edit_case_category',compact('data'));
    }

    public function update_case_category(Request $request, $id)
    {
        $rules = [
              'case_category_name' => 'required'
        ];

        $validMsg = [
              'case_category_name.required' => 'Case Category Name field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupCaseCategory::find($id);
        $data->case_category_name = $request->case_category_name;
        $data->save();

        session()->flash('success','Case Category Updated');
        return redirect()->back();
    }

    public function delete_case_category($id)
    {
        $data = SetupCaseCategory::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Case Category Deleted');
        return redirect()->back();
    }

//case status setup

    public function case_status()
    {
        $data = SetupCaseStatus::all();
        return view('setup.case_status.case_status',compact('data'));
    }

    public function add_case_status()
    {
        return view('setup.case_status.add_case_status');
    }

    public function save_case_status(Request $request)
    {
        $rules = [
            'case_status_name' => 'required'
        ];

        $validMsg = [
            'case_status_name.required' => 'Case Status Name field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupCaseStatus();
        $data->case_status_name = $request->case_status_name;
        $data->save();

        session()->flash('success','Case Status Added Successfully');
        return redirect()->back();

    }

    public function edit_case_status($id)
    {
        $data = SetupCaseStatus::find($id);
        return view('setup.case_status.edit_case_status',compact('data'));
    }

    public function update_case_status(Request $request, $id)
    {
        $rules = [
            'case_status_name' => 'required'
        ];

        $validMsg = [
            'case_status_name.required' => 'Case Status Name field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupCaseStatus::find($id);
        $data->case_status_name = $request->case_status_name;
        $data->save();

        session()->flash('success','Case Status Updated');
        return redirect()->back();
    }

    public function delete_case_status($id)
    {
        $data = SetupCaseStatus::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Case Status Deleted');
        return redirect()->back();
    }

    //case types setup

    public function case_types()
    {
        $data = SetupCaseTypes::all();
        return view('setup.case_types.case_types',compact('data'));
    }

    public function add_case_types()
    {
        return view('setup.case_types.add_case_types');
    }

    public function save_case_types(Request $request)
    {
        $rules = [
            'case_types_name' => 'required'
        ];

        $validMsg = [
            'case_types_name.required' => 'Case Types Name field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupCaseTypes();
        $data->case_types_name = $request->case_types_name;
        $data->save();

        session()->flash('success','Case Types Added Successfully');
        return redirect()->back();

    }

    public function edit_case_types($id)
    {
        $data = SetupCaseTypes::find($id);
        return view('setup.case_types.edit_case_types',compact('data'));
    }

    public function update_case_types(Request $request, $id)
    {
        $rules = [
            'case_types_name' => 'required'
        ];

        $validMsg = [
            'case_types_name.required' => 'Case Types Name field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupCaseTypes::find($id);
        $data->case_types_name = $request->case_types_name;
        $data->save();

        session()->flash('success','Case Types Updated');
        return redirect()->back();
    }

    public function delete_case_types($id)
    {
        $data = SetupCaseTypes::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Case Types Deleted');
        return redirect()->back();
    }

    //property type setup

    public function property_type()
    {
        $data = SetupPropertyType::all();
        return view('setup.property_type.property_type',compact('data'));
    }

    public function add_property_type()
    {
        return view('setup.property_type.add_property_type');
    }

    public function save_property_type(Request $request)
    {
        $rules = [
            'property_type_name' => 'required'
        ];

        $validMsg = [
            'property_type_name.required' => 'Property Type field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupPropertyType();
        $data->property_type_name = $request->property_type_name;
        $data->save();

        session()->flash('success','Property Type Added Successfully');
        return redirect()->back();

    }

    public function edit_property_type($id)
    {
        $data = SetupPropertyType::find($id);
        return view('setup.property_type.edit_property_type',compact('data'));
    }

    public function update_property_type(Request $request, $id)
    {
        $rules = [
            'property_type_name' => 'required'
        ];

        $validMsg = [
            'property_type_name.required' => 'Property Type field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupPropertyType::find($id);
        $data->property_type_name = $request->property_type_name;
        $data->save();

        session()->flash('success','Property Type Updated');
        return redirect()->back();
    }

    public function delete_property_type($id)
    {
        $data = SetupPropertyType::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Property Type Deleted');
        return redirect()->back();
    }

    //compliance category setup

    public function compliance_category()
    {
        $data = SetupComplianceCategory::all();
        return view('setup.compliance_category.compliance_category',compact('data'));
    }

    public function add_compliance_category()
    {
        return view('setup.compliance_category.add_compliance_category');
    }

    public function save_compliance_category(Request $request)
    {
        $rules = [
            'compliance_category_name' => 'required'
        ];

        $validMsg = [
            'compliance_category_name.required' => 'Compliance Category field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupComplianceCategory();
        $data->compliance_category_name = $request->compliance_category_name;
        $data->save();

        session()->flash('success','Compliance Category Added Successfully');
        return redirect()->back();

    }

    public function edit_compliance_category($id)
    {
        $data = SetupComplianceCategory::find($id);
        return view('setup.compliance_category.edit_compliance_category',compact('data'));
    }

    public function update_compliance_category(Request $request, $id)
    {
        $rules = [
            'compliance_category_name' => 'required'
        ];

        $validMsg = [
            'compliance_category_name.required' => 'Compliance Category field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupComplianceCategory::find($id);
        $data->compliance_category_name = $request->compliance_category_name;
        $data->save();

        session()->flash('success','Compliance Category Updated');
        return redirect()->back();
    }

    public function delete_compliance_category($id)
    {
        $data = SetupComplianceCategory::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Compliance Category Deleted');
        return redirect()->back();
    }



    //compliance type setup

    public function compliance_type()
    {
        $data = SetupComplianceType::all();
        return view('setup.compliance_type.compliance_type',compact('data'));
    }

    public function add_compliance_type()
    {
        $compliance_category = SetupComplianceCategory::where('delete_status',0)->get();
        return view('setup.compliance_type.add_compliance_type',compact('compliance_category'));
    }

    public function save_compliance_type(Request $request)
    {
        $rules = [
            'compliance_category_id' => 'required',
            'compliance_type_name' => 'required'
        ];

        $validMsg = [
            'compliance_category_id.required' => 'Compliance Category field is required',
            'compliance_type_name.required' => 'Compliance Type field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupComplianceType();
        $data->compliance_category_id = $request->compliance_category_id;
        $data->compliance_type_name = $request->compliance_type_name;
        $data->save();

        session()->flash('success','Compliance Type Added Successfully');
        return redirect()->back();

    }

    public function edit_compliance_type($id)
    {
        $compliance_category = SetupComplianceCategory::where('delete_status',0)->get();
        $data = SetupComplianceType::find($id);
        return view('setup.compliance_type.edit_compliance_type',compact('data','compliance_category'));
    }

    public function update_compliance_type(Request $request, $id)
    {
        $rules = [
            'compliance_category_id' => 'required',
            'compliance_type_name' => 'required'
        ];

        $validMsg = [
            'compliance_category_id.required' => 'Compliance Category field is required',
            'compliance_type_name.required' => 'Compliance Type field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupComplianceType::find($id);
        $data->compliance_category_id = $request->compliance_category_id;
        $data->compliance_type_name = $request->compliance_type_name;
        $data->save();

        session()->flash('success','Compliance Type Updated Successfully');
        return redirect()->back();
    }

    public function delete_compliance_type($id)
    {
        $data = SetupComplianceType::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Compliance Type Deleted');
        return redirect()->back();
    }



    //person title setup

 public function person_title()
 {
     $data = SetupPersonTitle::all();
     return view('setup.person_title.person_title',compact('data'));
 }

 public function add_person_title()
 {
     return view('setup.person_title.add_person_title');
 }

 public function save_person_title(Request $request)
 {
     $rules = [
         'person_title_name' => 'required'
     ];

     $validMsg = [
         'person_title_name.required' => 'Title field is required'
     ];

     $this->validate($request, $rules, $validMsg);

     $data = new SetupPersonTitle();
     $data->person_title_name = $request->person_title_name;
     $data->save();

     session()->flash('success','Title Added Successfully');
     return redirect()->back();

 }

 public function edit_person_title($id)
 {
     $data = SetupPersonTitle::find($id);
     return view('setup.person_title.edit_person_title',compact('data'));
 }

 public function update_person_title(Request $request, $id)
 {
     $rules = [
         'person_title_name' => 'required'
     ];

     $validMsg = [
         'person_title_name.required' => 'Title field is required'
     ];

     $this->validate($request, $rules, $validMsg);

     $data = SetupPersonTitle::find($id);
     $data->person_title_name = $request->person_title_name;
     $data->save();

     session()->flash('success','Title Updated');
     return redirect()->back();
 }

 public function delete_person_title($id)
 {
     $data = SetupPersonTitle::find($id);
     if ($data['delete_status'] == 1){
         $delete_status = 0;
     }else{
         $delete_status = 1;
     }
     $data->delete_status = $delete_status;
     $data->save();

     session()->flash('success', 'Title Deleted');
     return redirect()->back();
 }

    //court setup

    public function court()
    {
        $data = SetupCourt::all();
        return view('setup.court.court',compact('data'));
    }

    public function add_court()
    {
        return view('setup.court.add_court');
    }

    public function save_court(Request $request)
    {
        $rules = [
            'court_name' => 'required'
        ];

        $validMsg = [
            'court_name.required' => 'Court field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupCourt();
        $data->court_name = $request->court_name;
        $data->save();

        session()->flash('success','Court Added Successfully');
        return redirect()->back();

    }

    public function edit_court($id)
    {
        $data = SetupCourt::find($id);
        return view('setup.court.edit_court',compact('data'));
    }

    public function update_court(Request $request, $id)
    {
        $rules = [
            'court_name' => 'required'
        ];

        $validMsg = [
            'court_name.required' => 'Court field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupCourt::find($id);
        $data->court_name = $request->court_name;
        $data->save();

        session()->flash('success','Court Updated');
        return redirect()->back();
    }

    public function delete_court($id)
    {
        $data = SetupCourt::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Court Deleted');
        return redirect()->back();
    }


    //law section setup

    public function law_section()
    {
        $data = SetupLawSection::all();
        return view('setup.law_section.law_section',compact('data'));
    }

    public function add_law_section()
    {
        return view('setup.law_section.add_law_section');
    }

    public function save_law_section(Request $request)
    {
        $rules = [
            'law_section_name' => 'required'
        ];

        $validMsg = [
            'law_section_name.required' => 'Law Section field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupLawSection();
        $data->law_section_name = $request->law_section_name;
        $data->save();

        session()->flash('success','Law Section Added Successfully');
        return redirect()->back();

    }

    public function edit_law_section($id)
    {
        $data = SetupLawSection::find($id);
        return view('setup.law_section.edit_law_section',compact('data'));
    }

    public function update_law_section(Request $request, $id)
    {
        $rules = [
            'law_section_name' => 'required'
        ];

        $validMsg = [
            'law_section_name.required' => 'Law Section field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupLawSection::find($id);
        $data->law_section_name = $request->law_section_name;
        $data->save();

        session()->flash('success','Law Section Updated');
        return redirect()->back();
    }

    public function delete_law_section($id)
    {
        $data = SetupLawSection::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Law Section Deleted');
        return redirect()->back();
    }


    //division setup

    public function division()
    {
        $data = SetupDivision::all();
        return view('setup.division.division',compact('data'));
    }

    public function add_division()
    {
        return view('setup.division.add_division');
    }

    public function save_division(Request $request)
    {
        $rules = [
            'division_name' => 'required'
        ];

        $validMsg = [
            'division_name.required' => 'Division field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupDivision();
        $data->division_name = $request->division_name;
        $data->save();

        session()->flash('success','Division Added Successfully');
        return redirect()->back();

    }

    public function edit_division($id)
    {
        $data = SetupDivision::find($id);
        return view('setup.division.edit_division',compact('data'));
    }

    public function update_division(Request $request, $id)
    {
        $rules = [
            'division_name' => 'required'
        ];

        $validMsg = [
            'division_name.required' => 'Division field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupDivision::find($id);
        $data->division_name = $request->division_name;
        $data->save();

        session()->flash('success','Division Updated');
        return redirect()->back();
    }

    public function delete_division($id)
    {
        $data = SetupDivision::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Division Deleted');
        return redirect()->back();
    }


    //district setup

    public function district()
    {
//        $data = SetupDistrict::all();
        $data = DB::table('setup_districts')
                    ->join('setup_divisions','setup_districts.division_id', '=', 'setup_divisions.id')
                    ->select('setup_districts.*','setup_divisions.division_name')
                    ->get();
        return view('setup.district.district',compact('data'));
    }

    public function add_district()
    {
        $division = SetupDivision::where('delete_status',0)->get();
        return view('setup.district.add_district',compact('division'));
    }

    public function save_district(Request $request)
    {
        $rules = [
            'district_name' => 'required'
        ];

        $validMsg = [
            'district_name.required' => 'District field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupDistrict();
        $data->division_id = $request->division_id;
        $data->district_name = $request->district_name;
        $data->save();

        session()->flash('success','District Added Successfully');
        return redirect()->back();

    }

    public function edit_district($id)
    {
        $division = SetupDivision::where('delete_status',0)->get();
        $data = SetupDistrict::find($id);
        return view('setup.district.edit_district',compact('data','division'));
    }

    public function update_district(Request $request, $id)
    {
        $rules = [
            'district_name' => 'required'
        ];

        $validMsg = [
            'district_name.required' => 'District field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupDistrict::find($id);
        $data->division_id = $request->division_id;
        $data->district_name = $request->district_name;
        $data->save();

        session()->flash('success','District Updated');
        return redirect()->back();
    }

    public function delete_district($id)
    {
        $data = SetupDistrict::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'District Deleted');
        return redirect()->back();
    }


 //court last order setup

 public function court_last_order()
 {
     $data = SetupCourtLastOrder::all();
     return view('setup.court_last_order.court_last_order',compact('data'));
 }

 public function add_court_last_order()
 {
     $division = SetupCourtLastOrder::where('delete_status',0)->get();
     return view('setup.court_last_order.add_court_last_order',compact('division'));
 }

 public function save_court_last_order(Request $request)
 {
     $rules = [
         'court_last_order_name' => 'required'
     ];

     $validMsg = [
         'court_last_order_name.required' => 'Court Last Order field is required'
     ];

     $this->validate($request, $rules, $validMsg);

     $data = new SetupCourtLastOrder();
     $data->court_last_order_name = $request->court_last_order_name;
     $data->save();

     session()->flash('success','Court Last Order Added Successfully');
     return redirect()->back();

 }

 public function edit_court_last_order($id)
 {
     $data = SetupCourtLastOrder::find($id);
     return view('setup.court_last_order.edit_court_last_order',compact('data'));
 }

 public function update_court_last_order(Request $request, $id)
 {
     $rules = [
         'court_last_order_name' => 'required'
     ];

     $validMsg = [
         'court_last_order_name.required' => 'Court Last Order field is required'
     ];

     $this->validate($request, $rules, $validMsg);

     $data = SetupCourtLastOrder::find($id);
     $data->court_last_order_name = $request->court_last_order_name;
     $data->save();

     session()->flash('success','Court Last Order Updated');
     return redirect()->back();
 }

 public function delete_court_last_order($id)
 {
     $data = SetupCourtLastOrder::find($id);
     if ($data['delete_status'] == 1){
         $delete_status = 0;
     }else{
         $delete_status = 1;
     }
     $data->delete_status = $delete_status;
     $data->save();

     session()->flash('success', 'Court Last Order Deleted');
     return redirect()->back();
 }


 //region order setup

 public function region()
 {
     $data = SetupRegion::all();
     return view('setup.region.region',compact('data'));
 }

 public function add_region()
 {
     $division = SetupRegion::where('delete_status',0)->get();
     return view('setup.region.add_region',compact('division'));
 }

 public function save_region(Request $request)
 {
     $rules = [
         'region_name' => 'required'
     ];

     $validMsg = [
         'region_name.required' => 'Region field is required'
     ];

     $this->validate($request, $rules, $validMsg);

     $data = new SetupRegion();
     $data->region_name = $request->region_name;
     $data->save();

     session()->flash('success','Region Added Successfully');
     return redirect()->back();

 }

 public function edit_region($id)
 {
     $data = SetupRegion::find($id);
     return view('setup.region.edit_region',compact('data'));
 }

 public function update_region(Request $request, $id)
 {
     $rules = [
         'region_name' => 'required'
     ];

     $validMsg = [
         'region_name.required' => 'Region field is required'
     ];

     $this->validate($request, $rules, $validMsg);

     $data = SetupRegion::find($id);
     $data->region_name = $request->region_name;
     $data->save();

     session()->flash('success','Region Updated');
     return redirect()->back();
 }

 public function delete_region($id)
 {
     $data = SetupRegion::find($id);
     if ($data['delete_status'] == 1){
         $delete_status = 0;
     }else{
         $delete_status = 1;
     }
     $data->delete_status = $delete_status;
     $data->save();

     session()->flash('success', 'Region Deleted');
     return redirect()->back();
 }


//area order setup

public function area()
{
    $data = SetupArea::all();
    return view('setup.area.area',compact('data'));
}

public function add_area()
{
    $division = SetupArea::where('delete_status',0)->get();
    return view('setup.area.add_area',compact('division'));
}

public function save_area(Request $request)
{
    $rules = [
        'area_name' => 'required'
    ];

    $validMsg = [
        'area_name.required' => 'Area field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupArea();
    $data->area_name = $request->area_name;
    $data->save();

    session()->flash('success','Area Added Successfully');
    return redirect()->back();

}

public function edit_area($id)
{
    $data = SetupArea::find($id);
    return view('setup.area.edit_area',compact('data'));
}

public function update_area(Request $request, $id)
{
    $rules = [
        'area_name' => 'required'
    ];

    $validMsg = [
        'area_name.required' => 'Area field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupArea::find($id);
    $data->area_name = $request->area_name;
    $data->save();

    session()->flash('success','Area Updated');
    return redirect()->back();
}

public function delete_area($id)
{
    $data = SetupArea::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Area Deleted');
    return redirect()->back();
}


//branch setup

public function branch()
{
    $data = SetupBranch::all();
    return view('setup.branch.branch',compact('data'));
}

public function add_branch()
{
    return view('setup.branch.add_branch');
}

public function save_branch(Request $request)
{
    $rules = [
        'branch_name' => 'required'
    ];

    $validMsg = [
        'branch_name.required' => 'Branch field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupBranch();
    $data->branch_name = $request->branch_name;
    $data->save();

    session()->flash('success','Branch Added Successfully');
    return redirect()->back();

}

public function edit_branch($id)
{
    $data = SetupBranch::find($id);
    return view('setup.branch.edit_branch',compact('data'));
}

public function update_branch(Request $request, $id)
{
    $rules = [
        'branch_name' => 'required'
    ];

    $validMsg = [
        'branch_name.required' => 'Branch field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupBranch::find($id);
    $data->branch_name = $request->branch_name;
    $data->save();

    session()->flash('success','Branch Updated');
    return redirect()->back();
}

public function delete_branch($id)
{
    $data = SetupBranch::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Branch Deleted');
    return redirect()->back();
}


//program setup

public function program()
{
    $data = SetupProgram::all();
    return view('setup.program.program',compact('data'));
}

public function add_program()
{
    return view('setup.program.add_program');
}

public function save_program(Request $request)
{
    $rules = [
        'program_name' => 'required'
    ];

    $validMsg = [
        'program_name.required' => 'Program field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupProgram();
    $data->program_name = $request->program_name;
    $data->save();

    session()->flash('success','Program Added Successfully');
    return redirect()->back();

}

public function edit_program($id)
{
    $data = SetupProgram::find($id);
    return view('setup.program.edit_program',compact('data'));
}

public function update_program(Request $request, $id)
{
    $rules = [
        'program_name' => 'required'
    ];

    $validMsg = [
        'program_name.required' => 'Program field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupProgram::find($id);
    $data->program_name = $request->program_name;
    $data->save();

    session()->flash('success','Program Updated');
    return redirect()->back();
}

public function delete_program($id)
{
    $data = SetupProgram::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Program Deleted');
    return redirect()->back();
}


//alligation setup

public function alligation()
{
    $data = SetupAlligation::all();
    return view('setup.alligation.alligation',compact('data'));
}

public function add_alligation()
{
    return view('setup.alligation.add_alligation');
}

public function save_alligation(Request $request)
{
    $rules = [
        'alligation_name' => 'required'
    ];

    $validMsg = [
        'alligation_name.required' => 'Alligation field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupAlligation();
    $data->alligation_name = $request->alligation_name;
    $data->save();

    session()->flash('success','Alligation Added Successfully');
    return redirect()->back();

}

public function edit_alligation($id)
{
    $data = SetupAlligation::find($id);
    return view('setup.alligation.edit_alligation',compact('data'));
}

public function update_alligation(Request $request, $id)
{
    $rules = [
        'alligation_name' => 'required'
    ];

    $validMsg = [
        'alligation_name.required' => 'Alligation field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupAlligation::find($id);
    $data->alligation_name = $request->alligation_name;
    $data->save();

    session()->flash('success','Alligation Updated');
    return redirect()->back();
}

public function delete_alligation($id)
{
    $data = SetupAlligation::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Alligation Deleted');
    return redirect()->back();
}


        //next_date_reason setup

        public function next_date_reason()
        {
            $data = DB::table('setup_next_date_reasons')
                        ->get();
            return view('setup.next_date_reason.next_date_reason',compact('data'));
        }
    
        public function add_next_date_reason()
        {
            return view('setup.next_date_reason.add_next_date_reason');
        }
    
        public function save_next_date_reason(Request $request)
        {
            $rules = [
                'next_date_reason_name' => 'required'
            ];
    
            $validMsg = [
                'next_date_reason_name.required' => 'Next Date Reason field is required'
            ];
    
            $this->validate($request, $rules, $validMsg);
    
            $data = new SetupNextDateReason();
            $data->next_date_reason_name = $request->next_date_reason_name;
            $data->save();
    
            session()->flash('success','Next Date Reason Added Successfully');
            return redirect()->back();
    
        }
    
        public function edit_next_date_reason($id)
        {
            $data = SetupNextDateReason::find($id);
            return view('setup.next_date_reason.edit_next_date_reason',compact('data'));
        }
    
        public function update_next_date_reason(Request $request, $id)
        {
            $rules = [
                'next_date_reason_name' => 'required'
            ];
    
            $validMsg = [
                'next_date_reason_name.required' => 'Next Date Reason field is required'
            ];
    
            $this->validate($request, $rules, $validMsg);
    
            $data = SetupNextDateReason::find($id);
            $data->next_date_reason_name = $request->next_date_reason_name;
            $data->save();
    
            session()->flash('success','Next Date Reason Updated');
            return redirect()->back();
        }
    
        public function delete_next_date_reason($id)
        {
            $data = SetupNextDateReason::find($id);
            if ($data['delete_status'] == 1){
                $delete_status = 0;
            }else{
                $delete_status = 1;
            }
            $data->delete_status = $delete_status;
            $data->save();
    
            session()->flash('success', 'Next Date Reason Deleted');
            return redirect()->back();
        }    




 //company setup

public function company_type()
{
    $data = SetupCompanyType::all();
    return view('setup.company_type.company_type',compact('data'));
}

public function add_company_type()
{
    return view('setup.company_type.add_company_type');
}

public function save_company_type(Request $request)
{
    $rules = [
        'company_type_name' => 'required'
    ];

    $validMsg = [
        'company_type_name.required' => 'Company Type field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupCompanyType();
    $data->company_type_name = $request->company_type_name;
    $data->save();

    session()->flash('success','Company Type Added Successfully');
    return redirect()->back();

}

public function edit_company_type($id)
{
    $data = SetupCompanyType::find($id);
    return view('setup.company_type.edit_company_type',compact('data'));
}

public function update_company_type(Request $request, $id)
{
    $rules = [
        'company_type_name' => 'required'
    ];

    $validMsg = [
        'company_type_name.required' => 'Company Type field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupCompanyType::find($id);
    $data->company_type_name = $request->company_type_name;
    $data->save();

    session()->flash('success','Company Type Updated');
    return redirect()->back();
}

public function delete_company_type($id)
{
    $data = SetupCompanyType::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Company Type Deleted');
    return redirect()->back();
}



 //company setup

public function company()
{
    // $data = SetupCompany::all();
    $data = DB::table('setup_companies')
            ->leftJoin('setup_company_types','setup_companies.company_type_id','=','setup_company_types.id')
            ->leftJoin('setup_designations','setup_companies.designation_id','=','setup_designations.id')
            ->select('setup_companies.*','setup_company_types.company_type_name','setup_designations.designation_name')
            ->get();
            // dd($data);
    return view('setup.company.company',compact('data'));
}

public function add_company()
{
    $designation = SetupDesignation::where('delete_status',0)->get();
    $company_type = SetupCompanyType::where('delete_status',0)->get();
    return view('setup.company.add_company',compact('company_type','designation'));
}

public function save_company(Request $request)
{
    $rules = [
        'company_type_id' => 'required',
        'company_name' => 'required',
        'owner_name' => 'required',
        'designation_id' => 'required',
    ];

    $validMsg = [
        'company_type_id.required' => 'Company Type field is required',
        'company_name.required' => 'Company Name field is required',
        'owner_name.required' => 'Owner Name field is required',
        'designation_id.required' => 'Owners Designation field is required',
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupCompany();
    $data->company_type_id = $request->company_type_id;
    $data->company_name = $request->company_name;
    $data->owner_name = $request->owner_name;
    $data->designation_id = $request->designation_id;
    $data->save();

    session()->flash('success','Company Added Successfully');
    return redirect()->back();

}

public function edit_company($id)
{
    $designation = SetupDesignation::where('delete_status',0)->get();
    $company_type = SetupCompanyType::where('delete_status',0)->get();
    $data = SetupCompany::find($id);
    return view('setup.company.edit_company',compact('data','designation','company_type'));
}

public function update_company(Request $request, $id)
{
    // dd($request->all());
    $rules = [
        'company_type_id' => 'required',
        'company_name' => 'required',
        'owner_name' => 'required',
        'designation_id' => 'required',
    ];

    $validMsg = [
        'company_type_id.required' => 'Company Type field is required',
        'company_name.required' => 'Company Name field is required',
        'owner_name.required' => 'Owner Name field is required',
        'designation_id.required' => 'Owners Designation field is required',
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupCompany::find($id);
    $data->company_type_id = $request->company_type_id;
    $data->company_name = $request->company_name;
    $data->owner_name = $request->owner_name;
    $data->designation_id = $request->designation_id;
    $data->save();

    session()->flash('success','Company Updated');
    return redirect()->back();
}

public function delete_company($id)
{
    $data = SetupCompany::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Company Deleted');
    return redirect()->back();
}
       

 //external council setup

 public function external_council()
 {
     $data = SetupExternalCouncil::all();
     return view('setup.external_council.external_council',compact('data'));
 }

 public function add_external_council()
 {
    $person_title = SetupPersonTitle::where('delete_status',0)->get();
    return view('setup.external_council.add_external_council',compact('person_title'));
 }

 public function save_external_council(Request $request)
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


     $data = new SetupExternalCouncil();
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

     if($request->hasfile('uploaded_document'))
     {
         foreach($request->file('uploaded_document') as $file)
         {
             $original_name = $file->getClientOriginalName();
             $name = time().rand(1,100).$original_name;
             $file->move(public_path('files/civil_cases'), $name);

             $file= new SetupExternalCouncilFile();
             $file->external_council_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     session()->flash('success','External Council Added Successfully');
     return redirect()->back();

 }

 public function edit_external_council($id)
 {
     $person_title = SetupPersonTitle::where('delete_status',0)->get();
     $data = SetupExternalCouncil::find($id);
     return view('setup.external_council.edit_external_council',compact('data','person_title'));
 }

 public function update_external_council(Request $request, $id)
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

     $data = SetupExternalCouncil::find($id);
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

     if($request->hasfile('uploaded_document'))
     {
         foreach($request->file('uploaded_document') as $file)
         {
             $original_name = $file->getClientOriginalName();
             $name = time().rand(1,100).$original_name;
             $file->move(public_path('files/civil_cases'), $name);

             $file= new SetupExternalCouncilFile();
             $file->external_council_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     session()->flash('success','External Council Updated Successfully');
     return redirect()->back();
 }

 public function delete_external_council($id)
 {
     $data = SetupExternalCouncil::find($id);
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


 //internal council setup

 public function internal_council()
 {
     $data = SetupInternalCouncil::all();
     return view('setup.internal_council.internal_council',compact('data'));
 }

 public function add_internal_council()
 {
    $person_title = SetupPersonTitle::where('delete_status',0)->get();
    return view('setup.internal_council.add_internal_council',compact('person_title'));
 }

 public function save_internal_council(Request $request)
 {
    //  dd($request->all());
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


     $data = new SetupInternalCouncil();
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

     if($request->hasfile('uploaded_document'))
     {
         foreach($request->file('uploaded_document') as $file)
         {
             $original_name = $file->getClientOriginalName();
             $name = time().rand(1,100).$original_name;
             $file->move(public_path('files/internal_council'), $name);

             $file= new SetupInternalCouncilFiles();
             $file->internal_council_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     session()->flash('success','Internal Council Added Successfully');
     return redirect()->back();

 }

 public function edit_internal_council($id)
 {
     $person_title = SetupPersonTitle::where('delete_status',0)->get();
     $data = SetupInternalCouncil::find($id);
     return view('setup.internal_council.edit_internal_council',compact('data','person_title'));
 }

 public function update_internal_council(Request $request, $id)
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

     $data = SetupInternalCouncil::find($id);
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

     if($request->hasfile('uploaded_document'))
     {
         foreach($request->file('uploaded_document') as $file)
         {
             $original_name = $file->getClientOriginalName();
             $name = time().rand(1,100).$original_name;
             $file->move(public_path('files/civil_cases'), $name);

             $file= new SetupInternalCouncilFiles();
             $file->internal_council_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     session()->flash('success','Internal Council Updated Successfully');
     return redirect()->back();
 }

 public function delete_internal_council($id)
 {
     $data = SetupInternalCouncil::find($id);
     if ($data['delete_status'] == 1){
         $delete_status = 0;
     }else{
         $delete_status = 1;
     }
     $data->delete_status = $delete_status;
     $data->save();

     session()->flash('success', 'Internal Council Deleted');
     return redirect()->back();
 }


 //external council associates setup

 public function external_council_associates()
 {
    //  $data = SetupExternalCouncilAssociate::all();
     $data = DB::table('setup_external_council_associates')
                ->leftJoin('setup_external_councils','setup_external_council_associates.external_council_id','=','setup_external_councils.id')
                ->leftJoin('setup_person_titles','setup_external_council_associates.title_id','=','setup_person_titles.id')
                ->select('setup_external_council_associates.*','setup_external_councils.first_name as ec_first_name','setup_external_councils.middle_name as ec_middle_name','setup_external_councils.last_name as ec_last_name','setup_person_titles.person_title_name')
                ->get();
                // dd($data);
     return view('setup.external_council_associates.external_council_associates',compact('data'));
 }

 public function add_external_council_associates()
 {
    $external_council = SetupExternalCouncil::where('delete_status',0)->get();
    $person_title = SetupPersonTitle::where('delete_status',0)->get();
    return view('setup.external_council_associates.add_external_council_associates',compact('person_title','external_council'));
 }

 public function save_external_council_associates(Request $request)
 {
    //  dd($request->all());
     $rules = [
         'external_council_id' => 'required',
         'title_id' => 'required',
         'title_id' => 'required',
         'first_name' => 'required',
         'middle_name' => 'required',
         'last_name' => 'required',
         'email' => 'required',
         'work_phone' => 'required'
     ];

     $validMsg = [
         'external_council_id.required' => 'External Council field is required',
         'title_id.required' => 'Title field is required',
         'title_id.required' => 'Title field is required',
         'first_name.required' => 'First Name field is required',
         'middle_name.required' => 'Middle Name field is required',
         'last_name.required' => 'Last Name field is required',
         'email.required' => 'Email field is required',
         'work_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);


     $data = new SetupExternalCouncilAssociate();
     $data->external_council_id = $request->external_council_id;
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

     if($request->hasfile('uploaded_document'))
     {
         foreach($request->file('uploaded_document') as $file)
         {
             $original_name = $file->getClientOriginalName();
             $name = time().rand(1,100).$original_name;
             $file->move(public_path('files/external_council_associates_file'), $name);

             $file= new SetupExternalCouncilAssociatesFile();
             $file->external_council_associates_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     session()->flash('success','External Council Associates Added Successfully');
     return redirect()->back();

 }

 public function edit_external_council_associates($id)
 {
     $external_council = SetupExternalCouncil::where('delete_status',0)->get();
     $person_title = SetupPersonTitle::where('delete_status',0)->get();
     $data = SetupExternalCouncilAssociate::find($id);
     return view('setup.external_council_associates.edit_external_council_associates',compact('data','person_title','external_council'));
 }

 public function update_external_council_associates(Request $request, $id)
 {
    $rules = [
         'external_council_id' => 'required',
         'title_id' => 'required',
         'first_name' => 'required',
         'middle_name' => 'required',
         'last_name' => 'required',
         'email' => 'required',
         'work_phone' => 'required'
     ];

     $validMsg = [
         'external_council_id.required' => 'External Council field is required',
         'title_id.required' => 'Title field is required',
         'first_name.required' => 'First Name field is required',
         'middle_name.required' => 'Middle Name field is required',
         'last_name.required' => 'Last Name field is required',
         'email.required' => 'Email field is required',
         'work_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);

     $data = SetupExternalCouncilAssociate::find($id);
     $data->external_council_id = $request->external_council_id;
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

     if($request->hasfile('uploaded_document'))
     {
         foreach($request->file('uploaded_document') as $file)
         {
             $original_name = $file->getClientOriginalName();
             $name = time().rand(1,100).$original_name;
             $file->move(public_path('files/civil_cases'), $name);

             $file= new SetupExternalCouncilAssociatesFile();
             $file->external_council_associates_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     session()->flash('success','External Council Associates Updated Successfully');
     return redirect()->back();
 }

 public function delete_external_council_associates($id)
 {
     $data = SetupExternalCouncilAssociate::find($id);
     if ($data['delete_status'] == 1){
         $delete_status = 0;
     }else{
         $delete_status = 1;
     }
     $data->delete_status = $delete_status;
     $data->save();

     session()->flash('success', 'External Council Associates Deleted');
     return redirect()->back();
 }


 //bill setup

    public function bill_type()
    {
        $data = SetupBillType::all();
        return view('setup.bill_type.bill_type',compact('data'));
    }

    public function add_bill_type()
    {
        return view('setup.bill_type.add_bill_type');
    }

    public function save_bill_type(Request $request)
    {
        // dd($request->all());
        $rules = [
            'bill_type_name' => 'required'
        ];

        $validMsg = [
            'bill_type_name.required' => 'Bill Type field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupBillType();
        $data->bill_type_name = $request->bill_type_name;
        $data->save();

        session()->flash('success','Bill Type Added Successfully');
        return redirect()->back();

    }

    public function edit_bill_type($id)
    {
        $data = SetupBillType::find($id);
        return view('setup.bill_type.edit_bill_type',compact('data'));
    }

    public function update_bill_type(Request $request, $id)
    {
        $rules = [
            'bill_type_name' => 'required'
        ];

        $validMsg = [
            'bill_type_name.required' => 'Bill Type field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupBillType::find($id);
        $data->bill_type_name = $request->bill_type_name;
        $data->save();

        session()->flash('success','Bill Type Updated');
        return redirect()->back();
    }

    public function delete_bill_type($id)
    {
        $data = SetupBillType::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Bill Type Deleted');
        return redirect()->back();
    }


    //bill setup

    public function bank()
    {
        $data = SetupBank::all();
        return view('setup.bank.bank',compact('data'));
    }

    public function add_bank()
    {
        return view('setup.bank.add_bank');
    }

    public function save_bank(Request $request)
    {
        // dd($request->all());
        $rules = [
            'bank_name' => 'required'
        ];

        $validMsg = [
            'bank_name.required' => 'Bank field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupBank();
        $data->bank_name = $request->bank_name;
        $data->save();

        session()->flash('success','Bank Added Successfully');
        return redirect()->back();

    }

    public function edit_bank($id)
    {
        $data = SetupBank::find($id);
        return view('setup.bank.edit_bank',compact('data'));
    }

    public function update_bank(Request $request, $id)
    {
        $rules = [
            'bank_name' => 'required'
        ];

        $validMsg = [
            'bank_name.required' => 'Bank field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupBank::find($id);
        $data->bank_name = $request->bank_name;
        $data->save();

        session()->flash('success','Bank Updated');
        return redirect()->back();
    }

    public function delete_bank($id)
    {
        $data = SetupBank::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Bank Deleted');
        return redirect()->back();
    }

    
    //bank branch setup

    public function bank_branch()
    {
    //    $data = SetupBankBranch::all();
        $data = DB::table('setup_bank_branches')
                    ->leftJoin('setup_banks','setup_bank_branches.bank_id', '=', 'setup_banks.id')
                    ->select('setup_bank_branches.*','setup_banks.bank_name')
                    ->get();
                    // dd($data);
        return view('setup.bank_branch.bank_branch',compact('data'));
    }

    public function add_bank_branch()
    {
        $bank = SetupBank::where('delete_status',0)->get();
        return view('setup.bank_branch.add_bank_branch',compact('bank'));
    }

    public function save_bank_branch(Request $request)
    {
        $rules = [
            'bank_branch_name' => 'required'
        ];

        $validMsg = [
            'bank_branch_name.required' => 'Bank Branch field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupBankBranch();
        $data->bank_id = $request->bank_id;
        $data->bank_branch_name = $request->bank_branch_name;
        $data->save();

        session()->flash('success','Bank Branch Added Successfully');
        return redirect()->back();

    }

    public function edit_bank_branch($id)
    {
        $bank = SetupBank::where('delete_status',0)->get();

        $data = SetupBankBranch::find($id);
        return view('setup.bank_branch.edit_bank_branch',compact('data','bank'));
    }

    public function update_bank_branch(Request $request, $id)
    {
        $rules = [
            'bank_branch_name' => 'required'
        ];

        $validMsg = [
            'bank_branch_name.required' => 'Bank Branch field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupBankBranch::find($id);
        $data->bank_id = $request->bank_id;
        $data->bank_branch_name = $request->bank_branch_name;
        $data->save();

        session()->flash('success','Bank Branch Updated');
        return redirect()->back();
    }

    public function delete_bank_branch($id)
    {
        $data = SetupBankBranch::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Bank Branch Deleted');
        return redirect()->back();
    }

    //property type setup

    public function digital_payment_type()
    {
        $data = SetupDigitalPayment::all();
        return view('setup.digital_payment_type.digital_payment_type',compact('data'));
    }

    public function add_digital_payment_type()
    {
        return view('setup.digital_payment_type.add_digital_payment_type');
    }

    public function save_digital_payment_type(Request $request)
    {
        $rules = [
            'digital_payment_type_name' => 'required'
        ];

        $validMsg = [
            'digital_payment_type_name.required' => 'Digital Payment Type field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupDigitalPayment();
        $data->digital_payment_type_name = $request->digital_payment_type_name;
        $data->save();

        session()->flash('success','Digital Payment Type Added Successfully');
        return redirect()->back();

    }

    public function edit_digital_payment_type($id)
    {
        $data = SetupDigitalPayment::find($id);
        return view('setup.digital_payment_type.edit_digital_payment_type',compact('data'));
    }

    public function update_digital_payment_type(Request $request, $id)
    {
        $rules = [
            'digital_payment_type_name' => 'required'
        ];

        $validMsg = [
            'digital_payment_type_name.required' => 'Digital Payment Type field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupDigitalPayment::find($id);
        $data->digital_payment_type_name = $request->digital_payment_type_name;
        $data->save();

        session()->flash('success','Digital Payment Type Updated');
        return redirect()->back();
    }

    public function delete_digital_payment_type($id)
    {
        $data = SetupDigitalPayment::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Digital Payment Type Deleted');
        return redirect()->back();
    }

    //thana setup

    public function thana()
    {
    //    $data = SetupThana::all();
        $data = DB::table('setup_thanas')
                    ->join('setup_districts','setup_thanas.district_id', '=', 'setup_districts.id')
                    ->select('setup_thanas.*','setup_districts.district_name')
                    ->get();
        return view('setup.thana.thana',compact('data'));
    }

    public function add_thana()
    {
        $district = SetupDistrict::where('delete_status',0)->get();
        return view('setup.thana.add_thana',compact('district'));
    }

    public function save_thana(Request $request)
    {
        $rules = [
            'thana_name' => 'required'
        ];

        $validMsg = [
            'thana_name.required' => 'Thana field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupThana();
        $data->district_id = $request->district_id;
        $data->thana_name = $request->thana_name;
        $data->save();

        session()->flash('success','Thana Added Successfully');
        return redirect()->back();

    }

    public function edit_thana($id)
    {
        $district = SetupDistrict::where('delete_status',0)->get();
        $data = SetupThana::find($id);
        return view('setup.thana.edit_thana',compact('data','district'));
    }

    public function update_thana(Request $request, $id)
    {
        $rules = [
            'thana_name' => 'required'
        ];

        $validMsg = [
            'thana_name.required' => 'Thana field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupThana::find($id);
        $data->district_id = $request->district_id;
        $data->thana_name = $request->thana_name;
        $data->save();

        session()->flash('success','Thana Updated');
        return redirect()->back();
    }

    public function delete_thana($id)
    {
        $data = SetupThana::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Thana Deleted');
        return redirect()->back();
    }

 //seller / buyer setup

 public function seller_buyer()
 {
     $data = SetupSellerBuyer::all();
     return view('setup.seller_buyer.seller_buyer',compact('data'));
 }

 public function add_seller_buyer()
 {
    $person_title = SetupPersonTitle::where('delete_status',0)->get();
    return view('setup.seller_buyer.add_seller_buyer',compact('person_title'));
 }

 public function save_seller_buyer(Request $request)
 {
    //  dd($request->all());
     $rules = [
         'title_id' => 'required',
         'seller_or_buyer' => 'required',
         'seller_buyer_name' => 'required',
         'email' => 'required',
         'work_phone' => 'required',
         'home_phone' => 'required'
     ];

     $validMsg = [
         'title_id.required' => 'Title field is required',
         'seller_or_buyer.required' => 'Select Seller or Buyer',
         'seller_buyer_name.required' => 'Seller or Buyer Name field is required',
         'email.required' => 'Last Name field is required',
         'work_phone.required' => 'Email field is required',
         'home_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);

     $data = new SetupSellerBuyer();
     $data->title_id = $request->title_id;
     $data->seller_or_buyer = $request->seller_or_buyer;
     $data->seller_buyer_name = $request->seller_buyer_name;
     $data->email = $request->email;
     $data->work_phone = $request->work_phone;
     $data->home_phone = $request->home_phone;
     $data->mobile_phone = $request->mobile_phone;
     $data->address1 = $request->address1;
     $data->address2 = $request->address2;
     $data->save();

     session()->flash('success','Seller / Buyer Added Successfully');
     return redirect()->back();

 }

 public function edit_seller_buyer($id)
 {
     $person_title = SetupPersonTitle::where('delete_status',0)->get();
     $data = SetupSellerBuyer::find($id);
     return view('setup.seller_buyer.edit_seller_buyer',compact('data','person_title'));
 }

 public function update_seller_buyer(Request $request, $id)
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

     $data = SetupSellerBuyer::find($id);
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

     session()->flash('success','Seller / Buyer Updated Successfully');
     return redirect()->back();
 }

 public function delete_seller_buyer($id)
 {
     $data = SetupSellerBuyer::find($id);
     if ($data['delete_status'] == 1){
         $delete_status = 0;
     }else{
         $delete_status = 1;
     }
     $data->delete_status = $delete_status;
     $data->save();

     session()->flash('success', 'Seller / Buyer Deleted');
     return redirect()->back();
 }




}
