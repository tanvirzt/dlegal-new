<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CivilCases;
use App\Models\SetupComplianceCategory;
use App\Models\RegulatoryCompliance;
use DB;

class RegulatoryComplianceController extends Controller
{
    //

    public function regulatory_compliance()
    {
        $compliance_category = SetupComplianceCategory::where('delete_status',0)->get();

        $data = DB::table('regulatory_compliances')
                ->leftJoin('setup_compliance_categories','regulatory_compliances.compliance_category_id','=','setup_compliance_categories.id')
                ->select('regulatory_compliances.*','setup_compliance_categories.compliance_category_name')
                ->get();
// dd($compliance_category);
        return view('compliance_management.regulatory_compliance.regulatory_compliance',compact('data','compliance_category'));
    }

    public function add_regulatory_compliance()
    {
        // dd($district);
        $compliance_category = SetupComplianceCategory::where('delete_status',0)->get();
        // dd($compliance_category);
        return view('compliance_management.regulatory_compliance.add_regulatory_compliance')->with('compliance_category',$compliance_category);

    }

    public function save_regulatory_compliance(Request $request)
    {
        // dd($request->all());

        $rules = [
            'certificates_name' => 'required',
            'compliance_category_id' => 'required',
            'certificates_authority' => 'required',

        ];

        $validMsg = [
            'certificates_name.required' => 'Cetificates Name field is required',
            'compliance_category_id.required' => 'Compliance Category field is required',
            'certificates_authority.required' => 'Cetificates Authority field is required',

        ];

        $this->validate($request, $rules, $validMsg);

        $data = new RegulatoryCompliance();
        $data->certificates_name = $request->certificates_name;
        $data->compliance_category_id = $request->compliance_category_id;
        $data->certificates_authority = $request->certificates_authority;
        $data->certificates_ministry = $request->certificates_ministry;
        $data->certificates_getting_cl_first_date = $request->certificates_getting_cl_first_date;
        $data->certificates_expires = $request->certificates_expires;
        $data->certificates_renew = $request->certificates_renew;
        $data->certificates_special_provision = $request->certificates_special_provision;
        $data->certificates_special_remarks = $request->certificates_special_remarks;
        $data->govt_authority = $request->govt_authority;
        $data->govt_ministry_dept = $request->govt_ministry_dept;
        $data->govt_getting_cl_first_date = $request->govt_getting_cl_first_date;
        $data->govt_expires = $request->govt_expires;
        $data->govt_renew = $request->govt_renew;
        $data->govt_special_provision = $request->govt_special_provision;
        $data->govt_special_remarks = $request->govt_special_remarks;
        $data->utility_electricity = $request->utility_electricity;
        $data->utility_gas = $request->utility_gas;
        $data->utility_sewerage = $request->utility_sewerage;
        $data->utility_water = $request->utility_water;
        $data->utility_expires = $request->utility_expires;
        $data->utility_renew = $request->utility_renew;
        $data->save();

        session()->flash('success','Regulatory Compliance Added Successfully.');
        return redirect()->route('regulatory-compliance');

    }

    public function edit_regulatory_compliance($id)
    {
        // dd($id);
        $compliance_category = SetupComplianceCategory::where('delete_status',0)->get();
        $data = RegulatoryCompliance::find($id);
        // dd($data);
        return view('compliance_management.regulatory_compliance.edit_regulatory_compliance',compact('data','compliance_category'));

    }

    public function update_regulatory_compliance(Request $request, $id)
    {
        // dd($request->all());

        $rules = [
            'certificates_name' => 'required',
            'compliance_category_id' => 'required',
            'certificates_authority' => 'required',

        ];

        $validMsg = [
            'certificates_name.required' => 'Cetificates Name field is required',
            'compliance_category_id.required' => 'Compliance Category field is required',
            'certificates_authority.required' => 'Cetificates Authority field is required',

        ];

        $this->validate($request, $rules, $validMsg);

        $data = RegulatoryCompliance::find($id);
        $data->certificates_name = $request->certificates_name;
        $data->compliance_category_id = $request->compliance_category_id;
        $data->certificates_authority = $request->certificates_authority;
        $data->certificates_ministry = $request->certificates_ministry;
        $data->certificates_getting_cl_first_date = $request->certificates_getting_cl_first_date;
        $data->certificates_expires = $request->certificates_expires;
        $data->certificates_renew = $request->certificates_renew;
        $data->certificates_special_provision = $request->certificates_special_provision;
        $data->certificates_special_remarks = $request->certificates_special_remarks;
        $data->govt_authority = $request->govt_authority;
        $data->govt_ministry_dept = $request->govt_ministry_dept;
        $data->govt_getting_cl_first_date = $request->govt_getting_cl_first_date;
        $data->govt_expires = $request->govt_expires;
        $data->govt_renew = $request->govt_renew;
        $data->govt_special_provision = $request->govt_special_provision;
        $data->govt_special_remarks = $request->govt_special_remarks;
        $data->utility_electricity = $request->utility_electricity;
        $data->utility_gas = $request->utility_gas;
        $data->utility_sewerage = $request->utility_sewerage;
        $data->utility_water = $request->utility_water;
        $data->utility_expires = $request->utility_expires;
        $data->utility_renew = $request->utility_renew;
        $data->save();

        session()->flash('success','Regulatory Compliance Updated Successfully.');
        return redirect()->route('regulatory-compliance');
      
    }

    public function delete_regulatory_compliance($id)
    {
        $data = RegulatoryCompliance::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Regulatory Compliance Deleted Successfully');
        return redirect()->back();

    }

    public function view_regulatory_compliance($id)
    {
        // dd($id);
        $compliance_category = SetupComplianceCategory::where('delete_status',0)->get();

        $data = DB::table('regulatory_compliances')
                ->leftJoin('setup_compliance_categories','regulatory_compliances.compliance_category_id','=','setup_compliance_categories.id')
                ->where('regulatory_compliances.id',$id)
                ->select('regulatory_compliances.*','setup_compliance_categories.compliance_category_name')
                ->first();
        // dd($data);
        return view('compliance_management.regulatory_compliance.view_regulatory_compliance',compact('data','compliance_category'));

    }

    public function search_regulatory_compliance(Request $request)
    {

        $query = DB::table('regulatory_compliances')
                ->leftJoin('setup_compliance_categories','regulatory_compliances.compliance_category_id','=','setup_compliance_categories.id');        
        
        if ($request->compliance_category_id) {

            $query2 = $query->where('regulatory_compliances.compliance_category_id',$request->compliance_category_id);
                    

        }else if ($request->certificates_name) {

            $query2 = $query->where('regulatory_compliances.certificates_name',$request->certificates_name);

        }else if ($request->certificates_authority) {

            $query2 = $query->where('regulatory_compliances.certificates_authority',$request->certificates_authority);

        } else {

            $query2 = $query;
            
        }

        $data = $query2->select('regulatory_compliances.*','setup_compliance_categories.compliance_category_name')
                    ->get();
        
        return response()->json([
            'result' => 'regulatory_compliance',
            'data' => $data,
        ]);

    }




}
