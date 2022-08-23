<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SocialCompliance;
class SocialComplianceController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:social-compliance-info-list|social-compliance-info-create|social-compliance-info-edit|social-compliance-info-delete|social-compliance-info-view', ['only' => ['social_compliance']]);
        $this->middleware('permission:social-compliance-info-create', ['only' => ['add_social_compliance','save_social_compliance']]);
        $this->middleware('permission:social-compliance-info-edit', ['only' => ['edit_social_compliance','update_social_compliance']]);
        $this->middleware('permission:social-compliance-info-delete', ['only' => ['delete_social_compliance']]);
        $this->middleware('permission:social-compliance-info-view', ['only' => ['view_social_compliance']]);
    }

    public function social_compliance()
    {

        $data = SocialCompliance::all();

        // $data = json_decode(json_encode($data));
        // echo "<pre>";print_r($data);die;

        return view('compliance_management.social_compliance.social_compliance',compact('data'));
    }

    public function add_social_compliance()
    {

        return view('compliance_management.social_compliance.add_social_compliance');

    }

    public function save_social_compliance(Request $request)
    {
        // dd($request->all());
//        $rules = [
//            'employment_condition' => 'required',
//            'working_hour_leave' => 'required',
//            'compensation_benefit' => 'required',
//
//        ];
//
//        $validMsg = [
//
//            'employment_condition.required' => 'Employment Condition field is required',
//            'working_hour_leave.required' => 'Working Hour field is required',
//            'compensation_benefit.required' => 'Compensation Benefit field is required',
//
//        ];
//
//        $this->validate($request, $rules, $validMsg);

        $data = new SocialCompliance();
        $data->employment_condition = $request->employment_condition;
        $data->working_hour_leave = $request->working_hour_leave;
        $data->compensation_benefit = $request->compensation_benefit;
        $data->hygine_safety = $request->hygine_safety;
        $data->welfare_security = $request->welfare_security;
        $data->industrial_relation = $request->industrial_relation;
        $data->labour_law_safety = $request->labour_law_safety;
        $data->bnbc_safety = $request->bnbc_safety;
        $data->fire_safety = $request->fire_safety;
        $data->electrical_safety = $request->electrical_safety;
        $data->natural_disaster = $request->natural_disaster;
        $data->code_of_conduct = $request->code_of_conduct;
        $data->international_standard = $request->international_standard;
        $data->save();

        session()->flash('success','Social Compliance Added Successfully.');
        return redirect()->route('social-compliance');

    }

    public function edit_social_compliance($id)
    {
        $data = SocialCompliance::find($id);
        // dd($data);
        return view('compliance_management.social_compliance.edit_social_compliance',compact('data'));
    }

    public function update_social_compliance(Request $request, $id)
    {
        // dd($request->all());
//        $rules = [
//            'employment_condition' => 'required',
//            'working_hour_leave' => 'required',
//            'compensation_benefit' => 'required',
//
//        ];
//
//        $validMsg = [
//
//            'employment_condition.required' => 'Employment Condition field is required',
//            'working_hour_leave.required' => 'Working Hour field is required',
//            'compensation_benefit.required' => 'Compensation Benefit field is required',
//
//        ];
//
//        $this->validate($request, $rules, $validMsg);

        $data = SocialCompliance::find($id);
        $data->employment_condition = $request->employment_condition;
        $data->working_hour_leave = $request->working_hour_leave;
        $data->compensation_benefit = $request->compensation_benefit;
        $data->hygine_safety = $request->hygine_safety;
        $data->welfare_security = $request->welfare_security;
        $data->industrial_relation = $request->industrial_relation;
        $data->labour_law_safety = $request->labour_law_safety;
        $data->bnbc_safety = $request->bnbc_safety;
        $data->fire_safety = $request->fire_safety;
        $data->electrical_safety = $request->electrical_safety;
        $data->natural_disaster = $request->natural_disaster;
        $data->code_of_conduct = $request->code_of_conduct;
        $data->international_standard = $request->international_standard;
        $data->save();

        session()->flash('success','Social Compliance Updated Successfully.');
        return redirect()->route('social-compliance');

    }

    public function delete_social_compliance($id)
    {
        $data = SocialCompliance::find($id);
        if ($data['delete_status'] == 0){
            $delete_status = 1;
        }else{
            $delete_status = 0;
        }

        $data->delete_status = $delete_status;
        $data->save();

        session()->flash('success','Social Compliance Deleted Successfully');
        return redirect()->back();

    }

    public function view_social_compliance($id)
    {
        $data = SocialCompliance::find($id);

        // $data = json_decode(json_encode($data));
        // echo "<pre>";print_r($data);die;

        return view('compliance_management.social_compliance.view_social_compliance',compact('data'));
    }

    public function search_social_compliance(Request $request)
    {
// dd($request->all());
        $query = DB::table('social_compliances');

        if ($request->employment_condition) {

            $query2 = $query->where('social_compliances.employment_condition',$request->employment_condition);


        }else if ($request->code_of_conduct) {

            $query2 = $query->where('social_compliances.code_of_conduct',$request->code_of_conduct);

        }else if ($request->international_standard) {

            $query2 = $query->where('social_compliances.international_standard',$request->international_standard);

        }else{

            $query2 = $query;

        }

            $data = $query2->get();

        return response()->json([
            'result' => 'social_compliance',
            'data' => $data,
        ]);

    }


}
