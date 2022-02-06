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

}
