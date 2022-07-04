<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillSchedule;
use App\Models\PaymentMode;
use App\Models\SetupAccused;
use App\Models\SetupCaseCategory;
use App\Models\SetupCaseClass;
use App\Models\SetupCaseStatus;
use App\Models\SetupCaseSubcategory;
use App\Models\SetupCaseTitle;
use App\Models\SetupCaseTypes;
use App\Models\SetupClient;
use App\Models\SetupClientCategory;
use App\Models\SetupClientSubcategory;
use App\Models\SetupComplainant;
use App\Models\SetupComplianceCategory;
use App\Models\SetupCoordinator;
use App\Models\SetupCourtClass;
use App\Models\SetupCourtProceeding;
use App\Models\SetupCourtShort;
use App\Models\SetupDayNote;
use App\Models\SetupDesignation;
use App\Models\SetupDocument;
use App\Models\SetupInFavourOf;
use App\Models\SetupLegalIssue;
use App\Models\SetupLegalService;
use App\Models\SetupMatter;
use App\Models\SetupMode;
use App\Models\SetupNextDayPresence;
use App\Models\SetupOpposition;
use App\Models\SetupParty;
use App\Models\SetupProfession;
use App\Models\SetupProgress;
use App\Models\SetupPropertyType;
use App\Models\SetupReferrer;
use App\Models\SetupSection;
use Illuminate\Http\Request;
use App\Models\SetupPersonTitle;
use App\Models\SetupExternalCouncil;
use App\Models\SetupCourt;
use App\Models\SetupComplianceType;
use App\Models\CivilCases;
use App\Models\SetupDivision;
use App\Models\SetupDistrict;
use App\Models\SetupLaw;
use App\Models\SetupNextDateReason;
use App\Models\SetupCourtLastOrder;
use App\Models\SetupExternalCouncilFile;
use App\Models\SetupRegion;
use App\Models\SetupArea;
use App\Models\SetupBranch;
use App\Models\SetupProgram;
use App\Models\SetupAllegation;
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
use App\Models\SetupFloor;
use App\Models\SetupFlatNumber;
use App\Models\SetupSupremeCourtCategory;
use App\Models\SetupBillParticular;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\SetupCabinet;
use App\Models\SetupClientName;


class AdminSetupController extends Controller
{
    //
    public function designation()
    {
        $data = SetupDesignation::where('delete_status',0)->get();
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
        return redirect()->route('designation');
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

        return redirect()->route('designation');
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

//    public function case_category()
//    {
//        $data = SetupCaseCategory::where('delete_status',0)->get();
//        return view('setup.case_category.case_category',compact('data'));
//    }
//
//    public function add_case_category()
//    {
//        return view('setup.case_category.add_case_category');
//    }
//
//    public function save_case_category(Request $request)
//    {
//        $rules = [
//              'case_category_name' => 'required'
//        ];
//
//        $validMsg = [
//            'case_category_name.required' => 'Case Category name field is required'
//        ];
//
//        $this->validate($request, $rules, $validMsg);
//
//        $data = new SetupCaseCategory();
//        $data->case_category_name = $request->case_category_name;
//        $data->save();
//
//        session()->flash('success','Case Category Added Successfully');
//        return redirect()->route('case-category');
//
//    }
//
//    public function edit_case_category($id)
//    {
//        $data = SetupCaseCategory::find($id);
//        return view('setup.case_category.edit_case_category',compact('data'));
//    }
//
//    public function update_case_category(Request $request, $id)
//    {
//        $rules = [
//              'case_category_name' => 'required'
//        ];
//
//        $validMsg = [
//              'case_category_name.required' => 'Case Category Name field is required'
//        ];
//
//        $this->validate($request, $rules, $validMsg);
//
//        $data = SetupCaseCategory::find($id);
//        $data->case_category_name = $request->case_category_name;
//        $data->save();
//
//        session()->flash('success','Case Category Updated');
//        return redirect()->route('case-category');
//    }
//
//    public function delete_case_category($id)
//    {
//        $data = SetupCaseCategory::find($id);
//        if ($data['delete_status'] == 1){
//            $delete_status = 0;
//        }else{
//            $delete_status = 1;
//        }
//        $data->delete_status = $delete_status;
//        $data->save();
//
//        session()->flash('success', 'Case Category Deleted');
//        return redirect()->back();
//    }

//case status setup

    public function case_status()
    {
        $data = SetupCaseStatus::where('delete_status',0)->get();
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
        return redirect()->route('case-status');

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
        return redirect()->route('case-status');
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
        $data = DB::table('setup_case_types')
                // ->leftJoin('setup_case_classes','setup_case_types.case_class_id','setup_case_classes.id')
                ->leftJoin('setup_case_categories','setup_case_types.case_category_id','setup_case_categories.id')
                ->where('setup_case_types.delete_status',0)
                ->select('setup_case_types.*','setup_case_categories.case_category')
                ->get();
                // dd($data);
        return view('setup.case_types.case_types',compact('data'));
    }

    public function add_case_types()
    {
        $case_category = SetupCaseCategory::where(['delete_status' => 0])->orderBy('case_category','asc')->get();
        $case_class = SetupCaseClass::where('delete_status',0)->get();
// dd($case_class);
        return view('setup.case_types.add_case_types', compact('case_category','case_class'));
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
        $data->case_type = $request->case_type;
        $data->case_category_id = $request->case_category_id;
        $data->case_types_name = $request->case_types_name;
        $data->save();

        session()->flash('success','Case Types Added Successfully');
        return redirect()->route('case-types');

    }

    public function edit_case_types($id)
    {
        $case_category = SetupCaseCategory::where(['delete_status' => 0])->orderBy('case_category','asc')->get();
        $case_class = SetupCaseClass::where('delete_status',0)->get();
        $data = SetupCaseTypes::find($id);
        return view('setup.case_types.edit_case_types',compact('data','case_category','case_class'));
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
        $data->case_type = $request->case_type;
        $data->case_category_id = $request->case_category_id;
        $data->case_types_name = $request->case_types_name;
        $data->save();

        session()->flash('success','Case Types Updated');
        return redirect()->route('case-types');
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
        $data = SetupPropertyType::where('delete_status',0)->get();
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
        return redirect()->route('property-type');

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
        return redirect()->route('property-type');
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
        $data = SetupComplianceCategory::where('delete_status',0)->get();
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
        return redirect()->route('compliance-category');

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
        return redirect()->route('compliance-category');
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
        $data = SetupComplianceType::where('delete_status',0)->get();
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
        return redirect()->route('compliance-type');

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
        return redirect()->route('compliance-type');
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
     $data = SetupPersonTitle::where('delete_status',0)->get();
     return view('setup.person_title.person_title',compact('data'))->with('sl',1);
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
     return redirect()->route('person-title');

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
     return redirect()->route('person-title');
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
        $data = DB::table('setup_courts')
                // ->leftJoin('setup_case_classes','setup_courts.case_class_id','setup_case_classes.id')
                ->leftJoin('setup_case_categories','setup_courts.case_category_id','setup_case_categories.id')
                ->where('setup_courts.delete_status',0)
                ->select('setup_courts.*', 'setup_case_categories.case_category')
                ->get();
                // dd($data);
        return view('setup.court.court',compact('data'));
    }

    public function add_court()
    {
        $case_category = SetupCaseCategory::where(['delete_status' => 0])->orderBy('case_category','asc')->get();
        $case_class = SetupCaseClass::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        return view('setup.court.add_court',compact('case_category','case_class','district'));
    }

    public function save_court(Request $request)
    {
        // dd($request->all());
        $rules = [
            'court_name' => 'required'
        ];

        $validMsg = [
            'court_name.required' => 'Court field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupCourt();
        $data->case_class_id = $request->case_class_id;
        $data->case_category_id = $request->case_category_id;
        $data->applicable_district_id = $request->applicable_district_id ? implode(', ', $request->applicable_district_id) : '';
        $data->all_district = $request->all_district;
        $data->case_type = $request->case_type;
        $data->court_name = $request->court_name;
        $data->court_short_name = $request->court_short_name;
        $data->save();

        session()->flash('success','Court Added Successfully');
        return redirect()->route('court');

    }

    public function edit_court($id)
    {
        $case_category = SetupCaseCategory::where(['delete_status' => 0])->orderBy('case_category','asc')->get();
        $case_class = SetupCaseClass::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $data = SetupCourt::find($id);
        $district_explode = explode(', ', $data->applicable_district_id);
        return view('setup.court.edit_court',compact('data','case_category','case_class','district','district_explode'));
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
        $data->case_class_id = $request->case_class_id;
        $data->case_category_id = $request->case_category_id;
        $data->applicable_district_id = $request->applicable_district_id ? implode(', ', $request->applicable_district_id) : '';
        $data->all_district = $request->all_district;
        $data->case_type = $request->case_type;
        $data->court_name = $request->court_name;
        $data->court_short_name = $request->court_short_name;
        $data->save();

        session()->flash('success','Court Updated');
        return redirect()->route('court');
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

    public function law()
    {
        $data = SetupLaw::where('delete_status',0)->get();
        return view('setup.law.law',compact('data'));
    }

    public function add_law()
    {
        return view('setup.law.add_law');
    }

    public function save_law(Request $request)
    {
        $rules = [
            'law_name' => 'required'
        ];

        $validMsg = [
            'law_name.required' => 'Law field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupLaw();
        $data->case_type = $request->case_type;
        $data->law_name = $request->law_name;
        $data->save();

        session()->flash('success','Law Added Successfully');
        return redirect()->route('law');

    }

    public function edit_law($id)
    {
        $data = SetupLaw::find($id);
        return view('setup.law.edit_law',compact('data'));
    }

    public function update_law(Request $request, $id)
    {
        $rules = [
            'law_name' => 'required'
        ];

        $validMsg = [
            'law_name.required' => 'Law field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupLaw::find($id);
        $data->case_type = $request->case_type;
        $data->law_name = $request->law_name;
        $data->save();

        session()->flash('success','Law Updated');
        return redirect()->route('law');
    }

    public function delete_law($id)
    {
        $data = SetupLaw::find($id);
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
        $data = SetupDivision::where('delete_status',0)->get();
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
        return redirect()->route('division');

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
        return redirect()->route('division');
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
//        $data = SetupDistrict::where('delete_status',0)->get();
        $data = DB::table('setup_districts')
                    ->join('setup_divisions','setup_districts.division_id', '=', 'setup_divisions.id')
                    ->where('setup_districts.delete_status',0)
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
        return redirect()->route('district');

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
        return redirect()->route('district');
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
     $data = SetupCourtLastOrder::where('delete_status',0)->get();
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
     return redirect()->route('court-last-order');

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
     return redirect()->route('court-last-order');
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
     $data = SetupRegion::where('delete_status',0)->get();
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
         'region_name.required' => 'Zone field is required'
     ];

     $this->validate($request, $rules, $validMsg);

     $data = new SetupRegion();
     $data->region_name = $request->region_name;
     $data->save();

     session()->flash('success','Zone Added Successfully');
     return redirect()->route('region');

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
         'region_name.required' => 'Zone field is required'
     ];

     $this->validate($request, $rules, $validMsg);

     $data = SetupRegion::find($id);
     $data->region_name = $request->region_name;
     $data->save();

     session()->flash('success','Zone Updated');
     return redirect()->route('region');
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

     session()->flash('success', 'Zone Deleted');
     return redirect()->back();
 }


//area order setup

public function area()
{
    $data = SetupArea::where('delete_status',0)->get();
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
    return redirect()->route('area');

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
    return redirect()->route('area');
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
    $data = SetupBranch::where('delete_status',0)->get();
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
    return redirect()->route('branch');

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
    return redirect()->route('branch');
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
    $data = SetupProgram::where('delete_status',0)->get();
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
    return redirect()->route('program');

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
    return redirect()->route('program');
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

public function allegation()
{
    $data = SetupAllegation::where('delete_status',0)->get();
    return view('setup.allegation.allegation',compact('data'));
}

public function add_allegation()
{
    return view('setup.allegation.add_allegation');
}

public function save_allegation(Request $request)
{
    $rules = [
        'allegation_name' => 'required'
    ];

    $validMsg = [
        'allegation_name.required' => 'Allegation field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupAllegation();
    $data->allegation_name = $request->allegation_name;
    $data->save();

    session()->flash('success','Allegation Added Successfully');
    return redirect()->route('allegation');

}

public function edit_allegation($id)
{
    $data = SetupAllegation::find($id);
    return view('setup.allegation.edit_allegation',compact('data'));
}

public function update_allegation(Request $request, $id)
{
    $rules = [
        'allegation_name' => 'required'
    ];

    $validMsg = [
        'allegation_name.required' => 'Allegation field is required'
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupAllegation::find($id);
    $data->allegation_name = $request->allegation_name;
    $data->save();

    session()->flash('success','Allegation Updated');
    return redirect()->route('allegation');
}

public function delete_allegation($id)
{
    $data = SetupAllegation::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Allegation Deleted');
    return redirect()->back();
}


        //next_date_reason setup

        public function next_date_reason()
        {
            $data = DB::table('setup_next_date_reasons')
                    ->where('setup_next_date_reasons.delete_status',0)
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
            return redirect()->route('next-date-reason');

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
            return redirect()->route('next-date-reason');
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
    $data = SetupCompanyType::where('delete_status',0)->get();
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
    return redirect()->route('company-type');

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
    return redirect()->route('company-type');
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
    // $data = SetupCompany::where('delete_status',0)->get();
    $data = DB::table('setup_companies')
            ->leftJoin('setup_company_types','setup_companies.company_type_id','=','setup_company_types.id')
            ->leftJoin('setup_designations','setup_companies.designation_id','=','setup_designations.id')
            ->where('setup_companies.delete_status',0)
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
    return redirect()->route('company');

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
    return redirect()->route('company');
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
     $data = SetupExternalCouncil::where('delete_status',0)->get();
     return view('setup.external_council.external_council',compact('data'));
 }

 public function add_external_council()
 {
    $person_title = SetupPersonTitle::where('delete_status',0)->get();
    return view('setup.external_council.add_external_council',compact('person_title'));
 }

 public function save_external_council(Request $request)
 {
    // dd($request->all());
     $rules = [
         'title_id' => 'required',
         'email' => 'required|unique:admins',
         'password' => 'required:min:8',
         'confirm_password' => 'required|same:password',
         'work_phone' => 'required'
     ];

     $validMsg = [
         'title_id.required' => 'Title field is required',
         'email.required' => 'Email field is required',
         'work_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);

     DB::beginTransaction();

     $admin = new Admin();
     $admin->name = $request->first_name.' '.$request->middle_name.' '.$request->last_name;
     $admin->email = $request->email;
     $admin->password = bcrypt($request->password);
     $admin->mobile = $request->work_phone;
     $admin->type = 'subadmin';
     $admin->image = '';
     $admin->status = 1;
     $admin->save();

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
             $file->move(public_path('files/external_council'), $name);

             $file= new SetupExternalCouncilFile();
             $file->external_council_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     DB::commit();

     session()->flash('success','External Council Added Successfully');
     return redirect()->route('external-council');

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
         'email' => 'required',
         'work_phone' => 'required'
     ];

     $validMsg = [
         'title_id.required' => 'Title field is required',
         'email.required' => 'Email field is required',
         'work_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);

     DB::beginTransaction();

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
             $file->move(public_path('files/external_council'), $name);

             $file= new SetupExternalCouncilFile();
             $file->external_council_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     DB::commit();

     session()->flash('success','External Council Updated Successfully');
     return redirect()->route('external-council');
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
     $data = SetupInternalCouncil::where('delete_status',0)->get();
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
         'email' => 'required',
         'work_phone' => 'required'
     ];

     $validMsg = [
         'title_id.required' => 'Title field is required',
         'email.required' => 'Email field is required',
         'work_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);

     DB::beginTransaction();

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

     DB::commit();

     session()->flash('success','Internal Council Added Successfully');
     return redirect()->route('internal-council');

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
         'email' => 'required',
         'work_phone' => 'required'
     ];

     $validMsg = [
         'title_id.required' => 'Title field is required',
         'email.required' => 'Email field is required',
         'work_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);

     DB::beginTransaction();

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
             $file->move(public_path('files/internal_council'), $name);

             $file= new SetupInternalCouncilFiles();
             $file->internal_council_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     DB::commit();

     session()->flash('success','Internal Council Updated Successfully');
     return redirect()->route('internal-council');
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
    //  $data = SetupExternalCouncilAssociate::where('delete_status',0)->get();
     $data = DB::table('setup_external_council_associates')
                ->leftJoin('setup_external_councils','setup_external_council_associates.external_council_id','=','setup_external_councils.id')
                ->leftJoin('setup_person_titles','setup_external_council_associates.title_id','=','setup_person_titles.id')
                ->where('setup_external_council_associates.delete_status',0)
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
         'email' => 'required',
         'work_phone' => 'required'
     ];

     $validMsg = [
         'external_council_id.required' => 'External Council field is required',
         'title_id.required' => 'Title field is required',
         'email.required' => 'Email field is required',
         'work_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);

     DB::beginTransaction();

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
             $file->move(public_path('files/external_council_associates'), $name);

             $file= new SetupExternalCouncilAssociatesFile();
             $file->external_council_associates_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     DB::commit();

     session()->flash('success','External Council Associates Added Successfully');
     return redirect()->route('external-council-associates');

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
         'email' => 'required',
         'work_phone' => 'required'
     ];

     $validMsg = [
         'external_council_id.required' => 'External Council field is required',
         'title_id.required' => 'Title field is required',
         'email.required' => 'Email field is required',
         'work_phone.required' => 'Work Phone field is required',
     ];

     $this->validate($request, $rules, $validMsg);

     DB::beginTransaction();

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
             $file->move(public_path('files/external_council_associates'), $name);

             $file= new SetupExternalCouncilAssociatesFile();
             $file->external_council_associates_id = $data->id;
             $file->uploaded_document = $name;
             $file->save();
         }
     }

     DB::commit();

     session()->flash('success','External Council Associates Updated Successfully');
     return redirect()->route('external-council-associates');
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
        $data = SetupBillType::where('delete_status',0)->get();
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
        return redirect()->route('bill-type');

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
        return redirect()->route('bill-type');
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
        $data = SetupBank::where('delete_status',0)->get();
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
        return redirect()->route('bank');

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
        return redirect()->route('bank');
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
    //    $data = SetupBankBranch::where('delete_status',0)->get();
        $data = DB::table('setup_bank_branches')
                    ->leftJoin('setup_banks','setup_bank_branches.bank_id', '=', 'setup_banks.id')
                    ->where('setup_bank_branches.delete_status',0)
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
        return redirect()->route('bank-branch');

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
        return redirect()->route('bank-branch');
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
        $data = SetupDigitalPayment::where('delete_status',0)->get();
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
        return redirect()->route('digital-payment-type');

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
        return redirect()->route('digital-payment-type');
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
    //    $data = SetupThana::where('delete_status',0)->get();
        $data = DB::table('setup_thanas')
                    ->join('setup_districts','setup_thanas.district_id', '=', 'setup_districts.id')
                    ->where('setup_thanas.delete_status',0)
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
        return redirect()->route('thana');

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
        return redirect()->route('thana');
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
     $data = SetupSellerBuyer::where('delete_status',0)->get();
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
     $data->present_address = $request->present_address;
     $data->permanent_address = $request->permanent_address;

     if ($request->hasfile('image')) {
        $file = $request->file('image');
        $original_name = $file->getClientOriginalName();
        $file_name = time().rand(1,0).$original_name;
        $file->move(public_path('files/seller_buyer'),$file_name);
        $data->image = $file_name;
     }

     $data->save();

     session()->flash('success','Seller / Buyer Added Successfully');
     return redirect()->route('seller-buyer');

 }

 public function edit_seller_buyer($id)
 {
     $person_title = SetupPersonTitle::where('delete_status',0)->get();
     $data = SetupSellerBuyer::find($id);
    //  dd($data);
     return view('setup.seller_buyer.edit_seller_buyer',compact('data','person_title'));
 }

 public function update_seller_buyer(Request $request, $id)
 {
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

     $data = SetupSellerBuyer::find($id);
     $data->title_id = $request->title_id;
     $data->seller_or_buyer = $request->seller_or_buyer;
     $data->seller_buyer_name = $request->seller_buyer_name;
     $data->email = $request->email;
     $data->work_phone = $request->work_phone;
     $data->home_phone = $request->home_phone;
     $data->mobile_phone = $request->mobile_phone;
     $data->present_address = $request->present_address;
     $data->permanent_address = $request->permanent_address;

     if ($request->hasfile('image')) {

        if($data->image != null){
            $file_path = 'files/seller_buyer/'.$data->image;
            if(file_exists($file_path)){
                unlink($file_path);
            }
        }

        $file = $request->file('image');
        $original_name = $file->getClientOriginalName();
        $file_name = time().rand(1,0).$original_name;
        $file->move(public_path('files/seller_buyer'),$file_name);
        $data->image = $file_name;
     }

     $data->save();

     session()->flash('success','Seller / Buyer Updated Successfully');
     return redirect()->route('seller-buyer');
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

//floor setup

public function floor()
{
    $data = SetupFloor::where('delete_status',0)->get();
    return view('setup.floor.floor',compact('data'));
}

public function add_floor()
{
   return view('setup.floor.add_floor');
}

public function save_floor(Request $request)
{
   //  dd($request->all());

    $this->validate($request, [
        'floor_name' => 'required',
    ]);

    $data = new SetupFloor();
    $data->floor_name = $request->floor_name;
    $data->save();

    session()->flash('success', 'Floor Added Successfully');
    // return redirect()->back();
    return redirect()->route('floor');

}

public function edit_floor($id)
{
    $data = SetupFloor::find($id);
    return view('setup.floor.edit_floor',compact('data'));
}

public function update_floor(Request $request, $id)
{
   $this->validate($request, [
       'floor_name' => 'required',
   ]);

   $data = SetupFloor::find($id);
   $data->floor_name = $request->floor_name;
   $data->save();

   session()->flash('success','Floor Updated Successfully');
   return redirect()->route('floor');

}

public function delete_floor($id)
{
    $data = SetupFloor::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Floor Deleted');
    return redirect()->back();
}


//flat_number setup

public function flat_number()
{
    //    $data = SetupFlatNumber::where('delete_status',0)->get();
    $data = DB::table('setup_flat_numbers')
                ->leftJoin('setup_floors','setup_flat_numbers.floor_id','=','setup_floors.id')
                ->where('setup_flat_numbers.delete_status',0)
                ->select('setup_flat_numbers.*','setup_floors.floor_name')
                ->get();
                // dd($data);
    return view('setup.flat_number.flat_number',compact('data'));
}

public function add_flat_number()
{
    $floor = SetupFloor::where('delete_status',0)->get();
    return view('setup.flat_number.add_flat_number',compact('floor'));
}

public function save_flat_number(Request $request)
{
    $rules = [
        'floor_id' => 'required',
        'flat_number' => 'required',
    ];

    $validMsg = [
        'floor_id.required' => 'Floor field is required',
        'flat_number.required' => 'Flat Number field is required',
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupFlatNumber();
    $data->floor_id = $request->floor_id;
    $data->flat_number = $request->flat_number;
    $data->save();

    session()->flash('success','Flat Number Added Successfully');
    return redirect()->route('flat-number');

}

public function edit_flat_number($id)
{
    $floor = SetupFloor::where('delete_status',0)->get();
    $data = SetupFlatNumber::find($id);
    return view('setup.flat_number.edit_flat_number',compact('data','floor'));
}

public function update_flat_number(Request $request, $id)
{
    $rules = [
        'floor_id' => 'required',
        'flat_number' => 'required',
    ];

    $validMsg = [
        'floor_id.required' => 'Floor field is required',
        'flat_number.required' => 'Flat Number field is required',
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupFlatNumber::find($id);
    $data->floor_id = $request->floor_id;
    $data->flat_number = $request->flat_number;
    $data->save();

    session()->flash('success','Flat Number Updated');
    return redirect()->route('flat-number');
}

public function delete_flat_number($id)
{
    $data = SetupFlatNumber::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Flat Number Deleted');
    return redirect()->back();
}

public function download_external_council_files($id)
{
    $files = SetupExternalCouncilFile::where('id', $id)->firstOrFail();
    $pathToFile = public_path('/files/external_council/'.$files->uploaded_document);
    return response()->download($pathToFile);
}

public function download_internal_council_files($id)
{
    $files = SetupInternalCouncilFiles::where('id', $id)->firstOrFail();
    $pathToFile = public_path('/files/internal_council/'.$files->uploaded_document);
    return response()->download($pathToFile);
}

public function download_external_council_associates_files($id)
{
    $files = SetupExternalCouncilAssociatesFile::where('id', $id)->firstOrFail();
    $pathToFile = public_path('/files/external_council_associates/'.$files->uploaded_document);
    return response()->download($pathToFile);
}


//supreme_court_category setup

public function case_category()
{
    $data = SetupCaseCategory::where('delete_status',0)->get();

                // dd($data);
    return view('setup.case_category.case_category',compact('data'));
}

public function add_case_category()
{
    return view('setup.case_category.add_case_category');
}

public function save_case_category(Request $request)
{
    $rules = [
        'case_type' => 'required',
        'case_category' => 'required',
    ];

    $validMsg = [
        'case_type.required' => 'Case Type field is required.',
        'case_category.required' => 'Case Category field is required.',
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupCaseCategory();
    $data->case_type = $request->case_type;
    $data->case_category = $request->case_category;
    $data->save();

    session()->flash('success','Case Category Added Successfully');
    return redirect()->route('case-category');

}

public function edit_case_category($id)
{
    $data = SetupCaseCategory::find($id);
    return view('setup.case_category.edit_case_category',compact('data'));
}

public function update_case_category(Request $request, $id)
{
    $rules = [
        'case_type' => 'required',
        'case_category' => 'required',
    ];

    $validMsg = [
        'case_type.required' => 'Case Type field is required.',
        'case_category.required' => 'Case Category field is required.',
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupCaseCategory::find($id);
    $data->case_type = $request->case_type;
    $data->case_category = $request->case_category;
    $data->save();

    session()->flash('success','Case Category Updated');
    return redirect()->route('case-category');
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


//case_subcategory setup

public function case_subcategory()
{
    //    $data = SetupSupremeCourtSubcategory::orderBy('id','desc')->get();

    $data = DB::table('setup_case_subcategories')
            ->leftJoin('setup_case_categories','setup_case_subcategories.case_category_id','=','setup_case_categories.id')
            ->where('setup_case_subcategories.delete_status',0)
            ->select('setup_case_subcategories.*','setup_case_categories.case_category')
            ->orderBy('setup_case_subcategories.id','desc')
            ->get();

    // $data = json_decode(json_encode($data));
    // echo "<pre>";print_r($data);die;

    return view('setup.case_subcategory.case_subcategory',compact('data'));
}

public function add_case_subcategory()
{
    // $data = json_decode(json_encode($supreme_court_category));
    // echo "<pre>";print_r($data);
    return view('setup.case_subcategory.add_case_subcategory');
}

public function save_case_subcategory(Request $request)
{
    // $data = json_decode(json_encode($request->all()));
    // echo "<pre>";print_r($data);die;

    $rules = [
        'case_type' => 'required',
        'case_category_id' => 'required',
        'case_subcategory' => 'required',
    ];

    $validMsg = [
        'case_type.required' => 'Case Type filed is required',
        'case_category_id.required' => 'Case Category filed is required',
        'case_subcategory.required' => 'Case Subcategory field is required',
    ];

    $this->validate($request, $rules, $validMsg);

    $data = new SetupCaseSubcategory();
    $data->case_type = $request->case_type;
    $data->case_category_id = $request->case_category_id;
    $data->case_subcategory = $request->case_subcategory;
    $data->save();

    session()->flash('success','Case Subcategory Added Successfully');
    return redirect()->route('case-subcategory');

}

public function edit_case_subcategory($id)
{
    $data = SetupCaseSubcategory::find($id);
    $existing_case_category = SetupCaseCategory::where('case_type',$data->case_type)->get();
    // $adsf = json_decode(json_encode($existing_case_category));
    // echo "<pre>";print_r($adsf);die;
    return view('setup.case_subcategory.edit_case_subcategory',compact('data','existing_case_category'));
}

public function update_case_subcategory(Request $request, $id)
{
    $rules = [
        'case_type' => 'required',
        'case_category_id' => 'required',
        'case_subcategory' => 'required',
    ];

    $validMsg = [
        'case_type.required' => 'Case Type filed is required',
        'case_category_id.required' => 'Case Category filed is required',
        'case_subcategory.required' => 'Case Subcategory field is required',
    ];

    $this->validate($request, $rules, $validMsg);

    $data = SetupCaseSubcategory::find($id);
    $data->case_type = $request->case_type;
    $data->case_category_id = $request->case_category_id;
    $data->case_subcategory = $request->case_subcategory;
    $data->save();

    session()->flash('success','Case Subcategory Updated');
    return redirect()->route('case-subcategory');
}

public function delete_case_subcategory($id)
{
    $data = SetupCaseSubcategory::find($id);
    if ($data['delete_status'] == 1){
        $delete_status = 0;
    }else{
        $delete_status = 1;
    }
    $data->delete_status = $delete_status;
    $data->save();

    session()->flash('success', 'Case Subcategory Deleted');
    return redirect()->back();
}

public function find_case_category(Request $request)
{

    if ($request->case_type == "Civil Cases") {

        $data = SetupCaseCategory::where(['case_type' => 'Civil Cases', 'delete_status' => 0])->orderBy('case_category','asc')->get();

    } else if($request->case_type == "Criminal Cases"){

        $data = SetupCaseCategory::where(['case_type' => 'Criminal Cases','delete_status' => 0])->orderBy('case_category','asc')->get();

    }else if($request->case_type == "Labour Cases"){

        $data = SetupCaseCategory::where(['case_type' => 'Labour Cases','delete_status' => 0])->orderBy('case_category','asc')->get();

    }else if($request->case_type == "Special Quassi - Judicial Cases"){

        $data = SetupCaseCategory::where(['case_type' => 'Special Quassi - Judicial Cases','delete_status' => 0])->orderBy('case_category','asc')->get();

    }else if($request->case_type == "High Court Division"){

        $data = SetupCaseCategory::where(['case_type' => 'High Court Division','delete_status' => 0])->orderBy('case_category','asc')->get();

    }else if($request->case_type == "Appellate Court Division"){

        $data = SetupCaseCategory::where(['case_type' => 'Appellate Court Division','delete_status' => 0])->orderBy('case_category','asc')->get();

    }

    return response()->json($data);

}



    //case class setup

    public function case_class()
    {
        $data = SetupCaseClass::orderBy('id','desc')->get();
        return view('setup.case_class.case_class',compact('data'))->with('sl',1);
    }

    public function add_case_class()
    {
        return view('setup.case_class.add_case_class');
    }

    public function save_case_class(Request $request)
    {
        $rules = [
            'case_class_name' => 'required'
        ];

        $validMsg = [
            'case_class_name.required' => 'Case Class field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupCaseClass();
        $data->case_class_name = $request->case_class_name;
        $data->save();

        session()->flash('success','Case Class Added Successfully');
        return redirect()->route('case-class');

    }

    public function edit_case_class($id)
    {
        $data = SetupCaseClass::find($id);
        return view('setup.case_class.edit_case_class',compact('data'));
    }

    public function update_case_class(Request $request, $id)
    {
        $rules = [
            'case_class_name' => 'required'
        ];

        $validMsg = [
            'case_class_name.required' => 'Case Class field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupCaseClass::find($id);
        $data->case_class_name = $request->case_class_name;
        $data->save();

        session()->flash('success','Case Class Updated');
        return redirect()->route('case-class');
    }

    public function delete_case_class($id)
    {
        $data = SetupCaseClass::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Case Class Deleted');
        return redirect()->back();
    }


    //section setup

    public function section()
    {
        $data = SetupSection::where('delete_status',0)->get();
        return view('setup.section.section',compact('data'));
    }

    public function add_section()
    {
        return view('setup.section.add_section');
    }

    public function save_section(Request $request)
    {
        $rules = [
            'section_name' => 'required'
        ];

        $validMsg = [
            'section_name.required' => 'Section field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupSection();
        $data->section_name = $request->section_name;
        $data->save();

        session()->flash('success','Section Added Successfully');
        return redirect()->route('section');

    }

    public function edit_section($id)
    {
        $data = SetupSection::find($id);
        return view('setup.section.edit_section',compact('data'));
    }

    public function update_section(Request $request, $id)
    {
        $rules = [
            'section_name' => 'required'
        ];

        $validMsg = [
            'section_name.required' => 'Section field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupSection::find($id);
        $data->section_name = $request->section_name;
        $data->save();

        session()->flash('success','Section Updated');
        return redirect()->route('section');
    }

    public function delete_section($id)
    {
        $data = SetupSection::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Section Deleted');
        return redirect()->back();
    }


    //section setup

    public function client_category()
    {
        $data = SetupClientCategory::where('delete_status',0)->get();
        return view('setup.client_category.client_category',compact('data'));
    }

    public function add_client_category()
    {
        return view('setup.client_category.add_client_category');
    }

    public function save_client_category(Request $request)
    {
        $rules = [
            'client_category_name' => 'required'
        ];

        $validMsg = [
            'client_category_name.required' => 'Client Category field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupClientCategory();
        $data->client_category_name = $request->client_category_name;
        $data->save();

        session()->flash('success','Section Added Successfully');
        return redirect()->route('client-category');

    }

    public function edit_client_category($id)
    {
        $data = SetupClientCategory::find($id);
        return view('setup.client_category.edit_client_category',compact('data'));
    }

    public function update_client_category(Request $request, $id)
    {
        $rules = [
            'client_category_name' => 'required'
        ];

        $validMsg = [
            'client_category_name.required' => 'Client Category field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupClientCategory::find($id);
        $data->client_category_name = $request->client_category_name;
        $data->save();

        session()->flash('success','Section Updated');
        return redirect()->route('client-category');
    }

    public function delete_client_category($id)
    {
        $data = SetupClientCategory::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Client Category Deleted');
        return redirect()->back();
    }


    //client subcategory setup

    public function client_subcategory()
    {
        //    $data = SetupBankBranch::where('delete_status',0)->get();
        $data = DB::table('setup_client_subcategories')
            ->leftJoin('setup_client_categories','setup_client_subcategories.client_category_id', '=', 'setup_client_categories.id')
            ->where('setup_client_subcategories.delete_status',0)
            ->select('setup_client_subcategories.*','setup_client_categories.client_category_name')
            ->get();
        // dd($data);
        return view('setup.client_subcategory.client_subcategory',compact('data'));
    }

    public function add_client_subcategory()
    {
        $client_category = SetupClientCategory::where('delete_status',0)->get();
        return view('setup.client_subcategory.add_client_subcategory',compact('client_category'));
    }

    public function save_client_subcategory(Request $request)
    {
        $rules = [
            'client_subcategory_name' => 'required'
        ];

        $validMsg = [
            'client_subcategory_name.required' => 'Client Subcategory field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupClientSubcategory();
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_name = $request->client_subcategory_name;
        $data->save();

        session()->flash('success','Client Subcategory Added Successfully');
        return redirect()->route('client-subcategory');

    }

    public function edit_client_subcategory($id)
    {
        $client_category = SetupClientCategory::where('delete_status',0)->get();

        $data = SetupClientSubcategory::find($id);
        return view('setup.client_subcategory.edit_client_subcategory',compact('data','client_category'));
    }

    public function update_client_subcategory(Request $request, $id)
    {
        $rules = [
            'client_subcategory_name' => 'required'
        ];

        $validMsg = [
            'client_subcategory_name.required' => 'Client Subcategory field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupClientSubcategory::find($id);
        $data->client_category_id = $request->client_category_id;
        $data->client_subcategory_name = $request->client_subcategory_name;
        $data->save();

        session()->flash('success','Client Subcategory Updated');
        return redirect()->route('client-subcategory');
    }

    public function delete_client_subcategory($id)
    {
        $data = SetupClientSubcategory::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Client Subcategory Deleted');
        return redirect()->back();
    }

    public function find_client_subcategory(Request $request)
    {
        $data = SetupClientSubcategory::where(['client_category_id' => $request->client_category_id, 'delete_status' => 0 ])->get();
        return response()->json($data);
    }

//next_day_presence

    public function next_day_presence()
    {
        $data = SetupNextDayPresence::where('delete_status',0)->get();
        return view('setup.next_day_presence.next_day_presence',compact('data'));
    }

    public function add_next_day_presence()
    {
        return view('setup.next_day_presence.add_next_day_presence');
    }

    public function save_next_day_presence(Request $request)
    {
        $rules = [
            'next_day_presence_name' => 'required'
        ];

        $validMsg = [
            'next_day_presence_name.required' => 'Next Day Presence field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $next_day_presence = new SetupNextDayPresence();
        $next_day_presence->next_day_presence_name = $request->next_day_presence_name;
        $next_day_presence->save();

        session()->flash('success','Next Day Presence Added Successfully.');
        return redirect()->route('next-day-presence');
    }

    public function edit_next_day_presence($id)
    {
        $data = SetupNextDayPresence::find($id);
        return view('setup.next_day_presence.edit_next_day_presence',compact('data'));
    }

    public function update_next_day_presence(Request $request, $id)
    {
        $rules = [
            'next_day_presence_name' => 'required'
        ];

        $validMsg = [
            'designaiton_name.required' => 'Next Day Presence field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $next_day_presence = SetupNextDayPresence::find($id);
        $next_day_presence->next_day_presence_name = $request->next_day_presence_name;
        $next_day_presence->save();

        session()->flash('success', 'Next Day Presence Updated Successfully.');

        return redirect()->route('next-day-presence');
    }

    public function delete_next_day_presence($id)
    {
        $data = SetupNextDayPresence::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Next Day Presence Deleted Successfully');
        return redirect()->back();
    }


    //next_day_presence

    public function legal_issue()
    {
        $data = SetupLegalIssue::where('delete_status',0)->get();
        return view('setup.legal_issue.legal_issue',compact('data'));
    }

    public function add_legal_issue()
    {
        return view('setup.legal_issue.add_legal_issue');
    }

    public function save_legal_issue(Request $request)
    {
        $rules = [
            'legal_issue_name' => 'required'
        ];

        $validMsg = [
            'legal_issue_name.required' => 'Legal Issue field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $legal_issue = new SetupLegalIssue();
        $legal_issue->legal_issue_name = $request->legal_issue_name;
        $legal_issue->save();

        session()->flash('success','Legal Issue Added Successfully.');
        return redirect()->route('legal-issue');
    }

    public function edit_legal_issue($id)
    {
        $data = SetupLegalIssue::find($id);
        return view('setup.legal_issue.edit_legal_issue',compact('data'));
    }

    public function update_legal_issue(Request $request, $id)
    {
        $rules = [
            'legal_issue_name' => 'required'
        ];

        $validMsg = [
            'legal_issue_name.required' => 'Legal Issue field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $legal_issue = SetupLegalIssue::find($id);
        $legal_issue->legal_issue_name = $request->legal_issue_name;
        $legal_issue->save();

        session()->flash('success', 'Legal Issue Updated Successfully.');

        return redirect()->route('legal-issue');
    }

    public function delete_legal_issue($id)
    {
        $data = SetupLegalIssue::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Legal Issue Deleted Successfully');
        return redirect()->back();
    }


    //next_day_presence

    public function legal_service()
    {
        $data = SetupLegalService::where('delete_status',0)->get();
        return view('setup.legal_service.legal_service',compact('data'));
    }

    public function add_legal_service()
    {
        return view('setup.legal_service.add_legal_service');
    }

    public function save_legal_service(Request $request)
    {
        $rules = [
            'legal_service_name' => 'required'
        ];

        $validMsg = [
            'legal_service_name.required' => 'Legal Service field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $legal_service = new SetupLegalService();
        $legal_service->legal_service_name = $request->legal_service_name;
        $legal_service->save();

        session()->flash('success','Legal Service Added Successfully.');
        return redirect()->route('legal-service');
    }

    public function edit_legal_service($id)
    {
        $data = SetupLegalService::find($id);
        return view('setup.legal_service.edit_legal_service',compact('data'));
    }

    public function update_legal_service(Request $request, $id)
    {
        $rules = [
            'legal_service_name' => 'required'
        ];

        $validMsg = [
            'legal_service_name.required' => 'Legal Service field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $legal_service = SetupLegalService::find($id);
        $legal_service->legal_service_name = $request->legal_service_name;
        $legal_service->save();

        session()->flash('success', 'Legal Service Updated Successfully.');

        return redirect()->route('legal-service');
    }

    public function delete_legal_service($id)
    {
        $data = SetupLegalService::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Legal Service Deleted Successfully');
        return redirect()->back();
    }

    //matter

    public function matter()
    {
        $data = SetupMatter::where('delete_status',0)->get();
        return view('setup.matter.matter',compact('data'));
    }

    public function add_matter()
    {
        return view('setup.matter.add_matter');
    }

    public function save_matter(Request $request)
    {
        $rules = [
            'matter_name' => 'required'
        ];

        $validMsg = [
            'matter_name.required' => 'Matter field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $matter = new SetupMatter();
        $matter->matter_name = $request->matter_name;
        $matter->save();

        session()->flash('success','Matter Added Successfully.');
        return redirect()->route('matter');
    }

    public function edit_matter($id)
    {
        $data = SetupMatter::find($id);
        return view('setup.matter.edit_matter',compact('data'));
    }

    public function update_matter(Request $request, $id)
    {
        $rules = [
            'matter_name' => 'required'
        ];

        $validMsg = [
            'matter_name.required' => 'Matter field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $matter = SetupMatter::find($id);
        $matter->matter_name = $request->matter_name;
        $matter->save();

        session()->flash('success', 'Matter Updated Successfully.');

        return redirect()->route('matter');
    }

    public function delete_matter($id)
    {
        $data = SetupMatter::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Matter Deleted Successfully');
        return redirect()->back();
    }
    //coordinator

    public function coordinator()
    {
        $data = SetupCoordinator::where('delete_status',0)->get();
        return view('setup.coordinator.coordinator',compact('data'));
    }

    public function add_coordinator()
    {
        return view('setup.coordinator.add_coordinator');
    }

    public function save_coordinator(Request $request)
    {
        $rules = [
            'coordinator_name' => 'required'
        ];

        $validMsg = [
            'coordinator_name.required' => 'Coordinator field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $coordinator = new SetupCoordinator();
        $coordinator->coordinator_name = $request->coordinator_name;
        $coordinator->save();

        session()->flash('success','Coordinator Added Successfully.');
        return redirect()->route('coordinator');
    }

    public function edit_coordinator($id)
    {
        $data = SetupCoordinator::find($id);
        return view('setup.coordinator.edit_coordinator',compact('data'));
    }

    public function update_coordinator(Request $request, $id)
    {
        $rules = [
            'coordinator_name' => 'required'
        ];

        $validMsg = [
            'coordinator_name.required' => 'Coordinator field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $coordinator = SetupCoordinator::find($id);
        $coordinator->coordinator_name = $request->coordinator_name;
        $coordinator->save();

        session()->flash('success', 'Coordinator Updated Successfully.');

        return redirect()->route('coordinator');
    }

    public function delete_coordinator($id)
    {
        $data = SetupCoordinator::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Coordinator Deleted Successfully');
        return redirect()->back();
    }

    //mode

    public function mode()
    {
        $data = SetupMode::where('delete_status',0)->get();
        return view('setup.mode.mode',compact('data'));
    }

    public function add_mode()
    {
        return view('setup.mode.add_mode');
    }

    public function save_mode(Request $request)
    {
        $rules = [
            'mode_name' => 'required'
        ];

        $validMsg = [
            'mode_name.required' => 'Mode field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $mode = new SetupMode();
        $mode->mode_name = $request->mode_name;
        $mode->save();

        session()->flash('success','Mode Added Successfully.');
        return redirect()->route('mode');
    }

    public function edit_mode($id)
    {
        $data = SetupMode::find($id);
        return view('setup.mode.edit_mode',compact('data'));
    }

    public function update_mode(Request $request, $id)
    {
        $rules = [
            'mode_name' => 'required'
        ];

        $validMsg = [
            'mode_name.required' => 'Mode field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $mode = SetupMode::find($id);
        $mode->mode_name = $request->mode_name;
        $mode->save();

        session()->flash('success', 'Mode Updated Successfully.');

        return redirect()->route('mode');
    }

    public function delete_mode($id)
    {
        $data = SetupMode::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Mode Deleted Successfully');
        return redirect()->back();
    }


    //court_proceeding

    public function court_proceeding()
    {
        $data = SetupCourtProceeding::where('delete_status',0)->get();
        return view('setup.court_proceeding.court_proceeding',compact('data'));
    }

    public function add_court_proceeding()
    {
        return view('setup.court_proceeding.add_court_proceeding');
    }

    public function save_court_proceeding(Request $request)
    {
        $rules = [
            'court_proceeding_name' => 'required'
        ];

        $validMsg = [
            'court_proceeding_name.required' => 'Court Proceeding field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $court_proceeding = new SetupCourtProceeding();
        $court_proceeding->court_proceeding_name = $request->court_proceeding_name;
        $court_proceeding->save();

        session()->flash('success','Court Proceeding Added Successfully.');
        return redirect()->route('court-proceeding');
    }

    public function edit_court_proceeding($id)
    {
        $data = SetupCourtProceeding::find($id);
        return view('setup.court_proceeding.edit_court_proceeding',compact('data'));
    }

    public function update_court_proceeding(Request $request, $id)
    {
        $rules = [
            'court_proceeding_name' => 'required'
        ];

        $validMsg = [
            'court_proceeding_name.required' => 'Court Proceeding field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $court_proceeding = SetupCourtProceeding::find($id);
        $court_proceeding->court_proceeding_name = $request->court_proceeding_name;
        $court_proceeding->save();

        session()->flash('success', 'Court Proceeding Updated Successfully.');

        return redirect()->route('court-proceeding');
    }

    public function delete_court_proceeding($id)
    {
        $data = SetupCourtProceeding::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Court Proceeding Deleted Successfully');
        return redirect()->back();
    }


    //day_notes

    public function day_notes()
    {
        $data = SetupDayNote::where('delete_status',0)->get();
        return view('setup.day_notes.day_notes',compact('data'));
    }

    public function add_day_notes()
    {
        return view('setup.day_notes.add_day_notes');
    }

    public function save_day_notes(Request $request)
    {
        $rules = [
            'day_notes_name' => 'required'
        ];

        $validMsg = [
            'day_notes_name.required' => 'Day Notes field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $day_notes = new SetupDayNote();
        $day_notes->day_notes_name = $request->day_notes_name;
        $day_notes->save();

        session()->flash('success','Day Notes Added Successfully.');
        return redirect()->route('day-notes');
    }

    public function edit_day_notes($id)
    {
        $data = SetupDayNote::find($id);
        return view('setup.day_notes.edit_day_notes',compact('data'));
    }

    public function update_day_notes(Request $request, $id)
    {
        $rules = [
            'day_notes_name' => 'required'
        ];

        $validMsg = [
            'day_notes_name.required' => 'Day Notes field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $day_notes = SetupDayNote::find($id);
        $day_notes->day_notes_name = $request->day_notes_name;
        $day_notes->save();

        session()->flash('success', 'Day Notes Updated Successfully.');

        return redirect()->route('day-notes');
    }

    public function delete_day_notes($id)
    {
        $data = SetupDayNote::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Day Notes Deleted Successfully');
        return redirect()->back();
    }


    //in_favour_of

    public function in_favour_of()
    {
        $data = SetupInFavourOf::where('delete_status',0)->get();
        return view('setup.in_favour_of.in_favour_of',compact('data'));
    }

    public function add_in_favour_of()
    {
        return view('setup.in_favour_of.add_in_favour_of');
    }

    public function save_in_favour_of(Request $request)
    {
        $rules = [
            'in_favour_of_name' => 'required'
        ];

        $validMsg = [
            'in_favour_of_name.required' => 'In favour of field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $in_favour_of = new SetupInFavourOf();
        $in_favour_of->in_favour_of_name = $request->in_favour_of_name;
        $in_favour_of->save();

        session()->flash('success','In favour of Added Successfully.');
        return redirect()->route('in-favour-of');
    }

    public function edit_in_favour_of($id)
    {
        $data = SetupInFavourOf::find($id);
        return view('setup.in_favour_of.edit_in_favour_of',compact('data'));
    }

    public function update_in_favour_of(Request $request, $id)
    {
        $rules = [
            'in_favour_of_name' => 'required'
        ];

        $validMsg = [
            'in_favour_of_name.required' => 'In favour of field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $in_favour_of = SetupInFavourOf::find($id);
        $in_favour_of->in_favour_of_name = $request->in_favour_of_name;
        $in_favour_of->save();

        session()->flash('success', 'In favour of Updated Successfully.');

        return redirect()->route('in-favour-of');
    }

    public function delete_in_favour_of($id)
    {
        $data = SetupInFavourOf::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','In favour of Deleted Successfully');
        return redirect()->back();
    }


    //referrer

    public function referrer()
    {
        $data = SetupReferrer::where('delete_status',0)->get();
        return view('setup.referrer.referrer',compact('data'));
    }

    public function add_referrer()
    {
        return view('setup.referrer.add_referrer');
    }

    public function save_referrer(Request $request)
    {
        $rules = [
            'referrer_name' => 'required'
        ];

        $validMsg = [
            'referrer_name.required' => 'Referrer field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $referrer = new SetupReferrer();
        $referrer->referrer_name = $request->referrer_name;
        $referrer->referrer_mobile = $request->referrer_mobile;
        $referrer->referrer_email = $request->referrer_email;
        $referrer->referrer_address = $request->referrer_address;
        $referrer->save();

        session()->flash('success','Referrer Added Successfully.');
        return redirect()->route('referrer');
    }

    public function edit_referrer($id)
    {
        $data = SetupReferrer::find($id);
        return view('setup.referrer.edit_referrer',compact('data'));
    }

    public function update_referrer(Request $request, $id)
    {
        $rules = [
            'referrer_name' => 'required'
        ];

        $validMsg = [
            'referrer_name.required' => 'Referrer field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $referrer = SetupReferrer::find($id);
        $referrer->referrer_name = $request->referrer_name;
        $referrer->referrer_mobile = $request->referrer_mobile;
        $referrer->referrer_email = $request->referrer_email;
        $referrer->referrer_address = $request->referrer_address;
        $referrer->save();

        session()->flash('success', 'Referrer Updated Successfully.');

        return redirect()->route('referrer');
    }

    public function delete_referrer($id)
    {
        $data = SetupReferrer::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Referrer Deleted Successfully');
        return redirect()->back();
    }


    //party

    public function party()
    {
        $data = SetupParty::where('delete_status',0)->get();
        return view('setup.parties.party',compact('data'));
    }

    public function add_party()
    {
        return view('setup.parties.add_party');
    }

    public function save_party(Request $request)
    {
        $rules = [
            'party_name' => 'required'
        ];

        $validMsg = [
            'party_name.required' => 'Party field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $party = new SetupParty();
        $party->party_name = $request->party_name;
        $party->save();

        session()->flash('success','Party Added Successfully.');
        return redirect()->route('party');
    }

    public function edit_party($id)
    {
        $data = SetupParty::find($id);
        return view('setup.parties.edit_party',compact('data'));
    }

    public function update_party(Request $request, $id)
    {
        $rules = [
            'party_name' => 'required'
        ];

        $validMsg = [
            'party_name.required' => 'Party field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $party = SetupParty::find($id);
        $party->party_name = $request->party_name;
        $party->save();

        session()->flash('success', 'Party Updated Successfully.');

        return redirect()->route('party');
    }

    public function delete_party($id)
    {
        $data = SetupParty::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Party Deleted Successfully');
        return redirect()->back();
    }


    //client

    public function client()
    {
        $data = SetupClient::where('delete_status',0)->get();
        return view('setup.client.client',compact('data'));
    }

    public function add_client()
    {
        return view('setup.client.add_client');
    }

    public function save_client(Request $request)
    {
        $rules = [
            'client_name' => 'required'
        ];

        $validMsg = [
            'client_name.required' => 'Client field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $client = new SetupClient();
        $client->client_name = $request->client_name;
        $client->client_mobile = $request->client_mobile;
        $client->client_email = $request->client_email;
        $client->client_address = $request->client_address;
        $client->save();

        session()->flash('success','Client Added Successfully.');
        return redirect()->route('client');
    }

    public function edit_client($id)
    {
        $data = SetupClient::find($id);
        return view('setup.client.edit_client',compact('data'));
    }

    public function update_client(Request $request, $id)
    {
        $rules = [
            'client_name' => 'required'
        ];

        $validMsg = [
            'client_name.required' => 'Client field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $client = SetupClient::find($id);
        $client->client_name = $request->client_name;
        $client->client_mobile = $request->client_mobile;
        $client->client_email = $request->client_email;
        $client->client_address = $request->client_address;
        $client->save();

        session()->flash('success', 'Client Updated Successfully.');

        return redirect()->route('client');
    }

    public function delete_client($id)
    {
        $data = SetupClient::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Referrer Deleted Successfully');
        return redirect()->back();
    }



    //profession

    public function profession()
    {
        $data = SetupProfession::where('delete_status',0)->get();
        return view('setup.profession.profession',compact('data'));
    }

    public function add_profession()
    {
        return view('setup.profession.add_profession');
    }

    public function save_profession(Request $request)
    {
        $rules = [
            'profession_name' => 'required'
        ];

        $validMsg = [
            'profession_name.required' => 'Profession field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $profession = new SetupProfession();
        $profession->profession_name = $request->profession_name;
        $profession->save();

        session()->flash('success','Profession Added Successfully.');
        return redirect()->route('profession');
    }

    public function edit_profession($id)
    {
        $data = SetupProfession::find($id);
        return view('setup.profession.edit_profession',compact('data'));
    }

    public function update_profession(Request $request, $id)
    {
        $rules = [
            'profession_name' => 'required'
        ];

        $validMsg = [
            'profession_name.required' => 'Profession field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $profession = SetupProfession::find($id);
        $profession->profession_name = $request->profession_name;
        $profession->save();

        session()->flash('success', 'Profession Updated Successfully.');

        return redirect()->route('profession');
    }

    public function delete_profession($id)
    {
        $data = SetupProfession::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Profession Deleted Successfully');
        return redirect()->back();
    }



    //documents

    public function documents()
    {
        $data = SetupDocument::where('delete_status',0)->get();
        return view('setup.documents.documents',compact('data'));
    }

    public function add_documents()
    {
        return view('setup.documents.add_documents');
    }

    public function save_documents(Request $request)
    {
        $rules = [
            'documents_name' => 'required'
        ];

        $validMsg = [
            'documents_name.required' => 'Document field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $documents = new SetupDocument();
        $documents->documents_name = $request->documents_name;
        $documents->save();

        session()->flash('success','Document Added Successfully.');
        return redirect()->route('documents-setup');
    }

    public function edit_documents($id)
    {
        $data = SetupDocument::find($id);
        return view('setup.documents.edit_documents',compact('data'));
    }

    public function update_documents(Request $request, $id)
    {
        $rules = [
            'documents_name' => 'required'
        ];

        $validMsg = [
            'documents_name.required' => 'Document field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $documents = SetupDocument::find($id);
        $documents->documents_name = $request->documents_name;
        $documents->save();

        session()->flash('success', 'Document Updated Successfully.');

        return redirect()->route('documents-setup');
    }

    public function delete_documents($id)
    {
        $data = SetupDocument::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Document Deleted Successfully');
        return redirect()->back();
    }


    //case_title

    public function case_title()
    {
        $data = SetupCaseTitle::where('delete_status',0)->get();
        return view('setup.case_title.case_title',compact('data'));
    }

    public function add_case_title()
    {
        return view('setup.case_title.add_case_title');
    }

    public function save_case_title(Request $request)
    {
        $rules = [
            'case_type' => 'required',
            'case_title_name' => 'required',
        ];

        $validMsg = [
            'case_type.required' => 'Class of Cases field is required',
            'case_title_name.required' => 'Case Title field is required',
        ];

        $this->validate($request, $rules, $validMsg);

        $case_title = new SetupCaseTitle();
        $case_title->case_type = $request->case_type;
        $case_title->case_title_name = $request->case_title_name;
        $case_title->save();

        session()->flash('success','Case Title Added Successfully.');
        return redirect()->route('case-title');
    }

    public function edit_case_title($id)
    {
        $data = SetupCaseTitle::find($id);
        return view('setup.case_title.edit_case_title',compact('data'));
    }

    public function update_case_title(Request $request, $id)
    {
        $rules = [
            'case_type' => 'required',
            'case_title_name' => 'required',
        ];

        $validMsg = [
            'case_type.required' => 'Class of Cases field is required',
            'case_title_name.required' => 'Case Title field is required',
        ];

        $this->validate($request, $rules, $validMsg);

        $case_title = SetupCaseTitle::find($id);
        $case_title->case_type = $request->case_type;
        $case_title->case_title_name = $request->case_title_name;
        $case_title->save();

        session()->flash('success', 'Case Title Updated Successfully.');

        return redirect()->route('case-title');
    }

    public function delete_case_title($id)
    {
        $data = SetupCaseTitle::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Case Title Deleted Successfully');
        return redirect()->back();
    }




    //opposition

    public function opposition()
    {
        $data = SetupOpposition::where('delete_status',0)->get();
        return view('setup.opposition.opposition',compact('data'));
    }

    public function add_opposition()
    {
        return view('setup.opposition.add_opposition');
    }

    public function save_opposition(Request $request)
    {
        $rules = [
            'opposition_name' => 'required'
        ];

        $validMsg = [
            'opposition_name.required' => 'Opposition field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $opposition = new SetupOpposition();
        $opposition->opposition_name = $request->opposition_name;
        $opposition->opposition_mobile = $request->opposition_mobile;
        $opposition->opposition_email = $request->opposition_email;
        $opposition->opposition_address = $request->opposition_address;
        $opposition->save();

        session()->flash('success','Opposition Added Successfully.');
        return redirect()->route('opposition');
    }

    public function edit_opposition($id)
    {
        $data = SetupOpposition::find($id);
        return view('setup.opposition.edit_opposition',compact('data'));
    }

    public function update_opposition(Request $request, $id)
    {
        $rules = [
            'opposition_name' => 'required'
        ];

        $validMsg = [
            'opposition_name.required' => 'Opposition field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $opposition = SetupOpposition::find($id);
        $opposition->opposition_name = $request->opposition_name;
        $opposition->opposition_mobile = $request->opposition_mobile;
        $opposition->opposition_email = $request->opposition_email;
        $opposition->opposition_address = $request->opposition_address;
        $opposition->save();

        session()->flash('success', 'Opposition Updated Successfully.');

        return redirect()->route('opposition');
    }

    public function delete_opposition($id)
    {
        $data = SetupOpposition::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Opposition Deleted Successfully');
        return redirect()->back();
    }


    //complainant

    public function complainant()
    {
        $data = SetupComplainant::where('delete_status',0)->get();
        return view('setup.complainant.complainant',compact('data'));
    }

    public function add_complainant()
    {
        return view('setup.complainant.add_complainant');
    }

    public function save_complainant(Request $request)
    {
        $rules = [
            'complainant_name' => 'required'
        ];

        $validMsg = [
            'complainant_name.required' => 'Complainant field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $complainant = new SetupComplainant();
        $complainant->complainant_name = $request->complainant_name;
        $complainant->complainant_mobile = $request->complainant_mobile;
        $complainant->complainant_email = $request->complainant_email;
        $complainant->complainant_address = $request->complainant_address;
        $complainant->save();

        session()->flash('success','Complainant Added Successfully.');
        return redirect()->route('complainant');
    }

    public function edit_complainant($id)
    {
        $data = SetupComplainant::find($id);
        return view('setup.complainant.edit_complainant',compact('data'));
    }

    public function update_complainant(Request $request, $id)
    {
        $rules = [
            'complainant_name' => 'required'
        ];

        $validMsg = [
            'complainant_name.required' => 'Complainant field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $complainant = SetupComplainant::find($id);
        $complainant->complainant_name = $request->complainant_name;
        $complainant->complainant_mobile = $request->complainant_mobile;
        $complainant->complainant_email = $request->complainant_email;
        $complainant->complainant_address = $request->complainant_address;
        $complainant->save();

        session()->flash('success', 'Complainant Updated Successfully.');

        return redirect()->route('complainant');
    }

    public function delete_complainant($id)
    {
        $data = SetupComplainant::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Complainant Deleted Successfully');
        return redirect()->back();
    }


    //accused

    public function accused()
    {
        $data = SetupAccused::where('delete_status',0)->get();
        return view('setup.accused.accused',compact('data'));
    }

    public function add_accused()
    {
        return view('setup.accused.add_accused');
    }

    public function save_accused(Request $request)
    {
        $rules = [
            'accused_name' => 'required'
        ];

        $validMsg = [
            'accused_name.required' => 'Accused field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $accused = new SetupAccused();
        $accused->accused_name = $request->accused_name;
        $accused->accused_mobile = $request->accused_mobile;
        $accused->accused_email = $request->accused_email;
        $accused->accused_address = $request->accused_address;
        $accused->save();

        session()->flash('success','Accused Added Successfully.');
        return redirect()->route('accused');
    }

    public function edit_accused($id)
    {
        $data = SetupAccused::find($id);
        return view('setup.accused.edit_accused',compact('data'));
    }

    public function update_accused(Request $request, $id)
    {
        $rules = [
            'accused_name' => 'required'
        ];

        $validMsg = [
            'accused_name.required' => 'Accused field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $accused = SetupAccused::find($id);
        $accused->accused_name = $request->accused_name;
        $accused->accused_mobile = $request->accused_mobile;
        $accused->accused_email = $request->accused_email;
        $accused->accused_address = $request->accused_address;
        $accused->save();

        session()->flash('success', 'Accused Updated Successfully.');

        return redirect()->route('accused');
    }

    public function delete_accused($id)
    {
        $data = SetupAccused::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Accused Deleted Successfully.');
        return redirect()->back();
    }


    //court_short setup

    public function court_short()
    {
        $data = SetupCourtShort::where('delete_status',0)->get();
        return view('setup.court_short.court_short',compact('data'));
    }

    public function add_court_short()
    {
        return view('setup.court_short.add_court_short');
    }

    public function save_court_short(Request $request)
    {
        $rules = [
            'court_short_name' => 'required'
        ];

        $validMsg = [
            'court_short_name.required' => 'Court Short field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = new SetupCourtShort();
        $data->case_type = $request->case_type;
        $data->court_short_name = $request->court_short_name;
        $data->save();

        session()->flash('success','Court Short Added Successfully');
        return redirect()->route('court-short');

    }

    public function edit_court_short($id)
    {
        $data = SetupCourtShort::find($id);
        return view('setup.court_short.edit_court_short',compact('data'));
    }

    public function update_court_short(Request $request, $id)
    {
        $rules = [
            'court_short_name' => 'required'
        ];

        $validMsg = [
            'court_short_name.required' => 'Court Short field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $data = SetupCourtShort::find($id);
        $data->case_type = $request->case_type;
        $data->court_short_name = $request->court_short_name;
        $data->save();

        session()->flash('success','Court Short Updated');
        return redirect()->route('court-short');
    }

    public function delete_court_short($id)
    {
        $data = SetupCourtShort::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success', 'Court Short Deleted');
        return redirect()->back();
    }


    //progress

    public function progress()
    {
        $data = SetupProgress::where('delete_status',0)->get();
        return view('setup.progress.progress',compact('data'));
    }

    public function add_progress()
    {
        return view('setup.progress.add_progress');
    }

    public function save_progress(Request $request)
    {
        $rules = [
            'progress_name' => 'required'
        ];

        $validMsg = [
            'progress_name.required' => 'Progress field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $progress = new SetupProgress();
        $progress->progress_name = $request->progress_name;
        $progress->save();

        session()->flash('success','Progress Added Successfully.');
        return redirect()->route('progress');
    }

    public function edit_progress($id)
    {
        $data = SetupProgress::find($id);
        return view('setup.progress.edit_progress',compact('data'));
    }

    public function update_progress(Request $request, $id)
    {
        $rules = [
            'progress_name' => 'required'
        ];

        $validMsg = [
            'progress_name.required' => 'Progress field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $progress = SetupProgress::find($id);
        $progress->progress_name = $request->progress_name;
        $progress->save();

        session()->flash('success', 'Progress Updated Successfully.');

        return redirect()->route('progress');
    }

    public function delete_progress($id)
    {
        $data = SetupProgress::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Progress Deleted Successfully');
        return redirect()->back();
    }

    //bill_particulars

    public function bill_particulars()
    {
        $data = SetupBillParticular::where('delete_status',0)->get();
        return view('setup.bill_particulars.bill_particulars',compact('data'));
    }

    public function add_bill_particulars()
    {
        return view('setup.bill_particulars.add_bill_particulars');
    }

    public function save_bill_particulars(Request $request)
    {
        $rules = [
            'bill_particulars_name' => 'required'
        ];

        $validMsg = [
            'bill_particulars_name.required' => 'Bill Particulars field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $bill_particulars = new SetupBillParticular();
        $bill_particulars->bill_particulars_name = $request->bill_particulars_name;
        $bill_particulars->save();

        session()->flash('success','Bill Particulars Added Successfully.');
        return redirect()->route('bill-particulars');
    }

    public function edit_bill_particulars($id)
    {
        $data = SetupBillParticular::find($id);
        return view('setup.bill_particulars.edit_bill_particulars',compact('data'));
    }

    public function update_bill_particulars(Request $request, $id)
    {
        $rules = [
            'bill_particulars_name' => 'required'
        ];

        $validMsg = [
            'bill_particulars_name.required' => 'Bill Particulars field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $bill_particulars = SetupBillParticular::find($id);
        $bill_particulars->bill_particulars_name = $request->bill_particulars_name;
        $bill_particulars->save();

        session()->flash('success', 'Bill Particulars Updated Successfully.');

        return redirect()->route('bill-particulars');
    }

    public function delete_bill_particulars($id)
    {
        $data = SetupBillParticular::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Bill Particulars Deleted Successfully');
        return redirect()->back();
    }

    //bill_schedule

    public function bill_schedule()
    {
        $data = BillSchedule::where('delete_status',0)->get();
        return view('setup.bill_schedule.bill_schedule',compact('data'));
    }

    public function add_bill_schedule()
    {
        return view('setup.bill_schedule.add_bill_schedule');
    }

    public function save_bill_schedule(Request $request)
    {
        $rules = [
            'bill_schedule_name' => 'required'
        ];

        $validMsg = [
            'bill_schedule_name.required' => 'Bill Schedule field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $bill_schedule = new BillSchedule();
        $bill_schedule->bill_schedule_name = $request->bill_schedule_name;
        $bill_schedule->save();

        session()->flash('success','Bill Schedule Added Successfully.');
        return redirect()->route('bill-schedule');
    }

    public function edit_bill_schedule($id)
    {
        $data = BillSchedule::find($id);
        return view('setup.bill_schedule.edit_bill_schedule',compact('data'));
    }

    public function update_bill_schedule(Request $request, $id)
    {
        $rules = [
            'bill_schedule_name' => 'required'
        ];

        $validMsg = [
            'bill_schedule_name.required' => 'Bill Schedule field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $bill_schedule = BillSchedule::find($id);
        $bill_schedule->bill_schedule_name = $request->bill_schedule_name;
        $bill_schedule->save();

        session()->flash('success', 'Bill Schedule Updated Successfully.');

        return redirect()->route('bill-schedule');
    }

    public function delete_bill_schedule($id)
    {
        $data = BillSchedule::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Bill Schedule Deleted Successfully');
        return redirect()->back();
    }

    //payment_mode

    public function payment_mode()
    {
        $data = PaymentMode::where('delete_status',0)->get();
        return view('setup.payment_mode.payment_mode',compact('data'));
    }

    public function add_payment_mode()
    {
        return view('setup.payment_mode.add_payment_mode');
    }

    public function save_payment_mode(Request $request)
    {
        $rules = [
            'payment_mode_name' => 'required'
        ];

        $validMsg = [
            'payment_mode_name.required' => 'Payment Mode field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $payment_mode = new PaymentMode();
        $payment_mode->payment_mode_name = $request->payment_mode_name;
        $payment_mode->save();

        session()->flash('success','Payment Mode Added Successfully.');
        return redirect()->route('payment-mode');
    }

    public function edit_payment_mode($id)
    {
        $data = PaymentMode::find($id);
        return view('setup.payment_mode.edit_payment_mode',compact('data'));
    }

    public function update_payment_mode(Request $request, $id)
    {
        $rules = [
            'payment_mode_name' => 'required'
        ];

        $validMsg = [
            'payment_mode_name.required' => 'Payment Mode field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $payment_mode = PaymentMode::find($id);
        $payment_mode->payment_mode_name = $request->payment_mode_name;
        $payment_mode->save();

        session()->flash('success', 'Payment Mode Updated Successfully.');

        return redirect()->route('payment-mode');
    }

    public function delete_payment_mode($id)
    {
        $data = PaymentMode::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Payment Mode Deleted Successfully');
        return redirect()->back();
    }


    //cabinet

    public function cabinet()
    {
        $data = SetupCabinet::where('delete_status',0)->get();
        return view('setup.cabinet.cabinet',compact('data'));
    }

    public function add_cabinet()
    {
        return view('setup.cabinet.add_cabinet');
    }

    public function save_cabinet(Request $request)
    {
        $rules = [
            'cabinet_name' => 'required'
        ];

        $validMsg = [
            'cabinet_name.required' => 'Cabinet field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $cabinet = new SetupCabinet();
        $cabinet->cabinet_name = $request->cabinet_name;
        $cabinet->save();

        session()->flash('success','Cabinet Added Successfully.');
        return redirect()->route('cabinet');
    }

    public function edit_cabinet($id)
    {
        $data = SetupCabinet::find($id);
        return view('setup.cabinet.edit_cabinet',compact('data'));
    }

    public function update_cabinet(Request $request, $id)
    {
        $rules = [
            'cabinet_name' => 'required'
        ];

        $validMsg = [
            'cabinet_name.required' => 'Cabinet field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $cabinet = SetupCabinet::find($id);
        $cabinet->cabinet_name = $request->cabinet_name;
        $cabinet->save();

        session()->flash('success', 'Cabinet Updated Successfully.');

        return redirect()->route('cabinet');
    }

    public function delete_cabinet($id)
    {
        $data = SetupCabinet::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Cabinet Deleted Successfully');
        return redirect()->back();
    }

    //client_name

    public function client_name()
    {
        $data = SetupClientName::where('delete_status',0)->get();
        return view('setup.client_name.client_name',compact('data'));
    }

    public function add_client_name()
    {
        return view('setup.client_name.add_client_name');
    }

    public function save_client_name(Request $request)
    {
        $rules = [
            'client_name' => 'required'
        ];

        $validMsg = [
            'client_name.required' => 'Client field is required'
        ];

        $this->validate($request, $rules, $validMsg);

        $client_name = new SetupClientName();
        $client_name->client_name = $request->client_name;
        $client_name->save();

        session()->flash('success','Client Added Successfully.');
        return redirect()->route('client-name');
    }

    public function edit_client_name($id)
    {
        $data = SetupClientName::find($id);
        return view('setup.client_name.edit_client_name',compact('data'));
    }

    public function update_client_name(Request $request, $id)
    {
        $rules = [
            'client_name' => 'required'
        ];

        $validMsg = [
            'client_name.required' => 'Client field is required.'
        ];

        $this->validate($request, $rules, $validMsg);

        $client_name = SetupClientName::find($id);
        $client_name->client_name = $request->client_name;
        $client_name->save();

        session()->flash('success', 'Client Updated Successfully.');

        return redirect()->route('client-name');
    }

    public function delete_client_name($id)
    {
        $data = SetupClientName::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Client Deleted Successfully');
        return redirect()->back();
    }

}
