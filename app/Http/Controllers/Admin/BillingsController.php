<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetupExternalCouncil;
use App\Models\SetupBillType;
use App\Models\SetupBank;
use App\Models\SetupDigitalPayment;
use App\Models\SetupDistrict;
use App\Models\SetupBankBranch;
use App\Models\CivilCases;
use App\Models\CriminalCase;
use App\Models\LabourCase;
use App\Models\QuassiJudicialCase;
use App\Models\SupremeCourtCase;
use App\Models\HighCourtCase;
use App\Models\AppellateCourtCase;
use App\Models\CaseBilling;
use DB;

class BillingsController extends Controller
{
    //

    public function billing()
    {
        $data = DB::table('case_billings')
                ->leftJoin('setup_bill_types','case_billings.bill_type_id','=','setup_bill_types.id')
                ->leftJoin('setup_districts','case_billings.district_id','=','setup_districts.id')
                ->leftJoin('setup_external_councils','case_billings.panel_lawyer_id','=','setup_external_councils.id')
                ->leftJoin('setup_banks','case_billings.bank_id','=','setup_banks.id')
                ->leftJoin('setup_bank_branches','case_billings.branch_id','=','setup_bank_branches.id')
                ->leftJoin('setup_digital_payments','case_billings.digital_payment_type_id','=','setup_digital_payments.id')
                ->where('case_billings.delete_status',0)
                ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                ->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();

        return view('litigation_management.billings.billings.billing_lists',compact('data','external_council'));
    }

    public function add_billing()
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district'));
    }

    public function find_bank_branch(Request $request)
    {

        $bank_branch = SetupBankBranch::where('bank_id',$request->bank_id)->get();
        return response()->json($bank_branch);
    }

    public function find_case_no(Request $request)
    {
        if ($request->case_type == "Civil Cases") {

            $case = CivilCases::where('delete_status',0)->get();

        }else if ($request->case_type == "Criminal Cases"){

            $case = CriminalCase::where('delete_status',0)->get();

        }else if ($request->case_type == "Labour Cases"){

            $case = LabourCase::where('delete_status',0)->get();
            
        }else if ($request->case_type == "Special Quassi - Judicial Cases"){

            $case = QuassiJudicialCase::where('delete_status',0)->get();
            
        }else if ($request->case_type == "Supreme Court of Bangladesh"){

            $case = SupremeCourtCase::where('delete_status',0)->get();
            
        }else if ($request->case_type == "High Court Division"){

            $case = HighCourtCase::where('delete_status',0)->get();
            
        }else if ($request->case_type == "Appellate Court Division"){

            $case = AppellateCourtCase::where('delete_status',0)->get();
            
        }

        return response()->json($case);
    }

    public function save_billing(Request $request)
    {

        $rules = [
            'bill_type_id' => 'required',
            'payment_type' => 'required',
            'district_id' => 'required',
            'case_type' => 'required',
            'case_no' => 'required',
        ];

        $validMsg = [
            'bill_type_id.required' => 'Bill type field is required',
            'payment_type.required' => 'Payment type field is required',
            'district_id.required' => 'District field is required',
            'case_type.required' => 'Case Type field is required',
            'case_no.required' => 'Case No field is required',
        ];

        $this->validate($request, $rules, $validMsg);


        $data = new CaseBilling();
        $data->bill_type_id = $request->bill_type_id;
        $data->payment_type = $request->payment_type;
        $data->district_id = $request->district_id;
        $data->case_type = $request->case_type;
        $data->case_no = $request->case_no;
        $data->panel_lawyer_id = $request->panel_lawyer_id;
        $data->bill_amount = $request->bill_amount;
        $data->date_of_billing = $request->date_of_billing;
        $data->bank_id = $request->bank_id;
        $data->branch_id = $request->branch_id;
        $data->cheque_no = $request->cheque_no;
        $data->payment_amount = $request->payment_amount;
        $data->digital_payment_type_id = $request->digital_payment_type_id;
        $data->save();

        session()->flash('success','Bill Added Successfully');
        return redirect()->back();

    }

    public function edit_billing($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $bank_branch = SetupBankBranch::where('delete_status',0)->get();
        $data = CaseBilling::find($id);


        if ($data->case_type == "Civil Cases") {

            $case_no = CivilCases::where('delete_status',0)->get();

        } else if ($data->case_type == "Criminal Cases"){

            $case_no = CriminalCase::where('delete_status',0)->get();

        } else if ($data->case_type == "Labour Cases"){

            $case_no = LabourCase::where('delete_status',0)->get();

        } else if ($data->case_type == "Special Quassi - Judicial Cases"){

            $case_no = QuassiJudicialCase::where('delete_status',0)->get();

        } else if ($data->case_type == "Supreme Court of Bangladesh"){

            $case_no = SupremeCourtCase::where('delete_status',0)->get();

        } else if ($data->case_type == "High Court Division"){

            $case_no = HighCourtCase::where('delete_status',0)->get();

        } else if ($data->case_type == "Appellate Court Division"){

            $case_no = AppellateCourtCase::where('delete_status',0)->get();

        }
        
        return view('litigation_management.billings.billings.edit_billing',compact('data','external_council','bill_type','bank','digital_payment_type','district','case_no','bank_branch'));
    }

    public function update_billing(Request $request, $id)
    {

        $rules = [
            'bill_type_id' => 'required',
            'payment_type' => 'required',
            'district_id' => 'required',
            'case_type' => 'required',
            'case_no' => 'required',
        ];

        $validMsg = [
            'bill_type_id.required' => 'Bill type field is required',
            'payment_type.required' => 'Payment type field is required',
            'district_id.required' => 'District field is required',
            'case_type.required' => 'Case Type field is required',
            'case_no.required' => 'Case No field is required',
        ];

        $this->validate($request, $rules, $validMsg);


        $data = CaseBilling::find($id);
        $data->bill_type_id = $request->bill_type_id;
        $data->payment_type = $request->payment_type;
        $data->district_id = $request->district_id;
        $data->case_type = $request->case_type;
        $data->case_no = $request->case_no;
        $data->panel_lawyer_id = $request->panel_lawyer_id;
        $data->bill_amount = $request->bill_amount;
        $data->date_of_billing = $request->date_of_billing;

        if($request->payment_type == "Cash Payment"){

            $data->bank_id = null;
            $data->branch_id = null;
            $data->cheque_no = null;
            $data->digital_payment_type_id = null;

        }else if($request->payment_type == "Bank Payment"){

            $data->bank_id = $request->bank_id;
            $data->branch_id = $request->branch_id;
            $data->cheque_no = $request->cheque_no;
            $data->digital_payment_type_id = null;

        }else if($request->payment_type == "Digital Payment"){

            $data->bank_id = null;
            $data->branch_id = null;
            $data->cheque_no = null;
            $data->digital_payment_type_id = $request->digital_payment_type_id;

        }

        $data->payment_amount = $request->payment_amount;
        $data->save();

        session()->flash('success','Bill Updated Successfully');
        return redirect()->back();

    }

    public function add_billing_civil_cases($id)
    {

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $civil_case = CivilCases::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','civil_case'));

    }

    public function add_billing_criminal_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $criminal_case = CriminalCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','criminal_case'));
    }

    public function delete_billing($id)
    {
        $data = CaseBilling::find($id);
        if ($data['delete_status'] == 1){
            $delete_status = 0;
        }else{
            $delete_status = 1;
        }
        $data->delete_status = $delete_status;
        $data->save();
  
        session()->flash('success', 'Billing Deleted');
        return redirect()->back();
    }

    public function add_billing_labour_cases($id)
    {

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $labour_case = LabourCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','labour_case'));

    }
  
    public function add_billing_quassi_judicial_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $quassi_judicial_case = QuassiJudicialCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','quassi_judicial_case'));
    }

    public function add_billing_supreme_court_cases($id)
    {

        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $supreme_court_case = SupremeCourtCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','supreme_court_case'));

    }

    public function add_billing_high_court_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $high_court_case = HighCourtCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','high_court_case'));
    }

    public function add_billing_appellate_court_cases($id)
    {
        $bill_type = SetupBillType::where('delete_status',0)->get();
        $external_council = SetupExternalCouncil::where('delete_status',0)->get();
        $bank = SetupBank::where('delete_status',0)->get();
        $digital_payment_type = SetupDigitalPayment::where('delete_status',0)->get();
        $district = SetupDistrict::where('delete_status',0)->get();
        $appellate_court_case = AppellateCourtCase::find($id);

        return view('litigation_management.billings.billings.add_billing',compact('external_council','bill_type','bank','digital_payment_type','district','appellate_court_case'));
    }

    public function search_case_billings(Request $request)
    {

        $query = DB::table('case_billings')
                ->leftJoin('setup_bill_types','case_billings.bill_type_id','=','setup_bill_types.id')
                ->leftJoin('setup_districts','case_billings.district_id','=','setup_districts.id')
                ->leftJoin('setup_external_councils','case_billings.panel_lawyer_id','=','setup_external_councils.id')
                ->leftJoin('setup_banks','case_billings.bank_id','=','setup_banks.id')
                ->leftJoin('setup_bank_branches','case_billings.branch_id','=','setup_bank_branches.id')
                ->leftJoin('setup_digital_payments','case_billings.digital_payment_type_id','=','setup_digital_payments.id');

        if($request->case_type && $request->case_no){
            
            $data = $query->where(['case_billings.case_type' => $request->case_type,'case_billings.case_no' => $request->case_no, 'case_billings.delete_status' => 0])
                    ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }elseif($request->case_type){
            
            $data = $query->where(['case_billings.case_type' => $request->case_type, 'case_billings.delete_status' => 0])
                    ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();
            
        }elseif($request->panel_lawyer_id){
           
            $data = $query->where(['case_billings.panel_lawyer_id' => $request->panel_lawyer_id, 'case_billings.delete_status' => 0])
                    ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }elseif($request->date_of_billing){
           
            $data = $query->where(['case_billings.date_of_billing' => $request->date_of_billing, 'case_billings.delete_status' => 0])
                    ->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }else{
            
            $data = $query->select('case_billings.*','setup_bill_types.bill_type_name','setup_districts.district_name','setup_external_councils.first_name','setup_external_councils.middle_name','setup_external_councils.last_name','setup_banks.bank_name','setup_bank_branches.bank_branch_name','setup_digital_payments.digital_payment_type_name')
                    ->get();

        }

        return response()->json([
            'result' => 'billing',
            'data' => $data,
        ]);

    }

}
